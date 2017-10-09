<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\modules\defaults\models\Department;

/* @var $this yii\web\View */
/* @var $model app\modules\defaults\models\SubDepartment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-container fluid-height clearfix">
  <div class="widget-content padded">
    <table width="100%" border="0">
      <tr>
        <td width="97%">&nbsp;</td>
        <td width="3%"> <a class="btn btn-success role" href="<?= Yii::$app->urlManager->createUrl('defaults/sub-department/index') ?>" title="Back">Back</a> </td>
      </tr>
    </table>
    <?php $form = ActiveForm::begin(['options' => ['class' => 'form-horizontal']]); ?>
  <?php /*?>  <div class="form-group btnGroup">
      <label class="control-label col-md-2">Dept Id</label>
      <div class="col-md-3">
        <?= $form->field($model, 'deptId')->textInput(['maxlength' => true, 'class' => 'form-control', 'placeholder' => 'Department Id'])->label(FALSE); ?>
      </div>
    </div><?php */?>
    <div class="form-group btnGroup">
          <label class="control-label col-md-2">Department</label>
            <div class="col-md-3">
             <?=
                            $form->field($model, 'deptId')->widget(Select2::classname(), [
                                    'data' => ArrayHelper::map(Department::find()->all(), 'id', 'name'),
                                    'options' => ['placeholder' => 'Select', 'class' => 'form-control', 'id'=>'subdepartment-depId'],
                                    'pluginOptions' => [
                                    'allowClear' => FALSE
                                ],
                            ])->label(FALSE)
                            ?>
            
            </div>
          </div>
    <!--div class="form-group btnGroup">
      <label class="control-label col-md-2">Code</label>
      <div class="col-md-3">
        <? //= $form->field($model, 'code')->textInput(['maxlength' => true, 'class' => 'form-control', 'placeholder' => 'Subdepartment Code'])->label(FALSE); ?>
      </div>
    </div-->
    <div class="form-group btnGroup">
      <label class="control-label col-md-2">Name</label>
      <div class="col-md-3">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'class' => 'form-control', 'placeholder' => 'Subdepartment Name'])->label(FALSE); ?>
      </div>
    </div>
    <div class="form-group btnGroup">
      <label class="control-label col-md-2">&nbsp;</label>
      <div class="col-md-7">
        <?= Html::submitButton($model->isNewRecord ? 'Submit' : 'Save', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <a class="btn btn-default-outline" href="<?= Yii::$app->urlManager->createUrl('defaults/sub-department/index') ?>" title="Cancel">Cancel</a> </div>
    </div>
  </div>
  <?php ActiveForm::end(); ?>
</div>
