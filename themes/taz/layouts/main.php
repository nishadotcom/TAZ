<?php
use yii\helpers\Html;
use frontend\widgets\FeatureSeller;
use frontend\widgets\Menu;
use frontend\widgets\Banner;
use frontend\widgets\HomeProduct;

?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="en">
	
	<head>

    <!-- SITE TITTLE -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BIGBAG Store - Ecommerce Bootstrap Template</title>
    
    <!-- PLUGINS CSS STYLE -->
    <link href="<?php echo $this->theme->baseUrl; ?>/assets/plugins/jquery-ui/jquery-ui.css" rel="stylesheet">
    <link href="<?php echo $this->theme->baseUrl; ?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $this->theme->baseUrl; ?>/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo $this->theme->baseUrl; ?>/assets/plugins/selectbox/select_option1.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->theme->baseUrl; ?>/assets/plugins/rs-plugin/css/settings.css" media="screen">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->theme->baseUrl; ?>/assets/plugins/owl-carousel/owl.carousel.css" media="screen">

    <!-- GOOGLE FONT -->
    <link href='https://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
    
    <!-- CUSTOM CSS -->
    <link href="<?php echo $this->theme->baseUrl; ?>/assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $this->theme->baseUrl; ?>/assets/css/colors/default.css" id="option_color">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
	<body class="body-wrapper version3">
		<?php $this->beginBody() ?>
    <div class="main-wrapper">

      <!-- NAVBAR -->
      <?= Menu::widget(); ?>
      
      <!-- BANNER -->
      <?= Banner::widget(); ?>

      <!-- MAIN CONTENT SECTION -->
      <section class="mainContent clearfix">
        <div class="container">
          
          <!-- DEAL SECTION -->
          <?= HomeProduct::widget(); ?>

         
          <!-- FEATURE PRODUCT SECTION -->
          <div class="row featuredProducts version3">
            <div class="col-xs-12">
              <div class="tabCommon">
                <ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#menu1">New Araivals</a></li>
                  <li><a data-toggle="tab" href="#menu2">Top Rated</a></li>
                  <li><a data-toggle="tab" href="#menu3">On Sale</a></li>
                </ul>
                <div class="tab-bottom">
                </div>
                <div class="tab-content">
                  <div id="menu1" class="tab-pane fade in active">
                    <div class="row">
                      <div class="col-sm-3 col-xs-12">
                        <div class="imageBox">
                          <div class="productImage clearfix">
                            <a href="single-product.html">
                              <img src="<?php echo $this->theme->baseUrl; ?>/assets/img/home/featured-product/product-img7.jpg" alt="featured-product-img">
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
                              <img src="<?php echo $this->theme->baseUrl; ?>/assets/img/home/featured-product/product-img12.jpg" alt="featured-product-img">
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
                            <h5><a href="single-product.html">porro quisquam</a></h5>
                            <h3>$199</h3>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3 col-xs-12">
                        <div class="imageBox">
                          <div class="productImage clearfix">
                            <a href="single-product.html">
                              <img src="<?php echo $this->theme->baseUrl; ?>/assets/img/home/featured-product/product-img13.jpg" alt="featured-product-img">
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
                            <h5><a href="single-product.html">enim ad minim</a></h5>
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
                            <h5><a href="single-product.html">sunt in culpa</a></h5>
                            <h3>$199</h3>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id="menu2" class="tab-pane fade">
                    <div class="row">
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
                              <img src="<?php echo $this->theme->baseUrl; ?>/assets/img/home/featured-product/product-img12.jpg" alt="featured-product-img">
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
                            <h5><a href="single-product.html">porro quisquam</a></h5>
                            <h3>$199</h3>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3 col-xs-12">
                        <div class="imageBox">
                          <div class="productImage clearfix">
                            <a href="single-product.html">
                              <img src="<?php echo $this->theme->baseUrl; ?>/assets/img/home/featured-product/product-img13.jpg" alt="featured-product-img">
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
                            <h5><a href="single-product.html">enim ad minim</a></h5>
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
                            <h5><a href="single-product.html">sunt in culpa</a></h5>
                            <h3>$199</h3>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id="menu3" class="tab-pane fade">
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

          <!-- SELLER -->
          <!-- END SELLER-->

          <!-- FEATURE SELLER SECTION -->
          <?= FeatureSeller::widget(); ?>

          <!-- FEATURE -->
          <div class="row features version2">
            <div class="col-sm-4 col-xs-12">
              <div class="box text-center">
                <i class="fa fa-truck" aria-hidden="true"></i>
                <h4>Free Shipping </h4>
                <span>Excepteur sint occaecat cupidatat.</span>
              </div>
            </div>
            <div class="col-sm-4 col-xs-12">
              <div class="box text-center">
                <i class="fa fa-money" aria-hidden="true"></i>
                <h4>100% money back</h4>
                <span>Excepteur sint occaecat cupidatat.</span>
              </div>
            </div>
            <div class="col-sm-4 col-xs-12">
              <div class="box text-center">
                <i class="fa fa-headphones" aria-hidden="true"></i>
                <h4>24/7 support</h4>
                <span>Excepteur sint occaecat cupidatat.</span>
              </div>
            </div>
          </div>

        </div>
      </section>

      <!-- FOOTER -->
      <?= $this->render('footer') ?>
      
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="<?php echo $this->theme->baseUrl; ?>/assets/plugins/jquery-ui/jquery-ui.js"></script>
    <script src="<?php echo $this->theme->baseUrl; ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo $this->theme->baseUrl; ?>/assets/plugins/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script src="<?php echo $this->theme->baseUrl; ?>/assets/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <script src="<?php echo $this->theme->baseUrl; ?>/assets/plugins/owl-carousel/owl.carousel.js"></script>
    <script src="<?php echo $this->theme->baseUrl; ?>/assets/plugins/selectbox/jquery.selectbox-0.1.3.min.js"></script>
    <script src="<?php echo $this->theme->baseUrl; ?>/assets/plugins/countdown/jquery.syotimer.js"></script>
    <script src="<?php echo $this->theme->baseUrl; ?>/assets/js/custom.js"></script>
    <?php 
	if (class_exists('yii\debug\Module')) {
		$this->off(\yii\web\View::EVENT_END_BODY, [\yii\debug\Module::getInstance(), 'renderToolbar']);
	}
	?>
    <?php $this->endBody(); ?>
  </body>
</html>
<?php $this->endPage(); ?>

<?php //echo $content; ?>
