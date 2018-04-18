<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\FeatureSeller */

$this->title = 'New Feature Seller';
$this->params['breadcrumbs'][] = ['label' => 'Feature Sellers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feature-seller-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
