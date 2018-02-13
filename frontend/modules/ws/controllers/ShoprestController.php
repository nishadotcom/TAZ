<?php

namespace frontend\modules\ws\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\helpers\Url;
use yii\web\Response;
use common\models\LoginForm;
use common\components\Common;
use yii\helpers\Json;
use frontend\models\Cart;
use frontend\models\CartSearch;
use frontend\models\Shop;
use frontend\models\UserFavorite;

class ShoprestController extends ActiveController {

    public $modelClass = 'frontend\models\Shoprest';
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];

    public function behaviors() {
        $behaviors = parent::behaviors();

        $behaviors['ContentNegotiator'] = [
            'class' => 'yii\filters\ContentNegotiator',
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
            //'application/xml' => Response::FORMAT_XML,
            ],
        ];
        return $behaviors;
    }

    /**
     * To unset the unwanted actions
     * @return type
     */
    public function actions() {
        $actions = parent::actions();
        unset($actions['index'], $actions['create'], $actions['update'], $actions['delete']);

        return $actions;
    }
    
    /**
     * This method handles to add an item to cart
     * **/
    public function actionAddtoCart(){
        $productId  = (isset($_POST['productId'])) ? $_POST['productId'] : '';
        $userId     = (isset($_POST['userId'])) ? $_POST['userId'] : '';
        $data       = [];
        if($productId && $userId){
            // Get Product Details
            $product            = Shop::getProductById($productId);
            
            if($product){
                $productData    = $product[0];
                $cartModel      = new Cart();
                $cartModel->cart_product_name           = $productData->product_name;
                $cartModel->cart_user_id                = $userId;
                $cartModel->cart_product_category_name  = $productData->productCategory->category_name;;
                $cartModel->cart_product_id             = $productData->id;
                $cartModel->cart_product_code           = $productData->product_code;
                $cartModel->cart_product_seo            = $productData->product_seo;
                $cartModel->cart_product_owner_id       = $productData->product_owner_id;
                $cartModel->cart_product_price          = $productData->product_sale_price;
                $cartModel->cart_product_material       = $productData->product_material;
                $cartModel->cart_product_color = $productData->product_color;
                $cartModel->cart_product_height         = $productData->product_height;
                $cartModel->cart_product_length         = $productData->product_length;
                $cartModel->cart_product_breadth        = $productData->product_breadth;
                $cartModel->cart_product_weight         = $productData->product_weight;
                $cartModel->cart_product_short_description = $productData->product_short_description;
                $cartModel->cart_product_long_description  = $productData->product_long_description;
                $cartModel->cart_product_image = (isset($productData->productImages[0])) ? $productData->productImages[0]->cover_photo : '';
                $cartModel->cart_product_quantity       = 1;
                //$cartModel->product_available_status    = $productData->product_name;
                $cartModel->cart_added_on               = Common::mysqlDateTime();
                
                if($cartModel->save()){
                    $data['cartCount'] = Cart::getCount(); 
                    return $this->_returnResult($data, 601, 1, 0);
                }else{
                    return $this->_returnResult($data, 602, 0, 1);
                }
            }else{
                return $this->_returnResult($data, 602, 0, 1);
            }
            
        }else{
            return $this->_returnResult($data, 600, 0, 1);
        }
    }
    
    public function actionRemoveCartItem(){
        $data = [];
        $cartId  = (isset($_POST['cartId'])) ? $_POST['cartId'] : '';
        if($cartId){
            $response = Cart::removeCartItem($cartId);
            if($response['result']){
                //$data['cartItems'] = $response['cartItems'];
                $searchModel = new CartSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                $data['cartItems'] = $this->renderPartial('cart', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]);
                $data['cartTotal'] = Cart::getCartTotal($dataProvider->models, 'cart_product_price');
                
                return $this->_returnResult($data, 604, 1, 0);
            }else{
                return $this->_returnResult($data, 602, 0, 1);
            }
        }else{
            return $this->_returnResult($data, 602, 0, 1);
        }
    }

    /**
     * This method handles to add a product as user favorite
     * */
    public function actionAddUserFavorite(){
        $productId  = (isset($_POST['productId'])) ? $_POST['productId'] : '';
        $userId     = (isset($_POST['userId'])) ? $_POST['userId'] : '';
        $data       = [];
        if($productId && $userId){
            $userFavoriteModel      = new UserFavorite();
            // ASSIGN VALUES TO MODEL OBJECT
            $userFavoriteModel->product_id  = $productId;
            $userFavoriteModel->user_id     = $userId;
            $userFavoriteModel->favorited_on= date('Y-m-d H:i:s');
            if($userFavoriteModel->save()){
                $data['favoriteCount'] = Yii::$app->ShopComponent->getProductFavoriteCount($productId);
                return $this->_returnResult($data, 605, 1, 0);
            }else{
                return $this->_returnResult($data, 607, 0, 1);
            }
        }else{
            return $this->_returnResult($data, 400, 0, 1);
        }
    }
    
    /**
     * This method handles to add a product as user favorite
     * */
    public function actionRemoveUserFavorite(){
        $productId  = (isset($_POST['productId'])) ? $_POST['productId'] : '';
        $userId     = (isset($_POST['userId'])) ? $_POST['userId'] : '';
        $data       = [];
        if($productId && $userId){
            $userFavoriteModel = UserFavorite::findOne(['user_id' => $userId, 'product_id' => $productId]);
            $result = $userFavoriteModel->delete();
            if($result){
                $data['favoriteCount'] = Yii::$app->ShopComponent->getProductFavoriteCount($productId);
                return $this->_returnResult($data, 606, 1, 0);
            }else{
                return $this->_returnResult($data, 608, 0, 1);
            }
        }else{
            return $this->_returnResult($data, 400, 0, 1);
        }
    }

    public function actionAjaxMakePayment(){
        $getPayuDetail['key'] = 'gtKFFx';
        $getPayuDetail['txnid'] = $_POST['txnid'];//substr(hash('sha256', mt_rand() . microtime()), 0, 20);
        $getPayuDetail['hash'] = '';
        $getPayuDetail['amount'] = $_POST['amount'];
        $getPayuDetail['productinfo'] = $_POST['productinfo'];
        $getPayuDetail['firstname'] = $_POST['firstname'];
        $getPayuDetail['email'] = $_POST['email'];
        //$getPayuDetail['lastname'] = 'Lastname';
        $getPayuDetail['address1'] = $_POST['address1'];
        $getPayuDetail['city'] = $_POST['email'];
        $getPayuDetail['state'] = $_POST['state'];
        $getPayuDetail['country'] = $_POST['country'];
        $getPayuDetail['zipcode'] = $_POST['zipcode'];
        $getPayuDetail['phone'] = $_POST['phone'];
        //$getPayuDetail['from'] = $_POST['from'];
        $getPayuDetail['udf1']               = $_POST['udf1'];

        $getPayuDetail['surl'] = 'http://dev.talozo.local/order/payment-success';
        $getPayuDetail['furl'] = 'http://dev.talozo.local/order/payment-success'; //Yii::app()->request->urlReferrer;
        $getPayuDetail['curl'] = 'http://dev.talozo.local/order/payment-success';
        


        $hash = '';
        $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
        $hashVarsSeq = explode('|', $hashSequence);
        $hashString = '';
        foreach ($hashVarsSeq as $hashVar) {
            $hashString .= isset($getPayuDetail[$hashVar]) ? $getPayuDetail[$hashVar] : '';
            $hashString .= '|';
        }
        $hashString .= 'eCwWELxi'; //echo $hashString; exit;
        $getPayuDetail['hash'] = strtolower(hash('sha512', $hashString));
        $getPayuDetail['action'] = 'https://test.payu.in/_payment';
        $hash = $getPayuDetail['hash'];
        echo json_encode($getPayuDetail);
    }

    /*
     * Return Display format
     */

    private function _returnResult($data, $messageCode, $trueOrFalse, $errorCode = false) {
        //return $this->_returnResult('TEST_DATA', ['name' => $data], 200, 1, 0);
        return [
            'result'=> ($trueOrFalse) ? TRUE : FALSE,
            'msg'   => $this->_getStatusCodeMessage($messageCode),
            'data'  => $data,
            //$dataKey => $data,
            'error' => ($errorCode) ? $errorCode : 0
        ];
    }

    /**
     * To get the status code
     * */
    private function _getStatusCodeMessage($status) {
        $codes = [
            200 => 'User found',
            400 => 'Invalid Request',
            401 => 'Unauthorized',
            403 => 'Forbidden',
            405 => 'You are requesting with an expired access token, please request for a new one.',
            101 => 'Username cannot be empty',
            102 => 'Invalid Username',
            105 => 'Invalid Access-token',
            106 => 'Access-token is required',
            404 => 'Not Found',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
            503 => 'Results not found',
            504 => 'Logged-in already',
            505 => 'Empty Id',
            506 => 'Incorrect User Id',
            507 => 'User dashboard data',
            508 => 'No User dashboard data',
            509 => 'Nominate verifier data.',
            510 => 'No nominated verifiers found.',
            600 => 'Product ID & User ID cannot be blank',
            601 => 'Added to cart successfully',
            602 => 'Could not add to cart. Please try again',
            603 => 'Could not remove from cart. Please try again',
            604 => 'Item has been removed from cart successfully',
            605 => 'Product has been added to your favorite',
            606 => 'Product has been removed from your favorites',
            607 => 'Product could not be added to your favorites. Please try again',
            608 => 'Product could not be removed from your favorites. Please try again',
        ];

        return (isset($codes[$status])) ? $codes[$status] : '';
    }

}
