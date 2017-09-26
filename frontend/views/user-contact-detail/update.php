<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserContactDetail */


if($model->type == 'shipping_address'){
  $title = 'shipping Address';
}else{
  $title = 'Billing Address';
}
$this->title = 'Update '.$title;
$this->params['breadcrumbs'][] = ['label' => 'My Address', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-contact-detail-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
