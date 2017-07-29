<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
		<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
		  <div class="panel panel-default">
			<div class="panel-heading"><h3>sing up</h3></div>
			<div class="panel-body">
				  <?= Yii::$app->session->getFlash('msg'); ?>

			 <?php $form = ActiveForm::begin(['id' => 'signup-form']); ?>
				<div class="form-group">
				  <label for="">First Name</label>
				<?= $form->field($model, 'firstname')->textInput(array('maxlength' => 30, 'placeholder' => 'First Name','class'=>'form-control'))->label(false) ?>
				</div>

				<div class="form-group">
				  <label for="">Last Name</label>
				<?= $form->field($model, 'lastname')->textInput(array('maxlength' => 30, 'placeholder' => 'Last Name','class'=>'form-control'))->label(false) ?>
				</div>

				<div class="form-group">
				  <label for="">Email</label>
				 <?= $form->field($model, 'email')->textInput(array('maxlength' => 30, 'placeholder' => 'Email','class'=>'form-control'))->label(false) ?>
				</div>
				<div class="form-group">
				  <label for="">Mobile</label>
				 <?= $form->field($model, 'mobile')->textInput(array('maxlength' => 15, 'placeholder' => 'Mobile','class'=>'form-control'))->label(false) ?>
				</div>
				<div class="form-group">
				  <label for="">Password</label>
				   <?= $form->field($model, 'password')->passwordInput(array('maxlength' => 30, 'placeholder' => 'Password','class'=>'form-control'))->label(false) ?>
				</div>
				<button type="submit" class="btn btn-primary btn-block">Submit</button>
				<button type="button" class="btn btn-link btn-block"><span>All have an account?</span> Log in</button>
			  <?php ActiveForm::end(); ?>
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
