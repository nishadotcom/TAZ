<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\widgets\ProfileMenu;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'My Products';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
         <?= ProfileMenu::widget(); ?>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="innerWrapper">
            <div class="orderBox myAddress">
                <h4><a class="btn btn-md btn-success-filled btn-rounded" href="<?php echo Yii::$app->homeUrl.'product/create'; ?>" title="Add New Product">Add New Product</a></h4>
                <div class="table-responsive">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'pager'=>[
                            'firstPageLabel'=>'First',
                            'lastPageLabel'=>'Last'
                            //'maxButtonCount' => 2,
                            /*'options'=>[
                                'tag' => 'ul',
                                'class' => 'Page navigation',
                            ]*/
                        ],
                        'layout'=>"{items}{summary}{pager}",
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            //'id',
                            //'product_category_id',
                            //'product_subcategory_id',
                            'product_code:ntext',
                            'product_name:ntext',
                            // 'product_owner_id',
                            'product_price',
                            //'product_sale_price',
                            // 'product_retail_price',
                            // 'product_material',
                            // 'product_color',
                            // 'product_dimension_type',
                            // 'product_height',
                            // 'product_length',
                            // 'product_breadth',
                            // 'product_weight',
                            // 'product_short_description:ntext',
                            // 'product_long_description:ntext',
                            // 'product_discount_status',
                            // 'product_guarantee_status',
                            //'product_status',
                            [
                                'attribute'=>'product_status',
                                'filter'=>array('AFA'=>'Awaiting for Approval', 'Active'=>'Active', 'Suspended'=>'Suspended', 'Deleted'=>'Deleted', 'Denied'=>'Denied', 'Needs Improvement'=>'Needs Improvement'),
                                'value' => function ($model) {
                                    return ($model->product_status == 'AFA') ? 'Awaiting for Approval' : $model->product_status;
                                }
                            ],
                            // 'created_on',
                            // 'updated_on',
                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>
              </div>
            </div>
        </div>
    </div>
</div>
