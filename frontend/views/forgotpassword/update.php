<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserForgotPassword */

$this->title = 'Update Password';
$this->params['breadcrumbs'][] = ['label' => 'User Forgot Passwords', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-forgot-password-update">

    <?php /* ?><h1><?= Html::encode($this->title) ?></h1><?php */ ?>

    <div class="row">
	    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
	      <div class="panel panel-default">
	        <!--<div class="panel-heading"><h3>Lost Password</h3></div>-->
	        <div class="panel-body">
	          <!--<form action="" method="POST" role="form">-->
	          <?php $form = ActiveForm::begin(); ?>

	            <div class="form-group">
	              <label for="">New Password</label>
	              <!--<input type="email" class="form-control" id="">-->
	              <?= $form->field($model, 'newPassword')->passwordInput()->label(FALSE) ?>
	            </div>
	            <div class="form-group">
	              <label for="">Retype Password</label>
	              <!--<input type="email" class="form-control" id="">-->
	              <?= $form->field($model, 'repeatNewPassword')->passwordInput()->label(FALSE) ?>
	            </div>
	            <!--<button type="submit" class="btn btn-primary btn-block">SUBMIT</button>-->
	            <div class="form-group">
	                <?= Html::submitButton('UPDATE', ['class' => 'btn btn-primary btn-block']) ?>
	            </div>
	          <!--</form>-->
	          <?php ActiveForm::end(); ?>
	        </div>
	      </div>
	    </div>
	</div>

</div>
