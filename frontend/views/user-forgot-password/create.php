<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\UserForgotPassword */

$this->title = 'Forgot Password';
$this->params['breadcrumbs'][] = ['label' => 'Forgot Password', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-forgot-password-create">

    <?php /* ?><h1><?= Html::encode($this->title) ?></h1><?php */ ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
