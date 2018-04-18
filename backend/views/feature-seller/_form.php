<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\User;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model frontend\models\FeatureSeller */
/* @var $form yii\widgets\ActiveForm */
$users = User::find()->where(['status' => 'Active', 'user_type'=>'Seller'])->all();
$sellersList = ArrayHelper::map($users, 'id', 'firstname');
?>

<div class="feature-seller-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // echo  $form->field($model, 'seller_id')->textInput() ?>
    <?= $form->field($model, 'seller_id')->dropDownList($sellersList, ['prompt' => 'Select Seller']) ?>

    <?= $form->field($model, 'date_from')->textInput(['placeholder'=>'YYYY-MM-DD']) ?>

    <?= $form->field($model, 'date_to')->textInput(['placeholder'=>'YYYY-MM-DD']) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Active' => 'Active', 'Suspended' => 'Suspended', ], ['prompt' => '', 'selected'=>'Active', 'options'=>['Active'=>['Selected'=>true]]]) ?>

    <?php // echo $form->field($model, 'created_on')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
