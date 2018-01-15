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
use frontend\models\Cart;

/**
 * Shop controller
 */
class ShopController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [];
    }

    public function actionIndex($id) {
        echo $id;
    }

    public function actionProductsbycategoryid($id) {
        $products = Shop::getProductsByCategoryId($id);
        echo '<pre>';
        print_r($products);
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Category Products
     * */
    public function actionProducts($id) {
        $this->layout = 'categoryProducts';
        $products = Shop::getProductsByCategoryId($id);
        $getUserFavoriteProducts = Yii::$app->ShopComponent->getUserFavoriteProducts(1);
        $userFavoriteProducts = ($getUserFavoriteProducts) ? array_column($getUserFavoriteProducts, 'product_id') : [];

        return $this->render('categoryproducts', [
                    'categoryData' => Category::findOne($id),
                    'categoryProducts' => $products,
                    'cartData' => Cart::getUserCart(),
                    'userFavoriteProducts' => $userFavoriteProducts,
        ]);
    }

    /**
     * Single Product
     * */
    public function actionProduct($id) {
        $this->layout = 'categoryProducts';
        $product = Shop::getProductById($id);

        return $this->render('singleProduct', [
                    'product' => $product,
        ]);
    }

}
