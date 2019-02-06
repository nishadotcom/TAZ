<?php

$this->title = 'My Address';
?>
<!-- MAIN CONTENT SECTION -->

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
              <div class="innerWrapper">
                <div class="orderBox myAddress">
                  <h4>My Address</h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Company</th>
                          <th>Name</th>
                          <th>Address</th>
                          <th>Country</th>
                          <th class="col-md-2 col-sm-3">Phone</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Nokia</td>
                          <td>Adam Smith</td>
                          <td>9/4 C Babor Road, Mohammad Pur, Dhaka</td>
                          <td>Bangladesh</td>
                          <td>+884 5452 6452</td>
                          <td>
                            <div class="btn-group" role="group">
                              <button type="button" class="btn btn-default"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                              <button type="button" class="btn btn-default"><i class="fa fa-times" aria-hidden="true"></i></button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>Samsung</td>
                          <td>Adam Smith</td>
                          <td>9/4 C Babor Road, Mohammad Pur, Dhaka</td>
                          <td>Bangladesh</td>
                          <td>+884 5452 6452</td>
                          <td>
                            <div class="btn-group" role="group">
                              <button type="button" class="btn btn-default"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                              <button type="button" class="btn btn-default"><i class="fa fa-times" aria-hidden="true"></i></button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>Motorola</td>
                          <td>Adam Smith</td>
                          <td>9/4 C Babor Road, Mohammad Pur, Dhaka</td>
                          <td>Bangladesh</td>
                          <td>+884 5452 6452</td>
                          <td>
                            <div class="btn-group" role="group">
                              <button type="button" class="btn btn-default"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                              <button type="button" class="btn btn-default"><i class="fa fa-times" aria-hidden="true"></i></button>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
 