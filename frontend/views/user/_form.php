<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'registered_mode')->dropDownList([ 'Web' => 'Web', 'FB' => 'FB', 'Google' => 'Google', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'profile_image')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'profile_status')->dropDownList([ 'Completed' => 'Completed', 'Not-Completed' => 'Not-Completed', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'product_count')->textInput() ?>

    <?= $form->field($model, 'user_loyalty')->dropDownList([ 'Platinum' => 'Platinum', 'Gold' => 'Gold', 'Silver' => 'Silver', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'user_type')->dropDownList([ 'Buyer' => 'Buyer', 'Seller' => 'Seller', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Active' => 'Active', 'Suspended' => 'Suspended', 'Deleted' => 'Deleted', 'Awaiting to Activate' => 'Awaiting to Activate', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'registration_ip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_on')->textInput() ?>

    <?= $form->field($model, 'updated_on')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
