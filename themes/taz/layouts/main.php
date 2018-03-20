<?php

use yii\helpers\Html;
use frontend\widgets\Menu;
use yii\widgets\Breadcrumbs;
use frontend\widgets\Banner;
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- SITE TITTLE -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $this->title; ?> - <?= Yii::$app->name; ?></title>

        <!-- PLUGINS CSS STYLE -->
        <link href="<?php echo $this->theme->baseUrl; ?>/assets/plugins/jquery-ui/jquery-ui.css" rel="stylesheet">
        <link href="<?php echo $this->theme->baseUrl; ?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo $this->theme->baseUrl; ?>/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo $this->theme->baseUrl; ?>/assets/plugins/selectbox/select_option1.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo $this->theme->baseUrl; ?>/assets/plugins/rs-plugin/css/settings.css" media="screen">
        <link rel="stylesheet" type="text/css" href="<?php echo $this->theme->baseUrl; ?>/assets/plugins/owl-carousel/owl.carousel.css" media="screen">

        <!-- GOOGLE FONT -->
        <!--<link href='https://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>-->

        <!-- CUSTOM CSS -->
        <link href="<?php echo $this->theme->baseUrl; ?>/assets/css/style.css" rel="stylesheet">
        <link href="<?php echo $this->theme->baseUrl; ?>/assets/css/app.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo $this->theme->baseUrl; ?>/assets/css/colors/default.css" id="option_color">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="<?php echo $this->theme->baseUrl; ?>/assets/js/config.js"></script>
        <script src="<?php echo $this->theme->baseUrl; ?>/assets/js/jquery.min.js"></script>
        <?php 
        if(!Yii::$app->user->isGuest){
            ?>
            <script>
            userLoggedin= true;
            userId      = 1234;
            userName    = 'Seller';
            userType    = '';
            </script>
            <?Php
        }
        ?>
    </head>
    <body class="body-wrapper version3">
        <?php $this->beginBody() ?>
        <div class="alert-top alert" style="display: none;">
            <!--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>-->
        </div>
        <?php
        if (Yii::$app->session->hasFlash('success')){
        ?>
            <div class="alert-top alert">
                <!--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>-->
                <?= Yii::$app->session->getFlash('success') ?> 
            </div>
        <?php
        }elseif(Yii::$app->session->hasFlash('error')){
        ?>
            <div class="alert-top alert">
                <!--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>-->
                <?= Yii::$app->session->getFlash('error') ?> 
            </div>
        <?php
        } 
        ?>


        <div class="main-wrapper">

            <!-- NAVBAR -->
            <?= Menu::widget(); ?>

            <?php
            $controller = Yii::$app->controller;
            $default_controller = Yii::$app->defaultRoute;
            $isHome = (($controller->id === $default_controller) && ($controller->action->id === $controller->defaultAction)) ? true : FALSE;
            ?>
            <?php
            if (!$isHome) {
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
                            <?php /* ?>
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
                              </div> <?php */ ?>
                        </div>
                    </div>
                </section>
            <?php } ?>
            <?php if ($isHome) { ?>
                <!-- BANNER -->
                <?= Banner::widget(); ?>
            <?php } ?> 

            <!-- MAIN CONTENT SECTION -->
            <?php
            if ($controller->action->id == 'profiledashboard') {
                $sectionClass = 'userProfile';
            } elseif ($controller->action->id == 'checkout' || $controller->action->id == 'checkout-step2' || $controller->action->id == 'checkout-step3' || $controller->action->id == 'checkout-step4') {
                $sectionClass = 'stepsWrapper';
            } else {
                $sectionClass = 'logIn signUp productsContent';
            }

            //$sectionClass = ''; = ($controller->action->id == 'profiledashboard') ? 'userProfile' : 'logIn signUp productsContent';
            ?>
            <section class="mainContent clearfix <?= $sectionClass ?> productsContent">
                <div class="container">
            <?= $content; ?>
                </div> <!-- .CONTAINER -->
            </section>

            <!-- FOOTER -->
<?= $this->render('footer') ?>

        </div>
        
        <!-- Modal -->
        <div id="appAuthorizationModal" class="modal fade bd-example-modal-sm" role="dialog">
            <div class="modal-dialog modal-sm">
            <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">Message</h5>
                    </div>
                    <div class="modal-body">
                        <p>Please <a href="<?= Yii::$app->homeUrl . 'login'; ?>" title="Login" style="color: #337ab7;">login</a> to perform this action.</p>
                    </div>
                    <!--<div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>-->
                </div>
            </div>
        </div>
        
        <script src="<?php echo $this->theme->baseUrl; ?>/assets/plugins/jquery-ui/jquery-ui.js"></script>
        <script src="<?php echo $this->theme->baseUrl; ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo $this->theme->baseUrl; ?>/assets/plugins/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
        <script src="<?php echo $this->theme->baseUrl; ?>/assets/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
        <script src="<?php echo $this->theme->baseUrl; ?>/assets/plugins/owl-carousel/owl.carousel.js"></script>
        <script src="<?php echo $this->theme->baseUrl; ?>/assets/plugins/selectbox/jquery.selectbox-0.1.3.min.js"></script>
        <script src="<?php echo $this->theme->baseUrl; ?>/assets/plugins/countdown/jquery.syotimer.js"></script>
        <script src="<?php echo $this->theme->baseUrl; ?>/assets/js/custom.js"></script>
        <script src="<?php echo $this->theme->baseUrl; ?>/assets/js/app.js"></script>
        <script src="<?php echo $this->theme->baseUrl; ?>/assets/js/app/userFavorite.js"></script>
        <script src="<?php echo $this->theme->baseUrl; ?>/assets/js/app/cart.js"></script>

<?php
if (class_exists('yii\debug\Module')) {
    $this->off(\yii\web\View::EVENT_END_BODY, [\yii\debug\Module::getInstance(), 'renderToolbar']);
}
?>
<?php $this->endBody(); ?>
    </body>
</html>
<?php $this->endPage(); ?>
