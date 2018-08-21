<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\widgets\ProfileMenu;
//use frontend\models\OrderDetail;

/* @var $this yii\web\View */
/* @var $model frontend\models\OrderDetail */
$orderData = (isset($model[0])) ? $model[0]->order : [];
$orderAddressData = (isset($model[0])) ? $model[0]->orderAddress : [];
$orderCode = ($orderData) ? $orderData->order_code : '';
//echo '<pre>';
//print_r($orderAddressData); exit;
$this->title = 'Order - '.$orderCode;
$this->params['breadcrumbs'][] = ['label' => 'My Sales', 'url' => ['/mysales']];
$this->params['breadcrumbs'][] = $orderCode;
$shippingAddress = $orderAddressData[0];
$billingAddress  = $orderAddressData[1];
//echo '<pre>';
$orderProucts = $model;
$pathPrdImg   = Yii::$app->params['PATH_PRODUCT_IMAGE'];
$prdNoImg     = 'noImage.jpg';
$total = 0;
//exit;
?>

<div class="row">
         <?= ProfileMenu::widget(); ?>
</div>

<div class="row" id="printThis">
    <div class="col-xs-12">
      <div class="innerWrapper singleOrder">
        <div class="orderBox">
          <h4>Order #<?= $orderCode; ?></h4>
        </div>
        <div class="row">
          <div class="col-sm-6 col-xs-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">Billing Address</h4>
              </div>
              <div class="panel-body">
                <address>
                  <strong><?= $billingAddress->name; ?></strong><br>
                  <?= $billingAddress->address; ?>, <br>
                  <?= $billingAddress->city; ?>, <?= $billingAddress->state; ?> <br>
                  <?= $billingAddress->country; ?> - <?= $billingAddress->pin_code; ?>
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
                  <strong><?= $shippingAddress->name; ?></strong><br>
                  <?= $shippingAddress->address; ?>, <br>
                  <?= $shippingAddress->city; ?>, <?= $shippingAddress->state; ?> <br>
                  <?= $shippingAddress->country; ?> - <?= $shippingAddress->pin_code; ?>
                </address>
              </div>
            </div>
          </div>
          <?php /* ?>
          <div class="col-sm-6 col-xs-12">
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
          </div> <?php */ ?>
          <div class="col-xs-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">Order Details</h4>
              </div>
              <div class="panel-body" id="printContent">
                <div class="row">
                  <?php /* ?><div class="col-sm-4 col-xs-12">
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
                  </div><?php */ ?>
                  <div class="cartListInner" style="padding: 0 12px;">
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
                            if($orderProucts){
                              foreach ($orderProucts as $key => $orderProduct) {
                                
                                  $prdImage = (isset($orderProduct->productImages[0])) ? $pathPrdImg . $orderProduct->product_code . '/' . $orderProduct->productImages[0]->cover_photo : $pathPrdImg . $prdNoImg;
                                  $orderProductPrice = (isset($orderProduct->product_sale_price)) ? $orderProduct->product_sale_price : ((isset($orderProduct->product_price)) ? $orderProduct->product_price : 0);
                                  $total = $total + $orderProductPrice;
                                  ?>
                                  <tr>
                                      <td class="col-xs-2" align="center">
                                        <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
                                        <span class="cartImage" style="float: none;"><img src="<?= $prdImage; ?>" alt="image" width="70px"></span>
                                      </td>
                                      <td class="col-xs-4"><?= $orderProduct->product_name; ?></td>
                                      <td class="col-xs-2"><?= $orderProductPrice; ?></td>
                                      <td class="col-xs-2">1</td>
                                      <td class="col-xs-2"><?= $orderProductPrice; ?></td>
                                    </tr>
                                  <?php
                                //}
                              }
                            }else{
                              ?>
                              <tr><td colspan="5" align="center"> No Results Found</td></tr>
                              <?php
                            }
                            ?>
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
              </div>
            </div>
          </div>
          <div class="col-xs-12">
            <div class="btn-group" role="group" aria-label="...">
              <!--<button type="button" class="btn btn-default printMe">Print</button>-->
              <!--<button type="button" class="btn btn-default">Save to pdf</button>-->
              <?php
              echo Html::a('Invoice', ['/mysales/invoice/1'], [
                  'class'=>'btn btn-default', 
                  'target'=>'_blank', 
                  'data-toggle'=>'tooltip', 
                  'title'=>'Will open the generated PDF file in a new window'
              ]);
              ?>
              <!--<button type="button" class="btn btn-default">cancel order</button>-->
            </div>
          </div>
        </div>
      </div>
    </div>
</div>










<?php /* ?>

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Order Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-detail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'order_id',
            'category_name',
            'subcategory_name',
            'product_id',
            'product_code:ntext',
            'product_name:ntext',
            'product_seo:ntext',
            'product_owner_id',
            'seller_name',
            'product_price',
            'product_material',
            'product_color',
            'product_height',
            'product_length',
            'product_breadth',
            'product_weight',
            'product_description:ntext',
            'created_on',
        ],
    ]) ?>

</div>
<?php */ ?>