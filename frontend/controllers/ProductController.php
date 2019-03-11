<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Product;
use frontend\models\ProductImage;
use frontend\models\ProductSearch; 
use frontend\models\ProductAddress; 
use frontend\models\OnSale; 
use backend\models\Category;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\Common;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;
use yii\db\Query;
use yii\db\QueryBuilder;
use yii\filters\AccessControl;
use common\components\AccessRule;
use common\models\User;

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
            'access' => [
                'class' => AccessControl::className(),
                // We will override the default rule config with the new AccessRule class
                'ruleConfig' => [
                    'class' => AccessRule::className(),
                ],
                'only' => ['index', 'create', 'view', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['index', 'create', 'view', 'update', 'delete'],
                        'allow' => true,
                        // Allow users, moderators and admins to create
                        'roles' => [
                            User::ROLE_SELLER
                        ],
                    ],
                    /*[
                        'actions' => ['delete'],
                        'allow' => true,
                        // Allow admins to delete
                        'roles' => [
                            User::ROLE_ADMIN
                        ],
                    ],*/
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
        $OnSaleModel      = new OnSale();
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //$dataProvider->pagination->pageSize=1;
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'OnSaleModel'=>$OnSaleModel
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

    public function actionPromote($id)
    {
        $model = new OnSale();

        if ($model->load(Yii::$app->request->post())) {
            $model->created_on          = Common::mysqlDateTime();
            if($model->save()){
                return $this->redirect(['index']);
            }
            
        }

        return $this->render('promote', [
            'model' => $model,
            'productId'=>$id
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
            $model->product_seo         = Yii::$app->Common->generateSeo($postData['Product']['product_name']);
			$model->product_owner_id	= Yii::$app->user->id;
			$model->product_sale_price	= ($postData['Product']['product_price']*22)/100+$postData['Product']['product_price'];
			$model->created_on 			= Common::mysqlDateTime();
			if($model->save()){
                // add product address
                $addressModel->product_id = $model->id;
                $addressSave            = $addressModel->save();
                // add image
                $imageModel->product_id = $model->id;
                $imageModel->cover_photo= UploadedFile::getInstance($imageModel, 'cover_photo');
				$prd_img_path           = Yii::$app->params['PATH_UPLOAD_PRODUCT_IMAGE'].$model->product_code.'/';
                FileHelper::createDirectory($prd_img_path, $mode = 0777, $recursive = true);
                $randomName = date('YmdHis');
				$imageName 	= $randomName.'.'.$imageModel->cover_photo->extension;
				$imageModel->cover_photo->saveAs($prd_img_path.$imageName);
				//$imageModel->cover_photo = 'dfsdfd';
                //$imageSave              = $imageModel->save(false);
                if($imageModel->crop_image){
                    $cropImageString = $imageModel->crop_image;
                    $cropImageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $cropImageString));
                    $result = file_put_contents($prd_img_path.'CROP_'.$randomName.'.png', $cropImageData);
                    $cropImage = 'CROP_'.$randomName.'.png';
                }else{
                    $cropImage = '';
                }

				$connection = Yii::$app->getDb();
				$insert_query 	= 'INSERT INTO taz_product_image(product_id, type, file_name, cover_photo, crop_image) VALUES('.$model->id.', "", "", "'.$imageName.'", "'.$cropImage.'")';
				$command = $connection->createCommand($insert_query)->execute();
				// Upload process
                

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
