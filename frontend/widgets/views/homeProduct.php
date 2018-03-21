<?php
use yii\helpers\Html;

$pathPrdImg   = Yii::$app->params['PATH_PRODUCT_IMAGE'];
$prdNoImg     = 'noImage.jpg';

if(!Yii::$app->user->isGuest){
    $userid = Yii::$app->user->id;
    $getUserFavoriteProducts = Yii::$app->ShopComponent->getUserFavoriteProducts($userid);
}else{
    $getUserFavoriteProducts = [];
}
$userFavoriteProducts = ($getUserFavoriteProducts) ? array_column($getUserFavoriteProducts, 'product_id') : [];

$transactionId = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
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
                          <a href="<?php echo Yii::$app->homeUrl.'shop/product/'.$psaProduct->id; ?>">
                            <img src="<?php echo $prdImage; ?>" alt="Product Image"></a>
                        	<div class="productMasking">
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
                          <h3><a href="<?php echo Yii::$app->homeUrl.'shop/product/'.$psaProduct->id; ?>"><?= $psaProduct->product_name; ?></a></h3>
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
                          <a href="<?php echo Yii::$app->homeUrl.'shop/product/'.$slpProduct->id; ?>">
                            <img src="<?php echo $prdImage; ?>" alt="Product Image"></a>
                        </div>
                        <div class="productCaption clearfix">
                          <h3><a href="<?php echo Yii::$app->homeUrl.'shop/product/'.$slpProduct->id; ?>"><?= $slpProduct->product_name; ?></a></h3>
                          <span class="offer-price">&#x20B9; <?= $slpProduct->product_sale_price; ?></span>
                          <!--<span class="regular-price"><del>$80.00</del></span>-->
                          <a href="<?= Yii::$app->homeUrl . 'order/step1?from=product-'.$slpProduct->id.'&transactionId='.$transactionId; ?>" class="btn btn-border" data-product-id="<?= $slpProduct->id; ?>" data-user-id="<?php echo (!Yii::$app->user->isGuest) ? Yii::$app->user->id : 'guest'; ?>">Buy Now<i class="fa fa-angle-right" aria-hidden="true"></i></a>
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
                          <a href="<?php echo Yii::$app->homeUrl.'shop/product/'.$otlProduct->id; ?>">
                            <img src="<?php echo $prdImage; ?>" alt="Product Image"></a>
                        </div>
                        <div class="productCaption clearfix">
                          <h3><a href="<?php echo Yii::$app->homeUrl.'shop/product/'.$otlProduct->id; ?>"><?= $otlProduct->product_name; ?></a></h3>
                          <span class="offer-price">&#x20B9; <?= $otlProduct->product_sale_price; ?></span>
                          <!--<span class="regular-price"><del>$80.00</del></span>-->
                          <a href="<?= Yii::$app->homeUrl . 'order/step1?from=product-'.$otlProduct->id.'&transactionId='.$transactionId; ?>" class="btn btn-border" data-product-id="<?= $otlProduct->id; ?>" data-user-id="<?php echo (!Yii::$app->user->isGuest) ? Yii::$app->user->id : 'guest'; ?>">Buy Now<i class="fa fa-angle-right" aria-hidden="true"></i></a>
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
                          <a href="<?php echo Yii::$app->homeUrl.'shop/product/'.$frcProduct->id; ?>">
                            <img src="<?php echo $prdImage; ?>" alt="Product Image"></a>
                        </div>
                        <div class="productCaption clearfix">
                          <h3><a href="<?php echo Yii::$app->homeUrl.'shop/product/'.$frcProduct->id; ?>"><?= $frcProduct->product_name; ?></a></h3>
                          <span class="offer-price">&#x20B9; <?= $frcProduct->product_sale_price; ?></span>
                          <!--<span class="regular-price"><del>$80.00</del></span>-->
                          <a href="<?= Yii::$app->homeUrl . 'order/step1?from=product-'.$frcProduct->id.'&transactionId='.$transactionId; ?>" class="btn btn-border" data-product-id="<?= $frcProduct->id; ?>" data-user-id="<?php echo (!Yii::$app->user->isGuest) ? Yii::$app->user->id : 'guest'; ?>">Buy Now<i class="fa fa-angle-right" aria-hidden="true"></i></a>
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

