<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SlideshowSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Slideshows';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slideshow-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Slideshow', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title:ntext',
            'description:ntext',
            'image_name',
            'status',
            // 'order_by',
            // 'created_on',
            // 'modified_on',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
