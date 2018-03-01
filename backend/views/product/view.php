<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model backend\models\Category */
$this->title = 'View Product';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'product_name',
            'product_code',
            [
              'label' => 'Seller Name',
              'value' => $model->productOwner->firstname.' ' .$model->productOwner->lastname
            ],
            //'category_image',
            'product_long_description',
            [
                'label' => 'Status',
                'value' => ($model->product_status == 'AFA') ? 'Awaiting for Approval' : $model->product_status,
            ],
            'created_on',
            'updated_on',
        ],
    ]) ?>
    <p>

      <?= Html::a('&laquo; Back', ['product/index'], ['class' => 'btn btn-default']) ?>
    </p>
</div>
