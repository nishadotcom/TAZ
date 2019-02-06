<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\UserFavorite */

$this->title = 'Create User Favorite';
$this->params['breadcrumbs'][] = ['label' => 'User Favorites', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-favorite-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
