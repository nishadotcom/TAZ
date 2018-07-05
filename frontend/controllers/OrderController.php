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
        $orderCancelAddress = [];
        //$transactionId = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
        $model = new OrderAddress();
        if(Yii::$app->user->isGuest){
            $model->scenario = 'guestOrder';
        }

        if ($model->load(Yii::$app->request->post())) {
            // CHECK IS IT FROM PROFILE PAGE (ORDER_CANCEL)
            /*if(strpos($_GET['from'], 'CANCELORDER') !== false){
                $expFrom = explode('-', $_GET['from']);
                $orderID = $expFrom[1];
                $orderProducts = OrderDetail::find()->where(['order_id'=>$orderID])->with('productImages')->all();
                $from  = 'CANCELORDER-'.$orderID;

            }else{*/
                // STORE ADDRESS IN TEMP TABLE 
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
                // BILLING ADDRESS
                $connection = Yii::$app->getDb();
                $insert_query   = 'INSERT INTO taz_order_address_temp(txn_id, name, address, city, state, country, pin_code, phone, address_type, created_on) VALUES("'.$OrderAddressTempModel->txn_id.'", "'.$model->billingName.'", "'.$model->billingAddress.'", "'.$model->billingCity.'", "'.$model->billingState.'", "'.$model->billingCountry.'", "'.$model->billingPincode.'", "'.$model->billingPhone.'", "Billing", "'.Yii::$app->Common->mysqlDateTime().'")';
                $command = $connection->createCommand($insert_query)->execute();

                //$from = (strpos($_GET['from'], 'cart') !== false) ? 'CART' : 'PRODUCT';
                $from = (strpos($_GET['from'], 'cart') !== false) ? 'CART' : ((strpos($_GET['from'], 'CANCELORDER') !== false) ? 'CANCELORDER' : 'PRODUCT');
                if($from == 'PRODUCT'){
                    // GET PRODUCT DETAILS FOR REVIEW PAGE
                    $expFrom = explode('-', $_GET['from']);
                    $orderProductId = $expFrom[1];
                    $orderProducts = Product::find()->where(['id'=>$orderProductId])->with('productImages')->all();
                }elseif($from == 'CART'){
                    $expFrom = explode('-', $_GET['from']);
                    $orderCartId = $expFrom[1];
                    $orderProducts = Cart::find()->where(['cart_user_id'=>$orderCartId])->with('productImages')->all();
                }elseif($from = 'CANCELORDER'){
                    $expFrom = explode('-', $_GET['from']);
                    $orderID = $expFrom[1];
                    $orderProducts = OrderDetail::find()->where(['order_id'=>$orderID])->with('productImages')->all();
                    $from  = 'CANCELORDER-'.$orderID;
                }
            //}
            
            // PAYUMONEY DETAILS
            $payuDetail['key'] = 'gtKFFx';//Yii::$app->params['payumoneyMerchentKey'];
            $payuDetail['txnid'] = Yii::$app->request->post('transactionId');//Common::txnId();
            $payuDetail['email'] = (Yii::$app->user->isGuest) ? $model->guestEmail : Yii::$app->user->identity->email;
            $payuDetail['action'] = 'https://test.payu.in/_payment';
            //$payuDetail['action'] = 'https://secure.payu.in/_payment';


            return $this->render('review', [
                'addressData' => $model,
                'payuDetail' => $payuDetail,
                'orderProducts' => $orderProducts,
                'from' => $from
            ]);
            //return $this->redirect(['review', ['addressData' => $addressData]]);
        }
        // GET STORED ADDRESS IF IT IS FROM ORDER_CANCEL (PROFILE PAGE)
        if(strstr($from, 'CANCELORDER-')){
            $orderIDExp = explode('-', $from);
            $orderID    = $orderIDExp[1];
            // GET ADDRESS
            $orderCancelAddress['billingAddress'] = OrderAddress::find()->where(['order_id'=>$orderID, 'address_type'=>'Billing'])->one();
            $orderCancelAddress['shippingAddress'] = OrderAddress::find()->where(['order_id'=>$orderID, 'address_type'=>'Shipping'])->one();
        }

        return $this->render('step1OrderAddress', [
            'model'=>$model,
            'transactionId'=>$transactionId,
            'orderCancelAddress'=>$orderCancelAddress
        ]);
        //return $this->render('step1');
    }

    public function actionPaymentSuccess(){
        //echo '<pre>'; print_r($_POST); exit;
        if(isset($_POST)){
            if(isset($_POST['status']) && $_POST['status'] == Yii::$app->params['payumoneyPaymentStatus']){

                // INSERT NEW ORDER
                $orderModel = new Order();
                if(Yii::$app->user->isGuest){
                    $orderModel->name = $_POST['firstname'];
                    $orderModel->email = $_POST['email'];
                    $orderModel->user = 'Guest';
                }else{
                    $orderModel->user_id = Yii::$app->user->identity->id;
                    $orderModel->name = Yii::$app->user->identity->firstname.' '.Yii::$app->user->identity->lastname;
                    $orderModel->email = Yii::$app->user->identity->email;
                }
                
                $orderModel->order_code = 'TAZORD'.date('his');
                $orderModel->total_amount = $_POST['amount'];
                $orderModel->payment_status = ($_POST['status'] == 'success') ? 'SUCCESS' : 'NOTSUCCESS';
                $orderModel->order_status = 'NEW';
                $orderModel->order_date = Yii::$app->Common->mysqlDateTime();
                $orderModel->order_data = json_encode($_POST);

                if($orderModel->save()){
                    // INSERT THE ORDER DETAILS
                    // CHECK FROM WHERE THE ORDER PLACED (FROM CART / FROM DIRECT PRODUCT)
                    $from = (strpos($_POST['udf1'], 'CART') !== false) ? 'CART' : ((strpos($_POST['udf1'], 'CANCELORDER') !== false) ? 'CANCELORDER' : 'PRODUCT');
                    if($from == 'PRODUCT'){
                        // GET THE PRODUCT DETAILS AND INSERT INTO ORDERDETAIL TABLE
                        //echo 'PRODUCTINSIDE';
                        //echo '<br><pre>'; print_r($_POST); echo '</pre><br>';
                        $expFrom = explode('-', $_POST['udf1']);
                        $orderProductId = (isset($expFrom[1])) ? $expFrom[1] : '';
                        $orderProductData = ($orderProductId) ? Shop::getProductById($orderProductId) : [];
                        $productData = ($orderProductData) ? $orderProductData[0] : [];
                        if($productData){
                            //echo '<br><pre>'; print_r($productData); echo '</pre><br>';
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
                                $orderDetailModel->product_price = $productData->product_sale_price;
                                //$orderDetailModel->product_sale_price = $productData->product_sale_price;
                                $orderDetailModel->product_material = $productData->product_material;
                                $orderDetailModel->product_color = $productData->product_color;
                                $orderDetailModel->product_height = $productData->product_height;
                                $orderDetailModel->product_length = $productData->product_length;
                                $orderDetailModel->product_breadth = $productData->product_breadth;
                                $orderDetailModel->product_weight = $productData->product_weight;
                                $orderDetailModel->product_description = $productData->product_long_description;
                                $orderDetailModel->created_on = Yii::$app->Common->mysqlDateTime();
                            if($orderDetailModel->save()){
                                //echo 'SAVED';
                            }else{
                                //echo '<pre>'; print_r($orderDetailModel->getErrors()); echo '</pre>';
                                //echo 'NOTSAVED';
                            }
                            //exit;
                        }
                    }elseif($from == 'CART'){
                        // GET THE USER'S CART DETAILS 
                        $cartData = Cart::getUserCartItems();
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
                                    $valueCartData->cart_product_owner_name,
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
                            } // END OF CART DATA LOOP
                            $orderDetailAttributes = ['order_id', 'category_name', 'subcategory_name', 'product_id', 'product_code', 'product_name', 'product_seo', 'product_owner_id', 'seller_name', 'product_price', 'product_material', 'product_color', 'product_height', 'product_length', 'product_breadth', 'product_weight', 'product_description', 'created_on'];
                            $OrderDetailModel = new OrderDetail();
                            $result = Yii::$app->db->createCommand()->batchInsert(OrderDetail::tableName(), $orderDetailAttributes, $orderDetail)->execute();
                            if($result){
                                CART::deleteAll('cart_user_id = :userid', [':userid' => Yii::$app->user->id]);
                                //OrderAddressTemp::deleteAll('txn_id = :txnid', [':txnid' => $_POST['txnid']]);
                            }
                        }
                    }else{
                        // FROM CANCEL_ORDER
                        $expFrom = explode('-', $_POST['udf1']);
                        $cancelOrderId = (isset($expFrom[1])) ? $expFrom[1] : '';
                        // GET PRODUCT DETAILS
                        $cancelOrderProducts = OrderDetail::find()->where(['order_id'=>$cancelOrderId])->all();
                        if($cancelOrderProducts){
                            foreach ($cancelOrderProducts as $key => $cancelOrderProduct) {
                                $orderDetail[] = [
                                    $orderModel->id,
                                    $cancelOrderProduct->category_name,
                                    $cancelOrderProduct->subcategory_name,
                                    $cancelOrderProduct->product_id,
                                    $cancelOrderProduct->product_code,
                                    $cancelOrderProduct->product_name,
                                    $cancelOrderProduct->product_seo,
                                    $cancelOrderProduct->product_owner_id,
                                    $cancelOrderProduct->seller_name,
                                    $cancelOrderProduct->product_price,
                                    $cancelOrderProduct->product_material,
                                    $cancelOrderProduct->product_color,
                                    $cancelOrderProduct->product_height,
                                    $cancelOrderProduct->product_length,
                                    $cancelOrderProduct->product_breadth,
                                    $cancelOrderProduct->product_weight,
                                    $cancelOrderProduct->product_description,
                                    Yii::$app->Common->mysqlDateTime()
                                ];
                            } // END OF CART DATA LOOP
                            $orderDetailAttributes = ['order_id', 'category_name', 'subcategory_name', 'product_id', 'product_code', 'product_name', 'product_seo', 'product_owner_id', 'seller_name', 'product_price', 'product_material', 'product_color', 'product_height', 'product_length', 'product_breadth', 'product_weight', 'product_description', 'created_on'];
                            $OrderDetailModel = new OrderDetail();
                            $result = Yii::$app->db->createCommand()->batchInsert(OrderDetail::tableName(), $orderDetailAttributes, $orderDetail)->execute();
                            
                        }
                        // UPDATE PAYMENT STATUS IN order TABLE (THIS IS DONE BECAUSE THE LAST CANCEL ORDER SHOULD NOT DISPLAY IN PROFILE_DASHBOARD PAGE)
                        Yii::$app->db->createCommand()->update('taz_order', ['payment_status'=>'USERCANCELLEDUPDATED'], 'id='.$cancelOrderId)->execute();
                    }
                    // STORE ADDRESS
                    $transactionId  = $_POST['txnid'];
                    $addressAttributes = ['order_id', 'name', 'address', 'city', 'state', 'country', 'pin_code', 'phone', 'address_type', 'created_on'];
                    
                    /*if(strpos($_POST['udf1'], 'CANCELORDER')){
                        // GET ORDER ADDRESS IF IT IS FROM ORDER_CANCEL
                        $addressTemp = OrderAddress::find()->where(['order_id'=>$cancelOrderId])->all();
                    }else{
                        // GET THE STORED TEMP ADDRESS TO STORE IN ORDER ADDRESS TABLE
                        
                    }*/

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
                        } // END OF ADDRESSTEMP FOREACH
                        Yii::$app->db->createCommand()->batchInsert(OrderAddress::tableName(), $addressAttributes, $orderAddressInsertValues)->execute();
                    } // IF ADDRESS TEMP
                    
                    // END OF ADDRESS
                    return $this->render('paymentSuccess', [
                        'orderId' => $orderModel->order_code,
                        'email' => $_POST['email'],
                        'phone' => $_POST['phone'],
                        'addressData' => OrderAddress::find()->where(['order_id'=>$orderModel->id])->one(),
                        //'searchModel' => $searchModel,
                        //'dataProvider' => $dataProvider,
                    ]);
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
        if(isset($_POST) && isset($_POST['status'])){
            $orderModel = new Order();
            if(Yii::$app->user->isGuest){
                $orderModel->name = $_POST['firstname'];
                $orderModel->email = $_POST['email'];
                $orderModel->user = 'Guest';
            }else{
                $orderModel->user_id = Yii::$app->user->identity->id;
                $orderModel->name = Yii::$app->user->identity->firstname.' '.Yii::$app->user->identity->lastname;
                $orderModel->email = Yii::$app->user->identity->email;
            }
            
            $orderModel->order_code = 'TAZORD'.date('his');
            $orderModel->total_amount = $_POST['amount'];
            $orderModel->payment_status = 'USER CANCELLED';
            $orderModel->order_status = 'USER CANCELLED';
            $orderModel->order_date = Yii::$app->Common->mysqlDateTime();
            $orderModel->order_data = json_encode($_POST);
            if($orderModel->save()){
                $from = (strpos($_POST['udf1'], 'CART') !== false) ? 'CART' : 'PRODUCT';
                if($from == 'PRODUCT'){
                    $expFrom = explode('-', $_POST['udf1']);
                    $orderProductId = (isset($expFrom[1])) ? $expFrom[1] : '';
                    $orderProductData = ($orderProductId) ? Shop::getProductById($orderProductId) : [];
                    $productData = ($orderProductData) ? $orderProductData[0] : [];
                    if($productData){
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
                            $orderDetailModel->product_price = $productData->product_sale_price;
                            //$orderDetailModel->product_sale_price = $productData->product_sale_price;
                            $orderDetailModel->product_material = $productData->product_material;
                            $orderDetailModel->product_color = $productData->product_color;
                            $orderDetailModel->product_height = $productData->product_height;
                            $orderDetailModel->product_length = $productData->product_length;
                            $orderDetailModel->product_breadth = $productData->product_breadth;
                            $orderDetailModel->product_weight = $productData->product_weight;
                            $orderDetailModel->product_description = $productData->product_long_description;
                            $orderDetailModel->created_on = Yii::$app->Common->mysqlDateTime();
                        if($orderDetailModel->save()){
                            //echo 'SAVED';
                        }else{
                            //echo '<pre>'; print_r($orderDetailModel->getErrors()); echo '</pre>';
                            //echo 'NOTSAVED';
                        }
                    }
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
                    } // END OF ADDRESSTEMP FOREACH
                    Yii::$app->db->createCommand()->batchInsert(OrderAddress::tableName(), $addressAttributes, $orderAddressInsertValues)->execute();
                } // IF ADDRESS TEMP
            }
        }
        return $this->render('paymentCancel', [
                        //'orderId' => $orderModel->order_code,
                        //'email' => $_POST['email'],
                        //'phone' => $_POST['phone'],
                        //'addressData' => OrderAddress::find()->where(['order_id'=>$orderModel->id])->one(),
                        //'searchModel' => $searchModel,
                        //'dataProvider' => $dataProvider,
                    ]);
        //echo 'Payment CANCEL';
        //echo '<pre>';
        //print_r($_POST);
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
