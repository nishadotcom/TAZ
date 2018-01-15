<?php

use yii\helpers\Html;
use yii\grid\GridView;
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

                    <form action="" class="row" method="POST" role="form">
                        <div class="col-xs-12">
                            <div class="page-header">
                                <h4>Shipping information</h4>
                            </div>
                        </div>
                        <div class="form-group col-sm-6 col-xs-12">
                            <label for="">Name</label>
                            <input type="text" class="form-control" id="">
                        </div>
                        <div class="form-group col-sm-6 col-xs-12">
                            <label for="">Street</label>
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
                            <label for="">Phone</label>
                            <input type="text" class="form-control" id="">
                        </div>
                        <div class="form-group col-sm-6 col-xs-12">
                            <label for="">Zip Code</label>
                            <input type="text" class="form-control" id="">
                        </div>
                        <div class="form-group col-sm-6 col-xs-12">
                            <label for="">Country</label>
                            <input type="text" class="form-control" id="">
                        </div>
                        <div class="form-group col-sm-6 col-xs-12">
                            <label for="">Fax</label>
                            <input type="text" class="form-control" id="">
                        </div>
                        <div class="form-group col-sm-6 col-xs-12">
                            <label for="">First Name</label>
                            <textarea class="form-control"></textarea>
                        </div>
                        <div class="col-xs-12">
                            <div class="page-header">
                                <h4>Billing information</h4>
                            </div>
                        </div>
                        <div class="col-xs-12 checkboxArea">
                            <input id="checkbox1" type="checkbox" name="checkbox" value="1" checked="checked">
                            <label for="checkbox1"><span></span>Same as shipping Information </label>
                        </div>
                        <div class="col-xs-12">
                            <div class="well well-lg clearfix">
                                <ul class="pager">
                                    <li class="previous"><a href="#" class="hideContent">back</a></li>
                                    <li class="next"><a href="<?= Yii::$app->homeUrl . 'cart/review'; ?>">Continue</a></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>