<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Cart;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CartSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cart - SHIPPING / BILLING INFORMATION';
$this->params['breadcrumbs'][] = $this->title;
$pathPrdImg = Yii::$app->params['PATH_PRODUCT_IMAGE'];
$prdNoImg = 'noImage.jpg';
// FILL USER STORED ADDRESS -> FROM MY ACCOUNT -> MY ADDRESS
if($userAddress && $userAddress['billingAddress']){
    $model->billingName = (!Yii::$app->user->isGuest) ? Yii::$app->user->identity->firstname.' '.Yii::$app->user->identity->lastname  : '';
    $model->billingAddress = $userAddress['billingAddress']->street;
    $model->billingCity = $userAddress['billingAddress']->city;
    $model->billingState = $userAddress['billingAddress']->state;
    $model->billingCountry = $userAddress['billingAddress']->country;
    $model->billingPincode = $userAddress['billingAddress']->pin_code;
    //$model->billingPhone = $userAddress['billingAddress']->phone;
}
if($userAddress && $userAddress['shippingAddress']){
    $model->name    = (!Yii::$app->user->isGuest) ? Yii::$app->user->identity->firstname.' '.Yii::$app->user->identity->lastname  : '';
    $model->address = $userAddress['shippingAddress']->street;
    $model->city    = $userAddress['shippingAddress']->city;
    $model->state   = $userAddress['shippingAddress']->state;
    $model->country = $userAddress['shippingAddress']->country;
    $model->pin_code = $userAddress['shippingAddress']->pin_code;
}
// ASSIGN ADDRESS VALUES (CANCEL ORDERS -> FROM PROFILE PAGE)
if($orderCancelAddress && $orderCancelAddress['billingAddress']){
    $model->billingName = $orderCancelAddress['billingAddress']->name;
    $model->billingAddress = $orderCancelAddress['billingAddress']->address;
    $model->billingCity = $orderCancelAddress['billingAddress']->city;
    $model->billingState = $orderCancelAddress['billingAddress']->state;
    $model->billingCountry = $orderCancelAddress['billingAddress']->country;
    $model->billingPincode = $orderCancelAddress['billingAddress']->pin_code;
    $model->billingPhone = $orderCancelAddress['billingAddress']->phone;
}
if($orderCancelAddress && $orderCancelAddress['shippingAddress']){
    $model->name    = $orderCancelAddress['shippingAddress']->name;
    $model->address = $orderCancelAddress['shippingAddress']->address;
    $model->city    = $orderCancelAddress['shippingAddress']->city;
    $model->state   = $orderCancelAddress['shippingAddress']->state;
    $model->country = $orderCancelAddress['shippingAddress']->country;
    $model->pin_code = $orderCancelAddress['shippingAddress']->pin_code;
    $model->phone   = $orderCancelAddress['shippingAddress']->phone;
}
?>

<section class="mainContent clearfix stepsWrapper">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="innerWrapper clearfix stepsPage">
                    <?php $form = ActiveForm::begin([
                        'fieldConfig' => [
                            'template' => '<div class="form-group col-sm-6 col-xs-12">{label}{input}</div>'
                        ]
                    ]); ?>
                        <?php if(Yii::$app->user->isGuest){ ?>
                            <?= $form->field($model, 'guestEmail')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'guestName')->textInput(['maxlength' => true]) ?>
                        <?php } // IF USER IS GUEST ?>
                    
                        <div class="col-xs-6">
                            <div class="page-header">
                                <h4>Shipping information</h4>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="page-header">
                                <h4>Billing information</h4>
                            </div>
                            
                        </div>
                        
                        <input type="hidden" name="transactionId" value="<?= $transactionId; ?>">
                        
                        <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'tabindex'=>'1']) ?>
                        <?= $form->field($model, 'billingName')->textInput(['maxlength' => true, 'tabindex'=>'8']); ?>
                    
                        <?= $form->field($model, 'address')->textInput(['maxlength' => true, 'tabindex'=>'2', 'placeholder'=>'Address'])->label(false); ?>
                        <?= $form->field($model, 'billingAddress')->textInput(['maxlength' => true, 'tabindex'=>'9']) ?>
                    
                        <?= $form->field($model, 'city')->textInput(['maxlength' => true, 'tabindex'=>'3', 'placeholder'=>'City'])->label(false) ?>
                        <?= $form->field($model, 'billingCity')->textInput(['maxlength' => true, 'tabindex'=>'10'])->label(false) ?>

                        <?= $form->field($model, 'state')->textInput(['maxlength' => true, 'tabindex'=>'4']) ?>
                        <?= $form->field($model, 'billingState')->textInput(['maxlength' => true, 'tabindex'=>'11']) ?>

                        <?= $form->field($model, 'country')->textInput(['maxlength' => true, 'tabindex'=>'5']) ?>
                        <?= $form->field($model, 'billingCountry')->textInput(['maxlength' => true, 'tabindex'=>'12']) ?>

                        <?= $form->field($model, 'pin_code')->textInput(['maxlength' => true, 'tabindex'=>'6']) ?>
                        <?= $form->field($model, 'billingPincode')->textInput(['maxlength' => true, 'tabindex'=>'13']) ?>

                        <?= $form->field($model, 'phone')->textInput(['maxlength' => true, 'tabindex'=>'7']) ?>
                        <?= $form->field($model, 'billingPhone')->textInput(['maxlength' => true, 'tabindex'=>'14']) ?>

                        <div class="col-xs-12 checkboxArea">
                            <input id="sameAsShippingAdress" type="checkbox" name="checkbox" value="1">
                            <label for="sameAsShippingAdress"><span></span>Same as shipping Information </label>
                        </div>
                        <div class="col-xs-12">
                            <div class="well well-lg clearfix">
                                <ul class="pager">
                                    <li class="previous"><a href="#" class="hideContent">back</a></li>
                                    <li class="next"><?= Html::submitButton('Continue', ['class' => 'btn btn-info continue']) ?></li>
                                </ul>
                            </div>
                        </div>
                    <!--</form>-->
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>