<?php

namespace backend\controllers;

use Yii;
use backend\models\Category;
use backend\models\CategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends Controller
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
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Category model.
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
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Category();

        if($model->load(Yii::$app->request->post())) {
            $postData   = Yii::$app->request->post();
            $model->category_seo = Yii::$app->Common->getSeo($postData['Category']['category_name']);
            $model->created_on = Yii::$app->Common->mysqlDateTime();
            $uploadImage = Yii::$app->Common->commonUpload($model,Yii::$app->params['CATEGORY_IMAGE_UPLOAD_PATH'],'category_image');
             if($model->save()){
                Yii::$app->getSession()->setFlash('msg',Yii::t("app","General Add Success"));
                Yii::$app->Common->redirect(Url::toRoute('index'));
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $oldImage = $model->category_image;
        if ($model->load(Yii::$app->request->post())) {
            $postData = Yii::$app->request->post();
            $model->category_seo = Yii::$app->Common->getSeo($postData['Category']['category_name']);
            $dateTime = Yii::$app->Common->mysqlDateTime();
            $model->updated_on = $dateTime;
            $existingImage = $postData['Category']['existing_category_image'];
            if(Yii::$app->Common->commonUpload($model,Yii::$app->params['CATEGORY_IMAGE_UPLOAD_PATH'], 'category_image')){
                Yii::$app->Common->unlinkExistedFile(Yii::$app->params['CATEGORY_IMAGE_UPLOAD_PATH'], $oldImage);
                $file = $model->image;

            }else{
                $file = ($existingImage) ? $existingImage  : ''; // get file extension
            }
            $model->category_image = $file;
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
     * Deletes an existing Category model.
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
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
