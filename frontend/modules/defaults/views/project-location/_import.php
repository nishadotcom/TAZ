<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Defect */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Import Project Location';
?>

<div class="page-title customTitle">
    <h1> <?= Html::encode($this->title) ?> </h1>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="widget-container fluid-height clearfix">
            <div class="widget-content padded">
                <table width="100%" border="0">
                    <tr>
                        <td width="88%">&nbsp;</td>
                        <td width="5%"><a class="btn btn-success role" href="<?= Yii::$app->urlManager->createUrl('defaults/project-location/index') ?>">Back</a></td>
                    </tr>
                </table>
                <?php $form = ActiveForm::begin(['enableClientValidation' => false, 'options' => ['id' => 'import', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']]); ?>
                <div class="col-lg-6">
                    <div class="form-group btnGroup">
                        <label class="control-label col-md-4">Import File</label>
                        <div class="col-md-7">
                            <?php
                            echo FileInput::widget([
                              'name' => 'fileName',
                                'options'=>[
                                    'required'=>true
                                ],
                              'pluginOptions' => ['previewFileType' => 'any','showUpload' => false,'allowedFileExtensions'=>['csv'],'maxFileCount' => 1],
                              ]);
                            ?><br />
                             <div class="type">                         
                                Allowed File Type is CSV<br />
                                Download the <a href="<?= Yii::$app->urlManager->createUrl('uploads/template') ?>/projectLocation-template.csv">Template</a> and fill the details for import</div>
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group btnGroup">
                            <label class="control-label col-md-2">&nbsp;</label>
                            <div class="col-md-8">
                                <?= Html::submitButton('Import', ['class' => 'btn btn-primary']) ?>
                                <a class="btn btn-default-outline" href="<?= Yii::$app->urlManager->createUrl('defaults/project-location/index') ?>">Cancel</a> </div> 
                            </div>
                        </div>
                    </div>  
                </div>
            <p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
