<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\OrderDetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'order_id') ?>

    <?= $form->field($model, 'category_name') ?>

    <?= $form->field($model, 'subcategory_name') ?>

    <?= $form->field($model, 'product_id') ?>

    <?php // echo $form->field($model, 'product_code') ?>

    <?php // echo $form->field($model, 'product_name') ?>

    <?php // echo $form->field($model, 'product_seo') ?>

    <?php // echo $form->field($model, 'product_owner_id') ?>

    <?php // echo $form->field($model, 'seller_name') ?>

    <?php // echo $form->field($model, 'product_price') ?>

    <?php // echo $form->field($model, 'product_material') ?>

    <?php // echo $form->field($model, 'product_color') ?>

    <?php // echo $form->field($model, 'product_height') ?>

    <?php // echo $form->field($model, 'product_length') ?>

    <?php // echo $form->field($model, 'product_breadth') ?>

    <?php // echo $form->field($model, 'product_weight') ?>

    <?php // echo $form->field($model, 'product_description') ?>

    <?php // echo $form->field($model, 'created_on') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
