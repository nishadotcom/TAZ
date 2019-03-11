<?php
use yii\helpers\Html;
// GET CONTROLLER
$controller = Yii::$app->controller;
$action = $controller->action->id;

?>
<!-- HEADER -->
<div class="header clearfix headerV2">
    <!-- NAVBAR -->
    <nav class="navbar navbar-main navbar-default nav-V2" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo Yii::$app->homeUrl; ?>" style="margin-top:0px;"><img src="<?php echo $this->theme->baseUrl; ?>/assets/img/logo.png" alt="logo"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">            
                <ul class="nav navbar-nav navbar-right">
                    <?php if (!Yii::$app->user->isGuest) { ?>
                        <li>
                            <a href="<?php echo Yii::$app->homeUrl . 'logout'; ?>" class="">Log Out</a>
                        </li>
                    <?php } else { ?>
                        <li class="<?php echo ($action == 'become-seller') ? 'active' : ''; ?>">
                            <a href="<?php echo Yii::$app->homeUrl . 'become-seller'; ?>" title="Become a Seller">Become a Seller</a>
                        </li>
                        <li class="<?php echo ($action == 'login') ? 'active' : ''; ?>">
                            <a href="<?php echo Yii::$app->homeUrl . 'login'; ?>" class="">Log In</a>
                        </li>
                        <li class="<?php echo ($action == 'signup') ? 'active' : ''; ?>">
                            <a href="<?php echo Yii::$app->homeUrl . 'signup'; ?>" class="">Sign Up</a>
                        </li>
                    <?php } ?>
                    <li>
                        <a href="javascript:void(0)" class="">Help</a>
                    </li>
                    <?php if (!Yii::$app->user->isGuest) { ?>
                        <li class="dropdown" style="margin-top: -8px;"> <!--  style="margin-top: -8px;" -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?= $profileImage; ?>" class="profile-image img-circle" style="max-height: 32px;max-width: 32px;"> <!-- http://placehold.it/32x32 -->
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="<?= Yii::$app->homeUrl.'profile-dashboard'; ?>" title="MY ACCOUNT">MY ACCOUNT</a></li>
                                <?php if(Yii::$app->user->identity->user_type == Yii::$app->params['ROLE_SELLER']){ ?>
                                    <li><a href="<?= Yii::$app->homeUrl.'product'; ?>" title="MY PRODUCTS">MY PRODUCTS</a></li>
                                    <li><a href="<?= Yii::$app->homeUrl.'mysales'; ?>" title="MY SALES">MY SALES</a></li>
                                <?php }elseif(Yii::$app->user->identity->user_type == Yii::$app->params['ROLE_BUYER']){
                                    ?>
                                    <li><a href="<?= Yii::$app->homeUrl.'cart'; ?>" title="CART">CART (<span id="cartCount"><?= $cartCount; ?></span>)</a></li>
                                    <li><a href="<?= Yii::$app->homeUrl.'order'; ?>" title="MY ORDERS">MY ORDERS</a></li>
                                    <?php
                                } ?>
                            </ul>
                        </li>
                    <?php } ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>
</div>
