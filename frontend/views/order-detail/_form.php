<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\OrderDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'order_id')->textInput() ?>

    <?= $form->field($model, 'category_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subcategory_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_id')->textInput() ?>

    <?= $form->field($model, 'product_code')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'product_name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'product_seo')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'product_owner_id')->textInput() ?>

    <?= $form->field($model, 'seller_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_material')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_height')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_length')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_breadth')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_weight')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_on')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
