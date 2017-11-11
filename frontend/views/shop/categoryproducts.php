<?php

$this->title = ($categoryData) ? $categoryData->category_name.' Products' :  'Category Products'; 
$pathPrdImg   = Yii::$app->params['PATH_PRODUCT_IMAGE'];
$prdNoImg     = 'noImage.jpg';
?>

<div class="row">
            <div class="col-md-3 col-sm-4 col-md-push-9 col-sm-push-8 col-xs-12 sideBar">
              
              <div class="panel panel-default filterNormal">
                <div class="panel-heading">Product Categories</div>
                <div class="panel-body">
                  <ul class="list-unstyled">
                    <li>
                      <a href="<?php echo Yii::$app->homeUrl.'shop/products/1'; ?>">PSA<span>(<?= Yii::$app->shop->getProductsCountByCategory(1); ?>)</span></a>
                    </li>
                    <li><a href="<?php echo Yii::$app->homeUrl.'shop/products/2'; ?>">SLP<span>(<?= Yii::$app->shop->getProductsCountByCategory(2); ?>)</span></a></li>
                    <li><a href="<?php echo Yii::$app->homeUrl.'shop/products/3'; ?>">OTL<span>(<?= Yii::$app->shop->getProductsCountByCategory(3); ?>)</span></a></li>
                    <li><a href="<?php echo Yii::$app->homeUrl.'shop/products/4'; ?>">FRC<span>(<?= Yii::$app->shop->getProductsCountByCategory(4); ?>)</span></a></li>
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
                <?php 
                if($categoryProducts){
                  foreach ($categoryProducts as $key => $categoryProduct) {
                    $prdImage   = (isset($categoryProduct->productImages[0])) ? $pathPrdImg.$categoryProduct->product_code.'/'.$categoryProduct->productImages[0]->cover_photo : $pathPrdImg.$prdNoImg;
                    ?>
                    <div class="col-xs-12">
                      <div class="media">
                        <div class="media-left">
                          <img class="media-object" src="<?php echo $prdImage; ?>" alt="Image">
                          <!--<span class="maskingImage"><a data-toggle="modal" href=".quick-view" class="btn viewBtn">Quick View</a></span>-->
                        </div>
                        <div class="media-body">
                          <h4 class="media-heading">
                            <a href="<?php echo Yii::$app->homeUrl.'shop/product/'.$categoryProduct->id; ?>" title="<?= $categoryProduct->product_name; ?>"><?= $categoryProduct->product_name; ?></a>
                          </h4>
                          <p><?= $categoryProduct->product_short_description; ?></p>
                          <h4>$<?= $categoryProduct->product_sale_price; ?></h4>
                          <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target=".login-modal" data-product-id="<?= $categoryProduct->id; ?>" data-user-id="<?php echo (!Yii::$app->user->isGuest) ? Yii::$app->user->id : 'guest'; ?>"><i class="fa fa-heart" aria-hidden="true"></i></button>
                            <button type="button" class="btn btn-default add_to_cart" data-product-id="<?= $categoryProduct->id; ?>" data-user-id="<?php echo (!Yii::$app->user->isGuest) ? Yii::$app->user->id : 'guest'; ?>">
                              <i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <?php
                  }
                }else{
                  // No results found
                  ?>
                  <div class="col-xs-12">
                    <div class="media">
                      <div class="media-body"><p classs="text-muted">No results found</p>
                      </div>
                    </div>
                  </div>

                  <?php
                }
                ?>

              </div>  
            </div>
          </div>