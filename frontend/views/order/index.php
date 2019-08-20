<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\widgets\ProfileMenu;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'My Orders';
$this->params['breadcrumbs'][] = $this->title;
$pathPrdImg = Yii::$app->params['PATH_PRODUCT_IMAGE'];
$prdNoImg = 'noImage.jpg';
?>
<?php 
  //echo '<pre>';
  //print_r($model);
  //echo '</pre>'; //exit;
?>

<?php 
if($model){
  foreach ($model as $key => $order) {
    $orderProucts = $order->orderDetails;
    $shippingAddress = $order->orderAddress[0];
    ?>
      <div class="modal-content modal-order">
        <!-- Modal Header -->
        <div class="modal-header">
            <div>
                <div class="d-md-flex d-block">
                    <div class="p-2 col-12 col-md-3"><h4>Ordered On</h4>
                        <p class="p-white"><?php echo date('d M Y', strtotime($order->order_date)); ?></p>
                    </div>
                    <div class="p-2 col-12 col-md-2">
                        <h4>Amount</h4>
                        <p class="p-white"> <?php echo $order->total_amount; ?> </p>
                    </div>
                    <div class="p-2 col-12 col-md-2">
                        <h4 class="text-left">SHIP TO</h4>
                        <p class="text-left"><?php echo $shippingAddress->name; ?></p>
                    </div>
                    <div class="p-2 ml-auto col-12 col-md-4">
                        <h4 class="text-right"> Order # <?php echo $order->order_code; ?></h4>
                        <!--<a href="#" class="text-right">Order Details Invoice</a>-->
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal body -->
        <div class="modal-body order-info">
            <div class="row">
                <div class="col-12 col-lg-9 col-md-9 col-sm-9 col-xl-9">&nbsp;
                    <!--<h4 class="text-left">Delivered 27-Apr-2019</h4>
                    <p>Package was handed directly to the customer.</p>
                    <p>Signed by: Vijayakanth.</p>-->
                </div>
                <div class="col-12 col-lg-3 col-md-3 col-sm-3 col-xl-3 align-self-end">
                    <button type="button" class="btn btn-primary btn-sm w-100 track-btn">Track Package</button>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-9 col-md-9 col-sm-9 col-xl-9">&nbsp;</div>
                <div class="col-12 col-lg-3 col-md-3 col-sm-3 col-xl-3">&nbsp;</div>
            </div>

            
              <?php 
              if($orderProucts)
              {
                foreach ($orderProucts as $key => $orderProuct) {
                  ?>
                  <div class="row">
                  <div class="col-12 col-lg-9 col-md-9 col-sm-9 col-xl-9">
                    <div class="d-md-flex">
                        <div class="p-0 col-12 col-md-2">
                            <?php 
                            if(isset($orderProuct->productImages[0])){
                                $coverImage = ($orderProuct->productImages[0]->crop_image) ? $orderProuct->productImages[0]->crop_image : $orderProuct->productImages[0]->cover_photo;
                            }else{
                                $coverImage = '';
                            }
                            $prdImage   = (isset($orderProuct->productImages[0])) ? $pathPrdImg.$orderProuct->product_code.'/'.$coverImage : $pathPrdImg.$prdNoImg;
                            ?>
                            <img src="<?php echo $prdImage; ?>" class="img-fluid">
                        </div>
                        <div class="p-0 col-12 col-md-10 px-3 product-info">
                            <a href="#" title="Product" class="">
                                <h4><?php echo $orderProuct->product_name; ?> </h4>
                            </a>
                            <!--<p>Sold by: Cloudtail India</p>-->
                            <p><?php echo $orderProuct->product_description; ?> </p>
                            <p class="red-text"><?php echo $orderProuct->product_price; ?></p>
                            <!--<button type="button" class="btn btn-primary btn-sm product-info-btn ">Update</button>-->
                        </div>
                    </div>
                  </div>
                  <div class="col-12 col-lg-3 col-md-3 col-sm-3 col-xl-3 align-self-end">
                      <a href="#" class="btn btn-primary btn-sm w-100 review-btn" style="color: #fff;">
                          Write a Product Review
                      </a>
                  </div>
                  </div>
                  <hr>
                  <?php
                }
              }
              ?>            
        </div>
    </div>

    <?php
  } //foreach
} //if
?>





<?php /* ?>
<div class="row">
    <?= ProfileMenu::widget(); ?>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="innerWrapper">
            <div class="orderBox myOrders">
                <!--<h4>All Orders</h4>-->
                <div class="table-responsive">
                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'layout' => "{items}{pager}",
                        'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                            //'id',
                            //'user_id',
                            //'order_code',
                            [
                                'attribute' => 'order_code',
                                'format' => 'raw',
                                'value' => function($model) {
                                    return Html::a($model->order_code, 'order/' . $model->id, ['style' => 'color:inherit']);
                                },
                            ],
                                [
                                'attribute' => 'total_amount',
                            //'headerOptions' => ['style' => 'width:150px;'],
                            ],
                            //'payment_status',
                            //'order_status',
                            [
                                'attribute' => 'order_status',
                                'format' => 'html',
                                'filter' => ['New' => 'New', 'IN-PROGRESS' => 'Processing', 'SHIPPED' => 'Shipped', 'DELIVERED' => 'Delivered', 'USER CANCELLED' => 'User Canceled'],
                                //'NEW','IN-PROGRESS','SHIPPED','DELIVERED','COMPLETED','CANCELLED','FAILED-TRANSACTION','USER CANCELLED'
                                'value' => function ($model) {
                                    if ($model->order_status == 'IN-PROGRESS') {
                                        return '<span class="label label-primary" style="margin-bottom:0px">Processing</span>';
                                        //return 'Proccessing';
                                    } else {
                                        return '<span class="label label-info" style="margin-bottom:0px">' . $model->order_status . '</span>';
                                        //return $model->order_status;
                                    }
                                    //return ($model->order_status == 'AFA') ? 'Awaiting for Approval' : $model->product_status;
                                },
                             //'filter' => ArrayHelper::map(Category::find()->asArray()->all(), 'id', 'category_name'),
                              //'value' => function($model){
                              //return $model->productCategory->category_name;
                              //} 
                            ],
                            //'order_date',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'header' => 'Action',
                                'headerOptions' => ['style' => 'width:40px;'],
                                //'template' => '<a href="#" class="btn btn-default">View</a>',
                                'template' => '{view}',
                                'buttons' => [
                                    'view' => function($url) {

                                        return Html::a(
                                                        '<i class="fa fa-eye" aria-hidden="true"></i>', $url, [
                                                    'title' => 'View',
                                                    'data-pjax' => '0',
                                                    'class' => 'btn btn-default',
                                                    'type' => 'button',
                                                        ]
                                        );
                                    }
                                ],
                                'contentOptions' => ['style' => 'text-align:center']
                            ],
                        //['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]);
                    ?>
                  <!--<table class="table">
                    <thead>
                      <tr>
                        <th>Order ID</th>
                        <th>Date</th>
                        <th>Items</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>#451231</td>
                        <td>Mar 25, 2016</td>
                        <td>2</td>
                        <td>$99.00</td>
                        <td><span class="label label-primary">Processing</span></td>
                        <td><a href="#" class="btn btn-default">View</a></td>
                      </tr>
                      <tr>
                        <td>#451231</td>
                        <td>Mar 25, 2016</td>
                        <td>3</td>
                        <td>$150.00</td>
                        <td><span class="label label-success">Completed</span></td>
                        <td><a href="#" class="btn btn-default">View</a></td>
                      </tr>
                      <tr>
                        <td>#451231</td>
                        <td>Mar 25, 2016</td>
                        <td>3</td>
                        <td>$150.00</td>
                        <td><span class="label label-danger">Canceled</span></td>
                        <td><a href="#" class="btn btn-default">View</a></td>
                      </tr>
                      <tr>
                        <td>#451231</td>
                        <td>Mar 25, 2016</td>
                        <td>2</td>
                        <td>$99.00</td>
                        <td><span class="label label-info">On Hold</span></td>
                        <td><a href="#" class="btn btn-default">View</a></td>
                      </tr>
                      <tr>
                        <td>#451231</td>
                        <td>Mar 25, 2016</td>
                        <td>3</td>
                        <td>$150.00</td>
                        <td><span class="label label-warning">Pending</span></td>
                        <td><a href="#" class="btn btn-default">View</a></td>
                      </tr>
                    </tbody>
                  </table>-->
                </div>
            </div>
        </div>
    </div>
</div>
<?php */ ?>

<?php /* ?>
  <div class="order-index">

  <h1><?= Html::encode($this->title) ?></h1>
  <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  <p>
  <?= Html::a('Create Order', ['create'], ['class' => 'btn btn-success']) ?>
  </p>

  <?= GridView::widget([
  'dataProvider' => $dataProvider,
  'filterModel' => $searchModel,
  'columns' => [
  ['class' => 'yii\grid\SerialColumn'],

  'id',
  'user_id',
  'order_code',
  'total_amount',
  'payment_status',
  //'order_status',
  //'order_date',

  ['class' => 'yii\grid\ActionColumn'],
  ],
  ]); ?>
  </div>
  <?php */ ?>