<?php

use bigpaulie\social\share\Share;
use yii\helpers\Url;
use kartik\social\FacebookPlugin;
use frontend\models\UserDetail;

$productData = ($product) ? $product[0] : [];
$this->title = $productData->product_name; //'Product View';
//echo '<pre>'; print_r($productData); echo '</pre>';
$pathPrdImg = Yii::$app->params['PATH_PRODUCT_IMAGE'];
$prdNoImg = 'noImage.png';

$transactionId = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
$url = Url::toRoute('shop/product/' . $productData->id, true);
$sellerAbout = UserDetail::find()->where(['user_id'=>$productData->productOwner->id])->one();
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
                    </div>
                </div> 
                <div class="clearfix">
                    <div id="thumbcarousel" class="carousel slide" data-interval="false">
                        <div class="carousel-inner">
                            <div data-target="#carousel" data-slide-to="0" class="thumb">
                                <img src="<?= $coverImage; ?>">
                            </div>
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
                    <li><?php 
                        echo FacebookPlugin::widget(['type'=>FacebookPlugin::SHARE, 'settings' => ['href' =>$url,'size'=>'small', 'layout'=>'button', 'mobile_iframe'=>'true', 'image'=>'http://talozo.com/dev/common/uploads/product_images/PRD151218123133L6Jj/20181215123133.jpg']]); ?></li>
                </ul>
                <h4><?= $productData->product_name; ?></h4>
                <h4>&#x20B9; <?= Yii::$app->ShopComponent->formatPrice($productData->product_sale_price); ?></h4>
                <p><?= $productData->product_long_description; ?></p>
                <div class="btn-area">
                    <button class="btn btn-primary btn-block add_to_cart" data-product-id="<?= $productData->id; ?>" data-user-id="<?php echo (!Yii::$app->user->isGuest) ? Yii::$app->user->id : 'guest'; ?>" title="Add to cart">Add to Cart </button>
                    <a href="<?= Yii::$app->homeUrl . 'order/step1?from=product-' . $productData->id . '&transactionId=' . $transactionId; ?>" style="margin-top: 0;padding-top: 12px;" class="btn btn-success btn-block" data-product-id="<?= $productData->id; ?>" data-user-id="<?php echo (!Yii::$app->user->isGuest) ? Yii::$app->user->id : 'guest'; ?>" title="Buy Now">Buy Now</a>
                </div>
                <div class="tabArea">
                    <ul class="nav nav-tabs">
                        <li><a data-toggle="tab" href="#aboutSeller">About Seller</a></li>
                        <li class="active"><a data-toggle="tab" href="#details">Details</a></li>
                        <!--<li><a data-toggle="tab" href="#sizing">sizing</a></li>-->
                        <li><a data-toggle="tab" href="#shipping">Shipping</a></li>
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
                        <div id="aboutSeller" class="tab-pane fade in ">
                            <table class="table">
                                <tr>
                                    <td style="border-top: none;">Name</td>
                                    <td style="border-top: none;"><?= $productData->productOwner->firstname.' '.$productData->productOwner->lastname ?></td>
                                </tr>
                                <tr>
                                    <td>About</td>
                                    <td><?php echo ($sellerAbout) ? $sellerAbout->long_about_me : ''; ?></td>
                                </tr>                            
                            </table>
                        </div>
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
                            if ($similarColorProducts) {
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
                                                            <a href="<?= Yii::$app->homeUrl . 'order/step1?from=product-' . $similarColorProduct->id . '&transactionId=' . $transactionId; ?>" data-product-id="<?= $similarColorProduct->id; ?>" data-user-id="<?= (!Yii::$app->user->isGuest) ? Yii::$app->user->id : 'guest'; ?>" class="btn btn-default" title="Buy Now">
                                                                <i class="fa fa-inr" style="margin-right:0"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a data-toggle="modal" href="<?= Yii::$app->homeUrl . 'shop/product/' . $similarColorProduct->id; ?>" class="btn btn-default" title="View <?= $similarColorProduct->product_name; ?>">
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
                            } else {
                                echo '<div class="col-sm-3 col-xs-12"><p>No Results Found</p></div>';
                            }
                            ?>

                            <!--<div class="col-sm-3 col-xs-12">
                            <div class="imageBox">
                              <div class="productImage clearfix">
                                <a href="single-product.html">
                                  <img src="<?php //echo $this->theme->baseUrl;  ?>/assets/img/home/featured-product/product-img5.jpg" alt="featured-product-img">
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
                            if ($similarMaterialProducts) {
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
                                                            <a href="<?= Yii::$app->homeUrl . 'order/step1?from=product-' . $similarMaterialProduct->id . '&transactionId=' . $transactionId; ?>" data-product-id="<?= $similarMaterialProduct->id; ?>" data-user-id="<?= (!Yii::$app->user->isGuest) ? Yii::$app->user->id : 'guest'; ?>" class="btn btn-default" title="Buy Now">
                                                                <i class="fa fa-inr" style="margin-right:0"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a data-toggle="modal" href="<?= Yii::$app->homeUrl . 'shop/product/' . $similarMaterialProduct->id; ?>" class="btn btn-default" title="View <?= $similarMaterialProduct->product_name; ?>">
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
                            } else {
                                echo '<div class="col-sm-3 col-xs-12"><p>No Results Found</p></div>';
                            }
                            ?>

                            <!--<div class="col-sm-3 col-xs-12">
                              <div class="imageBox">
                                <div class="productImage clearfix">
                                  <a href="single-product.html">
                                    <img src="<?php //echo $this->theme->baseUrl;  ?>/assets/img/home/featured-product/product-img5.jpg" alt="featured-product-img">
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
                            <!--<div class="col-sm-3 col-xs-12">
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
                            </div>-->
                            <?php
                            if ($similarTypeProducts) {
                                foreach ($similarTypeProducts as $key => $similarTypeProduct) {
                                    $coverImage = (isset($similarTypeProduct->productImages[0])) ? $pathPrdImg . $similarTypeProduct->product_code . '/' . $similarTypeProduct->productImages[0]->cover_photo : $pathPrdImg . $prdNoImg;
                                    ?>
                                    <div class="col-sm-3 col-xs-12">
                                        <div class="imageBox">
                                            <div class="productImage clearfix">
                                                <a href="<?= Yii::$app->homeUrl . 'shop/product/' . $similarTypeProduct->id; ?>">
                                                    <img src="<?= $coverImage; ?>" alt="PRODUCT IMAGE">
                                                </a>
                                                <div class="singleProduct productMasking">
                                                    <ul class="list-inline btn-group" role="group">
                                                        <li>
                                                            <a data-product-id="<?= $similarTypeProduct->id; ?>" data-user-id="<?= (!Yii::$app->user->isGuest) ? Yii::$app->user->id : 'guest'; ?>" class="btn btn-default add_to_cart" title="Add to Cart">
                                                                <i class="fa fa-shopping-cart" style="margin-right:0"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="<?= Yii::$app->homeUrl . 'order/step1?from=product-' . $similarTypeProduct->id . '&transactionId=' . $transactionId; ?>" data-product-id="<?= $similarTypeProduct->id; ?>" data-user-id="<?= (!Yii::$app->user->isGuest) ? Yii::$app->user->id : 'guest'; ?>" class="btn btn-default" title="Buy Now">
                                                                <i class="fa fa-inr" style="margin-right:0"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a data-toggle="modal" href="<?= Yii::$app->homeUrl . 'shop/product/' . $similarTypeProduct->id; ?>" class="btn btn-default" title="View <?= $similarTypeProduct->product_name; ?>">
                                                                <i class="fa fa-eye" style="margin-right:0"></i>
                                                            </a>  
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="productCaption clearfix">
                                                <h5><a href="<?= Yii::$app->homeUrl . 'shop/product/' . $similarTypeProduct->id; ?>"><?= $similarTypeProduct->product_name; ?></a></h5>
                                                <h3>&#x20B9; <?= $similarTypeProduct->product_sale_price; ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }// END LOOP
                            } else {
                                echo '<div class="col-sm-3 col-xs-12"><p>No Results Found</p></div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END OF FEATURE PRODUCT SECTION -->    
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
                    'url' => $url,
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
