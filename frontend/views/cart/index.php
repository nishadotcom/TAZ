<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CartSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Carts';
$this->params['breadcrumbs'][] = $this->title;
?>
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
            // 'cart_added_on',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
