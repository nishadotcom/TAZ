<?php
use yii\helpers\Html;
use yii\helpers\Url;

$controller = Yii::$app->controller;
$action = $controller->action->id;
$controllerName = $controller->id;
//echo $controllerName.'/'.$action;
?>
<?php /* ?>
<div class="col-xs-12 text-center">
    <div class="btn-group" role="group" aria-label="...">
        <a href="<?php echo Yii::$app->homeUrl . 'profile-dashboard'; ?>" class="btn btn-default <?php echo ($action == 'profile-dashboard') ? 'active' : ''; ?>"><i class="fa fa-th" aria-hidden="true"></i>Dashboard</a>
        <a href="<?php echo Yii::$app->homeUrl . 'profile-update'; ?>" class="btn btn-default <?php echo ($action == 'profile-update') ? 'active' : ''; ?>"><i class="fa fa-user" aria-hidden="true"></i>About Me</a>
        <a href="<?php echo Yii::$app->homeUrl . 'user-address'; ?>" class="btn btn-default <?php echo ($controllerName == 'user-address') ? 'active' : ''; ?>"><i class="fa fa-map-marker" aria-hidden="true"></i>My Address</a>

<!--<a href="<?php ///echo Yii::$app->homeUrl . 'demo/wish-list'; ?>" class="btn btn-default"><i class="fa fa-gift" aria-hidden="true"></i>Wishlist</a>-->
        <?php
        if (isset(Yii::$app->user->identity) && Yii::$app->user->identity->user_type == Yii::$app->params['ROLE_SELLER']) {
            ?>
            <a href="<?php echo Yii::$app->homeUrl . 'mysales'; ?>" class="btn btn-default <?php echo ($controllerName == 'order-detail') ? 'active' : ''; ?>"><i class="fa fa-list" aria-hidden="true"></i>My Sales</a>
            <a href="<?php echo Yii::$app->homeUrl . 'product'; ?>" class="btn btn-default <?php echo ($controllerName == 'product') ? 'active' : ''; ?>" title="My Products"><i class="fa fa-product-hunt " aria-hidden="true"></i>My Products</a>
        <?php }elseif(isset(Yii::$app->user->identity) && Yii::$app->user->identity->user_type == Yii::$app->params['ROLE_BUYER']) {
            ?>
            <a href="<?php echo Yii::$app->homeUrl . 'order'; ?>" class="btn btn-default <?php echo ($controllerName == 'order') ? 'active' : ''; ?>">
                <i class="fa fa-list" aria-hidden="true"></i>My Orders
            </a>
        <?php }
        ?>
    </div>
</div>
<?php */ ?>

<div class="menu-blue-bg">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-4 col-md-4 col-sm-4 col-xl-4">
                <div class="d-flex justify-content-start">
                    <div class="p-2">
                        <img class="" src="../TEMPLATE/img/dashboard-icon-001.png" />
                    </div>
                    <div class="light-blue-bg p-4">
                        <h2><?php echo $this->title; ?></h2>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-8 col-md-8 col-sm-8 col-xl-8 ">
                <div class="d-md-flex d-block align-self-center float-right menu-btn-space">

                    <a href="<?php echo Yii::$app->homeUrl . 'profile-dashboard'; ?>" class="btn btn-default blue-bg-btn tablink <?php echo ($action == 'profile-dashboard') ? 'active' : ''; ?>">
                        <img src="<?php echo $this->theme->baseUrl; ?>/assets/img/dashboard-icon.png" /> 
                        <span>Dashboard</span>
                    </a>

                    <a href="<?php echo Yii::$app->homeUrl . 'profile-update'; ?>" class="btn btn-default blue-bg-btn tablink <?php echo ($action == 'profile-update') ? 'active' : ''; ?>"> 
                        <img src="<?php echo $this->theme->baseUrl; ?>/assets/img/user-icon.png" /> 
                        <span>About Me</span>
                    </a>

                    <a href="<?php echo Yii::$app->homeUrl . 'user-address'; ?>" class="btn btn-default blue-bg-btn tablink <?php echo ($controllerName == 'user-address') ? 'active' : ''; ?>"> 
                        <img src="<?php echo $this->theme->baseUrl; ?>/assets/img/location-map-icon.png" /> 
                        <span>My Address</span>
                    </a>

                    <?php 
                    if (isset(Yii::$app->user->identity) && Yii::$app->user->identity->user_type == Yii::$app->params['ROLE_SELLER']) {
                    ?>

                    <a href="<?php echo Yii::$app->homeUrl . 'product'; ?>" class="btn btn-default blue-bg-btn tablink <?php echo ($controllerName == 'product') ? 'active' : ''; ?>"> 
                        <img src="<?php echo $this->theme->baseUrl; ?>/assets/img/my-order-icon.png" /> 
                        <span>My Products</span>
                    </a>

                    <a href="<?php echo Yii::$app->homeUrl . 'mysales'; ?>" class="btn btn-default blue-bg-btn tablink <?php echo ($controllerName == 'order-detail') ? 'active' : ''; ?>"> 
                        <img src="<?php echo $this->theme->baseUrl; ?>/assets/img/my-order-icon.png" /> 
                        <span>My Sales</span>
                    </a>
                    <?php }else{ ?>
                    <a href="<?php echo Yii::$app->homeUrl . 'order'; ?>" class="btn btn-default blue-bg-btn tablink <?php echo ($controllerName == 'order') ? 'active' : ''; ?>"> 
                        <img src="<?php echo $this->theme->baseUrl; ?>/assets/img/my-order-icon.png" /> 
                        <span>My Orders</span>
                    </a>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
