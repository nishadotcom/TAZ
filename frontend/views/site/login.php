<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
              <div class="panel panel-default">
                <div class="panel-heading"><h3>log in</h3></div>
                <div class="panel-body">
                  <form action="" method="POST" role="form">
                    <div class="form-group">
                      <label for="">Enter Email</label>
                      <input type="email" class="form-control" id="">
                    </div>
                    <div class="form-group">
                      <label for="">Password</label>
                      <input type="password" class="form-control" id="">
                    </div>
                    <!--<div class="checkbox">
                      <label>
                        <input type="checkbox"> Remember Me
                      </label>
                    </div>-->
                    <button type="submit" class="btn btn-primary btn-block">log in</button>
                    <button type="submit" class="btn btn-default pull-left"><i class="fa fa-facebook" aria-hidden="true"></i><span>log in with facebook</span></button>
                    <button type="submit" class="btn btn-default pull-right"><i class="fa fa-google-plus" aria-hidden="true"></i><span>log in with google plus</span></button>
                    <button type="button" class="btn btn-link btn-block">Forgot Password?</button>
                  </form>
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
