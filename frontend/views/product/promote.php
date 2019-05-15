<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\widgets\ProfileMenu;
$this->title = 'My Products';

?>

<div class="row">
         <?= ProfileMenu::widget(); ?>
</div>

<div class="row">
  <div class="col-xs-12">
    <div class="innerWrapper">
      <div class="orderBox profile">
        <div class="row">
          <div class="col-sm-6">
          <div class="on-sale-form">
            <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model, 'on_sale_product_id')->hiddenInput(['value'=>$productId])->label(FALSE); ?>
            <?= $form->field($model, 'discount')->textInput(['placeholder'=>'Enter the percentage figure you want to discount']) ?>
            <div class="form-group">
              <?= Html::submitButton('Promote', ['class' => 'btn btn-success']) ?>
            </div>
            <?php ActiveForm::end(); ?>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
