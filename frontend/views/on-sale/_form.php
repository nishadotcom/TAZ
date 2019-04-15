<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\OnSale */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="on-sale-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'on_sale_product_id')->textInput() ?>

    <?= $form->field($model, 'discount')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Waiting' => 'Waiting', 'Approved' => 'Approved', 'Supended' => 'Supended', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'created_on')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
