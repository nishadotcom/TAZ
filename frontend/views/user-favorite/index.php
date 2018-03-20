<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\UserFavoriteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Favorites';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-favorite-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User Favorite', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'product_id',
            'user_id',
            'favorited_on',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
