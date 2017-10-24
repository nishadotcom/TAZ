<?php

use yii\helpers\Html;
use frontend\widgets\ProfileMenu;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserAddress */

$this->title = 'Update Address';// . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'My Address', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="row">
    <?= ProfileMenu::widget(); ?>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="innerWrapper profile">
			<div class="orderBox">
				<h4><?= $type; ?> Address</h4>
			</div>
			<div class="row">
				<div class="col-md-10 col-sm-9 col-xs-12">
					<?= $this->render('_form', [
				        'model' => $model,
				    ]) ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php /* ?>
<div class="user-address-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div> <?php */ ?>
