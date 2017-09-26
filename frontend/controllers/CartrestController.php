<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Cart;
use frontend\models\CartSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use frontend\models\Product;
use frontend\models\ProductImage;
use frontend\models\ProductAddress; 
use backend\models\Category;
use frontend\models\Shop; 

use yii\rest\ActiveController;
use yii\helpers\Url;
use yii\web\Response;
use app\components\Common;
use yii\helpers\Json;

/**
 * CartController implements the CRUD actions for Cart model.
 */
class CartrestController extends ActiveController
{
    public $modelClass = 'frontend\models\Cart';
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];

    /**
     * @inheritdoc
     */
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
     * Lists all Cart models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CartSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cart model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id=1)
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
        /*$postData   = Yii::$app->getRequest()->getRawBody();
        $postData   = json_decode($postData);
        
        //if(Yii::$app->request->post()) {
        //$post = Yii::$app->request->post();
        $userName = $postData->username;
        $password = $postData->password;
        echo 'IN'; exit;
        echo Yii::$app->post('productId'); exit;*/
        
        //$model = new Cart();
        echo 'IN'; exit;
        if (Yii::$app->request->post()) { 
            /*$productData    = Shop::getProductById(1);
            $model->cart_user_id    = 1;
            $model->cart_product_category_name    = $productData->productCategory->category_name;
            $model->cart_product_id    = $productData->product_id;
            $model->cart_product_code    = $productData->product_code;
            $model->cart_product_name    = $productData->product_name;
            $model->cart_product_seo    = $productData->product_seo;
            $model->cart_product_owner_id    = $productData->product_owner_id;
            $model->cart_product_price    = $productData->product_sale_price;
            $model->cart_product_material    = $productData->product_material;
            $model->cart_product_color    = $productData->product_color;
            $model->cart_product_dimension_type    = $productData->product_dimension_type;
            $model->cart_product_height    = $productData->product_height;
            $model->cart_product_length    = $productData->product_length;
            $model->cart_product_breadth    = $productData->product_breadth;
            $model->cart_product_weight    = $productData->product_weight;
            $model->cart_product_short_description    = $productData->product_short_description;
            $model->cart_product_long_description    = $productData->product_long_description;
            $model->cart_product_discount    = $productData->product_discount_status;
            $model->cart_product_quantity    = 1;//$productData->product_name;
            $model->product_available_status    = 'In-Stock';//$productData->product_name;
            $model->cart_added_on    = Yii::$app->Common->mysqlDateTime();
            if($model->save()){
                return 1;
            }*/
            //return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return 2;
            /*return $this->render('create', [
                'model' => $model,
            ]);*/
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
