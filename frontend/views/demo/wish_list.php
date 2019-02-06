<?php

$this->title = 'Wishlist';
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
                <div class="orderBox myAddress wishList">
                  <h4>Wishlist</h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Product Name</th>
                          <th>Unit Price</th>
                          <th>Stock Status</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="col-md-2 col-sm-3">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <span class="cartImage"><img src="img/products/cart-image.jpg" alt="image"></span>
                          </td>
                          <td>Italian Winter Hat</td>
                          <td>$ 99.00</td>
                          <td>In Stock</td>
                          <td>
                            <a class="btn btn-default" href="#">Add to Cart</a>
                          </td>
                        </tr>
                        <tr>
                          <td class="col-md-2 col-sm-3">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <span class="cartImage"><img src="img/products/cart-image.jpg" alt="image"></span>
                          </td>
                          <td>Italian Winter Hat</td>
                          <td>$ 99.00</td>
                          <td>In Stock</td>
                          <td>
                            <a class="btn btn-default" href="#">Add to Cart</a>
                          </td>
                        </tr>
                        <tr>
                          <td class="col-md-2 col-sm-3">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <span class="cartImage"><img src="img/products/cart-image.jpg" alt="image"></span>
                          </td>
                          <td>Italian Winter Hat</td>
                          <td>$ 99.00</td>
                          <td>In Stock</td>
                          <td>
                            <a class="btn btn-default" href="#">Add to Cart</a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
  