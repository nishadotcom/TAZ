<?php

namespace frontend\components;

use Yii;
use yii\helpers\Html;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\helpers\Url;
use yii\db\Query;
use common\models\User;
use yii\web\UploadedFile;
use yii\web\BadRequestHttpException;
use frontend\models\Product;
use frontend\models\ProductImage;
use frontend\models\ProductAddress; 
use backend\models\Category;
use frontend\models\Shop; 
use frontend\models\Cart; 
use frontend\models\UserFavorite; 

class ShopComponent extends Component {

    public static function formatPrice($price){
        return $price + 0;
    }

    /**
    * Get Products by Category Id 
    **/
    public static function getProductsByCategoryId($categoryId){
        $products   = Shop::getProductsByCategoryId($categoryId);
        return $products;
    }

    /**
	* This method handles to get category products count
    **/
    public static function getProductsCountByCategory($categoryId){
        $products   = Shop::getProductsByCategoryId($categoryId);
        return ($products) ? count($products) : 0;
    }
    
    /**
     * This method handles to get CART products count by userid
     * **/
    public static function getCartCount($userId){
        $cartCount 	= Cart::find()->where(['cart_user_id'=>$userId])->count();
        //return ($cartCount) ? $cartCount : FALSE;
        return $cartCount;
    }
    
    public static function getProductFavoriteCount($productId){
        $favoriteCount 	= UserFavorite::find()->where(['product_id'=>$productId])->count();
        return ($favoriteCount) ? $favoriteCount : '';
    }
    
    public static function getUserFavoriteProducts($userId){
        return UserFavorite::find()->where(['user_id' => $userId])->asArray()->all();
    }

    public static function getTopFavoritedProdicts(){
    	$topFavoriteProducts   = Shop::getTopFavoriteProducts();
    	return $topFavoriteProducts;
    }

    public static function getProductImageByProductId($productId){
    	$productImages = Shop::getProductImageByProductId($productId);
    	return $productImages;
    }

    public static function getNewArrivals(){
    	$products = Shop::getNewAriivalProducts();
    	return $products;
    }

    public static function getFeatureSellers(){
    	$featureSellers = Shop::getFeatureSellers();
    	return $featureSellers;
    }

    public static function getOnSaleProducts(){
        $onSaleProducts = Shop::getOnSaleProducts();
        return $onSaleProducts;
    }
    
    public static function getProfilePicture(){
        if(!Yii::$app->user->isGuest){
            $pathProfileImg = Yii::$app->params['PATH_PROFILE_IMAGE'];
            $profileUploadPath = Yii::$app->params['PROFILE_IMAGE_UPLOAD_PATH_FRONTEND'];
            $profileNoImg   = 'noImage.jpg';
            $userEmail      = Yii::$app->user->identity->email;
            $userData       = ($userEmail) ? User::findByEmail($userEmail) : '';
            $profileImg     = ($userData && $userData->profile_image) ? $userData->profile_image : $profileNoImg;
            $profileImg     = (file_exists($profileUploadPath.$userData->profile_image)) ? $pathProfileImg.$profileImg : $pathProfileImg.$profileNoImg;
            return $profileImg;
        }else{
            return FALSE;
        }
    }

} // End of class
?>

