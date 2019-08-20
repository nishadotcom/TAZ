<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\social\Module;
use yii\helpers\Url;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
$social = Yii::$app->getModule('social');
$callback = Url::toRoute(['/site/validate-fb'], true); // or any absolute url you want to redirect
?>

                
<div class="row">

            <div class="col-md-5 col-md-offset-6 col-sm-8 col-sm-offset-2 col-xs-12">
              <div class="panel panel-default">
                <!--<div class="panel-heading"><h3>log in</h3></div>-->
                <div class="panel-body">
				

			
						<div class="login-bg-in">		
			<h2 class="text-center">Login</h2>
			
			</div>
                  <?php // Yii::$app->session->getFlash('msg'); ?>
                  <?php $form = ActiveForm::begin(['id' => 'signup-form']); ?>
				 
				  
                    <div class="form-group">
                     <!-- <label for="">Email</label>-->
                      <?= $form->field($model, 'email')->textInput(array('maxlength' => 30, 'placeholder' => 'Email','class'=>'form-control'))->label(false) ?>
                    </div>
                    <div class="form-group">
					
					
                     <!-- <label for="">Password</label> -->
                      <?= $form->field($model, 'password')->passwordInput(array('maxlength' => 30, 'placeholder' => 'Password','class'=>'form-control'))->label(false) ?>
                    </div>
     
                    <button type="submit" class="btn btn-primary btn-block sub-primary-btn">log in</button>
					<br />	<br />
                    <?php echo $social->getFbLoginLink($callback, ['class'=>'btn btn-default pull-left btn-fb']); ?>
                    <!--<button type="submit" class="btn btn-default pull-left"><i class="fa fa-facebook" aria-hidden="true"></i><span>log in with facebook</span></button>-->
                     <?php echo kartik\social\GooglePlugin::widget([
    'type'=>kartik\social\GooglePlugin::SIGNIN, 
    'tag'=>'button', 
    'signinOptions'=>['id'=>'signinButton'],
    'settings' => [
        //'callback'=>'signinCallback',
        'cookiepolicy' => 'single_host_origin',
        'requestvisibleactions' => 'http://schemas.google.com/AddActivity',
        'scope'=>'https://www.googleapis.com/auth/plus.login'
    ]
]); ?>
                    <button type="submit" class="btn btn-default pull-right">
                    	<i class="fa fa-google-plus" aria-hidden="true"></i>
                    	<span style="margin-left: 0;margin-right: 0;">Login with google plus</span>
                    </button>
                    <!--<button type="button" class="btn btn-link btn-block">Don't You Have an Account?</button>-->
	                <!--<button type="button" class="btn btn-link btn-block">Forgot Password?</button>-->
					
                    <a class="btn btn-link btn-block" style="font-size:12px; margin-top:10px;" href="<?= Yii::$app->homeUrl . 'forgotpassword'; ?>">Forgot Password?</a>
                 <?php ActiveForm::end(); ?>
                </div>
              </div>
            </div>
          </div>
		 
		  

<!-- OLD CODE -->
<?php /* ?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<?php */ ?>
