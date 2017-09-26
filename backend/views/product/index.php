<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Category;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //echo Html::a('Add Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            
            [
				'attribute'=>'product_category_id',
				'filter' => ArrayHelper::map(Category::find()->asArray()->all(), 'id', 'category_name'),
				'value' => function($model){
					return $model->productCategory->category_name;
				}
            ],
            'product_code',
            'product_name',
            [
				'attribute' => 'product_owner_id',
				'value' => function($model){
					return $model->productOwner->firstname.' '.$model->productOwner->lastname;
				}
            ],
            //'product_status',
            [
				'attribute'=>'product_status',
				'filter'=>array('AFA'=>'Awaiting for Approval', 'Active'=>'Active', 'Suspended'=>'Suspended', 'Deleted'=>'Deleted', 'Denied'=>'Denied', 'Needs Improvement'=>'Needs Improvement'),
				'value' => function ($model) {
					return ($model->product_status == 'AFA') ? 'Awaiting for Approval' : $model->product_status;
				}
			],
			
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Action',
                'headerOptions' => ['style' => 'width:40px;'],
				'template' => '{update}',
				'contentOptions' => ['style'=>'text-align:center']
            ],
        ],
    ]); ?>
</div>
