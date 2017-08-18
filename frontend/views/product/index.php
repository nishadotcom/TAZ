<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\widgets\ProfileMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
         <?= ProfileMenu::widget(); ?>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="innerWrapper">
            <div class="orderBox myAddress">
                <h4><a class="btn btn-lg btn-success-filled btn-rounded" href="<?php echo Yii::$app->homeUrl.'product/create'; ?>" title="Create New Product">Create New Product</a></h4>
                <div class="table-responsive">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            //'id',
                            //'product_category_id',
                            //'product_subcategory_id',
                            'product_code:ntext',
                            'product_name:ntext',
                            // 'product_owner_id',
                            'product_price',
                            'product_sale_price',
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
                            'product_status',
                            // 'created_on',
                            // 'updated_on',

                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>
                    <!--<table class="table">
                      <thead>
                        <tr>
                          <th>Code</th>
                          <th>Name</th>
                          <th>Status</th>
                          <th>Admin Note</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>#252125</td>
                          <td>Mar 25, 2016</td>
                          <td>Z - 45263</td>
                          <td>Lorem ipsum doler</td>
                            <td>
                                <a href="#" class="btn btn-default">View</a>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-default"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                    <button type="button" class="btn btn-default"><i class="fa fa-times" aria-hidden="true"></i></button>
                                </div>
                            </td>
                        </tr>
                      </tbody>
                    </table>-->
              </div>
            </div>
        </div>
    </div>
</div>

<?php /* ?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'product_category_id',
            'product_subcategory_id',
            'product_code:ntext',
            'product_name:ntext',
            // 'product_owner_id',
            // 'product_price',
            // 'product_sale_price',
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
            // 'product_status',
            // 'created_on',
            // 'updated_on',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
<?php */ ?>