<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UserBankAccountDetail */

$this->title = 'Create User Bank Account Detail';
$this->params['breadcrumbs'][] = ['label' => 'User Bank Account Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-bank-account-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
