<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

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
            'product_category_id',
            'product_subcategory_id',
            'product_code:ntext',
            'product_name:ntext',
            'product_owner_id',
            'product_price',
            'product_sale_price',
            'product_retail_price',
            'product_material',
            'product_color',
            'product_dimension_type',
            'product_height',
            'product_length',
            'product_breadth',
            'product_weight',
            'product_short_description:ntext',
            'product_long_description:ntext',
            'product_discount_status',
            'product_guarantee_status',
            'product_status',
            'created_on',
            'updated_on',
        ],
    ]) ?>

</div>
