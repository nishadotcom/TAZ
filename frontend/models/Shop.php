<?php

namespace frontend\models;

use Yii;
use frontend\models\User;
use frontend\models\Product;
use frontend\models\ProductImage;
use frontend\models\ProductAddress; 
use backend\models\Category;
use frontend\models\UserFavorite; 

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

    public static function getProductsByCategoryId($categoryId){
		$products 	= Product::find()->where(['product_category_id'=>$categoryId, 'product_status'=>'Active'])->with('productAddresses')->with('productImages')->with('productCategory')->with('userFavorite')->all();
		return $products;
	}

    public static function getProductById($productId){
        $products   = Product::find()->where(['id'=>$productId, 'product_status'=>'Active'])->with('productAddresses')->with('productImages')->with('productCategory')->all();
        return $products;
    }

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
}
