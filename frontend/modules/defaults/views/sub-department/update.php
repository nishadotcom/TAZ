<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\defaults\models\SubDepartment */

$this->title = 'Update Subdepartment';
$this->params['breadcrumbs'][] = ['label' => 'Subdepartments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="page-title project">
  <h1>
    <?= Html::encode($this->title) ?>
  </h1>
</div>
<div class="row">
  <div class="col-lg-12">
    <?= $this->render('_form', ['model' => $model]) ?>
  </div>
</div>
	