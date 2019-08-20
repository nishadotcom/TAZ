<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\widgets\ProfileMenu;

$this->title = 'Profile';
?>
<div id="my-bio" class="tabcontent">
<div class="container">
<div class="row">

<div class="col-12 col-lg-2 col-md-2 col-sm-2 col-xl-2">

                    <div class="thumbnail">
                       
                        <img src="../TEMPLATE/img/profile-pic-3.jpg" class="img-fluid rounded">
                    </div>
                </div>
                
                <div class="col-12 col-lg-10 col-md-10 col-sm-10 col-xl-10">
                    <?php $form = ActiveForm::begin(['id' => 'signup-form', 'options' => ['enctype' => 'multipart/form-data']]); ?>
                    <div class="form-group">
                        <label for="" class="col-md-2 col-sm-3 control-label">First Name</label>
                        <div class="col-md-10 col-sm-9">
                            <?= $form->field($usermodel, 'firstname')->textInput(array('maxlength' => 30, 'placeholder' => 'First Name', 'class' => 'form-control'))->label(false) ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-2 col-sm-3 control-label">Last Name</label>
                        <div class="col-md-10 col-sm-9">
                            <?= $form->field($usermodel, 'lastname')->textInput(array('maxlength' => 30, 'placeholder' => 'Last Name', 'class' => 'form-control'))->label(false) ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-2 col-sm-3 control-label">Mobile</label>
                        <div class="col-md-10 col-sm-9">
                            <?= $form->field($usermodel, 'mobile')->textInput(array('maxlength' => 15, 'placeholder' => 'Mobile', 'class' => 'form-control'))->label(false) ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-2 col-sm-3 control-label">Email Address</label>
                        <div class="col-md-10 col-sm-9">
                            <?= $form->field($usermodel, 'email')->textInput(array('maxlength' => 30, 'placeholder' => 'Email', 'class' => 'form-control', 'readonly' => true))->label(false) ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-2 col-sm-3 control-label">Profile Image</label>
                        <div class="col-md-10 col-sm-9">
                            <?= $form->field($usermodel, 'profile_image')->fileInput()->label(false); ?>
                            <?= Html::activeHiddenInput($usermodel, 'profile_image', ['type' => 'hidden', 'name' => 'User[existing_profile_image]', 'value' => $usermodel->profile_image]); ?>
                       <!--<span>Upload Formats:&nbsp;jpg,png,jpeg</span>-->
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="" class="col-md-2 col-sm-3 control-label">About Me</label>
                        <div class="col-md-10 col-sm-9">
                            <?= $form->field($UserDetailModel, 'long_about_me')->textarea(['rows' => 8, 'name' => 'long_about_me', 'id' => 'long_about_me'])->label(false) ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="" class="col-md-2 col-sm-3 control-label">My Intesrest</label>
                        <div class="col-md-10 col-sm-9">
                            <?= $form->field($UserDetailModel, 'my_interest')->textarea(['rows' => 4, 'name' => 'my_interest', 'id' => 'my_interest'])->label(false); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-10 col-md-2 col-sm-offset-9 col-sm-3">
                            <button type="submit" class="btn btn-primary btn-block">SAVE INFO</button>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>






  </div>
<?php /* ?>
<div class="row">
    <?= ProfileMenu::widget(); ?>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="innerWrapper profile">
            <div class="row">
                <div class="col-md-2 col-sm-3 col-xs-12">
                    <div class="thumbnail">
                        <?php
                        if (!empty($usermodel->profile_image)) {
                            $image_name = $usermodel->profile_image;
                        } else {
                            $image_name = 'no_image_thumb.gif';
                        }
                        ?>
                        <img src="<?php echo Yii::$app->homeUrl . Yii::$app->params['PROFILE_IMAGE_UPLOAD_PATH_FRONTEND'] . $image_name; ?>">
                    </div>
                </div>
                <div class="col-md-10 col-sm-9 col-xs-12">
                    <?php //Yii::$app->session->getFlash('msg'); ?>
                    <?php $form = ActiveForm::begin(['id' => 'signup-form', 'options' => ['enctype' => 'multipart/form-data']]); ?>
                    <div class="form-group">
                        <label for="" class="col-md-2 col-sm-3 control-label">First Name</label>
                        <div class="col-md-10 col-sm-9">
                            <?= $form->field($usermodel, 'firstname')->textInput(array('maxlength' => 30, 'placeholder' => 'First Name', 'class' => 'form-control'))->label(false) ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-2 col-sm-3 control-label">Last Name</label>
                        <div class="col-md-10 col-sm-9">
                            <?= $form->field($usermodel, 'lastname')->textInput(array('maxlength' => 30, 'placeholder' => 'Last Name', 'class' => 'form-control'))->label(false) ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-2 col-sm-3 control-label">Mobile</label>
                        <div class="col-md-10 col-sm-9">
                            <?= $form->field($usermodel, 'mobile')->textInput(array('maxlength' => 15, 'placeholder' => 'Mobile', 'class' => 'form-control'))->label(false) ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-2 col-sm-3 control-label">Email Address</label>
                        <div class="col-md-10 col-sm-9">
                            <?= $form->field($usermodel, 'email')->textInput(array('maxlength' => 30, 'placeholder' => 'Email', 'class' => 'form-control', 'readonly' => true))->label(false) ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-2 col-sm-3 control-label">Profile Image</label>
                        <div class="col-md-10 col-sm-9">
                            <?= $form->field($usermodel, 'profile_image')->fileInput()->label(false); ?>
                            <?= Html::activeHiddenInput($usermodel, 'profile_image', ['type' => 'hidden', 'name' => 'User[existing_profile_image]', 'value' => $usermodel->profile_image]); ?>
                       <!--<span>Upload Formats:&nbsp;jpg,png,jpeg</span>-->
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="" class="col-md-2 col-sm-3 control-label">About Me</label>
                        <div class="col-md-10 col-sm-9">
                            <?= $form->field($UserDetailModel, 'long_about_me')->textarea(['rows' => 8, 'name' => 'long_about_me', 'id' => 'long_about_me'])->label(false) ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="" class="col-md-2 col-sm-3 control-label">My Intesrest</label>
                        <div class="col-md-10 col-sm-9">
                            <?= $form->field($UserDetailModel, 'my_interest')->textarea(['rows' => 4, 'name' => 'my_interest', 'id' => 'my_interest'])->label(false); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-10 col-md-2 col-sm-offset-9 col-sm-3">
                            <button type="submit" class="btn btn-primary btn-block">SAVE INFO</button>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php */ ?>