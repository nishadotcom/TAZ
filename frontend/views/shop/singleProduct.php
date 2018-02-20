<?php
$productData = ($product) ? $product[0] : [];
$this->title = $productData->product_name;//'Product View';

//echo '<pre>'; print_r($productData); echo '</pre>';
$pathPrdImg = Yii::$app->params['PATH_PRODUCT_IMAGE'];
$prdNoImg = 'noImage.jpg';

$transactionId = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
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
                    <li><a href="#"><i class="fa fa-plus" aria-hidden="true"></i>Share This</a></li>
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
                        <li class="active"><a data-toggle="tab" href="#details">details</a></li>
                        <!--<li><a data-toggle="tab" href="#about-art">about</a></li>-->
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
                        <?php /* ?>
                          <div id="about-art" class="tab-pane fade">
                          <p><?= $productData->product_long_description; ?></p>
                          </div><?php */ ?>
                        <!--<div id="sizing" class="tab-pane fade">
                          <p>Praesent dui felis, gravida a auctor at, facilisis commodo ipsum. Cras eu faucibus justo. Nullam varius cursus nisi, sed elementum sem sagittis at. Nulla tellus massa, vestibulum a commodo facilisis, pulvinar convallis nunc.</p>
                        </div>-->
                        <div id="shipping" class="tab-pane fade">
                            <p>Under Constrction</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
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
    </div>


</div>