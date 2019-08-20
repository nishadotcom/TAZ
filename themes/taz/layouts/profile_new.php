<?php
use yii\helpers\Html;
use frontend\widgets\Menu;
use yii\widgets\Breadcrumbs;
use frontend\widgets\Banner;
use frontend\widgets\NewProfileMenu;
//use frontend\assets\AppAsset;

//AppAsset::register($this);

?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="en">
	
	<head>

    <!-- SITE TITTLE -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= $this->title; ?> - <?= Yii::$app->name; ?></title>

    <?php $this->head() ?>
    
    <!-- PLUGINS CSS STYLE -->
    <link href="<?php echo $this->theme->baseUrl; ?>/assets/plugins/jquery-ui/jquery-ui.css" rel="stylesheet">
    <link href="<?php echo $this->theme->baseUrl; ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $this->theme->baseUrl; ?>/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo $this->theme->baseUrl; ?>/assets/plugins/selectbox/select_option1.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->theme->baseUrl; ?>/assets/plugins/rs-plugin/css/settings.css" media="screen">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->theme->baseUrl; ?>/assets/plugins/owl-carousel/owl.carousel.css" media="screen">

    <!-- GOOGLE FONT -->
    <link href='https://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
    
    <!-- CUSTOM CSS -->
    <link href="<?php echo $this->theme->baseUrl; ?>/assets/css/style-new.css" rel="stylesheet">
    <link href="<?php echo $this->theme->baseUrl; ?>/assets/fonts/css/all.css" rel="stylesheet">
<script defer src="<?php echo $this->theme->baseUrl; ?>/assets/fonts/js/all.js"></script>
  <link href="<?php echo $this->theme->baseUrl; ?>/assets/fonts/css/fontawesome.css" rel="stylesheet">
  <link href="<?php echo $this->theme->baseUrl; ?>/assets/fonts/css/brands.css" rel="stylesheet">
  <link href="<?php echo $this->theme->baseUrl; ?>/assets/fonts/css/solid.css" rel="stylesheet">
    <link href="<?php echo $this->theme->baseUrl; ?>/assets/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $this->theme->baseUrl; ?>/assets/css/colors/default.css" id="option_color">
    <link rel="stylesheet" href="<?php echo $this->theme->baseUrl; ?>/assets/plugins/bootstrap-tour/css/bootstrap-tour-standalone.css" id="option_color">

    <link rel="stylesheet" href="<?php echo $this->theme->baseUrl; ?>/assets/plugins/croppie/css/croppie.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="<?php echo $this->theme->baseUrl; ?>/assets/css/batch-icons.css">
  <style>
* {box-sizing: border-box}

/* Set height of body and the document to 100% */
body, html {
  height: 100%;
  margin: 0;
  font-family: 'Poppins', sans-serif;
  padding:0;
      color: #72848c;
}

/* Style tab links */
.tablink {
     background-color: #8296b0;
    color: #000;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 10px 16px;
    font-size: 15px;
    width: 25%;
}
.light-blue-bg h2 {
color:#fff;
}
.tablink img {
    position: relative;
    left: -6px;
}
.tablink:hover {
  background-color: #de1c4a;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
  color: white;
  /*display: none;*/
  padding: 20px 20px;
  height: 100%;
}
.h1, .h2, .h3, h1, h2, h3 {
    margin-bottom: 0px;
  text-transform: capitalize;
  color:#111111;
  margin:0px;
  font-family: 'Poppins', sans-serif;
  font-weight:400;
}

h1,
#dashboard {background: #fff; color:#565656;}
#my-bio {background: #fff;}
#my-address {background: #fff;}
#my-order {background: #fff;}
a.active{
  background-color: rgb(222, 28, 74) !important;
}

@media (max-width: 767px){
.tablink {
    background-color: #8296b0;
    color: #000;
     float: unset;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 10px 16px;
    font-size: 15px;
    width: 100%;
      margin: 0px 0px 5px 0px !important;
}
}
</style>

  </head>
	<body class="body-wrapper version3">
		<?php $this->beginBody() ?>
    <div class="main-wrapper">

      <!-- NAVBAR -->
      	<?= Menu::widget(); ?>

		<?php 
		$controller = Yii::$app->controller;
		$default_controller = Yii::$app->defaultRoute;
		$isHome = (($controller->id === $default_controller) && ($controller->action->id === $controller->defaultAction)) ? true : FALSE;
    $action = $controller->action->id;
$controllerName = $controller->id;
		?>

    <?= NewProfileMenu::widget(); ?>
    <?php /* ?>
		<div class="menu-blue-bg">
    <div class="container">
    <div class="row">
    <div class="col-12 col-lg-4 col-md-4 col-sm-4 col-xl-4">
    <div class="d-flex justify-content-start">
    <div class="p-2">
    <img class="" src="../TEMPLATE/img/dashboard-icon-001.png" />
    </div>
    <div class="light-blue-bg p-4">
    <h2>Dashboard
    </h2>
    </div>
    </div>
    </div>
    <div class="col-12 col-lg-8 col-md-8 col-sm-8 col-xl-8 ">
    <div class="d-md-flex d-block align-self-center float-right menu-btn-space">

    <a href="<?php echo Yii::$app->homeUrl . 'profile-dashboard'; ?>" class="btn btn-default blue-bg-btn tablink <?php echo ($action == 'profile-dashboard') ? 'active' : ''; ?>" onclick="openPage('dashboard', this, '#de1c4a', '#fff')" id="defaultOpen">
    <img class="" src="../TEMPLATE/img/dashboard-icon.png" /> <span>Dashboard</span></a>

    <a href="<?php echo Yii::$app->homeUrl . 'profile-update'; ?>" class="btn btn-default blue-bg-btn tablink <?php echo ($action == 'profile-update') ? 'active' : ''; ?>"> 
      <img class="" src="../TEMPLATE/img/user-icon.png" /> <span>About Me</span>
    </a>
    <button type="button" class="btn btn-default blue-bg-btn tablink" onclick="openPage('my-address', this, '#de1c4a', '#fff')">
    <img class="" src="../TEMPLATE/img/location-map-icon.png" /> <span>My Address</span></button>
    <button type="button" class="btn btn-default blue-bg-btn tablink" onclick="openPage('my-order', this, '#de1c4a', '#fff')" >
    <img class="" src="../TEMPLATE/img/my-order-icon.png" /> <span>My Orders</span></button>

    </div>
    </div>
    </div>
    </div>
    </div>
    <?php */ ?>
      <!-- MAIN CONTENT SECTION -->
      <?php 
      

      //$sectionClass = ($controller->action->id == 'profiledashboard') ? 'userProfile' : 'logIn signUp productsContent';
      ?>
      	<section class="mainContent clearfix userProfile">
        	<div class="container">
          	<?= $content; ?>
        	</div> <!-- .CONTAINER -->
      	</section>

      <!-- FOOTER -->
      <?= $this->render('footer') ?>
      
    </div>
    
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
    <script src="<?php echo $this->theme->baseUrl; ?>/assets/js/jquery.min.js"></script>
    <script src="<?php echo $this->theme->baseUrl; ?>/assets/plugins/jquery-ui/jquery-ui.js"></script>
    <script src="<?php echo $this->theme->baseUrl; ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo $this->theme->baseUrl; ?>/assets/plugins/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script src="<?php echo $this->theme->baseUrl; ?>/assets/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <script src="<?php echo $this->theme->baseUrl; ?>/assets/plugins/owl-carousel/owl.carousel.js"></script>
    <script src="<?php echo $this->theme->baseUrl; ?>/assets/plugins/selectbox/jquery.selectbox-0.1.3.min.js"></script>
    <script src="<?php echo $this->theme->baseUrl; ?>/assets/plugins/countdown/jquery.syotimer.js"></script>
    <script src="<?php echo $this->theme->baseUrl; ?>/assets/js/custom.js"></script>
    <script src="<?php echo $this->theme->baseUrl; ?>/assets/plugins/bootstrap-tour/js/bootstrap-tour.js"></script>

    <script src="<?php echo $this->theme->baseUrl; ?>/assets/plugins/croppie/js/croppie.js"></script>
    <script type="text/javascript">

    function readFile(input) {
      if (input.files && input.files[0]) {
              var reader = new FileReader();
              
              reader.onload = function (e) {
          $('.upload-demo').addClass('ready');
                $uploadCrop.croppie('bind', {
                  url: e.target.result
                }).then(function(){
                  console.log('jQuery bind complete');
                });
                
              }
              
              reader.readAsDataURL(input.files[0]);
          }
          else {
            swal("Sorry - you're browser doesn't support the FileReader API");
        }
    }

    function popupResult(result) {
        var html;
        if (result.html) {
          html = result.html;
        }
        if (result.src) {
          //html = '<img src="' + result.src + '" />';
          $('#productimage-crop_image').val(result.src);
        }
        console.log(result.src);
        /*swal({
          title: '',
          html: true,
          text: html,
          allowOutsideClick: true
        });*/
        /*setTimeout(function(){
          $('.sweet-alert').css('margin', function() {
            var top = -1 * ($(this).height() / 2),
              left = -1 * ($(this).width() / 2);

            return top + 'px 0 0 ' + left + 'px';
          });
        }, 1);*/
      }
      $(document).ready(function(){
        $uploadCrop = $('#upload-demo').croppie({
          viewport: {
              width: 270,
              height: 290,
              //type: 'circle'
          },
          boundary: {
              width: 300,
              height: 300
          },
          enableExif: true
        });
        $('#productimage-cover_photo').on('change', function () { readFile(this); });
        $('.upload-result').on('click', function (ev) {
        $uploadCrop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
          }).then(function (resp) {
            popupResult({
              src: resp
            });
          });
        });
      });
      
    </script>

    <script type="text/javascript">
      $(document).ready(function(){

        // Instance the tour
        var tour = new Tour({
          //template: "<div class='popover tour'><div class='arrow'></div><h3 class='popover-title'></h3><div class='popover-content'></div><div class='popover-navigation'><button class='btn btn-default' data-role='prev'>« Prev</button><span data-role='separator'>|</span><button class='btn btn-default' data-role='next'>Next »</button></div><button class='btn btn-default' data-role='end'>End</button></div>",
          steps: [
          {
            element: "#testTour",
            title: "Welcome Header",
            content: "Content of my step",
            placement: 'left'
          },
          {
            element: "#orderBox",
            title: "Order Box",
            content: "Content of my step",
            placement: 'left'
          }
        ]});

        // Initialize the tour
        tour.init();

        // Start the tour
        tour.start();
      });
    </script>

    <?php 
	if (class_exists('yii\debug\Module')) {
		$this->off(\yii\web\View::EVENT_END_BODY, [\yii\debug\Module::getInstance(), 'renderToolbar']);
	}
	?>
    <?php $this->endBody(); ?>
  </body>
</html>
<?php $this->endPage(); ?>
