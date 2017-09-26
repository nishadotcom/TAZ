<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Slideshow */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slideshow-form">

  <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'image_name')->fileInput(['maxlength' => true]) ?>
       <span>Upload Formats:&nbsp;jpg,png,jpeg</span>

    <?= Html::activeHiddenInput($model, 'image_name',['type' => 'hidden', 'name' => 'Slideshow[existingImage]','value' => $model->image_name]); ?>
       <?php if(!$model->isNewRecord && $model->image_name) { ?>
       <?php echo Yii::$app->Common->getImageWithLink(Yii::$app->params['SLIDER_IMAGE_DISPLAY_PATH_BACKEND'], $model->image_name); ?>
      <?php } ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Active' => 'Active', 'Suspended' => 'Suspended', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'order_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Add' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
          <?= Html::a(' &laquo; Back', ['/slideshow/'],['class' => 'btn btn-default', 'title' => 'Back'])?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
