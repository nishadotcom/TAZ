<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\FeatureSeller */

//$this->title = $model->id;
$this->title = 'Feature Seller';
$this->params['breadcrumbs'][] = ['label' => 'Feature Sellers', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = 'View';
?>
<div class="feature-seller-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'seller_id',
            [
              'label' => 'Seller Name',
              'value' => $model->sellerDetail->firstname.' ' .$model->sellerDetail->lastname
            ],
            'date_from',
            'date_to',
            'status',
            //'created_on',
        ],
    ]) ?>

</div>
