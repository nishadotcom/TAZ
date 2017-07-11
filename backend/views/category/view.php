<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model backend\models\Category */
$this->title = 'View Category';
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'category_name',
            'category_description:ntext',
            'category_image',
            'category_status',
            'created_on',
            'updated_on',
        ],
    ]) ?>
    <p>

      <?= Html::a('&laquo; Back', ['category/index'], ['class' => 'btn btn-default']) ?>
    </p>
</div>
