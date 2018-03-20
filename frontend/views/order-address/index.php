<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\OrderAddressSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Order Addresses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-address-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Order Address', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'order_id',
            'name',
            'address',
            'city',
            //'state',
            //'country',
            //'pin_code',
            //'phone',
            //'address_type',
            //'created_on',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
