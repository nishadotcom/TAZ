<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ProductAddressSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Product Addresses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-address-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product Address', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'product_id',
            'street',
            'city',
            'state',
            // 'country',
            // 'pin_code',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
