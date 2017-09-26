<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'product_category_id') ?>

    <?= $form->field($model, 'product_subcategory_id') ?>

    <?= $form->field($model, 'product_code') ?>

    <?= $form->field($model, 'product_name') ?>

    <?php // echo $form->field($model, 'product_owner_id') ?>

    <?php // echo $form->field($model, 'product_price') ?>

    <?php // echo $form->field($model, 'product_sale_price') ?>

    <?php // echo $form->field($model, 'product_retail_price') ?>

    <?php // echo $form->field($model, 'product_material') ?>

    <?php // echo $form->field($model, 'product_color') ?>

    <?php // echo $form->field($model, 'product_dimension_type') ?>

    <?php // echo $form->field($model, 'product_height') ?>

    <?php // echo $form->field($model, 'product_length') ?>

    <?php // echo $form->field($model, 'product_breadth') ?>

    <?php // echo $form->field($model, 'product_weight') ?>

    <?php // echo $form->field($model, 'product_short_description') ?>

    <?php // echo $form->field($model, 'product_long_description') ?>

    <?php // echo $form->field($model, 'product_discount_status') ?>

    <?php // echo $form->field($model, 'product_guarantee_status') ?>

    <?php // echo $form->field($model, 'product_status') ?>

    <?php // echo $form->field($model, 'created_on') ?>

    <?php // echo $form->field($model, 'updated_on') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
