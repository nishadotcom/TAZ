<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_category_id')->textInput() ?>

    <?= $form->field($model, 'product_subcategory_id')->textInput() ?>

    <?= $form->field($model, 'product_code')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'product_name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'product_owner_id')->textInput() ?>

    <?= $form->field($model, 'product_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_sale_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_retail_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_material')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_dimension_type')->dropDownList([ 'cm' => 'Cm', 'mm' => 'Mm', 'm' => 'M', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'product_height')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_length')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_breadth')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_weight')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_short_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'product_long_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'product_discount_status')->dropDownList([ 'Yes' => 'Yes', 'No' => 'No', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'product_guarantee_status')->dropDownList([ 'Yes' => 'Yes', 'No' => 'No', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'product_status')->dropDownList([ 'AFA' => 'AFA', 'Active' => 'Active', 'Suspended' => 'Suspended', 'Deleted' => 'Deleted', 'Needs Improvement' => 'Needs Improvement', 'Denied' => 'Denied', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'created_on')->textInput() ?>

    <?= $form->field($model, 'updated_on')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
