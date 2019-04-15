<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\OnSale */

$this->title = 'Update On Sale: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'On Sales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="on-sale-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
