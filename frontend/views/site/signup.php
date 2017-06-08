<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
		<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
		  <div class="panel panel-default">
			<div class="panel-heading"><h3>sing up</h3></div>
			<div class="panel-body">
			  <form action="" method="POST" role="form">
				<div class="form-group">
				  <label for="">First Name</label>
				  <input type="text" class="form-control" id="">
				</div>
				<div class="form-group">
				  <label for="">Last Name</label>
				  <input type="text" class="form-control" id="">
				</div>
				<div class="form-group">
				  <label for="">Enter Email</label>
				  <input type="email" class="form-control" id="">
				</div>
				<div class="form-group">
				  <label for="">Password</label>
				  <input type="password" class="form-control" id="">
				</div>
				<button type="submit" class="btn btn-primary btn-block">Submit</button>
				<button type="button" class="btn btn-link btn-block"><span>All have an account?</span> Log in</button>
			  </form>
			</div>
		  </div>
		</div>
	  </div>

<!-- OLD CODE --> 
<?php /* ?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<?php */ ?>
