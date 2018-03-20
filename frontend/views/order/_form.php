<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'order_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total_amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'payment_status')->dropDownList([ 'Completed' => 'Completed', 'Canceled' => 'Canceled', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'order_status')->dropDownList([ 'NEW' => 'NEW', 'IN-PROGRESS' => 'IN-PROGRESS', 'SHIPPED' => 'SHIPPED', 'DELIVERED' => 'DELIVERED', 'COMPLETED' => 'COMPLETED', 'CANCELLED' => 'CANCELLED', 'FAILED-TRANSACTION' => 'FAILED-TRANSACTION', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'order_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
