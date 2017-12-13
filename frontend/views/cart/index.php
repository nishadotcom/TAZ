<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CartSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cart';
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="mainContent clearfix cartListWrapper">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="cartListInner">
                    <form action="#">
                        <div class="table-responsive">
                              <?= GridView::widget([
  'dataProvider' => $dataProvider,
  'filterModel' => $searchModel,
  'columns' => [
  ['class' => 'yii\grid\SerialColumn'],

  //'id',
  //'cart_user_id',
  //'cart_product_category_name',
  //'cart_product_subcategory_NAME',
  //'cart_product_id',
  // 'cart_product_code:ntext',
   'cart_product_name:ntext',
  // 'cart_product_seo:ntext',
  // 'cart_product_owner_id',
   'cart_product_price',
  // 'cart_product_material',
  // 'cart_product_color',
  // 'cart_product_dimension_type',
  // 'cart_product_height',
  // 'cart_product_length',
  // 'cart_product_breadth',
  // 'cart_product_weight',
  // 'cart_product_short_description:ntext',
  // 'cart_product_long_description:ntext',
  // 'cart_product_discount',
   'cart_product_quantity',
  // 'product_available_status',
  // 'cart_added_on',

  ['class' => 'yii\grid\ActionColumn'],
  ],
  ]); ?>
                            <!--<table class="table">
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
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <span class="cartImage"><img src="img/products/cart-image.jpg" alt="image"></span>
                                        </td>
                                        <td class="col-xs-4">Italian Winter Hat</td>
                                        <td class="col-xs-2">$ 99.00</td>
                                        <td class="col-xs-2"><input type="text" placeholder="1"></td>
                                        <td class="col-xs-2">$ 99.00</td>
                                    </tr>
                                    <tr>
                                        <td class="col-xs-2">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <span class="cartImage"><img src="img/products/cart-image.jpg" alt="image"></span>
                                        </td>
                                        <td class="col-xs-4">Italian Winter Hat</td>
                                        <td class="col-xs-2">$ 99.00</td>
                                        <td class="col-xs-2"><input type="text" placeholder="1"></td>
                                        <td class="col-xs-2">$ 99.00</td>
                                    </tr>
                                    <tr>
                                        <td class="col-xs-2">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <span class="cartImage"><img src="img/products/cart-image.jpg" alt="image"></span>
                                        </td>
                                        <td class="col-xs-4">Italian Winter Hat</td>
                                        <td class="col-xs-2">$ 99.00</td>
                                        <td class="col-xs-2"><input type="text" placeholder="1"></td>
                                        <td class="col-xs-2">$ 99.00</td>
                                    </tr>
                                </tbody>
                            </table>-->
                        </div>
                        <div class="updateArea">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="I have a discount coupon" aria-describedby="basic-addon2">
                                <a href="#" class="btn input-group-addon" id="basic-addon2">apply coupon</a>
                            </div>
                            <a href="#" class="btn">update cart</a>
                        </div>
                        <div class="row totalAmountArea">
                            <div class="col-sm-4 col-sm-offset-8 col-xs-12">
                                <ul class="list-unstyled">
                                    <li>Sub Total <span>$ 792.00</span></li>
                                    <li>UK Vat <span>$ 18.00</span></li>
                                    <li>Grand Total <span class="grandTotal">$ 810.00</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="checkBtnArea">
                            <a href="checkout-step-1.html" class="btn btn-primary btn-block">checkout<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php /* ?>
  <div class="cart-index">

  <h1><?= Html::encode($this->title) ?></h1>
  <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  <p>
  <?= Html::a('Create Cart', ['create'], ['class' => 'btn btn-success']) ?>
  </p>
  <?= GridView::widget([
  'dataProvider' => $dataProvider,
  'filterModel' => $searchModel,
  'columns' => [
  ['class' => 'yii\grid\SerialColumn'],

  'id',
  'cart_user_id',
  'cart_product_category_name',
  'cart_product_subcategory_NAME',
  'cart_product_id',
  // 'cart_product_code:ntext',
  // 'cart_product_name:ntext',
  // 'cart_product_seo:ntext',
  // 'cart_product_owner_id',
  // 'cart_product_price',
  // 'cart_product_material',
  // 'cart_product_color',
  // 'cart_product_dimension_type',
  // 'cart_product_height',
  // 'cart_product_length',
  // 'cart_product_breadth',
  // 'cart_product_weight',
  // 'cart_product_short_description:ntext',
  // 'cart_product_long_description:ntext',
  // 'cart_product_discount',
  // 'cart_product_quantity',
  // 'product_available_status',
  // 'cart_added_on',

  ['class' => 'yii\grid\ActionColumn'],
  ],
  ]); ?>
  </div>
  <?php */ ?>