<?php

use yii\helpers\Html;
use frontend\widgets\ProfileMenu;
/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = 'Update Product: ' . $model->product_name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="row">
         <?= ProfileMenu::widget(); ?>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="innerWrapper">
			<div class="orderBox profile">
				<div class="row">
				<?= $this->render('_form', [
				'model' => $model,
				//'imageModel' => $imageModel,
				//'addressModel' => $addressModel
				]) ?>
				<!--</div>-->
				</div>
			</div>
		</div>
	</div>
</div>

<?php /* ?>
<div class="product-update">

    <h1><?= Html::encode($this->title) ?></h1> 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<?php */ ?>