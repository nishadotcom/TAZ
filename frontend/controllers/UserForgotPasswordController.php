<?php

namespace frontend\controllers;

use Yii;
use frontend\models\UserForgotPassword;
use frontend\models\UserForgotPasswordSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\User;
use yii\helpers\Url;

/**
 * UserForgotPasswordController implements the CRUD actions for UserForgotPassword model.
 */
class UserForgotPasswordController extends Controller
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
     * Creates a new UserForgotPassword model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionIndex()
    { 
        $model = new UserForgotPassword();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) { 
            $userModel = User::findByEmail($model->userEmail);
            $model->user_id = $userModel->id;
            $model->password_key = Yii::$app->getSecurity()->generateRandomString(6);
            $model->expire_at = Yii::$app->Common->mysqlDateTime();
            $model->created_on = Yii::$app->Common->mysqlDateTime();
            //echo '<pre>'; print_r(Yii::$app->Common->mysqlDateTime()); exit;
            if($model->save()){
                $baseURL = Url::base('http');
                $forgotPwdURL = $baseURL;
                $unsetForgotPwdURL = $baseURL;
                $user = $userModel->firstname;
                $mailContent = $this->renderPartial('forgotPwdMail', ['user'=>$user,'forgotPwdURL'=>$forgotPwdURL, 'unsetForgotPwdURL'=>$unsetForgotPwdURL]); 
                $to = $model->userEmail;
                $subject = 'Talozo Password Reset';
                Yii::$app->Common->sendMail($to, $subject, $mailContent);
                
                return $this->render('view');
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
        /*$searchModel = new UserForgotPasswordSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);*/
    }
    
    /**
     * Creates a new UserForgotPassword model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserForgotPassword();

        if ($model->load(Yii::$app->request->post())) {
            $userModel = User::findByEmail($model->userEmail);
            $model->user_id = $userModel->id;
            $model->password_key = Yii::$app->getSecurity()->generateRandomString(6);
            $model->expire_at = Yii::$app->Common->mysqlDateTime();
            $model->created_on = Yii::$app->Common->mysqlDateTime();
            //echo '<pre>'; print_r(Yii::$app->Common->mysqlDateTime()); exit;
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                echo '<pre>'; 
                echo $model->password_key;
                print_r($model->getErrors());
                exit;
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    
     /**
     * Displays a single UserForgotPassword model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView()
    {
        return $this->render('view');
    }

    /**
     * Updates an existing UserForgotPassword model.
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
     * Deletes an existing UserForgotPassword model.
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
     * Finds the UserForgotPassword model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserForgotPassword the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserForgotPassword::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
