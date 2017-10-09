<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\defaults\models\Company */

$this->title = 'Update Company';
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="page-title for">
  <h1>
    <?= Html::encode($this->title) ?>
  </h1>
</div>
<div class="col-lg-12">
  <?= $this->render('_form', ['model' => $model]) ?>
</div>
