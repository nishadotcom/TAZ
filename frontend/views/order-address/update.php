<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\OrderAddress */

$this->title = 'Update Order Address: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Order Addresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="order-address-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
