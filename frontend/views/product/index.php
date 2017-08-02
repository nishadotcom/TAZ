<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
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
