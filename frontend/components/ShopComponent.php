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

} // End of class
?>

