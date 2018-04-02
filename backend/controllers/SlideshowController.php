<?php

namespace backend\controllers;

use Yii;
use backend\models\Slideshow;
use backend\models\SlideshowSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\filters\AccessControl;



/**
 * SlideshowController implements the CRUD actions for Slideshow model.
 */
class SlideshowController extends Controller
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
             'rules' => [
                 [
                     'allow' => true,
                     'roles' => ['@'],
                 ],

                 // ...
             ],
             'denyCallback' => function () {
         return Yii::$app->response->redirect(['site/login']);
        },
         ],
         ];
     }

    /**
     * Lists all Slideshow models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SlideshowSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
    }

    /**
     * Displays a single Slideshow model.
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
     * Creates a new Slideshow model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Slideshow();
        $model->scenario = 'create';
        if($model->load(Yii::$app->request->post())) {
            $model->created_on = Yii::$app->Common->mysqlDateTime();
            $uploadImage = Yii::$app->Common->commonUpload($model,Yii::$app->params['SLIDER_IMAGE_UPLOAD_PATH'],'image_name');
             if($model->save()){
                Yii::$app->getSession()->setFlash('msg',Yii::t("app","General Add Success"));
                Yii::$app->Common->redirect(Url::toRoute('index'));
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);    }

    /**
     * Updates an existing Slideshow model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'update';
        $oldImage = $model->image_name;
        if ($model->load(Yii::$app->request->post())) {
            $postData = Yii::$app->request->post();
            $dateTime = Yii::$app->Common->mysqlDateTime();
            $model->created_on  = $dateTime;
            $existingImage = $postData['Slideshow']['existingImage'];
            if(Yii::$app->Common->commonUpload($model,Yii::$app->params['SLIDER_IMAGE_UPLOAD_PATH'], 'image_name')){
                Yii::$app->Common->unlinkExistedFile(Yii::$app->params['SLIDER_IMAGE_UPLOAD_PATH'], $oldImage);
                $file = $model->image;

            }else{
                $file = ($existingImage) ? $existingImage  : ''; // get file extension
            }
            $model->image_name = $file;
            if($model->save()){
                Yii::$app->getSession()->setFlash('msg',Yii::t("app","General Update Success"));
                Yii::$app->Common->redirect(Url::toRoute('index'));
            }
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Slideshow model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
      $model = $this->findModel($id);

        $oldImage = $model->image_name;
        Yii::$app->Common->unlinkExistedFile(Yii::$app->params['SLIDER_IMAGE_UPLOAD_PATH'], $oldImage);
        $this->findModel($id)->delete();
        Yii::$app->getSession()->setFlash('msg', Yii::t("app", "General Delete Success"));
        return $this->redirect(['index']);
    }

    /**
     * Finds the Slideshow model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Slideshow the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Slideshow::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
