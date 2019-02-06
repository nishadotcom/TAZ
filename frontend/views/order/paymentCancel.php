<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\models\Cart;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CartSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Order Summary';
$this->params['breadcrumbs'][] = $this->title;
//$pathPrdImg   = Yii::$app->params['PATH_PRODUCT_IMAGE'];
//$prdNoImg     = 'noImage.jpg';
?>

<section class="mainContent clearfix setp5">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="thanksContent">
                    <h3 style="text-align: center;">Did you face any issue(s) while trying to place the order?</h3>
                    <h5>Would you like try again? Click Here.</h5>
                    <?php /* ?>
                      <h3>Shipping Details</h3>
                      <div class="thanksInner">
                      <div class="row">
                      <div class="col-sm-6 col-xs-12 tableBlcok">
                      <address>
                      <span>Shipping address:</span>
                      <address>
                      <strong><?= $addressData->name; ?></strong><br>
                      <?php echo $addressData->address.','; ?> <br>
                      <?php echo $addressData->city.','.$addressData->state.','; ?> <br>
                      <?php echo $addressData->country.'-'.$addressData->pin_code; ?>
                      </address>
                      <br>
                      <span>Email:</span> <a href="mailto:<?= $email; ?>"><?= $email; ?></a> <br>
                      <span>Phone:</span> <?= $phone; ?>
                      </address>
                      </div>
                      <div class="col-sm-6 col-xs-12">
                      <div class="well">
                      <h2><small>Order ID</small><?= $orderId; ?></h2>
                      </div>
                      </div>
                      </div>
                      </div>
                      <?php */ ?>
                </div>
            </div>
        </div>
    </div>
</section>