<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserForgotPassword */

$this->title = 'Forgot Password';
$this->params['breadcrumbs'][] = ['label' => 'Forgot Password', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<p>Password reset link has been sent to your email.</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php /* ?>
<div class="user-forgot-password-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'password_key',
            'expire_at',
            'status',
            'created_on',
        ],
    ]) ?>

</div>
<?php */ ?>