<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CartSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cart-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cart_user_id') ?>

    <?= $form->field($model, 'cart_product_category_name') ?>

    <?= $form->field($model, 'cart_product_subcategory_NAME') ?>

    <?= $form->field($model, 'cart_product_id') ?>

    <?php // echo $form->field($model, 'cart_product_code') ?>

    <?php // echo $form->field($model, 'cart_product_name') ?>

    <?php // echo $form->field($model, 'cart_product_seo') ?>

    <?php // echo $form->field($model, 'cart_product_owner_id') ?>

    <?php // echo $form->field($model, 'cart_product_price') ?>

    <?php // echo $form->field($model, 'cart_product_material') ?>

    <?php // echo $form->field($model, 'cart_product_color') ?>

    <?php // echo $form->field($model, 'cart_product_dimension_type') ?>

    <?php // echo $form->field($model, 'cart_product_height') ?>

    <?php // echo $form->field($model, 'cart_product_length') ?>

    <?php // echo $form->field($model, 'cart_product_breadth') ?>

    <?php // echo $form->field($model, 'cart_product_weight') ?>

    <?php // echo $form->field($model, 'cart_product_short_description') ?>

    <?php // echo $form->field($model, 'cart_product_long_description') ?>

    <?php // echo $form->field($model, 'cart_product_discount') ?>

    <?php // echo $form->field($model, 'cart_product_quantity') ?>

    <?php // echo $form->field($model, 'cart_added_on') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
