<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Cart */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Carts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cart-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'cart_user_id',
            'cart_product_category_name',
            'cart_product_subcategory_NAME',
            'cart_product_id',
            'cart_product_code:ntext',
            'cart_product_name:ntext',
            'cart_product_seo:ntext',
            'cart_product_owner_id',
            'cart_product_price',
            'cart_product_material',
            'cart_product_color',
            'cart_product_dimension_type',
            'cart_product_height',
            'cart_product_length',
            'cart_product_breadth',
            'cart_product_weight',
            'cart_product_short_description:ntext',
            'cart_product_long_description:ntext',
            'cart_product_discount',
            'cart_product_quantity',
            'cart_added_on',
        ],
    ]) ?>

</div>
