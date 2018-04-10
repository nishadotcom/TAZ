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
        <?= Html::a('Add Slideshow', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php if (Yii::$app->session->getFlash('msg')) { ?>
             <?= Yii::$app->session->getFlash('msg'); ?>
               </div>
           <?php } else if (Yii::$app->session->getFlash('error')) { ?>
                <?= Yii::$app->session->getFlash('error'); ?>
               </div>
           <?php } ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'title:ntext',
            'description:ntext',
            //'image_name',
            'status',
            // 'order_by',
            'created_on',
            //'modified_on',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Action',
                'template' => "{delete}",
                'headerOptions' => ['style' => 'width:40px;'],

            ],
        ],
    ]); ?>
</div>
