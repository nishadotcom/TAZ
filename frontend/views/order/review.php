<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\models\Cart;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CartSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ORDER REVIEW';
$this->params['breadcrumbs'][] = $this->title;
$pathPrdImg   = Yii::$app->params['PATH_PRODUCT_IMAGE'];
$prdNoImg     = 'noImage.jpg';
/*echo '<pre>';
print_r($addressData);
echo '</pre>';*/
$total = 0;
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

                <input type="hidden" name="hash" value="" id="hash"/>
                <input type="hidden" name="key" value="<?= Yii::$app->params['payumoneyMerchantKey']; ?>" />
      
      
      
      
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
                          <strong><?= $addressData->name; ?></strong><br>
                          <?php echo $addressData->address.','; ?> <br>
                          <?php echo $addressData->city.','.$addressData->state.','; ?> <br>
                          <?php echo $addressData->country.'-'.$addressData->pin_code; ?>
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
                          <strong><?= $addressData->name; ?></strong><br>
                          <?php echo $addressData->address.','; ?> <br>
                          <?php echo $addressData->city.','.$addressData->state.','; ?> <br>
                          <?php echo $addressData->country.'-'.$addressData->pin_code; ?>
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
                            <?php 
                            if($orderProducts){
                              foreach ($orderProducts as $key => $orderProduct) {
                                if($from == 'CART'){
                                  $prdImage = (isset($orderProduct->productImages[0])) ? $pathPrdImg . $orderProduct->cart_product_code . '/' . $orderProduct->productImages[0]->cover_photo : $pathPrdImg . $prdNoImg;
                                  $total = $total + $orderProduct->cart_product_price;
                                  ?>
                                  <tr>
                                      <td class="col-xs-2">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <span class="cartImage"><img src="<?= $prdImage; ?>" alt="image" width="70px"></span>
                                      </td>
                                      <td class="col-xs-4"><?= $orderProduct->cart_product_name; ?></td>
                                      <td class="col-xs-2"><?= $orderProduct->cart_product_price; ?></td>
                                      <td class="col-xs-2">1</td>
                                      <td class="col-xs-2"><?= $orderProduct->cart_product_price; ?></td>
                                    </tr>
                                  <?php
                                }else{
                                  $prdImage = (isset($orderProduct->productImages[0])) ? $pathPrdImg . $orderProduct->product_code . '/' . $orderProduct->productImages[0]->cover_photo : $pathPrdImg . $prdNoImg;
                                  $total = $total + $orderProduct->product_price;
                                  ?>
                                  <tr>
                                      <td class="col-xs-2" align="center">
                                        <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
                                        <span class="cartImage" style="float: none;"><img src="<?= $prdImage; ?>" alt="image" width="70px"></span>
                                      </td>
                                      <td class="col-xs-4"><?= $orderProduct->product_name; ?></td>
                                      <td class="col-xs-2"><?= $orderProduct->product_price; ?></td>
                                      <td class="col-xs-2">1</td>
                                      <td class="col-xs-2"><?= $orderProduct->product_price; ?></td>
                                    </tr>
                                  <?php
                                }
                              }
                            }else{
                              ?>
                              <tr><td colspan="5" align="center"> No Results Found</td></tr>
                              <?php
                            }
                            ?>
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
                            <li>Grand Total <span class="grandTotal">$ <?= $total; ?></span></li>
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
                        <li class="next"><input type="submit" name="btnSubmit" value="CONFIRM" id="btnOrderConfirm"></li>
                      </ul>
                    </div>
                  </div>
                  <input type="hidden" name="txnid" id="txnid" value="<?= $payuDetail['txnid']; ?>" />
                  <input type="hidden" name="amount" value="<?= $total; ?>" />
                  <input type="hidden" name="productinfo" value="<?= Yii::$app->params['payumoneyProductInfo']; ?>">
                  <input type="hidden" name="firstname" id="firstname" value="<?= $addressData->name; ?>" />
                  <input type="hidden" name="address1" id="address1" value="<?= $addressData->address; ?>" />
                  <input type="hidden" name="city" id="city" value="<?= $addressData->city; ?>" />
                  <input type="hidden" name="state" id="state" value="<?= $addressData->state; ?>" />
                  <input type="hidden" name="country" id="country" value="<?= $addressData->country; ?>" />
                  <input type="hidden" name="zipcode" id="zipcode" value="<?= $addressData->pin_code; ?>" />
                  <input type="hidden" name="email" id="email" value="<?= Yii::$app->user->identity->email; ?>" />
                  <input type="hidden" name="phone" value="<?= $addressData->phone; ?>" />

                  <input type="hidden" name="udf1" value="<?= strtoupper(Yii::$app->getRequest()->getQueryParam('from')); ?>"> <!-- FROM  VALUE -->
                  
                  
                  <input type="hidden" name="surl" value="http://dev.talozo.local/order/payment-success" size="64" />
                  <input type="hidden" name="furl" value="http://dev.talozo.local/order/payment-error" size="64" />
                  <input type="hidden" name="curl" value="http://dev.talozo.local/order/payment-cancel" />
                  <input type="hidden" name="service_provider" value="" size="64" />
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>