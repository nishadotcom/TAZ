<?php
use yii\helpers\Html;

$pathPrdImg   = Yii::$app->params['PATH_PRODUCT_IMAGE'];
$prdNoImg     = 'noImage.jpg';

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
                    $prdImage   = (isset($psaProduct->productImages[0])) ? $pathPrdImg.$psaProduct->product_code.'/'.$psaProduct->productImages[0]->cover_photo : $pathPrdImg.$prdNoImg;
                    ?>
                    <div class="slide">
                      <div class="imageBox">
                        <div class="productDeal clearfix">
                          <!--<h3>End In <span>20 Oct</span></h3>-->
                          <span class="rating">
                            5<i class="fa fa-heart fa-1" aria-hidden="true"></i>
                          </span>
                        </div>
                        <div class="productImage clearfix">
                          <a href="<?php echo Yii::$app->homeUrl.'shop/product/'.$psaProduct->id; ?>">
                            <img src="<?php echo $prdImage; ?>" alt="Product Image"></a>
                        </div>
                        <div class="productCaption clearfix">
                          <h3><a href="<?php echo Yii::$app->homeUrl.'shop/product/'.$psaProduct->id; ?>"><?= $psaProduct->product_name; ?></a></h3>
                          <span class="offer-price"><?= $psaProduct->product_sale_price; ?></span>
                          <!--<span class="regular-price"><del>$80.00</del></span>-->
                          <a href="#" class="btn btn-border">Buy Now<i class="fa fa-angle-right" aria-hidden="true"></i></a>
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
                <h4 class="media-heading"><a href="<?php echo Yii::$app->homeUrl.'shop/products/2'; ?>" title="SLP Products">SLP Products</a></h4>
              </div>
            </div>
            <div class="col-xs-12">
              <div class="owl-carousel dealSlider">

              <?php 
                if($slpProducts){
                  foreach ($slpProducts as $key => $slpProduct) { 
                    $prdImage   = (isset($slpProduct->productImages[0])) ? $pathPrdImg.$slpProduct->product_code.'/'.$slpProduct->productImages[0]->cover_photo : $pathPrdImg.$prdNoImg;
                    ?>
                    <div class="slide">
                      <div class="imageBox">
                        <div class="productDeal clearfix">
                          <!--<h3>End In <span>20 Oct</span></h3>-->
                          <span class="rating">
                            5<i class="fa fa-heart fa-1" aria-hidden="true"></i>
                          </span>
                        </div>
                        <div class="productImage clearfix">
                          <a href="<?php echo Yii::$app->homeUrl.'shop/product/'.$slpProduct->id; ?>">
                            <img src="<?php echo $prdImage; ?>" alt="Product Image"></a>
                        </div>
                        <div class="productCaption clearfix text-center">
                          <h3><a href="<?php echo Yii::$app->homeUrl.'shop/product/'.$slpProduct->id; ?>"><?= $slpProduct->product_name; ?></a></h3>
                          <span class="offer-price"><?= $slpProduct->product_sale_price; ?></span>
                          <!--<span class="regular-price"><del>$80.00</del></span>-->
                          <a href="#" class="btn btn-border">Buy Now<i class="fa fa-angle-right" aria-hidden="true"></i></a>
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
                    $prdImage   = (isset($otlProduct->productImages[0])) ? $pathPrdImg.$otlProduct->product_code.'/'.$otlProduct->productImages[0]->cover_photo : $pathPrdImg.$prdNoImg;
                    ?>
                    <div class="slide">
                      <div class="imageBox">
                        <div class="productDeal clearfix">
                          <!--<h3>End In <span>20 Oct</span></h3>-->
                          <span class="rating">
                            5<i class="fa fa-heart fa-1" aria-hidden="true"></i>
                          </span>
                        </div>
                        <div class="productImage clearfix">
                          <a href="<?php echo Yii::$app->homeUrl.'shop/product/'.$otlProduct->id; ?>">
                            <img src="<?php echo $prdImage; ?>" alt="Product Image"></a>
                        </div>
                        <div class="productCaption clearfix text-center">
                          <h3><a href="<?php echo Yii::$app->homeUrl.'shop/product/'.$otlProduct->id; ?>"><?= $otlProduct->product_name; ?></a></h3>
                          <span class="offer-price"><?= $otlProduct->product_sale_price; ?></span>
                          <!--<span class="regular-price"><del>$80.00</del></span>-->
                          <a href="#" class="btn btn-border">Buy Now<i class="fa fa-angle-right" aria-hidden="true"></i></a>
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
                    $prdImage   = (isset($frcProduct->productImages[0])) ? $pathPrdImg.$frcProduct->product_code.'/'.$frcProduct->productImages[0]->cover_photo : $pathPrdImg.$prdNoImg;
                    ?>
                    <div class="slide">
                      <div class="imageBox">
                        <div class="productDeal clearfix">
                          <!--<h3>End In <span>20 Oct</span></h3>-->
                          <span class="rating">
                            5<i class="fa fa-heart fa-1" aria-hidden="true"></i>
                          </span>
                        </div>
                        <div class="productImage clearfix">
                          <a href="<?php echo Yii::$app->homeUrl.'shop/product/'.$frcProduct->id; ?>">
                            <img src="<?php echo $prdImage; ?>" alt="Product Image"></a>
                        </div>
                        <div class="productCaption clearfix text-center">
                          <h3><a href="<?php echo Yii::$app->homeUrl.'shop/product/'.$frcProduct->id; ?>"><?= $frcProduct->product_name; ?></a></h3>
                          <span class="offer-price"><?= $frcProduct->product_sale_price; ?></span>
                          <!--<span class="regular-price"><del>$80.00</del></span>-->
                          <a href="#" class="btn btn-border">Buy Now<i class="fa fa-angle-right" aria-hidden="true"></i></a>
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

