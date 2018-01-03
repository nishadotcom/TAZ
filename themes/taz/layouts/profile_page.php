<?php
use yii\helpers\Html;
use frontend\widgets\Menu;
use yii\widgets\Breadcrumbs;
use frontend\widgets\Banner;
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
    <link rel="stylesheet" href="<?php echo $this->theme->baseUrl; ?>/assets/plugins/bootstrap-tour/css/bootstrap-tour-standalone.css" id="option_color">

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

		<?php 
		$controller = Yii::$app->controller;
		$default_controller = Yii::$app->defaultRoute;
		$isHome = (($controller->id === $default_controller) && ($controller->action->id === $controller->defaultAction)) ? true : FALSE;

		?>
		<?php 
		if(!$isHome){
		?>
      <!-- BREADCRUMB / LIGHT SECTION -->
	      	<section class="lightSection clearfix pageHeader">
	        	<div class="container">
	          		<div class="row">
	            		<div class="col-xs-6">
	              			<div class="page-title">
	                			<h2><?= $this->title ?></h2>
	              			</div>
	            		</div>
		            	<div class="col-xs-6">
		            		<?php 
		            		echo Breadcrumbs::widget([
		            			'options' => ['class' => 'breadcrumb pull-right'],
		            			'tag' => 'ol',
    							'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
							]);
		            		?>
		              		<!--<ol class="breadcrumb pull-right">
		                		<li>
		                  			<a href="index.html">Home</a>
		                		</li>
		                		<li class="active">log in</li>
		              		</ol>-->
		            	</div>
	          		</div>
	        	</div>
	      	</section>
      	<?php } ?>
       <?php if($isHome){ ?>
        <!-- BANNER -->
        <?= Banner::widget(); ?>
       <?php } ?> 

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
    <script src="<?php echo $this->theme->baseUrl; ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo $this->theme->baseUrl; ?>/assets/plugins/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script src="<?php echo $this->theme->baseUrl; ?>/assets/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <script src="<?php echo $this->theme->baseUrl; ?>/assets/plugins/owl-carousel/owl.carousel.js"></script>
    <script src="<?php echo $this->theme->baseUrl; ?>/assets/plugins/selectbox/jquery.selectbox-0.1.3.min.js"></script>
    <script src="<?php echo $this->theme->baseUrl; ?>/assets/plugins/countdown/jquery.syotimer.js"></script>
    <script src="<?php echo $this->theme->baseUrl; ?>/assets/js/custom.js"></script>
    <script src="<?php echo $this->theme->baseUrl; ?>/assets/plugins/bootstrap-tour/js/bootstrap-tour.js"></script>
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
