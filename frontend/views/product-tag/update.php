<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\ProductTag */

$this->title = 'Update Product Tag: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Product Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-tag-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
