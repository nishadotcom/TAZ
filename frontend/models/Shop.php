<?php

namespace frontend\models;

use Yii;
use frontend\models\User;
use frontend\models\Product;
use frontend\models\ProductImage;
use frontend\models\ProductAddress; 
use backend\models\Category;

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

    public function getProductsByCategoryId($categoryId){
		$products 	= Product::find()->where(['product_category_id'=>$categoryId, 'product_status'=>'Active'])->with('productAddresses')->with('productImages')->with('productCategory')->all();
		return $products;
	}

    public function getProductById($productId){
        $products   = Product::find()->where(['id'=>$productId, 'product_status'=>'Active'])->with('productAddresses')->with('productImages')->with('productCategory')->all();
        return $products;
    }
}
