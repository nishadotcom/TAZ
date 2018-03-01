<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin([
  'fieldConfig' => [
    'template' => '{input}',
  ]
]); ?>

<div class="product-view">
  <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'product_category_id',
            [
              'label' => 'Category',
              'value' => $model->productCategory->category_name
            ],
            //'product_subcategory_id',
            'product_code:ntext',
            'product_name:ntext',
            //'product_owner_id',
            [
              'label' => 'Seller Name',
              'value' => $model->productOwner->firstname.' ' .$model->productOwner->lastname
            ],
            'product_price',
            'product_sale_price',
            //'product_retail_price',
            'product_material',
            'product_color',
            //'product_dimension_type',
            //'product_height',
            //'product_length',
            //'product_breadth',
            [
              'attribute' => 'product_height',
              'value' => $model->product_height.' '.strtoupper($model->product_dimension_type)
            ],
            [
              'attribute' => 'product_length',
              'value' => $model->product_length.' '.strtoupper($model->product_dimension_type)
            ],
            [
              'attribute' => 'product_breadth',
              'value' => $model->product_breadth.' '.strtoupper($model->product_dimension_type)
            ],
            //'product_weight',
            [
              'attribute' => 'product_weight',
              'value' => $model->product_weight.' KG'
            ],
            //'product_short_description:ntext',
            //'product_long_description:ntext',
            [                      // the owner name of the model
              'label' => 'Description',
              'value' => $form->field($model, 'product_long_description')->textArea(['maxlength' => true]),
              'format' => 'raw',
            ],
            'product_discount_status',
            'product_guarantee_status',
            //'product_status',
            [
				      'attribute' => 'product_status',
				      'value' => ($model->product_status == 'AFA') ? 'Awaiting for Approval' : $model->product_status
            ],
            'created_on',
            //'updated_on',
            [                      // the owner name of the model
              'label' => 'Admin Note',
              'value' => $form->field($model, 'admin_note')->textArea(['maxlength' => true]),
              'format' => 'raw',
            ],
        ],
    ]) ?>
</div>

<div class="product-form">
    <div class="form-group">
        <?= Html::submitButton('Approve', ['class' => 'btn btn-success', 'value'=>'Active', 'name'=>'btn']) ?>
        <?= Html::submitButton('Needs Improvement', ['class' => 'btn btn-warning', 'value'=>'Needs Improvement', 'name'=>'btn']) ?>
        <?= Html::submitButton('Deny', ['class' => 'btn btn-danger', 'value'=>'Denied', 'name'=>'btn']) ?>
        <?php //Html::submitButton($model->isNewRecord ? 'Add' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(' &laquo; Back', ['/product/'],['class' => 'btn btn-default', 'title' => 'Back'])?>
    </div>

</div>
<?php ActiveForm::end(); ?>


        <!--'fieldConfig' => [
          'template' => '<div class="form-group"><label for="" class="control-label col-sm-2">{label}</label><div class="col-sm-10">{input}</div></div>',
        ],
        'options' => [
            'enctype' => 'multipart/form-data', 
            'class'=>'form-horizontal']-->
