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
use frontend\models\UserDetail;
use frontend\models\UserAddress;
use kartik\social\Module;
use frontend\models\Order;

/**
 * Site controller
 */
class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
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
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
                /* 'captcha' => [
                  'class' => 'yii\captcha\CaptchaAction',
                  'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                  ], */
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex() {
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin() {
        if (!Yii::$app->user->isGuest) { //echo '<pre>'; echo Yii::$app->session->get('user.firstname'); print_r(Yii::$app->user->identity->user_type); exit;
            return $this->goHome();
        }

        $model = new LoginForm();
        $model->scenario = 'site_login';
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            //print_r($model->);
            Yii::$app->session->set('user.profileImage', 'dddd.jpg');
            // Update Last Login Date
            $userModel = User::updateLastLogin(Yii::$app->user->id);
            //echo '<pre>'; print_r(Yii::$app->user->identity->user_type); exit;

            Yii::$app->session->setFlash('success', "Logged in successfully");
            // Dashboard Redirection
            if(Yii::$app->user->identity->user_type == 'Seller'){
                return $this->redirect(['profile-dashboard']);
            }else{
                return $this->goHome();
            }
            //return $this->redirect(['profile-dashboard']);
            //Yii::$app->Common->redirect(Url::toRoute(['profile-dashboard']));
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
    public function actionLogout() {
        $result = Yii::$app->Common->sendMail('nisha.com126@gmail.com', 'Hello World From Dev.Talozo', '<b>Hello World</b>');
        echo '<pre>'; print_r($result);
        exit;
        Yii::$app->user->logout();
        //Yii::$app->getSession()->setFlash('msg', '<div class="alert alert-success">' . Yii::t("app", "Logged out Successfully") . '</div>');
        //Yii::$app->session->setFlash('success', Yii::t("app", "Logged out successfully"));
        Yii::$app->session->setFlash('success', "Logged out successfully");
        return $this->goHome();
        //return $this->redirect(['/']);
        //Yii::$app->Common->redirect(Url::toRoute(['login']));
    }

    /* profile update.
     *
     */

    public function actionProfileDashboard() {
        $unPaidOrders = [];
        $user = User::findOne(['id' => Yii::$app->user->getId()]);
        if(!Yii::$app->user->isGuest && Yii::$app->user->identity->user_type == Yii::$app->params['ROLE_BUYER']){
            $unPaidOrders = Order::find()->where(['payment_status'=>'USER CANCELLED', 'order_status'=>'USER CANCELLED'])->orderBy(['id' => SORT_DESC])->all();
        }

        $this->layout = 'profile_page';
        return $this->render('profile/profile_dashboard', ['user' => $user, 'unPaidOrders'=>$unPaidOrders]);
    }

    /* profile update.
     *
     */

    public function actionProfileUpdate() {
        $this->layout = 'profile_page';
        $usermodel = User::findOne(['id' => Yii::$app->user->getId()]);
        $UserDetail = UserDetail::findOne(['user_id' => Yii::$app->user->getId()]);
        if (!empty($UserDetail)) {
            $UserDetailModel = UserDetail::findOne(['user_id' => Yii::$app->user->getId()]);
        } else {
            $UserDetailModel = new UserDetail();
        }
        $oldImage = $usermodel->profile_image;
        $usermodel->scenario = 'update';
        if ($usermodel->load(Yii::$app->request->post()) || $UserDetailModel->load(Yii::$app->request->post())) {

            $postData = Yii::$app->request->post();
            $dateTime = Yii::$app->Common->mysqlDateTime();
            $usermodel->updated_at = $dateTime;
            $existingImage = $postData['User']['existing_profile_image'];
            if (Yii::$app->Common->commonUpload($usermodel, Yii::$app->params['PROFILE_IMAGE_UPLOAD_PATH'], 'profile_image')) {
                Yii::$app->Common->unlinkExistedFile(Yii::$app->params['PROFILE_IMAGE_UPLOAD_PATH'], $oldImage);
                $image = $usermodel->profile_image;
            } else {
                $image = ($existingImage) ? $existingImage : ''; // get file extension
            }
            $usermodel->profile_image = $image;

            $UserDetailModel->my_interest = $postData['my_interest'];
            $UserDetailModel->long_about_me = $postData['long_about_me'];
            $UserDetailModel->user_id = Yii::$app->user->getId();
            if ($usermodel->save() && $UserDetailModel->save()) {
                Yii::$app->getSession()->setFlash('msg', '<div class="alert alert-success">' . Yii::t("app", "Details updated Successfully") . '</div>');
                Yii::$app->Common->redirect(Url::toRoute(['profile-update']));
            } else {
                return $this->render('profile/profile_update', ['usermodel' => $usermodel, 'UserDetailModel' => $UserDetailModel]);
            }
        }
        return $this->render('profile/profile_update', ['usermodel' => $usermodel, 'UserDetailModel' => $UserDetailModel]);
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact() {
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
    public function actionAbout() {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup() {
        $model = new SignupForm();
        $model->scenario = 'WebSignup';
        if ($model->load(Yii::$app->request->post())) {
            if ($model->signup()) {
                // INSERT User address
                $userData = User::findByEmail($model->email);
                UserAddress::insertAddressOnSignup($userData->id);
                //Yii::$app->getSession()->setFlash('msg', Yii::t("app", "Registered Successfully"));
                //return $this->redirect(['site/signup']);
                
                $loginModel = new LoginForm();
                $loginModel->scenario = 'site_login';
                $loginModel->email = $model->email;
                $loginModel->password = $model->password;
                if ($loginModel->login()) {
                    $userModel = User::updateLastLogin(Yii::$app->user->id);
                    Yii::$app->session->setFlash('success', "Welcome to TALOZO");
                    return $this->goHome();
                }else{
                    Yii::$app->session->setFlash('error', "Please login to continue shopping");
                    return $this->redirect(['login']);
                }
            }
        }
        return $this->render('signup', [
                    'model' => $model,
        ]);
    }
    
    /**
     * Load Become a Seller Page
     * **/
    public function actionBecomeSeller() {
        return $this->render('becomeSeller');
    }
    
    /**
     * Become a Seller
     * **/
    public function actionBecomeSellerSignup() {
        $model = new SignupForm();
        $model->scenario = 'WebSignup';
        if ($model->load(Yii::$app->request->post())) {
            $model->user_type = 'Seller';
            if ($model->signup()) {
                // INSERT User address
                $userData = User::findByEmail($model->email);
                UserAddress::insertAddressOnSignup($userData->id);
                //Yii::$app->getSession()->setFlash('msg', Yii::t("app", "Registered Successfully"));
                //return $this->redirect(['site/signup']);
                
                $loginModel = new LoginForm();
                $loginModel->scenario = 'site_login';
                $loginModel->email = $model->email;
                $loginModel->password = $model->password;
                if ($loginModel->login()) {
                    $userModel = User::updateLastLogin(Yii::$app->user->id);
                    Yii::$app->session->setFlash('success', "Welcome to TALOZO");
                    return $this->redirect(['profile-dashboard']);
                }else{
                    Yii::$app->session->setFlash('error', "Please login to continue shopping");
                    return $this->redirect(['login']);
                }
            }
        }
        return $this->render('becomeSellerSignup', [
                    'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset() {
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
    public function actionResetPassword($token) {
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

    public function actionValidateFb() {
        $social = Yii::$app->getModule('social');
        $fb = $social->getFb(); // gets facebook object based on module settings
        try {
            $helper = $fb->getRedirectLoginHelper();
            $accessToken = $helper->getAccessToken();
        } catch (\Facebook\Exceptions\FacebookSDKException $e) {
            // There was an error communicating with Graph
            return $this->render('validate-fb', [
                        'out' => '<div class="alert alert-danger">' . $e->getMessage() . '</div>'
            ]);
        }
        if (isset($accessToken)) { // you got a valid facebook authorization token
            $response = $fb->get('/me?fields=id,name,email,first_name,last_name,picture', $accessToken);
            $FBUserData = $response->getGraphUser();
            // User Exists 
            $userData = User::findByEmail($FBUserData['email']);
            if ($userData) {
                // Login Process
                $this->fblogin($FBUserData['email']);
                return $this->redirect(['profile-dashboard']);
            } else {
                // SIGNUP
                $model = new SignupForm();
                $model->scenario = 'FBSignup';
                $model->email = $FBUserData['email'];
                $model->firstname = $FBUserData['first_name'];
                $model->lastname = $FBUserData['last_name'];
                $profile_image = $FBUserData['picture']['url'];
                if ($model->FBsignup()) {
                    // INSERT User address
                    $userData = User::findByEmail($FBUserData['email']);
                    UserAddress::insertAddressOnSignup($userData->id);
                    $this->fblogin($FBUserData['email']);
                } else {
                    print_r($model->getErrors());
                    exit;
                    return $this->redirect(['login']);
                }
            }
            /* echo '<pre>'; print_r($FBUserData); echo $FBUserData['email']; exit;
              $model = new LoginForm();
              $model->scenario = 'FBLogin';
              $model->email = $FBUserData['email'];
              if($model->login()){

              } */

            /* return $this->render('validate-fb', [
              'out' => '<legend>Facebook User Details</legend>' . '<pre>' . print_r($response->getGraphUser(), true) . '</pre>'
              ]); */
        } elseif ($helper->getError()) {
            // the user denied the request
            // You could log this data . . .
            return $this->render('validate-fb', [
                        'out' => '<legend>Validation Log</legend><pre>' .
                        '<b>Error:</b>' . print_r($helper->getError(), true) .
                        '<b>Error Code:</b>' . print_r($helper->getErrorCode(), true) .
                        '<b>Error Reason:</b>' . print_r($helper->getErrorReason(), true) .
                        '<b>Error Description:</b>' . print_r($helper->getErrorDescription(), true) .
                        '</pre>'
            ]);
        }
        return $this->render('validate-fb', [
                    'out' => '<div class="alert alert-warning"><h4>Oops! Nothing much to process here.</h4></div>'
        ]);
        /**
          $model = new LoginForm();
          $model->scenario = 'site_login';
          if ($model->load(Yii::$app->request->post()) && $model->login()) {
          //print_r($model->);
          Yii::$app->session->set('user.profileImage','dddd.jpg');
          // Update Last Login Date
          $userModel = User::updateLastLogin(Yii::$app->user->id);
          echo '<pre>'; print_r(Yii::$app->user->identity->user_type); exit;

          return $this->redirect(['profile-dashboard']);
          //Yii::$app->Common->redirect(Url::toRoute(['profile-dashboard']));
          } else {
          return $this->render('login', [
          'model' => $model,
          ]);
          }
          return $this->render('login');
         * */
    }

    private function Fblogin($email) {
        $model = new LoginForm();
        $model->scenario = 'FBLogin';
        $model->email = $email;
        if ($model->login()) {
            // Update Last Login Date
            User::updateLastLogin(Yii::$app->user->id);
            return $this->redirect(['profile-dashboard']);
        } else {
            echo 'IN';
            exit;
            return $this->redirect(['login']);
        }
    }

}
