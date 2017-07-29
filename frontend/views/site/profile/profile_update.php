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
                  <h4>Profile</h4>
                </div>
                <div class="row">
                  <div class="col-md-2 col-sm-3 col-xs-12">
                    <div class="thumbnail">
                      <?php if(!empty($usermodel->profile_image)) {
                        $image_name = $usermodel->profile_image;
                      }else{
                        $image_name = 'no_image_thumb.gif';
                      }
                        ?>
                      <img src="<?php echo Yii::$app->homeUrl.Yii::$app->params['PROFILE_IMAGE_UPLOAD_PATH_FRONTEND'] . $image_name; ?>">
                    <div class="caption">
                        <a href="#" class="btn btn-primary btn-block" role="button">Change Image</a>
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
                            <?= $form->field($usermodel, 'mobile')->textInput(array('maxlength' => 15, 'placeholder' => 'Mobile','class'=>'form-control'))->label(false) ?>
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
                           <?= Html::activeHiddenInput($usermodel, 'profile_image',['type' => 'hidden', 'name' => 'User[existing_profile_image]','value' => $usermodel->profile_image]); ?>
                          <span>Upload Formats:&nbsp;jpg,png,jpeg</span>
                           </div>
                        </div>
                           <?php if(!$usermodel->isNewRecord && $usermodel->profile_image) { ?>
                        <div class="form-group">
                          <label for="" class="col-md-2 col-sm-3 control-label">Existing Profile Image</label>
                          <div class="col-sm-2 col-sm-1">
                              <div class="thumbnail">
                          <img src="<?php echo Yii::$app->homeUrl.Yii::$app->params['PROFILE_IMAGE_UPLOAD_PATH_FRONTEND'] . $usermodel->profile_image?>" alt="profile-image">
                        </div>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <?php } ?>
                        <div class="form-group">
                          <label for="" class="col-md-2 col-sm-3 control-label">About Me(Short Description)</label>
                             <div class="col-md-10 col-sm-9">
                        <?= $form->field($UserDetailModel, 'short_about_me')->textarea(['rows' => 4,'name'=>'short_about_me','id'=>'short_about_me'])->label(false); ?>
                      </div>
                     </div>
                     <div class="form-group">
                       <label for="" class="col-md-2 col-sm-3 control-label">About Me(Long Description)</label>
                          <div class="col-md-10 col-sm-9">
                    <?= $form->field($UserDetailModel, 'long_about_me')->textarea(['rows' => 8,'name'=>'long_about_me','id'=>'long_about_me']) ?>
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
