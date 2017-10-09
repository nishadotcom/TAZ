<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\defaults\models\DefectStatus */

$this->title = 'Add Defect Status';
$this->params['breadcrumbs'][] = ['label' => 'Defect Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="page-title for">
  <h1>
    <?= Html::encode($this->title) ?>
  </h1>
</div>
  <div class="col-lg-12">
    <?= $this->render('_form', ['model' => $model]) ?>
  </div>
