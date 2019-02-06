<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserAddress */
/* @var $form yii\widgets\ActiveForm */
?>

<!--<div class="user-address-form">-->

    <?php $form = ActiveForm::begin([
        'fieldConfig' => [
            'template' => '
                            <div class="form-group">
                            <label for="" class="col-md-2 col-sm-3 control-label">{label}</label>
                            <div class="col-md-10 col-sm-9">
                                {input}
                            </div>',
            'options' => ['class' => 'form-horizontal']
        ]
    ]); ?>

    <?php //$form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'street')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pin_code')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'address_type')->dropDownList([ 'Shipping' => 'Shipping', 'Billing' => 'Billing', ], ['prompt' => '']) ?>

    <?php //$form->field($model, 'updated_on')->textInput() ?>

    <?php /* ?><div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div> <?php */ ?>
    <div class="form-group">
        <div class="col-md-offset-11 col-md-2 col-sm-offset-9 col-sm-3">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            <!--<button type="submit" class="btn btn-primary btn-block">SAVE INFO</button>-->
        </div>
    </div>

    <?php ActiveForm::end(); ?>

<!--</div>-->
