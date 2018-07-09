<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\widgets\ProfileMenu;

/* @var $this yii\web\View */
/* @var $model frontend\models\Order */

$this->title = 'Order - '.$model->order_code;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->order_code;
$shippingAddress = $model->orderAddress[0];
$billingAddress  = $model->orderAddress[1];
?>

<div class="row">
         <?= ProfileMenu::widget(); ?>
</div>

<div class="row">
    <div class="col-xs-12">
      <div class="innerWrapper singleOrder">
        <div class="orderBox">
          <h4>Order #<?= $model->order_code; ?></h4>
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
          </div>
          <div class="col-xs-12">
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
          </div>
          <div class="col-xs-12">
            <div class="btn-group" role="group" aria-label="...">
              <button type="button" class="btn btn-default">Print</button>
              <button type="button" class="btn btn-default">Save to pdf</button>
              <button type="button" class="btn btn-default">cancel order</button>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>


<div class="order-view">

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
            'user_id',
            'order_code',
            'total_amount',
            'payment_status',
            'order_status',
            'order_date',
        ],
    ]) ?>

</div>
