<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\models\User;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\FeatureSellerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Feature Sellers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feature-seller-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add New Feature Seller', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'seller_id',
            [
                'attribute'=>'seller_id',
                //'filter' => ArrayHelper::map(Category::find()->asArray()->all(), 'id', 'category_name'),
                'value' => function($model){
                    return $model->sellerDetail->firstname.' '.$model->sellerDetail->lastname;
                }
            ],
            'date_from',
            'date_to',
            //'status',
            [
                'attribute'=>'status',
                'filter'=>array('Active'=>'Active', 'Suspended'=>'Suspended'),
                'value' => function ($model) {
                    return $model->status;
                }
            ],
            // 'created_on',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
