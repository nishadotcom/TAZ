<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserContactDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-contact-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => 15]) ?>

    <?= $form->field($model, 'land_line_number')->textInput(['maxlength' => 15]) ?>

    <?= $form->field($model, 'street')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pin_code')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Add' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
          <?= Html::a(' &laquo; Back', ['/contact-details/'],['class' => 'btn btn-info', 'title' => 'Back'])?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
