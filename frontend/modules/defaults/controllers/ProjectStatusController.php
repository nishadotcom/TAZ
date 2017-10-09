<?php

namespace app\modules\defaults\controllers;

use Yii;
use app\modules\defaults\models\ProjectStatus;
use app\models\Project;
use app\modules\defaults\models\ProjectStatusSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProjectStatusController implements the CRUD actions for ProjectStatus model.
 */
class ProjectStatusController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post', 'get'],
                ],
            ],
        ];
    }
	
	/**
	* To enanle CSRF Validation to delete the data
	**/
	
	public function beforeAction($action) {
		$this->enableCsrfValidation = false;
		return parent::beforeAction($action);
	}

    /**
     * Lists all ProjectStatus models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProjectStatusSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProjectStatus model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $this->layout = '@app/../themes/dt/layouts/formTemplate'; // To get form layout
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ProjectStatus model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionAdd()
    {
        $this->layout = '@app/../themes/dt/layouts/formTemplate'; // To get form layout
        $model = new ProjectStatus();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			Yii::$app->getSession()->setFlash('msg', '<div class="alert alert-success">'. Yii::t("app","General Added Success") .'</div>');
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ProjectStatus model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->layout = '@app/../themes/dt/layouts/formTemplate'; // To get form layout
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			Yii::$app->getSession()->setFlash('msg', '<div class="alert alert-success">'. Yii::t("app","General Update Success") .'</div>');
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ProjectStatus model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
		$proCount = count(Project::find()->where('statusId=' . $id)->all());
		if ($proCount > 0) {
            Yii::$app->getSession()->setFlash('msg', '<div class="alert alert-warning">'. Yii::t("app","Project Status associated with Projects") .'</div>');
            return $this->redirect(['index']);
        }
        $this->findModel($id)->delete();
		Yii::$app->getSession()->setFlash('msg', '<div class="alert alert-danger">'. Yii::t("app","General Delete Success") .'</div>');
        return $this->redirect(['index']);
    }

    /**
     * Finds the ProjectStatus model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProjectStatus the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProjectStatus::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    /**
     * To import csv data to project status table
     * @return type
     */
    public function actionImport() {        
        $this->layout = '@app/../themes/dt/layouts/formTemplate'; // To get form layout
        $model = new ProjectStatus();
        if ($_FILES) {
            if ($_FILES['fileName']['size'] > 0) {
                //get the csv file
                $file = $_FILES['fileName']['tmp_name'];
                $handle = fopen($file, "r");
                //loop through the csv file and insert into database
                if ($handle) {
                    $i = 0; // To leave the first line
                    while (($line = fgetcsv($handle, 1000, ",")) != FALSE) {                        
                        if ($i > 0) {                            
                            //$serialNum = Yii::$app->DefectHelper->getSerialNum();
                            $model::importCSV($line);
                        }
                        $i++;
                    }
                }

                fclose($handle);
                Yii::$app->getSession()->setFlash('msg', '<div class="alert alert-success">'. Yii::t("app","General Import Success") .'</div>');
                return $this->redirect(['index']);
                die;
            }
        }
        return $this->render('_import');
    } 
}
