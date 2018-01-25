<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\models\Cart;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CartSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'CART - ORDER REVIEW';
$this->params['breadcrumbs'][] = $this->title;
$pathPrdImg   = Yii::$app->params['PATH_PRODUCT_IMAGE'];
$prdNoImg     = 'noImage.jpg';
?>

<section class="mainContent clearfix stepsWrapper">
        <div class="container">
          <div class="row">
            <div class="col-xs-12">
              <div class="innerWrapper clearfix stepsPage">
                <!--<div class="row progress-wizard" style="border-bottom:0;">

                  <div class="col-xs-3 progress-wizard-step complete fullBar">
                    <div class="text-center progress-wizard-stepnum">Billing &amp; Shipping Address</div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <a href="checkout-step-1.html" class="progress-wizard-dot"></a>
                  </div>

                  <div class="col-xs-3 progress-wizard-step complete fullBar">
                    <div class="text-center progress-wizard-stepnum">Shipping Method</div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <a href="checkout-step-2.html" class="progress-wizard-dot"></a>
                  </div>

                  <div class="col-xs-3 progress-wizard-step complete fullBar">
                    <div class="text-center progress-wizard-stepnum">Payment Method</div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <a href="checkout-step-3.html" class="progress-wizard-dot"></a>
                  </div>

                  <div class="col-xs-3 progress-wizard-step complete">
                    <div class="text-center progress-wizard-stepnum">Review</div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <a href="checkout-step-4.html" class="progress-wizard-dot"></a>
                  </div>
                </div>-->
                
                <form action="https://test.payu.in/_payment" class="row" method="post" role="form" id="orderForm" name="payuForm">
                  <input type="hidden" name="key" value="gtKFFx" />
      <input type="hidden" name="hash" value="" id="hash"/>
      <input type="hidden" name="txnid" value="" id="txnid" />
      <input name="amount" value="500" />
      <input name="firstname" id="firstname" value="FirstNAME" />
      <input name="email" id="email" value="nisha.com126@gmail.com" />
      <input name="phone" value="9876543210" /><
      <textarea name="productinfo">ProductInfo</textarea>
      <input name="surl" value="http://dev.talozo.local/order/payment-success" size="64" />
      <input name="furl" value="http://dev.talozo.local/order/payment-success" size="64" />
      <input type="hidden" name="service_provider" value="" size="64" />
      <input name="curl" value="http://dev.talozo.local/" />
                  <!--<div class="col-xs-12">
                    <div class="page-header">
                      <h4>order review</h4>
                    </div>
                  </div>-->
                  <div class="col-sm-6 col-xs-12">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">Billing Address</h4>
                      </div>
                      <div class="panel-body">
                        <address>
                          <strong>Adam Smith</strong><br>
                          9/4 C Babor Road, Mohammad pur, <br>
                          Shyamoli, Dhaka <br>
                          Bangladesh
                        </address>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-xs-12">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">Shipping Address</h4>
                      </div>
                      <div class="panel-body">
                        <address>
                          <strong>Adam Smith</strong><br>
                          9/4 C Babor Road, Mohammad pur, <br>
                          Shyamoli, Dhaka <br>
                          Bangladesh
                        </address>
                      </div>
                    </div>
                  </div>
                  <!--<div class="col-sm-6 col-xs-12">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">Payment Method</h4>
                      </div>
                      <div class="panel-body">
                        <address>
                          <span>Credit Card - VISA</span>
                        </address>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-xs-12">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">Shipping Method</h4>
                      </div>
                      <div class="panel-body">
                        <address>
                          <span>Post Air Mail</span>
                        </address>
                      </div>
                    </div>
                  </div>-->
                  <!--<div class="col-xs-12">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">Order Details</h4>
                      </div>
                      <div class="panel-body">
                        <div class="row">
                          <div class="col-sm-4 col-xs-12">
                            <address>
                              <a href="#">Email: adamsmith@bigbag.com</a> <br>
                              <span>Phone: +884 5452 6432</span>
                            </address>
                          </div>
                          <div class="col-sm-8 col-xs-12">
                            <address>
                              <span>Additional Information: </span><br>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip</p>
                            </address>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>-->
                  <div class="col-xs-12">
                    <div class="cartListInner">
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th></th>
                              <th>Product Name</th>
                              <th>Price</th>
                              <th>Quantity</th>
                              <th>Sub Total</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="col-xs-2">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <span class="cartImage"><img src="img/products/cart-image.jpg" alt="image"></span>
                              </td>
                              <td class="col-xs-4">Italian Winter Hat</td>
                              <td class="col-xs-2">$ 99.00</td>
                              <td class="col-xs-2">1</td>
                              <td class="col-xs-2">$ 99.00</td>
                            </tr>
                            <!--<tr>
                              <td class="col-xs-2">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <span class="cartImage"><img src="img/products/cart-image.jpg" alt="image"></span>
                              </td>
                              <td class="col-xs-4">Italian Winter Hat</td>
                              <td class="col-xs-2">$ 99.00</td>
                              <td class="col-xs-2">1</td>
                              <td class="col-xs-2">$ 99.00</td>
                            </tr>
                            <tr>
                              <td class="col-xs-2">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <span class="cartImage"><img src="img/products/cart-image.jpg" alt="image"></span>
                              </td>
                              <td class="col-xs-4">Italian Winter Hat</td>
                              <td class="col-xs-2">$ 99.00</td>
                              <td class="col-xs-2">1</td>
                              <td class="col-xs-2">$ 99.00</td>
                            </tr>-->
                          </tbody>
                        </table>
                      </div>
                      <div class="row totalAmountArea">
                        <div class="col-sm-4 col-sm-offset-8 col-xs-12">
                          <ul class="list-unstyled">
                            <!--<li>Sub Total <span>$ 792.00</span></li>
                            <li>UK Vat <span>$ 18.00</span></li>-->
                            <li>Grand Total <span class="grandTotal">$ 810.00</span></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <div class="well well-lg clearfix">
                      <ul class="pager">
                      <li class="previous"><a href="" onclick="window.history.go(-1); return false;">Back</a></li>
                        <!--<li class="next"><a href="<?= Yii::$app->homeUrl . 'cart/payment-success'; ?>">Confirm</a></li>-->
                        <li><input type="submit" name="btnSubmit" value="CONFIRM" id="btnOrderConfirm"></li>
                      </ul>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>