<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Cart */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cart-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cart_user_id')->textInput() ?>

    <?= $form->field($model, 'cart_product_category_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cart_product_subcategory_NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cart_product_id')->textInput() ?>

    <?= $form->field($model, 'cart_product_code')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'cart_product_name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'cart_product_seo')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'cart_product_owner_id')->textInput() ?>

    <?= $form->field($model, 'cart_product_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cart_product_material')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cart_product_color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cart_product_dimension_type')->dropDownList([ 'cm' => 'Cm', 'mm' => 'Mm', 'm' => 'M', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'cart_product_height')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cart_product_length')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cart_product_breadth')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cart_product_weight')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cart_product_short_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'cart_product_long_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'cart_product_discount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cart_product_quantity')->textInput() ?>

    <?= $form->field($model, 'product_available_status')->dropDownList([ 'In-Stock' => 'In-Stock', 'Out of Stock' => 'Out of Stock', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'cart_added_on')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
