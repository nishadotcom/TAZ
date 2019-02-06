<?php

$this->title = 'All Orders';
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
                <div class="orderBox">
                  <h4>All Orders</h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Order ID</th>
                          <th>Date</th>
                          <th>Items</th>
                          <th>Total Price</th>
                          <th>Status</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>#451231</td>
                          <td>Mar 25, 2016</td>
                          <td>2</td>
                          <td>$99.00</td>
                          <td><span class="label label-primary">Processing</span></td>
                          <td><a href="<?php echo Yii::$app->homeUrl.'demo/single-order'; ?>" class="btn btn-default">View</a></td>
                        </tr>
                        <tr>
                          <td>#451231</td>
                          <td>Mar 25, 2016</td>
                          <td>3</td>
                          <td>$150.00</td>
                          <td><span class="label label-success">Completed</span></td>
                          <td><a href="<?php echo Yii::$app->homeUrl.'demo/single-order'; ?>" class="btn btn-default">View</a></td>
                        </tr>
                        <tr>
                          <td>#451231</td>
                          <td>Mar 25, 2016</td>
                          <td>3</td>
                          <td>$150.00</td>
                          <td><span class="label label-danger">Canceled</span></td>
                          <td><a href="<?php echo Yii::$app->homeUrl.'demo/single-order'; ?>" class="btn btn-default">View</a></td>
                        </tr>
                        <tr>
                          <td>#451231</td>
                          <td>Mar 25, 2016</td>
                          <td>2</td>
                          <td>$99.00</td>
                          <td><span class="label label-info">On Hold</span></td>
                          <td><a href="<?php echo Yii::$app->homeUrl.'demo/single-order'; ?>" class="btn btn-default">View</a></td>
                        </tr>
                        <tr>
                          <td>#451231</td>
                          <td>Mar 25, 2016</td>
                          <td>3</td>
                          <td>$150.00</td>
                          <td><span class="label label-warning">Pending</span></td>
                          <td><a href="<?php echo Yii::$app->homeUrl.'demo/single-order'; ?>" class="btn btn-default">View</a></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

      