<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?= $form->field($model, 'category_name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'category_description')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'category_image')->fileInput(['maxlength' => true]) ?>
     <span>Upload Formats:&nbsp;jpg,png,jpeg</span>
   <?= Html::activeHiddenInput($model, 'category_image',['type' => 'hidden', 'name' => 'Category[existing_category_image]','value' => $model->category_image]); ?>
    <?php if(!$model->isNewRecord && $model->category_image) { ?>
          <?php echo Yii::$app->Common->getImageWithLink(Yii::$app->params['CATEGORY_IMAGE_DISPLAY_PATH_BACKEND'], $model->category_image); ?>
   <?php } ?>
    <?= $form->field($model, 'category_status')->dropDownList([ 'Active' => 'Active', 'Suspended' => 'Suspended', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Add' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(' &laquo; Back', ['/category/'],['class' => 'btn btn-default', 'title' => 'Back'])?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
