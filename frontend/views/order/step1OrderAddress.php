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
?>

<section class="mainContent clearfix stepsWrapper">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="innerWrapper clearfix stepsPage">
                    <!--<div class="row progress-wizard" style="border-bottom:0;">

                        <div class="col-xs-3 progress-wizard-step complete">
                            <div class="text-center progress-wizard-stepnum">Billing &amp; Shipping Address</div>
                            <div class="progress"><div class="progress-bar"></div></div>
                            <a href="checkout-step-1.html" class="progress-wizard-dot"></a>
                        </div>

                        <div class="col-xs-3 progress-wizard-step disabled">
                            <div class="text-center progress-wizard-stepnum">Shipping Method</div>
                            <div class="progress"><div class="progress-bar"></div></div>
                            <a href="checkout-step-2.html" class="progress-wizard-dot"></a>
                        </div>

                        <div class="col-xs-3 progress-wizard-step disabled">
                            <div class="text-center progress-wizard-stepnum">Payment Method</div>
                            <div class="progress"><div class="progress-bar"></div></div>
                            <a href="checkout-step-3.html" class="progress-wizard-dot"></a>
                        </div>

                        <div class="col-xs-3 progress-wizard-step disabled">
                            <div class="text-center progress-wizard-stepnum">Review</div>
                            <div class="progress"><div class="progress-bar"></div></div>
                            <a href="checkout-step-4.html" class="progress-wizard-dot"></a>
                        </div>
                    </div>-->
                    <?php $form = ActiveForm::begin([
                        'fieldConfig' => [
                            'template' => '<div class="form-group col-sm-6 col-xs-12">{label}{input}</div>'
                        ]
                    ]); ?>
                    <!--<form action="" class="row" method="POST" role="form">-->
                        <?php if(Yii::$app->user->isGuest){ ?>
                            <?= $form->field($model, 'guestEmail')->textInput(['maxlength' => true, 'tabindex'=>'1']) ?>
                            <?= $form->field($model, 'guestName')->textInput(['maxlength' => true, 'tabindex'=>'2']) ?>
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
                        <?= $form->field($model, 'billingName')->textInput(['maxlength' => true, 'tabindex'=>'8']) ?>
                    
                        <?= $form->field($model, 'address')->textInput(['maxlength' => true, 'tabindex'=>'2']) ?>
                        <?= $form->field($model, 'billingAddress')->textInput(['maxlength' => true, 'tabindex'=>'9']) ?>
                    
                        <?= $form->field($model, 'city')->textInput(['maxlength' => true, 'tabindex'=>'3']) ?>
                        <?= $form->field($model, 'billingCity')->textInput(['maxlength' => true, 'tabindex'=>'10']) ?>

                        <?= $form->field($model, 'state')->textInput(['maxlength' => true, 'tabindex'=>'4']) ?>
                        <?= $form->field($model, 'billingState')->textInput(['maxlength' => true, 'tabindex'=>'11']) ?>

                        <?= $form->field($model, 'country')->textInput(['maxlength' => true, 'tabindex'=>'5']) ?>
                        <?= $form->field($model, 'billingCountry')->textInput(['maxlength' => true, 'tabindex'=>'12']) ?>

                        <?= $form->field($model, 'pin_code')->textInput(['maxlength' => true, 'tabindex'=>'6']) ?>
                        <?= $form->field($model, 'billingPincode')->textInput(['maxlength' => true, 'tabindex'=>'13']) ?>

                        <?= $form->field($model, 'phone')->textInput(['maxlength' => true, 'tabindex'=>'7']) ?>
                        <?= $form->field($model, 'billingPhone')->textInput(['maxlength' => true, 'tabindex'=>'14']) ?>

                        
                        <!--<div class="form-group col-sm-6 col-xs-12">
                            <label for="">Address</label>
                            <input type="text" class="form-control" id="">
                        </div>
                        <div class="form-group col-sm-6 col-xs-12">
                            <label for="">City</label>
                            <input type="email" class="form-control" id="">
                        </div>
                        <div class="form-group col-sm-6 col-xs-12">
                            <label for="">State</label>
                            <input type="text" class="form-control" id="">
                        </div>
                        <div class="form-group col-sm-6 col-xs-12">
                            <label for="">Country</label>
                            <input type="text" class="form-control" id="">
                        </div>
                        
                        <div class="form-group col-sm-6 col-xs-12">
                            <label for="">Zip Code</label>
                            <input type="text" class="form-control" id="">
                        </div>
                        <div class="form-group col-sm-6 col-xs-12">
                            <label for="">Phone</label>
                            <input type="text" class="form-control" id="">
                        </div>
                        <div class="form-group col-sm-6 col-xs-12">
                            <label for="">Fax</label>
                            <input type="text" class="form-control" id="">
                        </div>
                        <div class="form-group col-sm-6 col-xs-12">
                            <label for="">First Name</label>
                            <textarea class="form-control"></textarea>
                        </div>-->
                        <div class="col-xs-12 checkboxArea">
                            <input id="checkbox1" type="checkbox" name="checkbox" value="1" checked="checked">
                            <label for="checkbox1"><span></span>Same as shipping Information </label>
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

<?php /* ?>

<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'order_id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pin_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address_type')->dropDownList([ 'Shipping' => 'Shipping', 'Billing' => 'Billing', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'created_on')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

<?php */ ?>