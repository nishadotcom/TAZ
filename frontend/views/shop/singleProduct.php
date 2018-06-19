<?php
use bigpaulie\social\share\Share;
use yii\helpers\Url;

$productData = ($product) ? $product[0] : [];
$this->title = $productData->product_name;//'Product View';

//echo '<pre>'; print_r($productData); echo '</pre>';
$pathPrdImg = Yii::$app->params['PATH_PRODUCT_IMAGE'];
$prdNoImg = 'noImage.png';

$transactionId = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
$url = Url::toRoute('shop/product/'.$productData->id, true); 
?>

<div class="row singleProduct">
    <div class="col-xs-12">
        <div class="media">
            <div class="media-right productSlider">
                <div id="carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                        // Cover Photo
                        $coverImage = (isset($productData->productImages[0])) ? $pathPrdImg . $productData->product_code . '/' . $productData->productImages[0]->cover_photo : $pathPrdImg . $prdNoImg;
                        ?>
                        <div class="item active" data-thumb="0">
                            <img id="product-image" src="<?= $coverImage; ?>" data-zoom-image="<?= $coverImage; ?>" alt="Product Image">
                        </div>
                        <?php /* ?>
                          <div class="item" data-thumb="1">
                          <img src="<?php echo $this->theme->baseUrl; ?>/assets/img/products/signle-product/product-slide-big-02.jpg">
                          </div>
                          <div class="item" data-thumb="2">
                          <img src="<?php echo $this->theme->baseUrl; ?>/assets/img/products/signle-product/product-slide-big-03.jpg">
                          </div>
                          <div class="item" data-thumb="3">
                          <img src="<?php echo $this->theme->baseUrl; ?>/assets/img/products/signle-product/product-slide-big-04.jpg">
                          </div>
                          <?php */ ?>
                    </div>
                </div> 
                <div class="clearfix">
                    <div id="thumbcarousel" class="carousel slide" data-interval="false">
                        <div class="carousel-inner">
                            <div data-target="#carousel" data-slide-to="0" class="thumb">
                                <img src="<?= $coverImage; ?>">
                            </div>
                            <!--<div data-target="#carousel" data-slide-to="1" class="thumb"><img src="<?php //echo $this->theme->baseUrl;  ?>/assets/img/products/signle-product/product-slide-small-02.jpg"></div>
                            <div data-target="#carousel" data-slide-to="2" class="thumb"><img src="<?php //echo $this->theme->baseUrl;  ?>/assets/img/products/signle-product/product-slide-small-03.jpg"></div>
                            <div data-target="#carousel" data-slide-to="3" class="thumb"><img src="<?php //echo $this->theme->baseUrl;  ?>/assets/img/products/signle-product/product-slide-small-04.jpg"></div>-->
                        </div>
                        <a class="left carousel-control" href="#thumbcarousel" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#thumbcarousel" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="media-body">
                <ul class="list-inline">
                    <li><a href="#" onclick="window.history.go(-1); return false;"><i class="fa fa-reply" aria-hidden="true"></i>Continue Shopping</a></li>
                    <li><a class="share-single-product" style="cursor: pointer;"><i class="fa fa-plus" aria-hidden="true"></i>Share</a></li>
                </ul>
                <h4><?= $productData->product_name; ?></h4>
                <h4>&#x20B9; <?= $productData->product_sale_price; ?></h4>
                <p><?= $productData->product_long_description; ?></p>
                <!--<span class="quick-drop">
                  <select name="guiest_id3" id="guiest_id3" class="select-drop">
                    <option value="0">Size</option>
                    <option value="1">Small</option>
                    <option value="2">Medium</option>
                    <option value="3">Big</option>            
                  </select>
                </span>
                <span class="quick-drop resizeWidth">
                  <select name="guiest_id4" id="guiest_id4" class="select-drop">
                    <option value="0">Qty</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>            
                  </select>
                </span>-->
                <div class="btn-area">
                    <?php /* ?><a class="btn btn-primary btn-block add_to_cart" data-product-id="<?= $productData->id; ?>" data-user-id="<?php echo (!Yii::$app->user->isGuest) ? Yii::$app->user->id : 'guest'; ?>">Add to cart <i class="fa fa-angle-right" aria-hidden="true"></i></a> <?php */ ?>
                    <button class="btn btn-primary btn-block add_to_cart" data-product-id="<?= $productData->id; ?>" data-user-id="<?php echo (!Yii::$app->user->isGuest) ? Yii::$app->user->id : 'guest'; ?>" title="Add to cart">Add to cart <!--<i class="fa fa-angle-right" aria-hidden="true"></i>--></button>
                    <a href="<?= Yii::$app->homeUrl . 'order/step1?from=product-'.$productData->id.'&transactionId='.$transactionId; ?>" style="margin-top: 0;padding-top: 12px;" class="btn btn-success btn-block" data-product-id="<?= $productData->id; ?>" data-user-id="<?php echo (!Yii::$app->user->isGuest) ? Yii::$app->user->id : 'guest'; ?>" title="Buy Now">Buy Now <!--<i class="fa fa-angle-right" aria-hidden="true"></i>--></a>
                </div>
                <div class="tabArea">
                    <ul class="nav nav-tabs">
                    	<li><a data-toggle="tab" href="#aboutSeller">About Seller</a></li>
                        <li class="active"><a data-toggle="tab" href="#details">details</a></li>
                        <!--<li><a data-toggle="tab" href="#sizing">sizing</a></li>-->
                        <li><a data-toggle="tab" href="#shipping">shipping</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="details" class="tab-pane fade in active">
                            <table class="table">
                                <tr>
                                    <td style="border-top: none;"><strong>Category</strong></td>
                                    <td style="border-top: none;"><?= $productData->productCategory->category_name; ?></td>
                                </tr>
                                <tr>
                                    <td>Material</td><td><?= $productData->product_material ?></td>
                                </tr>
                                <tr>
                                    <td>Color</td><td><?= $productData->product_color ?></td>
                                </tr>
                                <tr>
                                    <td>Gurantee</td><td><?= $productData->product_guarantee_status ?></td>
                                </tr>
                            </table>
                            <?php //print_r($productData); //$productData->product_color; ?>
                            <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <ul class="list-unstyled">
                              <li>Black, Crew Neck</li>
                              <li>75% Cotton, 25% Rayon</li>
                              <li>Waterbased Ink</li>
                              <li>Wash Cold, dry low</li>
                            </ul>-->
                        </div>
                        <!-- TAB ABOUT SEELER -->
						<div id="aboutSeller" class="tab-pane fade">
							<p>Under Construction</p>
						</div>
                        <!--<div id="sizing" class="tab-pane fade">
                          <p>Praesent dui felis, gravida a auctor at, facilisis commodo ipsum. Cras eu faucibus justo. Nullam varius cursus nisi, sed elementum sem sagittis at. Nulla tellus massa, vestibulum a commodo facilisis, pulvinar convallis nunc.</p>
                        </div>-->
                        <div id="shipping" class="tab-pane fade">
                            <p></p>
                            <div id="newsletter">
	                            <div class="input-group">
	                              	<input type="text" class="form-control input-sm" placeholder="Enter Delivery Pincode" style=" min-height: 37px;margin-bottom: 0px;width: 274px;">
	                              	<span class="input-group-btn">
	                                  	<button class="btn btn-sm btn-primary-filled " type="button">Check</button>
	                              	</span>
                          		</div>
                          		<small style="color: #797979;">
                              		Usually delivered in 3-4 days <br>
                              		Enter pincode for exact delivery dates/charge
                            	</small>
                          	</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="row">
	<!-- FEATURE PRODUCT SECTION -->
	<div class="row featuredProducts version3">
            <div class="col-xs-12">
              <div class="tabCommon">
                <ul class="nav nav-tabs">
                  <li class=""><a data-toggle="tab" href="#similarColor">Similar Color</a></li> 
                  <li class="active"><a data-toggle="tab" href="#similarMaterial">Similar Material</a></li>
                  <li><a data-toggle="tab" href="#similarType">Similar Type</a></li>
                </ul>
                <div class="tab-bottom">
                </div>
                <div class="tab-content">

                  <!--
                  NEW ARRIALS
                  -->
                  <div id="similarColor" class="tab-pane fade in ">
                    <div class="row">

                        <?php 
                        if($similarColorProducts){
                          //print_r(count($similarColorProducts));
                          foreach ($similarColorProducts as $key => $similarColorProduct) {
                            $coverImage = (isset($similarColorProduct->productImages[0])) ? $pathPrdImg . $similarColorProduct->product_code . '/' . $similarColorProduct->productImages[0]->cover_photo : $pathPrdImg . $prdNoImg;
                          ?>
                            <div class="col-sm-3 col-xs-12">
                            <div class="imageBox">
                                <div class="productImage clearfix">
                                  <a href="single-product.html">
                                    <img src="<?= $coverImage; ?>" alt="PRODUCT IMAGE">
                                  </a>
                                  <div class="singleProduct productMasking">
                                      <ul class="list-inline btn-group" role="group">
                                        <li>
                                            <a data-product-id="<?= $similarColorProduct->id; ?>" data-user-id="<?= (!Yii::$app->user->isGuest) ? Yii::$app->user->id : 'guest'; ?>" class="btn btn-default add_to_cart" title="Add to Cart">
                                                <i class="fa fa-shopping-cart" style="margin-right:0"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= Yii::$app->homeUrl . 'order/step1?from=product-'.$similarColorProduct->id.'&transactionId='.$transactionId; ?>" data-product-id="<?= $similarColorProduct->id; ?>" data-user-id="<?= (!Yii::$app->user->isGuest) ? Yii::$app->user->id : 'guest'; ?>" class="btn btn-default" title="Buy Now">
                                                <i class="fa fa-inr" style="margin-right:0"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-toggle="modal" href="<?= Yii::$app->homeUrl.'shop/product/'.$similarColorProduct->id; ?>" class="btn btn-default" title="View <?= $similarColorProduct->product_name; ?>">
                                                <i class="fa fa-eye" style="margin-right:0"></i>
                                            </a>  
                                        </li>
                                      </ul>
                                    </div>
                                </div>
                                <div class="productCaption clearfix">
                                  <h5><a href="single-product.html"><?= $similarColorProduct->product_name; ?></a></h5>
                                  <h3>&#x20B9; <?= $similarColorProduct->product_sale_price; ?></h3>
                                </div>
                              </div>
                              </div>
                          <?php
                          }// END LOOP
                        }else{
                          echo '<div class="col-sm-3 col-xs-12"><p>No Results Found</p></div>';
                        }
                        ?>

                        <!--<div class="col-sm-3 col-xs-12">
                        <div class="imageBox">
                          <div class="productImage clearfix">
                            <a href="single-product.html">
                              <img src="<?php //echo $this->theme->baseUrl; ?>/assets/img/home/featured-product/product-img5.jpg" alt="featured-product-img">
                            </a>
                            <div class="productMasking">
                              <ul class="list-inline btn-group" role="group">
                                <li><a data-toggle="modal" href=".login-modal" class="btn btn-default"><i class="fa fa-heart"></i></a></li>
                                <li><a href="cart-page.html" class="btn btn-default"><i class="fa fa-shopping-cart"></i></a></li>
                                <li><a data-toggle="modal" href=".quick-view" class="btn btn-default"><i class="fa fa-search"></i></a></li>
                              </ul>
                            </div>
                          </div>
                          <div class="productCaption clearfix">
                            <h5><a href="single-product.html">Mauris efficitur</a></h5>
                            <h3>$199</h3>
                          </div>
                        </div>
                      </div>--> 
                    </div>
                  </div>
                  <!--
                  END OF NEW ARRIALS
                  -->

                  <!--
                  TOP FAVORITED
                  -->
                  <div id="similarMaterial" class="tab-pane fade in active">
                    <div class="row">
                      
                        <?php 
                        if($similarMaterialProducts){
                          //print_r(count($similarMaterialProducts));
                          foreach ($similarMaterialProducts as $key => $similarMaterialProduct) {
                            $coverImage = (isset($similarMaterialProduct->productImages[0])) ? $pathPrdImg . $similarMaterialProduct->product_code . '/' . $similarMaterialProduct->productImages[0]->cover_photo : $pathPrdImg . $prdNoImg;
                          ?>
                            <div class="col-sm-3 col-xs-12">
                            <div class="imageBox">
                                <div class="productImage clearfix">
                                  <a href="single-product.html">
                                    <img src="<?= $coverImage; ?>" alt="PRODUCT IMAGE">
                                  </a>
                                  <div class="singleProduct productMasking">
                                      <ul class="list-inline btn-group" role="group">
                                        <li>
                                            <a data-product-id="<?= $similarMaterialProduct->id; ?>" data-user-id="<?= (!Yii::$app->user->isGuest) ? Yii::$app->user->id : 'guest'; ?>" class="btn btn-default add_to_cart" title="Add to Cart">
                                                <i class="fa fa-shopping-cart" style="margin-right:0"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= Yii::$app->homeUrl . 'order/step1?from=product-'.$similarMaterialProduct->id.'&transactionId='.$transactionId; ?>" data-product-id="<?= $similarMaterialProduct->id; ?>" data-user-id="<?= (!Yii::$app->user->isGuest) ? Yii::$app->user->id : 'guest'; ?>" class="btn btn-default" title="Buy Now">
                                                <i class="fa fa-inr" style="margin-right:0"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-toggle="modal" href="<?= Yii::$app->homeUrl.'shop/product/'.$similarMaterialProduct->id; ?>" class="btn btn-default" title="View <?= $similarMaterialProduct->product_name; ?>">
                                                <i class="fa fa-eye" style="margin-right:0"></i>
                                            </a>  
                                        </li>
                                      </ul>
                                    </div>
                                </div>
                                <div class="productCaption clearfix">
                                  <h5><a href="single-product.html"><?= $similarMaterialProduct->product_name; ?></a></h5>
                                  <h3>&#x20B9; <?= $similarMaterialProduct->product_sale_price; ?></h3>
                                </div>
                              </div>
                              </div>
                          <?php
                          }// END LOOP
                        }else{
                          echo '<div class="col-sm-3 col-xs-12"><p>No Results Found</p></div>';
                        }
                        ?>
                      
                      <!--<div class="col-sm-3 col-xs-12">
                        <div class="imageBox">
                          <div class="productImage clearfix">
                            <a href="single-product.html">
                              <img src="<?php //echo $this->theme->baseUrl; ?>/assets/img/home/featured-product/product-img5.jpg" alt="featured-product-img">
                            </a>
                            <div class="productMasking">
                              <ul class="list-inline btn-group" role="group">
                                <li><a data-toggle="modal" href=".login-modal" class="btn btn-default"><i class="fa fa-heart"></i></a></li>
                                <li><a href="cart-page.html" class="btn btn-default"><i class="fa fa-shopping-cart"></i></a></li>
                                <li><a data-toggle="modal" href=".quick-view" class="btn btn-default"><i class="fa fa-search"></i></a></li>
                              </ul>
                            </div>
                          </div>
                          <div class="productCaption clearfix">
                            <h5><a href="single-product.html">Mauris efficitur</a></h5>
                            <h3>$199</h3>
                          </div>
                        </div>
                      </div>-->
                    </div>
                  </div>
                  <!--
                  END OF TOP FAVORITED
                  -->
                  <div id="similarType" class="tab-pane fade">
                    <div class="row">
                      <div class="col-sm-3 col-xs-12">
                        <div class="imageBox">
                          <div class="productImage clearfix">
                            <a href="single-product.html">
                              <img src="<?php echo $this->theme->baseUrl; ?>/assets/img/home/featured-product/product-img5.jpg" alt="featured-product-img">
                            </a>
                            <div class="productMasking">
                              <ul class="list-inline btn-group" role="group">
                                <li><a data-toggle="modal" href=".login-modal" class="btn btn-default"><i class="fa fa-heart"></i></a></li>
                                <li><a href="cart-page.html" class="btn btn-default"><i class="fa fa-shopping-cart"></i></a></li>
                                <li><a data-toggle="modal" href=".quick-view" class="btn btn-default"><i class="fa fa-search"></i></a></li>
                              </ul>
                            </div>
                          </div>
                          <div class="productCaption clearfix">
                            <h5><a href="single-product.html">Mauris efficitur</a></h5>
                            <h3>$199</h3>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3 col-xs-12">
                        <div class="imageBox">
                          <div class="productImage clearfix">
                            <a href="single-product.html">
                              <img src="<?php echo $this->theme->baseUrl; ?>/assets/img/home/featured-product/product-img3.jpg" alt="featured-product-img">
                            </a>
                            <div class="productMasking">
                              <ul class="list-inline btn-group" role="group">
                                <li><a data-toggle="modal" href=".login-modal" class="btn btn-default"><i class="fa fa-heart"></i></a></li>
                                <li><a href="cart-page.html" class="btn btn-default"><i class="fa fa-shopping-cart"></i></a></li>
                                <li><a data-toggle="modal" href=".quick-view" class="btn btn-default"><i class="fa fa-search"></i></a></li>
                              </ul>
                            </div>
                          </div>
                          <div class="productCaption clearfix">
                            <h5><a href="single-product.html">Mauris efficitur</a></h5>
                            <h3>$199</h3>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3 col-xs-12">
                        <div class="imageBox">
                          <div class="productImage clearfix">
                            <a href="single-product.html">
                              <img src="<?php echo $this->theme->baseUrl; ?>/assets/img/home/featured-product/product-img8.jpg" alt="featured-product-img">
                            </a>
                            <div class="productMasking">
                              <ul class="list-inline btn-group" role="group">
                                <li><a data-toggle="modal" href=".login-modal" class="btn btn-default"><i class="fa fa-heart"></i></a></li>
                                <li><a href="cart-page.html" class="btn btn-default"><i class="fa fa-shopping-cart"></i></a></li>
                                <li><a data-toggle="modal" href=".quick-view" class="btn btn-default"><i class="fa fa-search"></i></a></li>
                              </ul>
                            </div>
                          </div>
                          <div class="productCaption clearfix">
                            <h5><a href="single-product.html">Scarf Ring Corner</a></h5>
                            <h3>$199</h3>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3 col-xs-12">
                        <div class="imageBox">
                          <div class="productImage clearfix">
                            <a href="single-product.html">
                              <img src="<?php echo $this->theme->baseUrl; ?>/assets/img/home/featured-product/product-img9.jpg" alt="featured-product-img">
                            </a>
                            <div class="productMasking">
                              <ul class="list-inline btn-group" role="group">
                                <li><a data-toggle="modal" href=".login-modal" class="btn btn-default"><i class="fa fa-heart"></i></a></li>
                                <li><a href="cart-page.html" class="btn btn-default"><i class="fa fa-shopping-cart"></i></a></li>
                                <li><a data-toggle="modal" href=".quick-view" class="btn btn-default"><i class="fa fa-search"></i></a></li>
                              </ul>
                            </div>
                          </div>
                          <div class="productCaption clearfix">
                            <h5><a href="single-product.html">Sun Buddies</a></h5>
                            <h3>$199</h3>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3 col-xs-12">
                        <div class="imageBox">
                          <div class="productImage clearfix">
                            <a href="single-product.html">
                              <img src="<?php echo $this->theme->baseUrl; ?>/assets/img/home/featured-product/product-img10.jpg" alt="featured-product-img">
                            </a>
                            <div class="productMasking">
                              <ul class="list-inline btn-group" role="group">
                                <li><a data-toggle="modal" href=".login-modal" class="btn btn-default"><i class="fa fa-heart"></i></a></li>
                                <li><a href="cart-page.html" class="btn btn-default"><i class="fa fa-shopping-cart"></i></a></li>
                                <li><a data-toggle="modal" href=".quick-view" class="btn btn-default"><i class="fa fa-search"></i></a></li>
                              </ul>
                            </div>
                          </div>
                          <div class="productCaption clearfix">
                            <h5><a href="single-product.html">Mauris efficitur</a></h5>
                            <h3>$199</h3>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3 col-xs-12">
                        <div class="imageBox">
                          <div class="productImage clearfix">
                            <a href="single-product.html">
                              <img src="<?php echo $this->theme->baseUrl; ?>/assets/img/home/featured-product/product-img11.jpg" alt="featured-product-img">
                            </a>
                            <div class="productMasking">
                              <ul class="list-inline btn-group" role="group">
                                <li><a data-toggle="modal" href=".login-modal" class="btn btn-default"><i class="fa fa-heart"></i></a></li>
                                <li><a href="cart-page.html" class="btn btn-default"><i class="fa fa-shopping-cart"></i></a></li>
                                <li><a data-toggle="modal" href=".quick-view" class="btn btn-default"><i class="fa fa-search"></i></a></li>
                              </ul>
                            </div>
                          </div>
                          <div class="productCaption clearfix">
                            <h5><a href="single-product.html">Nike Sportswear</a></h5>
                            <h3>$199</h3>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3 col-xs-12">
                        <div class="imageBox">
                          <div class="productImage clearfix">
                            <a href="single-product.html">
                              <img src="<?php echo $this->theme->baseUrl; ?>/assets/img/home/featured-product/product-img6.jpg" alt="featured-product-img">
                            </a>
                            <div class="productMasking">
                              <ul class="list-inline btn-group" role="group">
                                <li><a data-toggle="modal" href=".login-modal" class="btn btn-default"><i class="fa fa-heart"></i></a></li>
                                <li><a href="cart-page.html" class="btn btn-default"><i class="fa fa-shopping-cart"></i></a></li>
                                <li><a data-toggle="modal" href=".quick-view" class="btn btn-default"><i class="fa fa-search"></i></a></li>
                              </ul>
                            </div>
                          </div>
                          <div class="productCaption clearfix">
                            <h5><a href="single-product.html">Mauris efficitur</a></h5>
                            <h3>$199</h3>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3 col-xs-12">
                        <div class="imageBox">
                          <div class="productImage clearfix">
                            <a href="single-product.html">
                              <img src="<?php echo $this->theme->baseUrl; ?>/assets/img/home/featured-product/product-img4.jpg" alt="featured-product-img">
                            </a>
                            <div class="productMasking">
                              <ul class="list-inline btn-group" role="group">
                                <li><a data-toggle="modal" href=".login-modal" class="btn btn-default"><i class="fa fa-heart"></i></a></li>
                                <li><a href="cart-page.html" class="btn btn-default"><i class="fa fa-shopping-cart"></i></a></li>
                                <li><a data-toggle="modal" href=".quick-view" class="btn btn-default"><i class="fa fa-search"></i></a></li>
                              </ul>
                            </div>
                          </div>
                          <div class="productCaption clearfix">
                            <h5><a href="single-product.html">Mauris efficitur</a></h5>
                            <h3>$199</h3>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
<!-- END OF FEATURE PRODUCT SECTION -->

    <!--<div class="col-xs-12">
        <div class="page-header">
            <h4 class="media-heading"><a href="/shop/products/4" title="FRC Products">Similar Products</a></h4>
        </div>
    </div>
    <div class="col-sm-3 col-xs-12">
        <div class="imageBox">
            <div class="productImage clearfix">
                <a href="single-product.html">
                    <img src="/themes/taz/assets/img/home/featured-product/product-img7.jpg" alt="featured-product-img">
                </a>
                <div class="productMasking">
                    <ul class="list-inline btn-group" role="group">
                        <li><a data-toggle="modal" href=".login-modal" class="btn btn-default"><i class="fa fa-heart"></i></a></li>
                        <li><a href="cart-page.html" class="btn btn-default"><i class="fa fa-shopping-cart"></i></a></li>
                        <li><a data-toggle="modal" href=".quick-view" class="btn btn-default"><i class="fa fa-search"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="productCaption clearfix">
                <h5><a href="single-product.html">Nike Sportswear</a> <span class="featureProductRating">5<i class="fa fa-heart fa-1"></i></span></h5>
                <h5 class="text-normal">$199</h5>
            </div>
        </div>
    </div>
    <div class="col-sm-3 col-xs-12">
        <div class="imageBox">
            <div class="productImage clearfix">
                <a href="single-product.html">
                    <img src="/themes/taz/assets/img/home/featured-product/product-img8.jpg" alt="featured-product-img">
                </a>
                <div class="productMasking">
                    <ul class="list-inline btn-group" role="group">
                        <li><a data-toggle="modal" href=".login-modal" class="btn btn-default"><i class="fa fa-heart"></i></a></li>
                        <li><a href="cart-page.html" class="btn btn-default"><i class="fa fa-shopping-cart"></i></a></li>
                        <li><a data-toggle="modal" href=".quick-view" class="btn btn-default"><i class="fa fa-search"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="productCaption clearfix">
                <h5><a href="single-product.html">Scarf Ring Corner</a> <span class="featureProductRating">5<i class="fa fa-heart fa-1"></i></span></h5>
                <h5 class="text-normal">$199</h5>
            </div>
        </div>
    </div>
    <div class="col-sm-3 col-xs-12">
        <div class="imageBox">
            <div class="productImage clearfix">
                <a href="single-product.html">
                    <img src="/themes/taz/assets/img/home/featured-product/product-img9.jpg" alt="featured-product-img">
                </a>
                <div class="productMasking">
                    <ul class="list-inline btn-group" role="group">
                        <li><a data-toggle="modal" href=".login-modal" class="btn btn-default"><i class="fa fa-heart"></i></a></li>
                        <li><a href="cart-page.html" class="btn btn-default"><i class="fa fa-shopping-cart"></i></a></li>
                        <li><a data-toggle="modal" href=".quick-view" class="btn btn-default"><i class="fa fa-search"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="productCaption clearfix">
                <h5><a href="single-product.html">Sun Buddies</a></h5>
                <h5 class="text-normal">$199</h5>
            </div>
        </div>
    </div>
    <div class="col-sm-3 col-xs-12">
        <div class="imageBox">
            <div class="productImage clearfix">
                <a href="single-product.html">
                    <img src="/themes/taz/assets/img/home/featured-product/product-img10.jpg" alt="featured-product-img">
                </a>
                <div class="productMasking">
                    <ul class="list-inline btn-group" role="group">
                        <li><a data-toggle="modal" href=".login-modal" class="btn btn-default"><i class="fa fa-heart"></i></a></li>
                        <li><a href="cart-page.html" class="btn btn-default"><i class="fa fa-shopping-cart"></i></a></li>
                        <li><a data-toggle="modal" href=".quick-view" class="btn btn-default"><i class="fa fa-search"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="productCaption clearfix">
                <h5><a href="single-product.html">Mauris efficitur</a></h5>
                <h5 class="text-normal">$199</h5>
            </div>
        </div>
    </div>-->
</div>
<!-- END OF SIMILAR PRODUCTIOS .row -->

<div id="modalShareSingleProduct" class="modal fade bd-example-modal-sm" role="dialog">
    <div class="modal-dialog modal-sm">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h5 class="modal-title">Share</h5>
            </div>
            <div class="modal-body">
                <?=
                	Share::widget([
                		'url'=>$url,
                		'type' => Share::TYPE_LARGE
					//'exclude' => ['network1', 'network2']
					]);
                ?>
            </div>
            <!--<div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>-->
        </div>
    </div>
</div>

<script type="text/javascript">
  // return lighter (+lum) or darker (-lum) color as a hex string
  // pass original hex string and luminosity factor, e.g. -0.1 = 10% darker
/*  function ColorLuminance(hex, lum) {

    // validate hex string
    hex = String(hex).replace(/[^0-9a-f]/gi, '');
    if (hex.length < 6) {
      hex = hex[0]+hex[0]+hex[1]+hex[1]+hex[2]+hex[2];
    }
    lum = lum || 0;
    
    // convert to decimal and change luminosity
    var rgb = "#", c, i;
    for (i = 0; i < 3; i++) {
      c = parseInt(hex.substr(i*2,2), 16);
      c = Math.round(Math.min(Math.max(0, c + (c * lum)), 255)).toString(16);
      rgb += ("00"+c).substr(c.length);
    }

    return rgb;
  }
  var color = "#1b5853",
    lum = 0.05,
    out = document.getElementById("out");

  var i, c, nc;
  var colors = new Array();
    
  for (var i = 0; i < 150; i++) {
    //var c = out.appendChild(document.createElement("div"));
    nc = ColorLuminance(color, i*lum);
    //c.style.backgroundColor = nc;
    //c.title = nc;
    colors[i] = nc;
  }
  $(document).ready(function(){
    //console.log(colors);
    // AJAX
    var productId = '<?php //echo $id; ?>';
    var ajaxData = {
                'productId': productId,
                'colors' : colors
            };
    $.ajax({
        type: 'POST',
        url: url,
        data: ajaxData,
        //dataType: 'json',
        success: function (response) {
            showAlert(response.msg); // Show alert message
            $(ref).prop('disabled', true); // Disable the CART button for the current
            return response;
        },
        error: function (xhr) {
            alert('error')
            return xhr.statusText;
            //xhr.status = 404
            //xhr.statusText = error
        }
    });
  });*/
</script>