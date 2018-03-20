<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\FeatureSeller */

$this->title = 'Update Feature Seller: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Feature Sellers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="feature-seller-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
