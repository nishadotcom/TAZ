<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Slideshow */

$this->title = 'Update Slideshow';
$this->params['breadcrumbs'][] = ['label' => 'Slideshows', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="slideshow-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
