<?php

namespace frontend\models;

use Yii;
use frontend\models\User;
use frontend\models\Product;
use frontend\models\ProductImage;
use frontend\models\ProductAddress; 
use backend\models\Category;
use frontend\models\UserFavorite; 
use backend\models\FeatureSeller;

class Shop extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'taz_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [];
    }

    public static function getProductsByCategoryId($categoryId, $filters=false){
        $priceWhere = [];
        if($filters && isset($filters['price'])){
            $priceWhere = ['between', 'product_sale_price', ltrim($filters['price']['min'], '₹'), ltrim($filters['price']['max'], '₹')];
            //$priceWhere = ['between', 'product_sale_price', 600, 700];
        }

		$products 	= Product::find()->where(['product_category_id'=>$categoryId, 'product_status'=>'Active'])->andWhere($priceWhere)->with('productAddresses')->with('productImages')->with('productCategory')->with('userFavorite')->all();
		return $products;
	}

    public static function getProductById($productId){
        $products   = Product::find()->where(['id'=>$productId, 'product_status'=>'Active'])->with('productAddresses')->with('productImages')->with('productCategory')->all();
        return $products;
    }

    // RECOMMENDATION ENGINE FUNCTIONS

    public static function getSimilarColorProducts($categoryId, $color=false){
        $products = Product::find()->where(['product_category_id'=>$categoryId, 'product_status'=>'Active'])->with('productAddresses')->with('productImages')->with('productCategory')->with('userFavorite')->all();
        return $products;
    }

    /* 
        DESCRIPTION     : SIMILAR MATERIAL
        PARAMETER       : @productid : INT 
                          @material : STRING 
    */
    public static function getSimilarMaterialProducts($productId, $material=false){
        $products = Product::find()->where(['product_status'=>'Active'])->andWhere(['<>', 'id', $productId])->andWhere(['LIKE', 'product_material', $material])->with('productAddresses')->with('productImages')->with('productCategory')->with('userFavorite')->all();
        return $products;
    }
    // END RECOMMENDATION ENGINE FUNCTIONS

    public static function getTopFavoriteProducts(){
        $sql = "SELECT COUNT(tblUserFavorite.product_id) as favoriteCount, tblUserFavorite.product_id, taz_product.* FROM `taz_user_favorite` as tblUserFavorite \n"
            . "LEFT JOIN taz_product ON taz_product.id = tblUserFavorite.product_id\n"
            //. "LEFT JOIN taz_product_image ON taz_product_image.product_id = tblUserFavorite.product_id\n"
            . "GROUP BY tblUserFavorite.product_id ORDER BY favoriteCount DESC LIMIT 0, 8";
        $connection = Yii::$app->getDb();
        $model = $connection->createCommand($sql);
        //$products = UserFavorite::findBySql($sql)->all();
        $products = $model->queryAll();
        return $products;
    }

    public static function getProductImageByProductId($productId){
        $productImages = ProductImage::find()->where(['product_id'=>$productId])->all();
        return $productImages;
    }

    public static function getNewAriivalProducts(){
        $products   = Product::find()->where(['product_status'=>'Active'])->with('productAddresses')->andWhere('created_on >= DATE_SUB(CURDATE(), INTERVAL 10 DAY)')->with('productImages')->with('productCategory')->limit(8)->orderBy(['created_on' => SORT_DESC])->all();
        return $products;
    }

    public static function getFeatureSellers(){
        /*$sellers = User::find()->where(['user_type'=>'Seller', 'status'=>'Active'])->andWhere('id NOT IN (SELECT seller_id FROM taz_feature_seller)')->orderBy(['created_at'=>SORT_ASC])->limit(2)->with('userDetails')->all();
        return $sellers;*/
        $featureSellers = FeatureSeller::find()->where(['status'=>'Active'])->with('sellerDetail')->all();
        return $featureSellers;
    }

    public static function getSellersForFeatureSeller(){
        $sql        = 'SELECT id FROM `taz_user` WHERE user_type="Seller" AND status="Active" AND id NOT IN (SELECT seller_id FROM taz_feature_seller) ORDER BY RAND() LIMIT 4';
        $connection = Yii::$app->getDb();
        $model      = $connection->createCommand($sql);
        $sellers    = $model->queryAll();
        return $sellers;
    }
}
