<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Order;
use frontend\models\OrderAddress;
use frontend\models\OrderDetail;
use frontend\models\OrderAddressTemp;
use frontend\models\Cart;
use frontend\models\Product;
use frontend\models\Shop;
use frontend\models\OrderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function beforeAction($action){            
        if ($action->id == 'payment-success' || $action->id == 'payment-error' || $action->id == 'payment-cancel') {
            $this->enableCsrfValidation = false;
        }

        return parent::beforeAction($action);
    }

    public function actionStep1($from=FALSE, $transactionId=FALSE, $productId=FALSE){ 
        $this->layout = 'cart';
        //$transactionId = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
        $model = new OrderAddress();

        if ($model->load(Yii::$app->request->post())) {
            // STORE ADDRESS IN TEMP TABLE 
            //echo $model->name; exit;
            $OrderAddressTempModel = new OrderAddressTemp();
            $OrderAddressTempModel->txn_id = Yii::$app->request->post('transactionId');
            $OrderAddressTempModel->name = $model->name;
            $OrderAddressTempModel->address = $model->address;
            $OrderAddressTempModel->city = $model->city;
            $OrderAddressTempModel->state = $model->state;
            $OrderAddressTempModel->country = $model->country;
            $OrderAddressTempModel->pin_code = $model->pin_code;
            $OrderAddressTempModel->phone = $model->phone;
            $OrderAddressTempModel->address_type = 'Shipping';
            $OrderAddressTempModel->created_on = Yii::$app->Common->mysqlDateTime();
            $OrderAddressTempModel->save();

            // payumoney details
            $payuDetail['key'] = 'gtKFFx';//Yii::$app->params['payumoneyMerchentKey'];
            $payuDetail['txnid'] = Yii::$app->request->post('transactionId');//Common::txnId();
            //$payuDetail['hash'] = '';
            $payuDetail['action'] = 'https://test.payu.in/_payment';
            //$payuDetail['action'] = 'https://secure.payu.in/_payment';


            return $this->render('review', [
                'addressData' => $model,
                'payuDetail' => $payuDetail,
            ]);
            //return $this->redirect(['review', ['addressData' => $addressData]]);
        }

        return $this->render('step1OrderAddress', [
            'model' => $model,
            'transactionId' => $transactionId
        ]);
        //return $this->render('step1');
    }

    public function actionPaymentSuccess(){
        //echo '<pre>'; print_r($_POST); exit;
        if(isset($_POST)){
            if(isset($_POST['status']) && $_POST['status'] == Yii::$app->params['payumoneyPaymentStatus']){
                // INSERT NEW ORDER
                $orderModel = new Order();
                $orderModel->user_id = Yii::$app->user->identity->id;
                $orderModel->order_code = 'TAZORD'.date('his');
                $orderModel->total_amount = $_POST['amount'];
                $orderModel->payment_status = ($_POST['status'] == 'success') ? 'SUCCESS' : 'NOTSUCCESS';
                $orderModel->order_status = 'NEW';
                $orderModel->order_date = Yii::$app->Common->mysqlDateTime();

                if($orderModel->save()){
                    // INSERT THE ORDER DETAILS
                    // CHECK FROM WHERE THE ORDER PLACED (FROM CART / FROM DIRECT PRODUCT)
                    $from = (strpos($_POST['udf1'], 'CART') !== false) ? 'CART' : 'PRODUCT';
                    if($from == 'PRODUCT'){
                        // GET THE PRODUCT DETAILS AND INSERT INTO ORDERDETAIL TABLE
                        echo 'PRODUCTINSIDE';
                        echo '<br><pre>'; print_r($_POST); echo '</pre><br>';
                        $expFrom = explode('-', $_POST['udf1']);
                        $orderProductId = (isset($expFrom[1])) ? $expFrom[1] : '';
                        $orderProductData = ($orderProductId) ? Shop::getProductById($orderProductId) : [];
                        $productData = ($orderProductData) ? $orderProductData[0] : [];
                        if($productData){
                            echo '<br><pre>'; print_r($productData); echo '</pre><br>';
                            $orderDetailModel = new OrderDetail();
                            
                                $orderDetailModel->order_id = $orderModel->id;
                                $orderDetailModel->category_name = $productData->productCategory->category_name;
                                $orderDetailModel->subcategory_name = NULL;//$productData->product_subcategory_id;
                                $orderDetailModel->product_id = $productData->id;
                                $orderDetailModel->product_code = $productData->product_code;
                                $orderDetailModel->product_name = $productData->product_name;
                                $orderDetailModel->product_seo = $productData->product_seo;
                                $orderDetailModel->product_owner_id = $productData->product_owner_id;
                                $orderDetailModel->seller_name = 'SellerNAME';
                                //$valueCartData->valueCartData,
                                $orderDetailModel->product_price = $productData->product_price;
                                $orderDetailModel->product_material = $productData->product_material;
                                $orderDetailModel->product_color = $productData->product_color;
                                $orderDetailModel->product_height = $productData->product_height;
                                $orderDetailModel->product_length = $productData->product_length;
                                $orderDetailModel->product_breadth = $productData->product_breadth;
                                $orderDetailModel->product_weight = $productData->product_weight;
                                $orderDetailModel->product_description = $productData->product_long_description;
                                $orderDetailModel->created_on = Yii::$app->Common->mysqlDateTime();
                            if($orderDetailModel->save()){
                                echo 'SAVED';
                            }else{
                                echo '<pre>'; print_r($orderDetailModel->getErrors()); echo '</pre>';
                                echo 'NOTSAVED';
                            }
                        }
                    }else{
                        echo 'CARTINSIDE';
                        echo '<br><pre>'; print_r($_POST); echo '</pre><br>';
                        // GET THE USER'S CART DETAILS 
                        $cartData = Cart::getUserCartItems();
                        echo '<br><pre>'; print_r($cartData); echo '</pre><br>';
                        if($cartData){
                            foreach ($cartData as $key => $valueCartData) {
                                $orderDetail[] = [
                                    $orderModel->id,
                                    $valueCartData->cart_product_category_name,
                                    $valueCartData->cart_product_subcategory_NAME,
                                    $valueCartData->cart_product_id,
                                    $valueCartData->cart_product_code,
                                    $valueCartData->cart_product_name,
                                    $valueCartData->cart_product_seo,
                                    $valueCartData->cart_product_owner_id,
                                    'SellerNAME',
                                    //$valueCartData->valueCartData,
                                    $valueCartData->cart_product_price,
                                    $valueCartData->cart_product_material,
                                    $valueCartData->cart_product_color,
                                    $valueCartData->cart_product_height,
                                    $valueCartData->cart_product_length,
                                    $valueCartData->cart_product_breadth,
                                    $valueCartData->cart_product_weight,
                                    $valueCartData->cart_product_long_description,
                                    Yii::$app->Common->mysqlDateTime()
                                ];
                                /*$orderDetail[] = [
                                    'order_id' => $orderModel->id,
                                    'category_name' => $valueCartData->cart_product_category_name,
                                    'subcategory_name' => $valueCartData->cart_product_subcategory_NAME,
                                    'product_id' => $valueCartData->cart_product_id,
                                    'product_code' => $valueCartData->cart_product_code,
                                    'product_name' => $valueCartData->cart_product_name,
                                    'product_seo' => $valueCartData->cart_product_seo,
                                    'product_owner_id' => $valueCartData->cart_product_owner_id,
                                    'seller_name' => $valueCartData->valueCartData,
                                    'product_price' => $valueCartData->cart_product_price,
                                    'product_material' => $valueCartData->cart_product_material,
                                    'product_color' => $valueCartData->cart_product_color,
                                    'product_height' => $valueCartData->cart_product_height,
                                    'product_length' => $valueCartData->cart_product_length,
                                    'product_breadth' => $valueCartData->cart_product_breadth,
                                    'product_weight' => $valueCartData->cart_product_weight,
                                    'product_description' => $valueCartData->cart_product_long_description,
                                    'created_on' => Yii::$app->Common->mysqlDateTime()
                                ];*/
                            } // END OF CART DATA LOOP
                            $orderDetailAttributes = ['order_id', 'category_name', 'subcategory_name', 'product_id', 'product_code', 'product_name', 'product_seo', 'product_owner_id', 'seller_name', 'product_price', 'product_material', 'product_color', 'product_height', 'product_length', 'product_breadth', 'product_weight', 'product_description', 'created_on'];
                            $OrderDetailModel = new OrderDetail();
                            Yii::$app->db->createCommand()->batchInsert(OrderDetail::tableName(), $orderDetailAttributes, $orderDetail)->execute();
                        } // IF CARTDATA
                    }
                    // STORE ADDRESS
                    $transactionId  = $_POST['txnid'];
                    $addressAttributes = ['order_id', 'name', 'address', 'city', 'state', 'country', 'pin_code', 'phone', 'address_type', 'created_on'];
                    // GET THE STORED TEMP ADDRESS TO STORE IN ORDER ADDRESS TABLE
                    $addressTemp    = OrderAddressTemp::find()->where(['txn_id'=>$transactionId])->all();
                    if($addressTemp){
                        foreach ($addressTemp as $key => $orderAddress) {
                            $orderAddressInsertValues[] = [
                                $orderModel->id,
                                $orderAddress->name,
                                $orderAddress->address,
                                $orderAddress->city,
                                $orderAddress->state,
                                $orderAddress->country,
                                $orderAddress->pin_code,
                                $orderAddress->phone,
                                $orderAddress->address_type,
                                Yii::$app->Common->mysqlDateTime()
                            ];
                            /*$rows[] = [
                                'order_id' => $orderAddress->order_id,
                                'name' => $orderAddress->title,
                                'address' => $orderAddress->content,
                                'city' => $orderAddress->city,
                                'state' => $orderAddress->state,
                                'country' => $orderAddress->country,
                                'pin_code' => $orderAddress->pin_code,
                                'phone' => $orderAddress->phone,
                                'address_type' => $orderAddress->address_type,
                                'created_on' => Yii::$app->Common->mysqlDateTime()
                            ];*/
                        } // END OF ADDRESSTEMP FOREACH
                        Yii::$app->db->createCommand()->batchInsert(OrderAddress::tableName(), $addressAttributes, $orderAddressInsertValues)->execute();
                    } // IF ADDRESS TEMP
                    // END OF ADDRESS
                    echo 'NISHADONE';
                }else{
                    echo 'ORDER COULD NOT BE STORED';
                    echo '<br><pre>'; print_r($_POST); echo '</pre><br>';
                } // ORDER MODEL SAVE
            }else{
                
                echo 'PAYMENT FAILED.';
                echo '<br><pre>'; print_r($_POST); echo '</pre>';
            }
        }else{
            echo 'INVALID METHOD. NOT POST METHOD.';
        }
        exit;
    }

    public function actionPaymentError(){
        echo 'Payment Failer';
        echo '<pre>';
        print_r($_POST);
    }

    public function actionPaymentCancel(){
        echo 'Payment CANCEL';
        echo '<pre>';
        print_r($_POST);
    }
    
    public function actionTest(){
        $from = (strpos('CART-1', 'PRO') !== false) ? 'CART' : 'PRODUCT';
        echo $from;
    }
    /**
     * Lists all Order models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Order model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Order model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Order();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Order model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Order model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
