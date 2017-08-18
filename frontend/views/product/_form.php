<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Category;
use backend\models\Country;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */


$categories			= Category::find()->where(['category_status'=>'Active'])->all();
$categoryListData	= ArrayHelper::map($categories,'id','category_name');
$countries          = Country::find()->where(['status'=>1])->all();
$countryListData    = ArrayHelper::map($countries,'name','name');

?>
    <?php $form = ActiveForm::begin([
		'fieldConfig' => [
			'template' => '<div class="form-group"><label for="" class="col-md-3 col-sm-4 control-label">{label}</label><div class="col-md-9 col-sm-6">{input}</div></div>',
		],
		'options' => [
			'class' => 'form-horizontal',
			'enctype' => 'multipart/form-data'
		]
	]); ?>
<div class="col-sm-6">
<div class="product-form">

    <?php //echo $form->field($model, 'product_subcategory_id')->textInput() ?>

    <?php //echo $form->field($model, 'product_code')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'product_category_id')->dropDownList($categoryListData, ['prompt' => 'Select Category']) ?>

    <?= $form->field($model, 'product_name')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'product_owner_id')->textInput() ?>

    <?= $form->field($model, 'product_price')->textInput(['maxlength' => true, 'type'=>'number', 'min'=>1, 'step'=>1.50]) ?>

    <?php //echo $form->field($model, 'product_sale_price')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'product_retail_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_material')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_dimension_type')->dropDownList([ 'cm' => 'cm', 'mm' => 'mm', 'm' => 'm', ], ['prompt' => 'Select Dimension Type', 'options'=>['cm'=>['selected'=>'selected']]]) ?>

    <?= $form->field($model, 'product_height')->textInput(['maxlength' => true, 'type'=>'number', 'min'=>1, 'step'=>1.50]) ?>

    <?= $form->field($model, 'product_length')->textInput(['maxlength' => true, 'type'=>'number', 'min'=>1, 'step'=>1.50]) ?>

    <?= $form->field($model, 'product_breadth')->textInput(['maxlength' => true, 'type'=>'number', 'min'=>1, 'step'=>1.50]) ?>

    <?= $form->field($model, 'product_weight')->textInput(['maxlength' => true, 'type'=>'number', 'min'=>1, 'step'=>1.50]) ?>

    <?= $form->field($model, 'product_short_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'product_long_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'product_discount_status')->dropDownList([ 'Yes' => 'Yes', 'No' => 'No', ], ['prompt' => 'Select Discount Status', 'options'=>['No'=>['selected'=>'selected']]]) ?>

    <?= $form->field($model, 'product_guarantee_status')->dropDownList([ 'Yes' => 'Yes', 'No' => 'No', ], ['prompt' => 'Select Guarantee Status', 'options'=>['No'=>['selected'=>'selected']]]) ?>

	<?= $form->field($imageModel, 'cover_photo')->fileInput(['maxlength' => true]) ?>
	
	<?= $form->field($imageModel, 'file_name[]')->fileInput(['multiple'=>true, 'accept' => 'image/*']) ?>

    

	<?php //echo $form->field($model, 'product_status')->dropDownList([ 'AFA' => 'AFA', 'Active' => 'Active', 'Suspended' => 'Suspended', 'Deleted' => 'Deleted', 'Needs Improvement' => 'Needs Improvement', 'Denied' => 'Denied', ], ['prompt' => '']) ?>

    <?php //echo $form->field($model, 'created_on')->textInput() ?>

    <?php //echo $form->field($model, 'updated_on')->textInput() ?>

    <?php /* ?><div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div> <?php */ ?>
	

    

</div>
</div>
<div class="col-sm-6">
    <?= $form->field($addressModel, 'street')->textInput(['maxlength' => true]) ?>

    <?= $form->field($addressModel, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($addressModel, 'state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($addressModel, 'country')->dropDownList($countryListData, ['prompt' => 'Select Country']) ?>

    <?= $form->field($addressModel, 'pin_code')->textInput(['maxlength' => true]) ?>
</div>

<div class="form-group">
		<div class="col-md-offset-10 col-md-2 col-sm-offset-9 col-sm-3">
			<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success btn-block' : 'btn btn-primary btn-block']) ?>
		</div>
	</div>
<?php ActiveForm::end(); ?>