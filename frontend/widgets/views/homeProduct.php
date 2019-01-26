<?php
use yii\helpers\Html;

$pathPrdImg   = Yii::$app->params['PATH_PRODUCT_IMAGE'];
$prdNoImg     = 'noImage.png';

if(!Yii::$app->user->isGuest){
    $userid = Yii::$app->user->id;
    $getUserFavoriteProducts = Yii::$app->ShopComponent->getUserFavoriteProducts($userid);
}else{
    $getUserFavoriteProducts = [];
}
$userFavoriteProducts = ($getUserFavoriteProducts) ? array_column($getUserFavoriteProducts, 'product_id') : [];

$transactionId = Yii::$app->Common->generateTransactionID();
//$transactionId = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
//echo '<pre>'; print_r($newArrivals); echo '<pre>';
?>

<div class="row dealSection">
            <div class="col-xs-12">
              <div class="page-header">
                <h4 class="media-heading"><a href="<?php echo Yii::$app->homeUrl.'shop/products/1'; ?>" title="PSA Products">PSA Products</a></h4>
              </div>
            </div>
            <div class="col-xs-12">
              <div class="owl-carousel dealSlider">
                <?php 
                if($psaProducts){
                  foreach ($psaProducts as $key => $psaProduct) { 
                    $productOwnerName = ($psaProduct->productOwner) ? $psaProduct->productOwner->firstname.' '.$psaProduct->productOwner->lastname : '';
                    if(isset($psaProduct->productImages[0])){
                      $coverImage = ($psaProduct->productImages[0]->crop_image) ? $psaProduct->productImages[0]->crop_image : $psaProduct->productImages[0]->cover_photo;
                    }else{
                      $coverImage = '';
                    }
                    $prdImage   = (isset($psaProduct->productImages[0])) ? $pathPrdImg.$psaProduct->product_code.'/'.$coverImage : $pathPrdImg.$prdNoImg;
                    //$coverImage = (isset($psaProduct->productImages[0]) && $psaProduct->productImages[0]->crop_image) ? $psaProduct->productImages[0]->crop_image : $psaProduct->productImages[0]->cover_photo;
                    
                    ?>
                    <div class="slide">
                      <div class="imageBox">
                        <div class="productDeal clearfix">
                          <!--<h3>End In <span>20 Oct</span></h3>-->
                          <?php $favoriteClass = (in_array($psaProduct->id, $userFavoriteProducts)) ? 'homeUserFavorited' : ''; ?>
                          <span class="rating homeUserFavorite <?= $favoriteClass; ?>" data-product-id="<?= $psaProduct->id; ?>" data-user-id="<?php echo (!Yii::$app->user->isGuest) ? Yii::$app->user->id : 'guest'; ?>">
                              <span class="favoriteCount"><?= Yii::$app->ShopComponent->getProductFavoriteCount($psaProduct->id); ?></span><i class="fa fa-heart fa-1" aria-hidden="true"></i>
                          </span>
                        </div>
                        <div class="productImage clearfix">
                          <a href="<?php echo Yii::$app->homeUrl.'shop/product/'.$psaProduct->id; ?>" title="<?= $psaProduct->product_name; ?>">
                            <img src="<?php echo $prdImage; ?>" alt="Product Image"></a>
                        	<div class="home productMasking">
                              <ul class="list-inline btn-group" role="group">
                                <li>
                                    <a data-product-id="<?= $psaProduct->id; ?>" data-user-id="<?= (!Yii::$app->user->isGuest) ? Yii::$app->user->id : 'guest'; ?>" class="btn btn-default add_to_cart" title="Add to Cart">
                                        <i class="fa fa-shopping-cart" style="margin-right:0"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= Yii::$app->homeUrl . 'order/step1?from=product-'.$psaProduct->id.'&transactionId='.$transactionId; ?>" data-product-id="<?= $psaProduct->id; ?>" data-user-id="<?= (!Yii::$app->user->isGuest) ? Yii::$app->user->id : 'guest'; ?>" class="btn btn-default" title="Buy Now">
                                        <i class="fa fa-inr" style="margin-right:0"></i>
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="modal" href="<?= Yii::$app->homeUrl.'shop/product/'.$psaProduct->id; ?>" class="btn btn-default" title="View <?= $psaProduct->product_name; ?>">
                                        <i class="fa fa-eye" style="margin-right:0"></i>
                                    </a>  
                                </li>
                              </ul>
                            </div>
                        </div>
                        <div class="productCaption clearfix">
                          <h3><a href="<?php echo Yii::$app->homeUrl.'shop/product/'.$psaProduct->id; ?>" title="<?= $psaProduct->product_name; ?>"><?= $psaProduct->product_name; ?></a></h3>
                          <?php
                          if($productOwnerName){
                            ?>
                            <h3 class="seller-name">
                              By : <?= $productOwnerName; ?>
                            </h3>
                            <?php
                          }
                          ?>
                          
                          <span class="offer-price">&#x20B9; <?= $psaProduct->product_sale_price; ?></span>
                          <!--<span class="regular-price"><del>$80.00</del></span>-->
                          <?php /*?><a href="<?= Yii::$app->homeUrl . 'order/step1?from=product-'.$psaProduct->id.'&transactionId='.$transactionId; ?>" class="btn btn-border" data-product-id="<?= $psaProduct->id; ?>" data-user-id="<?php echo (!Yii::$app->user->isGuest) ? Yii::$app->user->id : 'guest'; ?>">Buy Now<i class="fa fa-angle-right" aria-hidden="true"></i></a><?php */ ?>
                        </div>
                      </div>
                    </div>
                    <?php
                  }
                  ?>
                  <?php
                }else{
                  // No Results Found
                  echo '<p classs="text-muted">No results found</p>';
                }
                ?>
              </div>
            </div>  
          </div>
          
<div class="row dealSection">
            <div class="col-xs-12">
              <div class="page-header">
                <h4 class="media-heading"><a href="<?php echo Yii::$app->homeUrl.'shop/products/2'; ?>" title="SLP Products">SLP Products</a></h4>
              </div>
            </div>
            <div class="col-xs-12">
              <div class="owl-carousel dealSlider">

              <?php 
                if($slpProducts){
                  foreach ($slpProducts as $key => $slpProduct) { 
                    $productOwnerName = ($slpProduct->productOwner) ? $slpProduct->productOwner->firstname.' '.$slpProduct->productOwner->lastname : '';
                    //$prdImage   = (isset($slpProduct->productImages[0])) ? $pathPrdImg.$slpProduct->product_code.'/'.$slpProduct->productImages[0]->cover_photo : $pathPrdImg.$prdNoImg;
                    if(isset($slpProduct->productImages[0])){
                      $coverImage = ($slpProduct->productImages[0]->crop_image) ? $slpProduct->productImages[0]->crop_image : $slpProduct->productImages[0]->cover_photo;
                    }else{
                      $coverImage = '';
                    }
                    $prdImage   = (isset($slpProduct->productImages[0])) ? $pathPrdImg.$slpProduct->product_code.'/'.$coverImage : $pathPrdImg.$prdNoImg;
                    ?>
                    

                    <div class="slide">
                      <div class="imageBox">
                        <div class="productDeal clearfix">
                          <!--<h3>End In <span>20 Oct</span></h3>-->
                          <?php $favoriteClass = (in_array($slpProduct->id, $userFavoriteProducts)) ? 'homeUserFavorited' : ''; ?>
                          <span class="rating homeUserFavorite <?= $favoriteClass; ?>" data-product-id="<?= $slpProduct->id; ?>" data-user-id="<?php echo (!Yii::$app->user->isGuest) ? Yii::$app->user->id : 'guest'; ?>">
                              <span class="favoriteCount"><?= Yii::$app->ShopComponent->getProductFavoriteCount($slpProduct->id); ?></span><i class="fa fa-heart fa-1" aria-hidden="true"></i>
                          </span>
                        </div>
                        <div class="productImage clearfix">
                          <a href="<?php echo Yii::$app->homeUrl.'shop/product/'.$slpProduct->id; ?>" title="<?= $slpProduct->product_name; ?>">
                            <img src="<?php echo $prdImage; ?>" alt="Product Image"></a>
                            <!-- MASKING -->
                          <div class="home productMasking">
                              <ul class="list-inline btn-group" role="group">
                                <li>
                                    <a data-product-id="<?= $slpProduct->id; ?>" data-user-id="<?= (!Yii::$app->user->isGuest) ? Yii::$app->user->id : 'guest'; ?>" class="btn btn-default add_to_cart" title="Add to Cart">
                                        <i class="fa fa-shopping-cart" style="margin-right:0"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= Yii::$app->homeUrl . 'order/step1?from=product-'.$slpProduct->id.'&transactionId='.$transactionId; ?>" data-product-id="<?= $slpProduct->id; ?>" data-user-id="<?= (!Yii::$app->user->isGuest) ? Yii::$app->user->id : 'guest'; ?>" class="btn btn-default" title="Buy Now">
                                        <i class="fa fa-inr" style="margin-right:0"></i>
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="modal" href="<?= Yii::$app->homeUrl.'shop/product/'.$slpProduct->id; ?>" class="btn btn-default" title="View <?= $slpProduct->product_name; ?>">
                                        <i class="fa fa-eye" style="margin-right:0"></i>
                                    </a>  
                                </li>
                              </ul>
                            </div>
                            <!-- END OF MASKING -->
                        </div>
                        <div class="productCaption clearfix">
                          <h3><a href="<?php echo Yii::$app->homeUrl.'shop/product/'.$slpProduct->id; ?>" title="<?= $slpProduct->product_name; ?>"><?= $slpProduct->product_name; ?></a></h3>
                          <?php
                          if($productOwnerName){
                            ?>
                            <h3 class="seller-name">
                              By : <?= $productOwnerName; ?>
                            </h3>
                            <?php
                          }
                          ?>
                          <span class="offer-price">&#x20B9; <?= $slpProduct->product_sale_price; ?></span>
                          <!--<span class="regular-price"><del>$80.00</del></span>-->
                          <?php /* ?><a href="<?= Yii::$app->homeUrl . 'order/step1?from=product-'.$slpProduct->id.'&transactionId='.$transactionId; ?>" class="btn btn-border" data-product-id="<?= $slpProduct->id; ?>" data-user-id="<?php echo (!Yii::$app->user->isGuest) ? Yii::$app->user->id : 'guest'; ?>">Buy Now<i class="fa fa-angle-right" aria-hidden="true"></i></a><?php */ ?>
                        </div>
                      </div>
                    </div>
                    <?php
                  }
                }else{
                  // No Results Found
                  echo '<p classs="text-muted">No results found</p>';
                }
                ?>
              </div>
            </div>  
          </div>
          
          
<div class="row dealSection">
            <div class="col-xs-12">
              <div class="page-header">
                <h4 class="media-heading"><a href="<?php echo Yii::$app->homeUrl.'shop/products/3'; ?>" title="OTL Products">OTL Products</a></h4>
              </div>
            </div>
            <div class="col-xs-12">
              <div class="owl-carousel dealSlider">
              <?php 
                if($otlProducts){
                  foreach ($otlProducts as $key => $otlProduct) { 
                    $productOwnerName = ($otlProduct->productOwner) ? $otlProduct->productOwner->firstname.' '.$otlProduct->productOwner->lastname : '';
                    //$prdImage   = (isset($otlProduct->productImages[0])) ? $pathPrdImg.$otlProduct->product_code.'/'.$otlProduct->productImages[0]->cover_photo : $pathPrdImg.$prdNoImg;
                    if(isset($otlProduct->productImages[0])){
                      $coverImage = ($otlProduct->productImages[0]->crop_image) ? $otlProduct->productImages[0]->crop_image : $otlProduct->productImages[0]->cover_photo;
                    }else{
                      $coverImage = '';
                    }
                    $prdImage   = (isset($otlProduct->productImages[0])) ? $pathPrdImg.$otlProduct->product_code.'/'.$coverImage : $pathPrdImg.$prdNoImg;
                    ?>
                    <div class="slide">
                      <div class="imageBox">
                        <div class="productDeal clearfix">
                          <!--<h3>End In <span>20 Oct</span></h3>-->
                          <?php $favoriteClass = (in_array($otlProduct->id, $userFavoriteProducts)) ? 'homeUserFavorited' : ''; ?>
                          <span class="rating homeUserFavorite <?= $favoriteClass; ?>" data-product-id="<?= $otlProduct->id; ?>" data-user-id="<?php echo (!Yii::$app->user->isGuest) ? Yii::$app->user->id : 'guest'; ?>">
                              <span class="favoriteCount"><?= Yii::$app->ShopComponent->getProductFavoriteCount($otlProduct->id); ?></span><i class="fa fa-heart fa-1" aria-hidden="true"></i>
                          </span>
                        </div>
                        <div class="productImage clearfix">
                          <a href="<?php echo Yii::$app->homeUrl.'shop/product/'.$otlProduct->id; ?>" title="<?= $otlProduct->product_name; ?>">
                            <img src="<?php echo $prdImage; ?>" alt="Product Image"></a>
                          <!-- MASKING -->
                          <div class="home productMasking">
                              <ul class="list-inline btn-group" role="group">
                                <li>
                                    <a data-product-id="<?= $otlProduct->id; ?>" data-user-id="<?= (!Yii::$app->user->isGuest) ? Yii::$app->user->id : 'guest'; ?>" class="btn btn-default add_to_cart" title="Add to Cart">
                                        <i class="fa fa-shopping-cart" style="margin-right:0"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= Yii::$app->homeUrl . 'order/step1?from=product-'.$otlProduct->id.'&transactionId='.$transactionId; ?>" data-product-id="<?= $otlProduct->id; ?>" data-user-id="<?= (!Yii::$app->user->isGuest) ? Yii::$app->user->id : 'guest'; ?>" class="btn btn-default" title="Buy Now">
                                        <i class="fa fa-inr" style="margin-right:0"></i>
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="modal" href="<?= Yii::$app->homeUrl.'shop/product/'.$otlProduct->id; ?>" class="btn btn-default" title="View <?= $otlProduct->product_name; ?>">
                                        <i class="fa fa-eye" style="margin-right:0"></i>
                                    </a>  
                                </li>
                              </ul>
                            </div>
                            <!-- END OF MASKING -->
                        </div>
                        <div class="productCaption clearfix">
                          <h3><a href="<?php echo Yii::$app->homeUrl.'shop/product/'.$otlProduct->id; ?>" title="<?= $otlProduct->product_name; ?>"><?= $otlProduct->product_name; ?></a></h3>
                          <?php
                          if($productOwnerName){
                            ?>
                            <h3 class="seller-name">
                              By : <?= $productOwnerName; ?>
                            </h3>
                            <?php
                          }
                          ?>
                          <span class="offer-price">&#x20B9; <?= $otlProduct->product_sale_price; ?></span>
                          <!--<span class="regular-price"><del>$80.00</del></span>-->
                          <?php /* ?><a href="<?= Yii::$app->homeUrl . 'order/step1?from=product-'.$otlProduct->id.'&transactionId='.$transactionId; ?>" class="btn btn-border" data-product-id="<?= $otlProduct->id; ?>" data-user-id="<?php echo (!Yii::$app->user->isGuest) ? Yii::$app->user->id : 'guest'; ?>">Buy Now<i class="fa fa-angle-right" aria-hidden="true"></i></a><?php */ ?>
                        </div>
                      </div>
                    </div>
                    <?php
                  }
                }else{
                  // No Results Found
                  echo '<p classs="text-muted">No results found</p>';
                }
                ?>
              </div>
            </div>  
          </div>
          
<!-- Begin One Section -->          
<div class="row dealSection">
            <div class="col-xs-12">
              <div class="page-header">
                <h4 class="media-heading"><a href="<?php echo Yii::$app->homeUrl.'shop/products/4'; ?>" title="FRC Products">FRC Products</a></h4>
              </div>
            </div>
            <div class="col-xs-12">
              <div class="owl-carousel dealSlider">
                <?php 
                if($frcProducts){
                  foreach ($frcProducts as $key => $frcProduct) { 
                    $productOwnerName = ($frcProduct->productOwner) ? $frcProduct->productOwner->firstname.' '.$frcProduct->productOwner->lastname : '';
                    //$prdImage   = (isset($frcProduct->productImages[0])) ? $pathPrdImg.$frcProduct->product_code.'/'.$frcProduct->productImages[0]->cover_photo : $pathPrdImg.$prdNoImg;
                    if(isset($frcProduct->productImages[0])){
                      $coverImage = ($frcProduct->productImages[0]->crop_image) ? $frcProduct->productImages[0]->crop_image : $frcProduct->productImages[0]->cover_photo;
                    }else{
                      $coverImage = '';
                    }
                    $prdImage   = (isset($frcProduct->productImages[0])) ? $pathPrdImg.$frcProduct->product_code.'/'.$coverImage : $pathPrdImg.$prdNoImg;
                    ?>
                    <div class="slide">
                      <div class="imageBox">
                        <div class="productDeal clearfix">
                          <!--<h3>End In <span>20 Oct</span></h3>-->
                          <?php $favoriteClass = (in_array($frcProduct->id, $userFavoriteProducts)) ? 'homeUserFavorited' : ''; ?>
                          <span class="rating homeUserFavorite <?= $favoriteClass; ?>" data-product-id="<?= $frcProduct->id; ?>" data-user-id="<?php echo (!Yii::$app->user->isGuest) ? Yii::$app->user->id : 'guest'; ?>">
                              <span class="favoriteCount"><?= Yii::$app->ShopComponent->getProductFavoriteCount($frcProduct->id); ?></span><i class="fa fa-heart fa-1" aria-hidden="true"></i>
                          </span>
                        </div>
                        <div class="productImage clearfix">
                          <a href="<?php echo Yii::$app->homeUrl.'shop/product/'.$frcProduct->id; ?>" title="<?= $frcProduct->product_name; ?>">
                            <img src="<?php echo $prdImage; ?>" alt="Product Image"></a>
                          <!-- MASKING -->
                          <div class="home productMasking">
                              <ul class="list-inline btn-group" role="group">
                                <li>
                                    <a data-product-id="<?= $frcProduct->id; ?>" data-user-id="<?= (!Yii::$app->user->isGuest) ? Yii::$app->user->id : 'guest'; ?>" class="btn btn-default add_to_cart" title="Add to Cart">
                                        <i class="fa fa-shopping-cart" style="margin-right:0"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= Yii::$app->homeUrl . 'order/step1?from=product-'.$frcProduct->id.'&transactionId='.$transactionId; ?>" data-product-id="<?= $frcProduct->id; ?>" data-user-id="<?= (!Yii::$app->user->isGuest) ? Yii::$app->user->id : 'guest'; ?>" class="btn btn-default" title="Buy Now">
                                        <i class="fa fa-inr" style="margin-right:0"></i>
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="modal" href="<?= Yii::$app->homeUrl.'shop/product/'.$frcProduct->id; ?>" class="btn btn-default" title="View <?= $frcProduct->product_name; ?>">
                                        <i class="fa fa-eye" style="margin-right:0"></i>
                                    </a>  
                                </li>
                              </ul>
                            </div>
                            <!-- END OF MASKING -->
                        </div>
                        <div class="productCaption clearfix">
                          <h3><a href="<?php echo Yii::$app->homeUrl.'shop/product/'.$frcProduct->id; ?>" title="<?= $frcProduct->product_name; ?>"><?= $frcProduct->product_name; ?></a></h3>
                          <?php
                          if($productOwnerName){
                            ?>
                            <h3 class="seller-name">
                              By : <?= $productOwnerName; ?>
                            </h3>
                            <?php
                          }
                          ?>
                          <span class="offer-price">&#x20B9; <?= $frcProduct->product_sale_price; ?></span>
                          <!--<span class="regular-price"><del>$80.00</del></span>-->
                          <?php /* ?><a href="<?= Yii::$app->homeUrl . 'order/step1?from=product-'.$frcProduct->id.'&transactionId='.$transactionId; ?>" class="btn btn-border" data-product-id="<?= $frcProduct->id; ?>" data-user-id="<?php echo (!Yii::$app->user->isGuest) ? Yii::$app->user->id : 'guest'; ?>">Buy Now<i class="fa fa-angle-right" aria-hidden="true"></i></a><?php */ ?>
                        </div>
                      </div>
                    </div>
                    <?php
                  }
                }else{
                  // No Results Found
                  echo '<p classs="text-muted">No results found</p>';
                }
                ?>
              </div>
            </div>  
          </div>
          
<!-- End One Section -->

<!-- FEATURE PRODUCT SECTION -->
<div class="row featuredProducts version3">
            <div class="col-xs-12">
              <div class="tabCommon">
                <ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#newArrivals">New Araivals</a></li> 
                  <li><a data-toggle="tab" href="#topFavorited">Top Rated</a></li>
                  <li><a data-toggle="tab" href="#menu3">On Sale</a></li>
                </ul>
                <div class="tab-bottom">
                </div>
                <div class="tab-content">

                  <!--
                  NEW ARRIALS
                  -->
                  <div id="newArrivals" class="tab-pane fade in active">
                    <div class="row">
                      <?php 
                      if($newArrivals){
                        foreach ($newArrivals as $key => $newArrival) {
                          $productOwnerName = ($newArrival->productOwner) ? $newArrival->productOwner->firstname.' '.$newArrival->productOwner->lastname : '';
                          if(isset($newArrival->productImages[0])){
                            $coverImage = ($newArrival->productImages[0]->crop_image) ? $newArrival->productImages[0]->crop_image : $newArrival->productImages[0]->cover_photo;
                          }else{
                            $coverImage = '';
                          }
                          $prdImage   = (isset($newArrival->productImages[0])) ? $pathPrdImg.$newArrival->product_code.'/'.$coverImage : $pathPrdImg.$prdNoImg;
                        ?>

                        <div class="col-sm-3 col-xs-12">
                          <div class="home-image-box imageBox">
                            <div class="productImage clearfix">
                              <a href="single-product.html">
                                <img src="<?= $prdImage; ?>" alt="featured-product-img">
                              </a>
                              <!--<div class="productMasking">
                                <ul class="list-inline btn-group" role="group">
                                  <li><a data-toggle="modal" href=".login-modal" class="btn btn-default"><i class="fa fa-heart"></i></a></li>
                                  <li><a href="cart-page.html" class="btn btn-default"><i class="fa fa-shopping-cart"></i></a></li>
                                  <li><a data-toggle="modal" href=".quick-view" class="btn btn-default"><i class="fa fa-search"></i></a></li>
                                </ul>
                              </div>-->
                              <div class="productMasking">
                                <ul class="list-inline btn-group" role="group">
                                  <li>
                                      <a data-product-id="<?= $newArrival->id; ?>" data-user-id="<?= (!Yii::$app->user->isGuest) ? Yii::$app->user->id : 'guest'; ?>" class="btn btn-default add_to_cart" title="Add to Cart">
                                          <i class="fa fa-shopping-cart" style="margin-right:0"></i>
                                      </a>
                                  </li>
                                  <li>
                                      <a href="<?= Yii::$app->homeUrl . 'order/step1?from=product-'.$newArrival->id.'&transactionId='.$transactionId; ?>" data-product-id="<?= $newArrival->id; ?>" data-user-id="<?= (!Yii::$app->user->isGuest) ? Yii::$app->user->id : 'guest'; ?>" class="btn btn-default" title="Buy Now">
                                          <i class="fa fa-inr" style="margin-right:0"></i>
                                      </a>
                                  </li>
                                  <li>
                                      <a data-toggle="modal" href="<?= Yii::$app->homeUrl.'shop/product/'.$newArrival->id; ?>" class="btn btn-default" title="View <?= $newArrival->product_name; ?>">
                                          <i class="fa fa-eye" style="margin-right:0"></i>
                                      </a>  
                                  </li>
                                </ul>
                              </div>
                            </div>
                            
                            <?php /*?><div class="productCaption clearfix">
                              <h5><a href="<?= Yii::$app->homeUrl.'shop/product/'.$newArrival->id; ?>"><?= $newArrival->product_name; ?></a></h5>
                              <h3>&#x20B9; <?= $newArrival->product_sale_price; ?></h3>
                            </div><?php */ ?>

                            <div class="productCaption clearfix">
                              <h3><a href="<?php echo Yii::$app->homeUrl.'shop/product/'.$newArrival->id; ?>" title="<?= $newArrival->product_name; ?>"><?= $newArrival->product_name; ?></a></h3>
                              <?php
                              if($productOwnerName){
                                ?>
                                <h3 class="seller-name">
                                  By : <?= $productOwnerName; ?>
                                </h3>
                                <?php
                              }
                              ?>
                              <span class="offer-price">&#x20B9; <?= $newArrival->product_sale_price; ?></span>
                            </div>

                          </div>
                        </div>

                        <?php
                        } // foreach
                      }else{
                        echo '<div class="col-sm-3 col-xs-12"><p>No Results Found </p></div>';
                      }
                      ?>
                    </div>
                  </div>
                  <!--
                  END OF NEW ARRIALS
                  -->

                  <!--
                  TOP FAVORITED
                  -->
                  <div id="topFavorited" class="tab-pane fade">
                    <div class="row">
                      <?php 
                      if($topFavoriteProducts){
                        foreach ($topFavoriteProducts as $key => $topFavoriteProduct) { //echo '<pre>'; print_r($topFavoriteProduct); exit;
                          $productOwnerName = ($topFavoriteProduct['productOwner']) ? $topFavoriteProduct['productOwner'] : '';
                          // GET PRODUCT IMAGE
                          $productImages = Yii::$app->ShopComponent->getProductImageByProductId($topFavoriteProduct['product_id']);
                          //echo '<pre>'; print_r($topFavoriteProduct); echo '</pre>'; 
                          if($productImages){
                            $coverImage = ($productImages[0]->crop_image) ? $productImages[0]->crop_image : $productImages[0]->cover_photo;
                          }else{
                            $coverImage = '';
                          }
                          $prdImage   = (isset($productImages[0])) ? $pathPrdImg.$topFavoriteProduct['product_code'].'/'.$coverImage : $pathPrdImg.$prdNoImg;
                          ?>

                          <div class="col-sm-3 col-xs-12">
                            <div class="home-image-box imageBox">
                              <div class="productImage clearfix">
                                <a href="#">
                                  <img src="<?= $prdImage; ?>" alt="featured-product-img">
                                </a>
                                <!--<div class="productMasking">
                                  <ul class="list-inline btn-group" role="group">
                                    <li><a data-toggle="modal" href=".login-modal" class="btn btn-default"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="cart-page.html" class="btn btn-default"><i class="fa fa-shopping-cart"></i></a></li>
                                    <li><a data-toggle="modal" href=".quick-view" class="btn btn-default"><i class="fa fa-search"></i></a></li>
                                  </ul>
                                </div>-->
                                <div class="productMasking">
                                  <ul class="list-inline btn-group" role="group">
                                    <li>
                                        <a data-product-id="<?= $topFavoriteProduct['product_id']; ?>" data-user-id="<?= (!Yii::$app->user->isGuest) ? Yii::$app->user->id : 'guest'; ?>" class="btn btn-default add_to_cart" title="Add to Cart">
                                            <i class="fa fa-shopping-cart" style="margin-right:0"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= Yii::$app->homeUrl . 'order/step1?from=product-'.$topFavoriteProduct['product_id'].'&transactionId='.$transactionId; ?>" data-product-id="<?= $topFavoriteProduct['product_id']; ?>" data-user-id="<?= (!Yii::$app->user->isGuest) ? Yii::$app->user->id : 'guest'; ?>" class="btn btn-default" title="Buy Now">
                                            <i class="fa fa-inr" style="margin-right:0"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="modal" href="<?= Yii::$app->homeUrl.'shop/product/'.$topFavoriteProduct['product_id']; ?>" class="btn btn-default" title="View <?= $topFavoriteProduct['product_name']; ?>">
                                            <i class="fa fa-eye" style="margin-right:0"></i>
                                        </a>  
                                    </li>
                                  </ul>
                                </div>
                              </div>
                              <?php /*?><div class="productCaption clearfix">
                                <h5><a href="<?= Yii::$app->homeUrl.'shop/product/'.$topFavoriteProduct['product_id']; ?>"><?= $topFavoriteProduct['product_name']; ?></a></h5>
                                <h3>&#x20B9; <?= $topFavoriteProduct['product_sale_price']; ?></h3>
                              </div><?php */ ?>
                              <div class="productCaption clearfix">
                                <h3><a href="<?php echo Yii::$app->homeUrl.'shop/product/'.$topFavoriteProduct['product_id']; ?>" title="<?= $topFavoriteProduct['product_name']; ?>"><?= $topFavoriteProduct['product_name']; ?></a></h3>
                                <?php
                                if($productOwnerName){
                                  ?>
                                  <h3 class="seller-name">
                                    By : <?= $productOwnerName; ?>
                                  </h3>
                                  <?php
                                }
                                ?>
                                <span class="offer-price">&#x20B9; <?= $topFavoriteProduct['product_sale_price']; ?></span>
                            </div>
                            </div>
                          </div>

                          <?php
                        }
                      }else{
                        echo '<div class="col-sm-3 col-xs-12"><p>No Results Found</p></div>';
                      }
                      ?>
                    </div>
                  </div>
                  <!--
                  END OF TOP FAVORITED
                  -->
                  <div id="menu3" class="tab-pane fade">
                    <div class="row">
                      <div class="col-sm-3 col-xs-12">
                        <div class="home-image-box imageBox">
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
                        <div class="home-image-box imageBox">
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
                        <div class="home-image-box imageBox">
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
                        <div class="home-image-box imageBox">
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
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
<!-- END OF FEATURE PRODUCT SECTION -->