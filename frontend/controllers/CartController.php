<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Cart;
use frontend\models\CartSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use frontend\models\OrderAddress;

/**
 * CartController implements the CRUD actions for Cart model.
 */
class CartController extends Controller
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

    /**
     * Lists all Cart models.
     * @return mixed
     */
    public function actionIndex() {
        $this->layout = 'cart';
        $searchModel = new CartSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionStep1(){
        $this->layout = 'cart';
        $model = new OrderAddress();

        if ($model->load(Yii::$app->request->post())) {
            // && $model->save()
            $addressData = Yii::$app->request->post('OrderAddress');

            // payumoney details
            $getPayuDetail['key'] = Yii::app()->params['merchantKey'];
            $getPayuDetail['txnid'] = '';//Common::txnId();
            $getPayuDetail['hash'] = '';
            $getPayuDetail['amount'] = $spackInfo[0]['price'];
            $getPayuDetail['productinfo'] = $spackInfo[0]['title'];
            $getPayuDetail['firstname'] = $userRegInfo->firstName;
            $getPayuDetail['email'] = $userInfo->email;
            $getPayuDetail['lastname'] = $userRegInfo->lastName;
            $getPayuDetail['address'] = $userRegInfo->address;
            $getPayuDetail['city'] = $userRegInfo->city;
            $getPayuDetail['state'] = $userRegInfo->state;
            $getPayuDetail['country'] = $userRegInfo->country;
            $getPayuDetail['zipcode'] = $userRegInfo->zipcode;
            $getPayuDetail['phone'] = $userRegInfo->mobile;

            $getPayuDetail['surl'] = Yii::app()->getBaseUrl(true) . '/users/order/paymentSuccess';
            $getPayuDetail['furl'] = Yii::app()->getBaseUrl(true) . '/users/order/paymentError'; //Yii::app()->request->urlReferrer;
            $getPayuDetail['curl'] = Yii::app()->getBaseUrl(true);
            // $getPayuDetail['udf1']               = 'test';


            $hash = '';
            /*$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
            $hashVarsSeq = explode('|', $hashSequence);
            $hashString = '';
            foreach ($hashVarsSeq as $hashVar) {
                $hashString .= isset($getPayuDetail[$hashVar]) ? $getPayuDetail[$hashVar] : '';
                $hashString .= '|';
            }
            $hashString .= Yii::app()->params['salt'];*/
            $getPayuDetail['hash'] = '';//strtolower(hash('sha512', $hashString));
            $getPayuDetail['action'] = (Yii::app()->config->getParams('doPayment') == 'No') ? '' : ((YII_DEBUG) ? Yii::app()->params['testPayUBaseUrl'] . '/_payment' : Yii::app()->params['payUBaseUrl'] . '/_payment');
            

            return $this->render('review', [
                'addressData' => $addressData,
            ]);
            //return $this->redirect(['review', ['addressData' => $addressData]]);
        }

        return $this->render('step1OrderAddress', [
            'model' => $model,
        ]);
        //return $this->render('step1');
    }
    
    public function actionReview(){
        $this->layout = 'cart';
        return $this->render('review');
    }
    
    public function actionPaymentSuccess(){
        $this->layout = 'cart';
        return $this->render('paymentSuccess');
    }

    /**
     * Displays a single Cart model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Cart model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Cart();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Cart model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Cart model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Cart model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cart the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cart::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
