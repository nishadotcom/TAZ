<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\widgets\ProfileMenu;
$this->title = 'Profile';
?>
  <div class="row">
         <?= ProfileMenu::widget(); ?>
          </div>
          <div class="row">
           <div class="col-xs-12">
              <div class="innerWrapper profile">
                <div class="orderBox">
                  <h4>profile</h4>
                </div>
                <div class="row">
                  <div class="col-md-2 col-sm-3 col-xs-12">
                    <div class="thumbnail">
                      <img src="<?php echo Yii::$app->homeUrl.Yii::$app->params['PROFILE_IMAGE_UPLOAD_PATH_FRONTEND'] . $usermodel->profile_image?>" alt="profile-image">
                      <div class="caption">
                        <a href="#" class="btn btn-primary btn-block" role="button">Change Avatar</a>  
                      </div>
                    </div>
                  </div>
                  <div class="col-md-10 col-sm-9 col-xs-12">
                   <?= Yii::$app->session->getFlash('msg'); ?>
                 <?php $form = ActiveForm::begin(['id' => 'signup-form','options' => ['enctype' =>'multipart/form-data']]); ?>
                        <div class="form-group">
                          <label for="" class="col-md-2 col-sm-3 control-label">First Name</label>
                          <div class="col-md-10 col-sm-9">
                            <?= $form->field($usermodel, 'firstname')->textInput(array('maxlength' => 30, 'placeholder' => 'First Name','class'=>'form-control'))->label(false) ?>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="" class="col-md-2 col-sm-3 control-label">Last Name</label>
                          <div class="col-md-10 col-sm-9">
                            <?= $form->field($usermodel, 'lastname')->textInput(array('maxlength' => 30, 'placeholder' => 'Last Name','class'=>'form-control'))->label(false) ?>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="" class="col-md-2 col-sm-3 control-label">Mobile</label>
                          <div class="col-md-10 col-sm-9">
                            <?= $form->field($usermodel, 'mobile')->textInput(array('maxlength' => 10, 'placeholder' => 'Mobile','class'=>'form-control'))->label(false) ?>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="" class="col-md-2 col-sm-3 control-label">Email Address</label>
                          <div class="col-md-10 col-sm-9">
                            <?= $form->field($usermodel, 'email')->textInput(array('maxlength' => 30, 'placeholder' => 'Email','class'=>'form-control','readonly'=>true))->label(false) ?>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="" class="col-md-2 col-sm-3 control-label">Profile Image</label>
                             <div class="col-md-10 col-sm-9">
                           <?= $form->field($usermodel, 'profile_image')->fileInput()->label(false); ?>
                           <?= $form->field($usermodel, 'profile_image')->hiddenInput(['name' => 'User[existing_profile_image]','value' => $usermodel->profile_image])->label(false); ?> 
                           <?php if(!$usermodel->isNewRecord && $usermodel->profile_image) { ?>
                           <?php //echo $usermodel->profile_image; ?>
                           <?php } ?>
                           <span>Upload Formats:&nbsp;jpg,png,jpeg</span> 
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

