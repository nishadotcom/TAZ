<?php
use yii\helpers\Html;

?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<link href="<?php echo $this->theme->baseUrl; ?>/assets/css/style.css" rel="stylesheet">
	</head>
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
	<body class="body-wrapper">
		<?php $this->beginBody() ?>
		
		<div class="main-wrapper">
			
			<!-- HEADER -->
      <div class="header clearfix">

        <!-- TOPBAR -->
        <div class="topBar">
          <div class="container">
            <div class="row">
              <div class="col-md-6 col-sm-5 hidden-xs">
                <ul class="list-inline">
                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                  <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                  <li><a href="#"><i class="fa fa-tumblr"></i></a></li>
                </ul>
              </div>
              <div class="col-md-6 col-sm-7 col-xs-12">
                <ul class="list-inline pull-right top-right">
                  <li class="account-login"><span><a data-toggle="modal" href='.login-modal'>Log in</a><small>or</small><a data-toggle="modal" href='#signup'>Create an account</a></span></li>
                  <li class="searchBox">
                    <a href="#"><i class="fa fa-search"></i></a>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <li>
                        <span class="input-group">
                          <input type="text" class="form-control" placeholder="Search…" aria-describedby="basic-addon2">
                          <button type="submit" class="input-group-addon">Submit</button>
                        </span>
                      </li>
                    </ul>
                  </li>
                  <li class="dropdown cart-dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-shopping-cart"></i>$0</a>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <li>Item(s) in your cart</li>
                      <li>
                        <a href="single-product.html">
                          <div class="media">
                            <img class="media-left media-object" src="img/home/cart-items/cart-item-01.jpg" alt="cart-Image">
                            <div class="media-body">
                              <h5 class="media-heading">INCIDIDUNT UT <br><span>2 X $199</span></h5>
                            </div>
                          </div>
                        </a>
                      </li>
                      <li>
                        <a href="single-product.html">
                          <div class="media">
                            <img class="media-left media-object" src="img/home/cart-items/cart-item-01.jpg" alt="cart-Image">
                            <div class="media-body">
                              <h5 class="media-heading">INCIDIDUNT UT <br><span>2 X $199</span></h5>
                            </div>
                          </div>
                        </a>
                      </li>
                      <li>
                        <div class="btn-group" role="group" aria-label="...">
                          <button type="button" class="btn btn-default" onclick="location.href='cart-page.html';">Shopping Cart</button>
                          <button type="button" class="btn btn-default" onclick="location.href='checkout-step-1.html';">Checkout</button>
                        </div>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </div>    
        </div>

        <!-- NAVBAR -->
        <nav class="navbar navbar-main navbar-default" role="navigation">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index-v1.html"><img src="<?php echo $this->theme->baseUrl; ?>/assets/img/logo.png" alt="logo"></a>
            </div>
        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">            
              <ul class="nav navbar-nav navbar-right">
                <li class="dropdown active">
                  <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Home</a>
                  <ul class="dropdown-menu dropdown-menu-left">
                    <li class="active"><a href="index-v1.html">Home Default</a></li>
                    <li><a href="index-v2.html">Home Classic</a></li>
                    <li><a href="index-v3.html">Home Deals</a></li>
                    <li><a href="index-v4.html">Home Mega</a></li>
                  </ul>
                </li>
                <li class="dropdown megaDropMenu">
                  <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="300" data-close-others="true" aria-expanded="false">Shop</b></a>
                  <ul class="dropdown-menu row">
                    <li class="col-sm-3 col-xs-12">
                      <ul class="list-unstyled">
                        <li>Products Grid View</li>
                        <li><a href="product-grid-left-sidebar.html">Products Sidebar Left</a></li>
                        <li><a href="product-grid-right-sidebar.html">Products Sidebar Right</a></li>
                        <li><a href="product-grid-3-col-filter.html">Products 3 Columns V1</a></li>
                        <li><a href="product-grid-3-col.html">Products 3 Columns V2</a></li>
                        <li><a href="product-grid-4-col.html">Products 4 Columns</a></li>
                      </ul>
                    </li>
                    <li class="col-sm-3 col-xs-12">
                      <ul class="list-unstyled">
                        <li>Products List View</li>
                        <li><a href="product-list-left-sidebar.html">Products Sidebar Left</a></li>
                        <li><a href="product-list-right-sidebar.html">Products Sidebar Right</a></li>
                        <li class="listHeading">Others</li>
                        <li><a href="single-product.html">Single Product</a></li>
                        <li><a href="cart-page.html">Cart Page</a></li>
                      </ul>
                    </li>
                    <li class="col-sm-3 col-xs-12">
                      <ul class="list-unstyled">
                        <li>Checkout</li>
                        <li><a href="checkout-step-1.html">Step 1 - Address</a></li>
                        <li><a href="checkout-step-2.html">Step 2 - Shipping</a></li>
                        <li><a href="checkout-step-3.html">Step 3 - Payment</a></li>
                        <li><a href="checkout-step-4.html">Step 4 - Payment</a></li>
                        <li><a href="checkout-complete.html">Order Complete</a></li>
                      </ul>
                    </li>
                    <li class="col-sm-3 col-xs-12">
                      <a href="#" class="menu-photo"><img src="img/menu-photo.jpg" alt="menu-img"></a>
                    </li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">pages</a>
                  <ul class="dropdown-menu dropdown-menu-left">
                    <li><a href="about-us.html">About Us</a></li>
                    <li><a href="signup.html">Register</a></li>
                    <li><a href="signup-login.html">Register or Login</a></li>
                    <li><a href="login.html">Login</a></li>
                    <li><a href="lost-password.html">Password Recovery</a></li>
                    <li><a href="privacy-policy.html">Privacy Policy</a></li>
                    <li><a href="terms-and-conditions.html">Terms &amp; Conditions</a></li>
                    <li><a href="404.html">404 Not Found</a></li>
                    
                    <li><a href="coming-soon.html">Coming Soon</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">blog</a>
                  <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="blog-right-sidebar.html">Right Sidebar</a></li>
                    <li><a href="blog-left-sidebar.html">Left Sidebar</a></li>
                    <li><a href="blog-fullwidth.html">Full Width</a></li>
                    <li><a href="blog-single-fullwidth.html">Single Post</a></li>
                    <li><a href="blog-single-right-sidebar.html">Single Right Sidebar</a></li>
                    <li><a href="blog-single-left-sidebar.html">Single Left Sidebar</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account</a>
                  <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="account-dashboard.html">Dashboard</a></li>
                    <li><a href="account-profile.html">Profile</a></li>
                    <li><a href="account-all-orders.html">All Orders</a></li>
                    <li><a href="account-single-order.html">Single Order</a></li>
                    <li><a href="account-wishlist.html">Wishlist</a></li>
                    <li><a href="account-address.html">Address</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Components</a>
                  <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="accrodion-toggle.html">Accrodion-Toggle</a></li>
                    <li><a href="tab-dropdown.html">Tab-Dropdown</a></li>
                    <li><a href="alert-label-badges.html">Alert-Label-Badges</a></li>
                    <li><a href="progress-bar.html">Progress Bar</a></li>
                    <li><a href="buttons.html">Buttons</a></li>
                    <li><a href="forms.html">Forms</a></li>
                    <li><a href="list-panel.html">Listgroups Panel</a></li>
                    <li><a href="tooltip-pagination.html">Tooltip Pagination</a></li>
                    <li><a href="typography.html">Typography</a></li>
                    <li><a href="responsive-embed.html">Responsive Embed</a></li>
                  </ul>
                </li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div>
        </nav>

      </div> <!-- .header clearfix -->
      
      <!-- BANNER -->
      <div class="bannercontainer bannerV1">
        <div class="fullscreenbanner-container">
          <div class="fullscreenbanner">
            <ul>
              <li data-transition="slidehorizontal" data-slotamount="5" data-masterspeed="700" data-title="Slide 1">
                <img src="<?php echo $this->theme->baseUrl; ?>/assets/img/home/banner-slider/slider-bg.jpg" alt="slidebg1" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
                <div class="slider-caption slider-captionV1 container">
                  
                  <div class="tp-caption rs-caption-1 sft start" 
                    data-hoffset="0" 
                    data-x="370" 
                    data-y="54" 
                    data-speed="800" 
                    data-start="1500" 
                    data-easing="Back.easeInOut" 
                    data-endspeed="300" >
                    <img src="<?php echo $this->theme->baseUrl; ?>/assets/img/home/banner-slider/shoe1.png" alt="slider-image" style="width: 781px; height: 416px;">
                  </div>

                  <div class="tp-caption rs-caption-2 sft"
                    data-hoffset="0"
                    data-y="119"
                    data-speed="800"
                    data-start="2000"
                    data-easing="Back.easeInOut"
                    data-endspeed="300">
                    Canvas Sneaker
                  </div>

                  <div class="tp-caption rs-caption-3 sft"
                    data-hoffset="0"
                    data-y="185"
                    data-speed="1000"
                    data-start="3000"
                    data-easing="Power4.easeOut"
                    data-endspeed="300"
                    data-endeasing="Power1.easeIn"
                    data-captionhidden="off">
                    Exclusive to <br>
                    BigBag <br>
                    <small>Spring / Summer 2016</small>
                  </div>
                  <div class="tp-caption rs-caption-4 sft"
                    data-hoffset="0"
                    data-y="320"
                    data-speed="800"
                    data-start="3500"
                    data-easing="Power4.easeOut"
                    data-endspeed="300"
                    data-endeasing="Power1.easeIn"
                    data-captionhidden="off">
                    <span class="page-scroll"><a href="#" class="btn primary-btn">Buy Now<i class="glyphicon glyphicon-chevron-right"></i></a></span>
                  </div>
                </div>
              </li>
              <li data-transition="slidehorizontal" data-slotamount="5" data-masterspeed="1000" data-title="Slide 2">
                <img src="<?php echo $this->theme->baseUrl; ?>/assets/img/home/banner-slider/slider-bg.jpg" alt="slidebg" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
                <div class="slider-caption slider-captionV1 container captionCenter">
                  <div class="tp-caption rs-caption-1 sft start text-center"
                    data-x="center"
                    data-y="228"
                    data-speed="800"
                    data-start="1500"
                    data-easing="Back.easeInOut"
                    data-endspeed="300">
                    <img src="<?php echo $this->theme->baseUrl; ?>/assets/img/home/banner-slider/shoe2.png" alt="slider-image">
                  </div>

                  <div class="tp-caption rs-caption-2 sft text-center"
                    data-x="center"
                    data-y="50"
                    data-speed="800"
                    data-start="2000"
                    data-easing="Back.easeInOut"
                    data-endspeed="300">
                    Exclusive to BigBag
                  </div>

                  <div class="tp-caption rs-caption-3 sft text-center"
                    data-x="center"
                    data-y="98"
                    data-speed="1000"
                    data-start="3000"
                    data-easing="Power4.easeOut"
                    data-endspeed="300"
                    data-endeasing="Power1.easeIn"
                    data-captionhidden="off">
                    Canvas Sneaker
                  </div>

                  <div class="tp-caption rs-caption-4 sft text-center"
                    data-x="center"
                    data-y="156"
                    data-speed="800"
                    data-start="3500"
                    data-easing="Power4.easeOut"
                    data-endspeed="300"
                    data-endeasing="Power1.easeIn"
                    data-captionhidden="off">
                    <span class="page-scroll"><a href="#" class="btn primary-btn">Buy Now<i class="glyphicon glyphicon-chevron-right"></i></a></span>
                  </div>
                </div>
              </li>
              <li data-transition="slidehorizontal" data-slotamount="5" data-masterspeed="700"  data-title="Slide 3">
                <img src="<?php echo $this->theme->baseUrl; ?>/assets/img/home/banner-slider/slider-bg.jpg" alt="slidebg" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
                <div class="slider-caption slider-captionV1 container">
                  <div class="tp-caption rs-caption-1 sft start"
                    data-hoffset="0"
                    data-y="85"
                    data-speed="800"
                    data-start="1500"
                    data-easing="Back.easeInOut"
                    data-endspeed="300">
                    <img src="<?php echo $this->theme->baseUrl; ?>/assets/img/home/banner-slider/shoe3.png" alt="slider-image">
                  </div>

                  <div class="tp-caption rs-caption-2 sft "
                    data-hoffset="0"
                    data-y="119"
                    data-x="800"
                    data-speed="800"
                    data-start="2000"
                    data-easing="Back.easeInOut"
                    data-endspeed="300">
                    Canvas Sneaker
                  </div>

                  <div class="tp-caption rs-caption-3 sft"
                    data-hoffset="0"
                    data-y="185"
                    data-x="800"
                    data-speed="1000"
                    data-start="3000"
                    data-easing="Power4.easeOut"
                    data-endspeed="300"
                    data-endeasing="Power1.easeIn"
                    data-captionhidden="off">
                    Exclusive to <br>
                    BigBag <br>
                    <small>Spring / Summer 2016</small>
                  </div>

                  <div class="tp-caption rs-caption-4 sft"
                    data-hoffset="0"
                    data-y="320"
                    data-x="800"
                    data-speed="800"
                    data-start="3500"
                    data-easing="Power4.easeOut"
                    data-endspeed="300"
                    data-endeasing="Power1.easeIn"
                    data-captionhidden="off">
                    <span class="page-scroll"><a href="#" class="btn primary-btn">Buy Now<i class="glyphicon glyphicon-chevron-right"></i></a></span>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- BANNER -->
      
			<?php echo $content; ?>

      <!-- LOAD FOOTER -->
      <?= $this->render('footer') ?>
		
		</div> <!-- .main-wrapper -->
		
		<script src="<?php echo $this->theme->baseUrl; ?>/assets/js/jquery.min.js"></script>
		<script src="<?php echo $this->theme->baseUrl; ?>/assets/plugins/jquery-ui/jquery-ui.js"></script>
		<script src="<?php echo $this->theme->baseUrl; ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo $this->theme->baseUrl; ?>/assets/plugins/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
		<script src="<?php echo $this->theme->baseUrl; ?>/assets/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
		<script src="<?php echo $this->theme->baseUrl; ?>/assets/plugins/owl-carousel/owl.carousel.js"></script>
		<script src="<?php echo $this->theme->baseUrl; ?>/assets/plugins/selectbox/jquery.selectbox-0.1.3.min.js"></script>
		<script src="<?php echo $this->theme->baseUrl; ?>/assets/plugins/countdown/jquery.syotimer.js"></script>
		<script src="<?php echo $this->theme->baseUrl; ?>/assets/js/custom.js"></script>
		<!-- OFF Debug toolbar -->
		<?php 
		if (class_exists('yii\debug\Module')) {
			$this->off(\yii\web\View::EVENT_END_BODY, [\yii\debug\Module::getInstance(), 'renderToolbar']);
		}
		?>
		<?php $this->endBody(); ?>
	</body>
</html>
<?php $this->endPage(); ?>
