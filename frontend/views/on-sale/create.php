<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\OnSale */

$this->title = 'Create On Sale';
$this->params['breadcrumbs'][] = ['label' => 'On Sales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="on-sale-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
