<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Forgotpassword;
use frontend\models\ForgotpasswordSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\User;
use yii\helpers\Url;

/**
 * ForgotpasswordController implements the CRUD actions for Forgotpassword model.
 */
class ForgotpasswordController extends Controller
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
     * Creates a new Forgotpassword model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionIndex()
    { 
        $model = new Forgotpassword();
        $model->scenario = 'createForgorPassword';
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
                $unsetForgotPwdURL = $baseURL.'update/'.$model->password_key;
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
        /*$searchModel = new ForgotpasswordSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);*/
    }
    
    /**
     * Creates a new Forgotpassword model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Forgotpassword();

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
     * Displays a single Forgotpassword model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView()
    {
        return $this->render('view');
    }

    public function actionTest($id)
    {
        echo 'Hello World';
        exit;
    }

    /**
     * Updates an existing Forgotpassword model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = Forgotpassword::findOne(['password_key'=>$id, 'status'=>'Active']);
        $model->scenario = 'updateForgorPassword';
        if($model){
            if ($model->load(Yii::$app->request->post())) {
                $model->status = 'Completed'; 
                if($model->save()){
                    
                    $newPassword = md5($model->newPassword);
                    $userModal = User::findOne(['id'=>$model->user_id]);
                    $userModal->password = $newPassword;
                    $passwordupdateResult = $userModal->save();
                    if($passwordupdateResult){
                        Yii::$app->session->setFlash('success', "Your password has been updated successfully");
                        return $this->redirect('/');
                    }else{
                        Yii::$app->session->setFlash('error', "Something went wrong. Please click on forgot password to update your password");
                        return $this->redirect('/login');
                    }
                    
                }else{ print_r($model->errors); echo 'dsf'; exit;
                    Yii::$app->session->setFlash('error', "Something went wrong. Please click on forgot password to update your password");
                        return $this->redirect('/login');
                }
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }else{
            Yii::$app->session->setFlash('error', "Session Key Expired. Please Login");
            return $this->redirect('/login');
        }
        
    }

    /**
     * Deletes an existing Forgotpassword model.
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
     * Finds the Forgotpassword model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Forgotpassword the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Forgotpassword::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
