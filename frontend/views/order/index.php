<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\widgets\ProfileMenu;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'My Orders';
$this->params['breadcrumbs'][] = $this->title;
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
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'layout'=>"{items}{pager}",
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            //'id',
                            //'user_id',
                            //'order_code',
                            [
                               'attribute'=>'order_code',
                               'format'=>'raw',
                               'value'=>function($model){
                                  return Html::a($model->order_code, 'order/'.$model->id, ['style'=>'color:inherit']);
                               },
                            ],
                            [
                               'attribute'=>'total_amount',
                               //'headerOptions' => ['style' => 'width:150px;'],
                            ],
                            //'payment_status',
                            //'order_status',
                            [
                                'attribute'=>'order_status',
                                'format'=>'html',
                                'filter' => ['New'=>'New', 'IN-PROGRESS'=>'Processing','SHIPPED'=>'Shipped','DELIVERED'=>'Delivered', 'USER CANCELLED'=>'User Canceled'],
                                //'NEW','IN-PROGRESS','SHIPPED','DELIVERED','COMPLETED','CANCELLED','FAILED-TRANSACTION','USER CANCELLED'
                                'value' => function ($model) {
                                    if($model->order_status == 'IN-PROGRESS'){
                                        return '<span class="label label-primary" style="margin-bottom:0px">Processing</span>';
                                        //return 'Proccessing';
                                    }else{
                                      return '<span class="label label-info" style="margin-bottom:0px">'.$model->order_status.'</span>';
                                        //return $model->order_status;
                                    }
                                    //return ($model->order_status == 'AFA') ? 'Awaiting for Approval' : $model->product_status;
                                },
                                
                                /*'filter' => ArrayHelper::map(Category::find()->asArray()->all(), 'id', 'category_name'),
                                'value' => function($model){
                                    return $model->productCategory->category_name;
                                }*/
                            ],
                            //'order_date',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'header' => 'Action',
                                'headerOptions' => ['style' => 'width:40px;'],
                                //'template' => '<a href="#" class="btn btn-default">View</a>',
                                'template'=>'{view}',
                                'buttons'=>[
                                  'view'=>function($url){
                                    
                                    return Html::a(
                                      '<i class="fa fa-eye" aria-hidden="true"></i>',
                                      $url, 
                                      [
                                          'title' => 'View',
                                          'data-pjax' => '0',
                                          'class'=>'btn btn-default',
                                          'type'=>'button',
                                      ]
                                    );
                                  }
                                ],
                                'contentOptions' => ['style'=>'text-align:center']
                            ],
                            //['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>
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