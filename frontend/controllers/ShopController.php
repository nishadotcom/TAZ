<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\Product;
use frontend\models\ProductImage;
use frontend\models\ProductAddress; 
use backend\models\Category;
use frontend\models\Shop; 

/**
 * Shop controller
 */
class ShopController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [];
    }

    public function actionIndex($id){
		echo $id;
	}
	
	public function actionProductsbycategoryid($id){ 
		$products 	= Shop::getProductsByCategoryId($id);
		echo '<pre>'; print_r($products);
	}

}
