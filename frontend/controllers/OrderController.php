<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Order;
use frontend\models\OrderAddress;
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

    public function actionStep1($from=FALSE, $productId=FALSE){ 
        $this->layout = 'cart';
        $model = new OrderAddress();

        if ($model->load(Yii::$app->request->post())) {
            // && $model->save()
            $addressData = Yii::$app->request->post('OrderAddress');

            // payumoney details
            $payuDetail['key'] = 'gtKFFx';//Yii::$app->params['payumoneyMerchentKey'];
            $payuDetail['txnid'] = substr(hash('sha256', mt_rand() . microtime()), 0, 20);//Common::txnId();
            //$payuDetail['hash'] = '';
            $payuDetail['amount'] = 1000;
            $payuDetail['productinfo'] = 'PRODUCT NAME';
            $payuDetail['firstname'] = 'FIRSTNAME';
            $payuDetail['email'] = 'nisha.com126@gmail.com';
            $payuDetail['lastname'] = 'LASTNAME';
            $payuDetail['address'] = 'ADDRESS';
            $payuDetail['state'] = 'STATE';
            $payuDetail['country'] = 'COUNTRY';
            $payuDetail['zipcode'] = '635853';
            $payuDetail['phone'] = '9655196928';

            $payuDetail['surl'] = Yii::$app->homeUrl.'order/payment-success';
            $payuDetail['furl'] = Yii::$app->homeUrl . 'order/payment-fail'; //Yii::app()->request->urlReferrer;
            $payuDetail['curl'] = Yii::$app->homeUrl;
            $payuDetail['udf1']               = 'test';


            //$hash = '';
            $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
            //$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1";
            $hashVarsSeq = explode('|', $hashSequence);
            $hashString = '';
            foreach ($hashVarsSeq as $hashVar) {
                $hashString .= isset($payuDetail[$hashVar]) ? $payuDetail[$hashVar] : '';
                $hashString .= '|';
            }
            $hashString .= 'eCwWELxi';
            $payuDetail['hash'] = strtolower(hash('sha512', $hashString));
            $payuDetail['action'] = 'https://test.payu.in/_payment';
            //$payuDetail['action'] = 'https://secure.payu.in/_payment';


            return $this->render('review', [
                'addressData' => $addressData,
                'payuDetail' => $payuDetail
            ]);
            //return $this->redirect(['review', ['addressData' => $addressData]]);
        }

        return $this->render('step1OrderAddress', [
            'model' => $model,
        ]);
        //return $this->render('step1');
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
