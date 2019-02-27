<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\OnSaleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'On Sales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="on-sale-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create On Sale', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'on_sale_product_id',
            'discount',
            'status',
            'created_on',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
