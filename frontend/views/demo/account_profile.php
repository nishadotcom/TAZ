<?php
use yii\helpers\Html;
$this->title = 'Profile';
?>
  <div class="row">
            <div class="col-xs-12">
              <div class="btn-group" role="group" aria-label="...">
                <a href="<?php echo Yii::$app->homeUrl.'demo/profiledashboard'; ?>" class="btn btn-default active"><i class="fa fa-th" aria-hidden="true"></i>Account Dashboard</a>
                <a href="<?php echo Yii::$app->homeUrl.'demo/accountprofile'; ?>" class="btn btn-default"><i class="fa fa-user" aria-hidden="true"></i>Profile</a>
                <a href="<?php echo Yii::$app->homeUrl.'demo/my-address'; ?>" class="btn btn-default"><i class="fa fa-map-marker" aria-hidden="true"></i>My Address</a>
                <a href="<?php echo Yii::$app->homeUrl.'demo/all-orders'; ?>" class="btn btn-default"><i class="fa fa-list" aria-hidden="true"></i>All Orders</a>
                <a href="<?php echo Yii::$app->homeUrl.'demo/wish-list'; ?>" class="btn btn-default"><i class="fa fa-gift" aria-hidden="true"></i>Wishlist</a>
              </div>
            </div>
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
                      <img src="<?php echo $this->theme->baseUrl; ?>/assets/img/products/profile/profile-image.jpg" alt="profile-image">
                      <div class="caption">
                        <a href="#" class="btn btn-primary btn-block" role="button">Change Avatar</a>  
                      </div>
                    </div>
                  </div>
                  <div class="col-md-10 col-sm-9 col-xs-12">
                      <form class="form-horizontal">
                        <div class="form-group">
                          <label for="" class="col-md-2 col-sm-3 control-label">First Name</label>
                          <div class="col-md-10 col-sm-9">
                            <input type="text" class="form-control" id="" placeholder="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="" class="col-md-2 col-sm-3 control-label">Last Name</label>
                          <div class="col-md-10 col-sm-9">
                            <input type="text" class="form-control" id="" placeholder="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="" class="col-md-2 col-sm-3 control-label">Phone Number</label>
                          <div class="col-md-10 col-sm-9">
                            <input type="text" class="form-control" id="" placeholder="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="" class="col-md-2 col-sm-3 control-label">Email Address</label>
                          <div class="col-md-10 col-sm-9">
                            <input type="email" class="form-control" id="" placeholder="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="" class="col-md-2 col-sm-3 control-label">Password</label>
                          <div class="col-md-10 col-sm-9">
                            <input type="password" class="form-control" id="" placeholder="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="" class="col-md-2 col-sm-3 control-label">New Password</label>
                          <div class="col-md-10 col-sm-9">
                            <input type="password" class="form-control" id="" placeholder="">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-offset-10 col-md-2 col-sm-offset-9 col-sm-3">
                            <button type="submit" class="btn btn-primary btn-block">SAVE INFO</button>
                          </div>
                        </div>
                      </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

