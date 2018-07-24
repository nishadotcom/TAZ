<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\OrderDetail */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Order Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-detail-view">

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
            'order_id',
            'category_name',
            'subcategory_name',
            'product_id',
            'product_code:ntext',
            'product_name:ntext',
            'product_seo:ntext',
            'product_owner_id',
            'seller_name',
            'product_price',
            'product_material',
            'product_color',
            'product_height',
            'product_length',
            'product_breadth',
            'product_weight',
            'product_description:ntext',
            'created_on',
        ],
    ]) ?>

</div>
