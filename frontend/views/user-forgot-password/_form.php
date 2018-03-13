<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserForgotPassword */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
      <div class="panel panel-default">
        <!--<div class="panel-heading"><h3>Lost Password</h3></div>-->
        <div class="panel-body">
          <!--<form action="" method="POST" role="form">-->
          <?php $form = ActiveForm::begin(); ?>
            <p class="help-block">Enter the e-mail address associated with your account. <!--Click submit to have your password e-mailed to you.--></p>
            <div class="form-group">
              <label for="">Enter Email</label>
              <!--<input type="email" class="form-control" id="">-->
              <?= $form->field($model, 'userEmail')->textInput()->label(FALSE) ?>
            </div>
            <!--<button type="submit" class="btn btn-primary btn-block">SUBMIT</button>-->
            <div class="form-group">
                <?= Html::submitButton('SUBMIT', ['class' => 'btn btn-primary btn-block']) ?>
            </div>
          <!--</form>-->
          <?php ActiveForm::end(); ?>
        </div>
      </div>
    </div>
</div>

<?php /* ?>

<div class="user-forgot-password-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'password_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'expire_at')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Active' => 'Active', 'Expired' => 'Expired', 'Completed' => 'Completed', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'created_on')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php */ ?>
