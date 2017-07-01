<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\helpers\Url;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\User;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    //'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            /*'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],*/
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
             
            Yii::$app->Common->redirect(Url::toRoute(['profile-dashboard']));
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
        return $this->render('login');
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        Yii::$app->getSession()->setFlash('msg', '<div class="alert alert-success">' . Yii::t("app", "Logged out Successfully") . '</div>');
        Yii::$app->Common->redirect(Url::toRoute(['login']));
    }
    /*profile update.
    *
    */
    public function actionProfileDashboard(){
        $user = User::findOne(['id' => Yii::$app->user->getId()]);

        $this->layout = 'profile_page';
        return $this->render('profile/profile_dashboard',['user'=>$user]);

    }
    /*profile update.
    *
    */
    public function actionProfileUpdate(){
        $this->layout = 'profile_page';
        $usermodel = User::findOne(['id' => Yii::$app->user->getId()]);

        $oldImage = $usermodel->profile_image;
         if($usermodel->load(Yii::$app->request->post())) {
            $postData = Yii::$app->request->post();
            $dateTime = Yii::$app->Common->mysqlDateTime();
            $usermodel->updated_at = $dateTime;                 
            $existingImage = $postData['User']['profile_image'];
            if(Yii::$app->Common->commonUpload($usermodel,Yii::$app->params['PROFILE_IMAGE_UPLOAD_PATH'],'profile_image')){
                Yii::$app->Common->unlinkExistedFile(Yii::$app->params['PROFILE_IMAGE_UPLOAD_PATH'], $oldImage);
                $image = $usermodel->profile_image;
               
            }else{
                $image = ($existingImage) ? $existingImage  : ''; // get file extension
            }
            $usermodel->profile_image = $image;

          if($usermodel->save()){
             Yii::$app->getSession()->setFlash('msg', '<div class="alert alert-success">' . Yii::t("app", "Details updated Successfully") . '</div>');   
             Yii::$app->Common->redirect(Url::toRoute(['profile-update']));
           }
        } 
        return $this->render('profile/profile_update',['usermodel'=>$usermodel]);

    }
    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->signup()) {
                    Yii::$app->getSession()->setFlash('msg', '<div class="alert alert-success">' . Yii::t("app", "Registered Successfully") . '</div>');
                  return $this->redirect(['site/signup']);   

                /*if (Yii::$app->getUser()->login($user)) {
                    //return $this->goHome();
                }*/
            }
        }
         return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
