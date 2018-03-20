<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\FeatureSeller */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="feature-seller-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'seller_id')->textInput() ?>

    <?= $form->field($model, 'date_from')->textInput() ?>

    <?= $form->field($model, 'date_to')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Active' => 'Active', 'Suspended' => 'Suspended', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'created_on')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
