<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserBankAccountDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Bank Account Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-bank-account-detail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User Bank Account Detail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'account_number',
            'ifsc',
            'pan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
