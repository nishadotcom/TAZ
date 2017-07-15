<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserContactDetail */

$this->title = 'Update Contact Details';
$this->params['breadcrumbs'][] = ['label' => 'Contact Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-contact-detail-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
