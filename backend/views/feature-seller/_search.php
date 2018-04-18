<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\FeatureSellerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="feature-seller-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'seller_id') ?>

    <?= $form->field($model, 'date_from') ?>

    <?= $form->field($model, 'date_to') ?>

    <?= $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_on') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
