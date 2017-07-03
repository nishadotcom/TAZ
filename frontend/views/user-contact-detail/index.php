<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserContactDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Contact Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-contact-detail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User Contact Detail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'mobile',
            'land_line_number',
            'street',
            // 'city',
            // 'state',
            // 'country',
            // 'pin_code',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
