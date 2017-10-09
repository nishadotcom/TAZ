<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\defaults\models\SubDepartment */

$this->title = 'Add Subdepartment';
$this->params['breadcrumbs'][] = ['label' => 'Sub Departments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
  <div class="page-title for">
    <h1>
      <?= Html::encode($this->title) ?>
    </h1>
  </div>
</div>
<div class="">
  <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
