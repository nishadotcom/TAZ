<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\widgets\ProfileMenu;
use frontend\models\OrderDetail;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\OrderDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'My Sales';
$this->params['breadcrumbs'][] = $this->title;
//echo '<pre>';
//print_r($dataProvider->query->sum('product_price'));
//exit;
?>

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
                        //'template'=>'{items}{summary}{pager}',
                        'layout' => "{items}{pager}", //{sorter}{pager}{summary}
                        'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                                [
                                'attribute' => 'order_code',
                                //'value' => 'order.order_code',
                                'format' => 'raw',
                                'value' => function($model) {
                                    return Html::a($model->order->order_code, 'mysales/view/' . $model->order->id, ['style' => 'color:inherit']);
                                },
                            ],
                            //'product_name:ntext',
                            [
                                'attribute' => 'product_price',
                                //'value' => 'product_price',
                                'value' => function($model) use ($dataProvider) {
                                    return OrderDetail::orderTotalAmountbyOrderId($model->order->id);
                                    //return $dataProvider->query->sum('product_price');
                                },
                                'header' => 'Total Amount',
                                'filter' => false
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
                                    if ($model->order->order_status == 'IN-PROGRESS') {
                                        return '<span class="label label-primary" style="margin-bottom:0px">Processing</span>';
                                        //return 'Proccessing';
                                    } else {
                                        return '<span class="label label-info" style="margin-bottom:0px">' . $model->order->order_status . '</span>';
                                        //return $model->order_status;
                                    }
                                    //return ($model->order_status == 'AFA') ? 'Awaiting for Approval' : $model->product_status;
                                },
                            /* 'filter' => ArrayHelper::map(Category::find()->asArray()->all(), 'id', 'category_name'),
                              'value' => function($model){
                              return $model->productCategory->category_name;
                              } */
                            ],
                            //'id',
                            //'order_id',    
                            //'category_name',
                            //'subcategory_name',
                            //'product_id',
                            //'product_code:ntext',
                            //'product_seo:ntext',
                            //'product_owner_id',
                            //'seller_name',
                            //'product_price',
                            //'product_material',
                            //'product_color',
                            //'product_height',
                            //'product_length',
                            //'product_breadth',
                            //'product_weight',
                            //'product_description:ntext',
                            //'created_on',
                            //['class' => 'yii\grid\ActionColumn'],
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
                                'urlCreator' => function($action, $model, $key, $index) {
                                    if ($action === 'view') {
                                        $url = 'mysales/view/' . $model->order->id;
                                        return $url;
                                    }
                                },
                                'contentOptions' => ['style' => 'text-align:center']
                            ],
                        ],
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php /* ?>
  <div class="order-detail-index">

  <h1><?= Html::encode($this->title) ?></h1>
  <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  <p>
  <?= Html::a('Create Order Detail', ['create'], ['class' => 'btn btn-success']) ?>
  </p>

  <?= GridView::widget([
  'dataProvider' => $dataProvider,
  'filterModel' => $searchModel,
  'columns' => [
  ['class' => 'yii\grid\SerialColumn'],

  'id',
  'order_id',
  'category_name',
  'subcategory_name',
  'product_id',
  //'product_code:ntext',
  //'product_name:ntext',
  //'product_seo:ntext',
  //'product_owner_id',
  //'seller_name',
  //'product_price',
  //'product_material',
  //'product_color',
  //'product_height',
  //'product_length',
  //'product_breadth',
  //'product_weight',
  //'product_description:ntext',
  //'created_on',

  ['class' => 'yii\grid\ActionColumn'],
  ],
  ]); ?>
  </div>
  <?php */ ?>