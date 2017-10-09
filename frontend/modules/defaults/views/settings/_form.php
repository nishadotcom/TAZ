<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\defaults\models\Settings */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-container fluid-height clearfix">
  <div class="widget-content padded">
    <table width="100%" border="0">
      <tr>
        <td width="97%">&nbsp;</td>
        <td width="3%"> <a class="btn btn-success role" href="<?= Yii::$app->urlManager->createUrl('defaults/settings/index') ?>" title="Back">Back</a> </td>
      </tr>
    </table>
    <?php $form = ActiveForm::begin(['options' => ['class' => 'form-horizontal']]); ?>
    <div class="form-group btnGroup">
      <label class="control-label col-md-2">Name</label>
      <div class="col-md-3">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'class' => 'form-control', 'placeholder' => 'Settings Name'])->label(FALSE); ?>
      </div>
    </div>
    <div class="form-group btnGroup">
      <label class="control-label col-md-2">Title</label>
      <div class="col-md-3">
        <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'class' => 'form-control', 'placeholder' => 'Settings Title'])->label(FALSE); ?>
      </div>
    </div>
    <div class="form-group btnGroup">
      <label class="control-label col-md-2">Value</label>
      <div class="col-md-3">
        <?= $form->field($model, 'value')->textInput(['maxlength' => true, 'class' => 'form-control', 'placeholder' => 'Settings Value'])->label(FALSE); ?>
      </div>
    </div>
    <div class="form-group btnGroup">
      <label class="control-label col-md-2">&nbsp;</label>
      <div class="col-md-7">
        <?= Html::submitButton($model->isNewRecord ? 'Submit' : 'Save', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <a class="btn btn-default-outline" href="<?= Yii::$app->urlManager->createUrl('defaults/settings/index') ?>" title="Cancel">Cancel</a> </div>
    </div>
  </div>
  <?php ActiveForm::end(); ?>
</div>

