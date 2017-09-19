<?php
$this->title  = 'Single Product';
$productData  = ($product) ? $product[0] : [];
// echo '<pre>'; print_r($productData->productImages[0]->cover_photo); echo '</pre>';
$pathPrdImg   = Yii::$app->params['PATH_PRODUCT_IMAGE'];
$prdNoImg     = 'noImage.jpg';
?>

<div class="row singleProduct">
            <div class="col-xs-12">
              <div class="media">
                <div class="media-right productSlider">
                  <div id="carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                      <?php 
                      // Cover Photo
                      $coverImage   = (isset($productData->productImages[0])) ? $pathPrdImg.$productData->product_code.'/'.$productData->productImages[0]->cover_photo : $pathPrdImg.$prdNoImg;
                      ?>
                      <div class="item active" data-thumb="0">
                        <img src="<?= $coverImage; ?>">
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
                          <!--<div data-target="#carousel" data-slide-to="1" class="thumb"><img src="<?php //echo $this->theme->baseUrl; ?>/assets/img/products/signle-product/product-slide-small-02.jpg"></div>
                          <div data-target="#carousel" data-slide-to="2" class="thumb"><img src="<?php //echo $this->theme->baseUrl; ?>/assets/img/products/signle-product/product-slide-small-03.jpg"></div>
                          <div data-target="#carousel" data-slide-to="3" class="thumb"><img src="<?php //echo $this->theme->baseUrl; ?>/assets/img/products/signle-product/product-slide-small-04.jpg"></div>-->
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
                  <h2><?= $productData->product_name; ?></h2>
                  <h3>$<?= $productData->product_sale_price; ?></h3>
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
                    <a href="<?php echo Yii::$app->homeUrl.'demo/cart'; ?>" class="btn btn-primary btn-block">Add to cart <i class="fa fa-angle-right" aria-hidden="true"></i></a> 
                  </div>
                  <div class="tabArea">
                    <ul class="nav nav-tabs">
                      <li class="active"><a data-toggle="tab" href="#details">details</a></li>
                      <li><a data-toggle="tab" href="#about-art">about</a></li>
                      <!--<li><a data-toggle="tab" href="#sizing">sizing</a></li>-->
                      <li><a data-toggle="tab" href="#shipping">shipping</a></li>
                    </ul>
                    <div class="tab-content">
                      <div id="details" class="tab-pane fade in active">
                        <table class="table">
                          <tr>
                            <td><strong>Category</strong></td><td><?= $productData->productCategory->category_name; ?></td>
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
                      <div id="about-art" class="tab-pane fade">
                        <p><?= $productData->product_long_description; ?></p>
                      </div>
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