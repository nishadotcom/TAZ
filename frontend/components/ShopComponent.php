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

class ShopComponent extends Component {

    /**
    * Get Products by Category Id 
    **/
    public static function getProductsByCategoryId($categoryId){
        $products   = Shop::getProductsByCategoryId($categoryId);
        return $products;
    }

} // End of class
?>

