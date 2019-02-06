<?php

$this->title = 'Category Products';
?>

<div class="row">
            <div class="col-md-3 col-sm-4 col-md-push-9 col-sm-push-8 col-xs-12 sideBar">
              
              <div class="panel panel-default filterNormal">
                <div class="panel-heading">Product Categories</div>
                <div class="panel-body">
                  <ul class="list-unstyled">
                    <li><a href="#">PSA<span>(15)</span></a></li>
                    <li><a href="#">SLP<span>(10)</span></a></li>
                    <li><a href="#">OTL<span>(7)</span></a></li>
                    <li><a href="#">FRC<span>(12)</span></a></li>
                  </ul>
                </div>
              </div>
              <div class="panel panel-default priceRange">
                <div class="panel-heading">Filter by Price</div>
                <div class="panel-body clearfix">
                  <div class="price-slider-inner"> 
                    <span class="amount-wrapper">
                      Price:
                      <input type="text" id="price-amount-1" readonly>
                      <strong>-</strong>
                      <input type="text" id="price-amount-2" readonly> 
                    </span>                                            
                    <div id="price-range"></div>  
                  </div>
                  <input class="btn btn-default" type="submit" value="Filter">
                  <!-- <span class="priceLabel">Price: <strong>$12 - $30</strong></span> -->
                </div>
              </div>
              
              <div class="panel panel-default filterNormal">
                <div class="panel-heading">filter by Size</div>
                <div class="panel-body">
                  <ul class="list-unstyled clearfix">
                    <li><a href="#">Small<span>(15)</span></a></li>
                    <li><a href="#">Medium<span>(10)</span></a></li>
                    <li><a href="#">Large<span>(7)</span></a></li>
                    <li><a href="#">Extra Large<span>(12)</span></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-9 col-sm-8 col-md-pull-3 col-sm-pull-4 col-xs-12">
              <div class="row filterArea">
                <div class="col-xs-6">
                  <select name="guiest_id1" id="guiest_id1" class="select-drop">
                    <option value="0">Default sorting</option>
                    <option value="1">Sort by popularity</option>
                    <option value="2">Sort by rating</option>
                    <option value="3">Sort by newness</option>
                    <option value="3">Sort by price</option>           
                  </select>
                </div>
                <!--<div class="col-xs-6">
                  <div class="btn-group pull-right" role="group">
                    <button type="button" class="btn btn-default" onclick="window.location.href='product-grid-right-sidebar.html'"><i class="fa fa-th" aria-hidden="true"></i><span>Grid</span></button>
                    <button type="button" class="btn btn-default active" onclick="window.location.href='product-list-right-sidebar.html'"><i class="fa fa-th-list" aria-hidden="true"></i><span>List</span></button>
                  </div>
                </div>-->
              </div>
              <div class="row productListSingle">
                <div class="col-xs-12">
                  <div class="media">
                    <div class="media-left">
                      <img class="media-object" src="<?php echo $this->theme->baseUrl; ?>/assets/img/products/products-01.jpg" alt="Image">
                      <span class="maskingImage"><a data-toggle="modal" href=".quick-view" class="btn viewBtn">Quick View</a></span>
                    </div>
                    <div class="media-body">
                      <h4 class="media-heading"><a href="<?php echo Yii::$app->homeUrl.'demo/singleproduct'; ?>" title="Dip Dyed Sweater">Dip Dyed Sweater</a></h4>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                      <h3>$249</h3>
                      <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target=".login-modal"><i class="fa fa-heart" aria-hidden="true"></i></button>
                        <button type="button" class="btn btn-default" onclick="location.href='cart-page.html';"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12">
                  <div class="media">
                    <div class="media-left">
                      <img class="media-object" src="<?php echo $this->theme->baseUrl; ?>/assets/img/products/products-02.jpg" alt="Image">
                      <span class="maskingImage"><a data-toggle="modal" href=".quick-view" class="btn viewBtn">Quick View</a></span>
                    </div>
                    <div class="media-body">
                      <h4 class="media-heading"><a href="<?php echo Yii::$app->homeUrl.'demo/singleproduct'; ?>">Dip Dyed Sweater</a></h4>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                      <h3>$249</h3>
                      <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target=".login-modal"><i class="fa fa-heart" aria-hidden="true"></i></button>
                        <button type="button" class="btn btn-default" onclick="location.href='cart-page.html';"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12">
                  <div class="media">
                    <div class="media-left">
                      <img class="media-object" src="<?php echo $this->theme->baseUrl; ?>/assets/img/products/products-03.jpg" alt="Image">
                      <span class="maskingImage"><a data-toggle="modal" href=".quick-view" class="btn viewBtn">Quick View</a></span>
                    </div>
                    <div class="media-body">
                      <h4 class="media-heading"><a href="<?php echo Yii::$app->homeUrl.'demo/singleproduct'; ?>">Dip Dyed Sweater</a></h4>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                      <h3>$249</h3>
                      <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target=".login-modal"><i class="fa fa-heart" aria-hidden="true"></i></button>
                        <button type="button" class="btn btn-default" onclick="location.href='cart-page.html';"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12">
                  <div class="media">
                    <div class="media-left">
                      <img class="media-object" src="<?php echo $this->theme->baseUrl; ?>/assets/img/products/products-04.jpg" alt="Image">
                      <span class="maskingImage"><a data-toggle="modal" href=".quick-view" class="btn viewBtn">Quick View</a></span>
                    </div>
                    <div class="media-body">
                      <h4 class="media-heading"><a href="<?php echo Yii::$app->homeUrl.'demo/singleproduct'; ?>">Dip Dyed Sweater</a></h4>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                      <h3>$249</h3>
                      <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target=".login-modal"><i class="fa fa-heart" aria-hidden="true"></i></button>
                        <button type="button" class="btn btn-default" onclick="location.href='cart-page.html';"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12">
                  <div class="media">
                    <div class="media-left">
                      <img class="media-object" src="<?php echo $this->theme->baseUrl; ?>/assets/img/products/products-05.jpg" alt="Image">
                      <span class="maskingImage"><a data-toggle="modal" href=".quick-view" class="btn viewBtn">Quick View</a></span>
                    </div>
                    <div class="media-body">
                      <h4 class="media-heading"><a href="<?php echo Yii::$app->homeUrl.'demo/singleproduct'; ?>">Dip Dyed Sweater</a></h4>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                      <h3>$249</h3>
                      <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target=".login-modal"><i class="fa fa-heart" aria-hidden="true"></i></button>
                        <button type="button" class="btn btn-default" onclick="location.href='cart-page.html';"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12">
                  <div class="media">
                    <div class="media-left">
                      <img class="media-object" src="<?php echo $this->theme->baseUrl; ?>/assets/img/products/products-06.jpg" alt="Image">
                      <span class="maskingImage"><a data-toggle="modal" href=".quick-view" class="btn viewBtn">Quick View</a></span>
                    </div>
                    <div class="media-body">
                      <h4 class="media-heading"><a href="<?php echo Yii::$app->homeUrl.'demo/singleproduct'; ?>">Dip Dyed Sweater</a></h4>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                      <h3>$249</h3>
                      <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target=".login-modal"><i class="fa fa-heart" aria-hidden="true"></i></button>
                        <button type="button" class="btn btn-default" onclick="location.href='cart-page.html';"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12">
                  <div class="media">
                    <div class="media-left">
                      <img class="media-object" src="<?php echo $this->theme->baseUrl; ?>/assets/img/products/products-07.jpg" alt="Image">
                      <span class="maskingImage"><a data-toggle="modal" href=".quick-view" class="btn viewBtn">Quick View</a></span>
                    </div>
                    <div class="media-body">
                      <h4 class="media-heading"><a href="<?php echo Yii::$app->homeUrl.'demo/singleproduct'; ?>">Dip Dyed Sweater</a></h4>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                      <h3>$249</h3>
                      <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target=".login-modal"><i class="fa fa-heart" aria-hidden="true"></i></button>
                        <button type="button" class="btn btn-default" onclick="location.href='cart-page.html';"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12">
                  <div class="media">
                    <div class="media-left">
                      <img class="media-object" src="<?php echo $this->theme->baseUrl; ?>/assets/img/products/products-08.jpg" alt="Image">
                      <span class="maskingImage"><a data-toggle="modal" href=".quick-view" class="btn viewBtn">Quick View</a></span>
                    </div>
                    <div class="media-body">
                      <h4 class="media-heading"><a href="<?php echo Yii::$app->homeUrl.'demo/singleproduct'; ?>">Dip Dyed Sweater</a></h4>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                      <h3>$249</h3>
                      <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target=".login-modal"><i class="fa fa-heart" aria-hidden="true"></i></button>
                        <button type="button" class="btn btn-default" onclick="location.href='cart-page.html';"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>  
            </div>
          </div>