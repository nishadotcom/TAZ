<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\models\Cart;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CartSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cart';
$this->params['breadcrumbs'][] = $this->title;
$pathPrdImg   = Yii::$app->params['PATH_PRODUCT_IMAGE'];
$prdNoImg     = 'noImage.jpg';
?>

<section class="mainContent clearfix setp5">
        <div class="container">
          <div class="row">
            <div class="col-xs-12">
              <div class="thanksContent">
                <h2>Thank You For Your Order <small>You will receive an email of your order details</small></h2>
                <h3>Shipping Details</h3>
                <div class="thanksInner">
                  <div class="row">
                    <div class="col-sm-6 col-xs-12 tableBlcok">
                      <address>
                        <span>Shipping address:</span> <a href="mailto:adamsmith@bigbag.com">adamsmith@bigbag.com</a> <br>
                        <span>Email:</span> <a href="mailto:adamsmith@bigbag.com">adamsmith@bigbag.com</a> <br>
                        <span>Phone:</span> +884 5452 6432
                      </address>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                      <div class="well">
                        <h2><small>Order ID</small>9547</h2>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>