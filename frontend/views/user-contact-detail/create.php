<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UserContactDetail */

$this->title = 'Add Contact Details';
$this->params['breadcrumbs'][] = ['label' => 'Contact Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-contact-detail-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
