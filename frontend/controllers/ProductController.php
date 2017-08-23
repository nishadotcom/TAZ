<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Product;
use frontend\models\ProductImage;
use frontend\models\ProductSearch; 
use frontend\models\ProductAddress; 
use backend\models\Category;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\Common;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
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
        $this->layout = 'profile_page';
        return parent::beforeAction($action);
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        //$this->layout = 'profile_page';
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
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
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model 		= new Product();
		$imageModel = new ProductImage();
        $addressModel = new ProductAddress();

        //if ($model->load(Yii::$app->request->post()) && $model->save()) {
		if ($model->load(Yii::$app->request->post()) && $addressModel->load(Yii::$app->request->post()) && $imageModel->load(Yii::$app->request->post())) { 
        //  && $imageModel->load(Yii::$app->request->post())
			/*echo '<pre>';
			print_r(Yii::$app->request->post());
			echo Yii::$app->user->id;
			exit;*/

			$postData 	= Yii::$app->request->post();
			$model->product_code 		= Common::generateRandomStr('PRD');
            $model->product_seo         = 'test-seo';
			$model->product_owner_id	= Yii::$app->user->id;
			$model->product_sale_price	= ($postData['Product']['product_price']*20)/100+$postData['Product']['product_price'];
			$model->created_on 			= Common::mysqlDateTime();
			if($model->save()){
                // add product address
                $addressModel->product_id = $model->id;
                $addressSave            = $addressModel->save();
                // add image
                $imageModel->product_id = $model->id;
                // Upload process
                $prd_img_path           = Yii::$app->params['PATH_PRODUCT_IMAGE'].$model->product_code.'/';
                FileHelper::createDirectory($prd_img_path, $mode = 0777, $recursive = true);
                $imageModel->cover_photo     = UploadedFile::getInstance($imageModel, 'cover_photo');
                $imageModel->cover_photo->saveAs($prd_img_path.$imageModel->cover_photo->baseName.'.'.$imageModel->cover_photo->extension);
                //$imageModel->cover_photo = 'adasd.jppg';
                $imageSave              = $imageModel->save();

                if($imageModel->getErrors()){
                    print_r($imageModel->getErrors());
                    exit;
                }

				//return $this->redirect(['view', 'id' => $model->id]);
                return $this->redirect(['index']);
			}else{
				return $this->render('create', [
					'model' => $model,
					'imageModel' => $imageModel,
                    'addressModel' => $addressModel,
                    'errors' => $model->getErrors(),
                    'aerrors' => $addressModel->getErrors(),
                    'ierrors' => $imageModel->getErrors(),
				]);
			}
        } else {
            return $this->render('create', [
                'model' => $model,
				'imageModel' => $imageModel,
                'addressModel' => $addressModel,
                'errors' => $model->getErrors(),
                'aerrors' => $addressModel->getErrors(),
                'ierrors' => $imageModel->getErrors(),
            ]);
        }
    }

    /**
     * Updates an existing Product model.
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
     * Deletes an existing Product model.
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
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionTest(){
        $prd_img_path           = Yii::$app->params['PATH_PRODUCT_IMAGE'].'PRD2232';
            FileHelper::createDirectory($prd_img_path);
            exit;
    }
}
