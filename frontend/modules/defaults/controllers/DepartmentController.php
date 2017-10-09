<?php

namespace app\modules\defaults\controllers;

use Yii;
use app\modules\defaults\models\Department;
use app\modules\defaults\models\SubDepartment;
use app\models\Defect;
use app\modules\defaults\models\DepartmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use app\models\ProjectDepartment;
/**
 * DepartmentController implements the CRUD actions for Department model.
 */
class DepartmentController extends Controller {

    public function behaviors() {
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
     * */
    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    /**
     * Lists all Department models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new DepartmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // validate if there is a editable input saved via AJAX
        if (Yii::$app->request->post('hasEditable')) {
            // instantiate your book model for saving
            $id = Yii::$app->request->post('editableKey');
            $model = $this->findModel($id);

            header('Content-Type: application/json; charset=utf-8');
            // store a default json response as desired by editable
            $out = Json::encode(['output' => '', 'message' => '']);

            // fetch the first entry in posted data (there should 
            // only be one entry anyway in this array for an 
            // editable submission)
            // - $posted is the posted data for Book without any indexes
            // - $post is the converted array for single model validation
            $post = [];
            $posted = current($_POST['Department']);
            $post['Department'] = $posted;
            // load model like any single model validation
            if ($model->load($post)) {
                // can save model or do something before saving model
                $model->code = $post['Department']['code'];
                $model->save();

                // custom output to return to be displayed as the editable grid cell
                // data. Normally this is empty - whereby whatever value is edited by 
                // in the input by user is updated automatically.
                if (isset($posted['code'])) {
                    $output = Yii::$app->formatter->asNtext($model->code);
                }

                $out = Json::encode(['output' => $output, 'message' => '']);
            }

            // return ajax json encoded response and exit
            echo $out;
            return;
        }

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Department model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $this->layout = '@app/../themes/dt/layouts/formTemplate'; // To get form layout
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Department model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionAdd() {
        $this->layout = '@app/../themes/dt/layouts/formTemplate'; // To get form layout
        $model = new Department();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('msg', '<div class="alert alert-success">' . Yii::t("app", "General Added Success") . '</div>');
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Department model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $this->layout = '@app/../themes/dt/layouts/formTemplate'; // To get form layout
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('msg', '<div class="alert alert-success">' . Yii::t("app", "General Update Success") . '</div>');
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Department model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $subCount = count(SubDepartment::find()->where('deptId=' . $id)->all());
        $defCount = count(ProjectDepartment::find()->where('deptId=' . $id)->all());
        if ($subCount > 0) {
            Yii::$app->getSession()->setFlash('msg', '<div class="alert alert-warning">' . Yii::t("app", "Delete the Department Associated with Sub Department") . '</div>');
            return $this->redirect(['index']);
        }
        if ($defCount > 0) {
            Yii::$app->getSession()->setFlash('msg', '<div class="alert alert-warning">' . Yii::t("app", "Delete the Department Associated with associated with Defect") . '</div>');
            return $this->redirect(['index']);
        }
        $this->findModel($id)->delete();
        Yii::$app->getSession()->setFlash('msg', '<div class="alert alert-danger">' . Yii::t("app", "General Delete Success") . '</div>');
        return $this->redirect(['index']);
    }

    /**
     * Deletes an existing Cms model
     * @return mixed
     */
    public function actionDelete_multiple() {
        $pk = Yii::$app->request->post('pk'); // Array or selected records primary keys
        // Preventing extra unnecessary query
        if (!$pk) {
            return;
        }
        return Department::deleteAll(['id' => $pk]);
    }

    /**
     * Finds the Department model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Department the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Department::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * To import csv data to department table
     * @return type
     */
    public function actionImport() {
        $this->layout = '@app/../themes/dt/layouts/formTemplate'; // To get form layout
        $model = new Department();
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
                Yii::$app->getSession()->setFlash('msg', '<div class="alert alert-success">' . Yii::t("app", "General Import Success") . '</div>');
                return $this->redirect(['index']);
                die;
            }
        }
        return $this->render('_import');
    }

}
