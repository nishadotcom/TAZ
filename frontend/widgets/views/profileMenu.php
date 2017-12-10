<?php

use yii\helpers\Html;
use yii\helpers\Url;

$controller = Yii::$app->controller;
$action = $controller->action->id;
$controllerName = $controller->id;
//echo $controllerName.'/'.$action;
?>
<div class="col-xs-12 text-center">
    <div class="btn-group" role="group" aria-label="...">
        <a href="<?php echo Yii::$app->homeUrl . 'profile-dashboard'; ?>" class="btn btn-default <?php echo ($action == 'profile-dashboard') ? 'active' : ''; ?>"><i class="fa fa-th" aria-hidden="true"></i>Account Dashboard</a>
        <a href="<?php echo Yii::$app->homeUrl . 'profile-update'; ?>" class="btn btn-default <?php echo ($action == 'profile-update') ? 'active' : ''; ?>"><i class="fa fa-user" aria-hidden="true"></i>Profile</a>
        <a href="<?php echo Yii::$app->homeUrl . 'user-address'; ?>" class="btn btn-default <?php echo ($controllerName == 'user-address') ? 'active' : ''; ?>"><i class="fa fa-map-marker" aria-hidden="true"></i>My Address</a>
        <a href="<?php echo Yii::$app->homeUrl . 'demo/all-orders'; ?>" class="btn btn-default"><i class="fa fa-list" aria-hidden="true"></i>My Orders</a>
        <!--<a href="<?php echo Yii::$app->homeUrl . 'demo/wish-list'; ?>" class="btn btn-default"><i class="fa fa-gift" aria-hidden="true"></i>Wishlist</a>-->
        <?php 
        if(Yii::$app->user->identity->user_type == 'Seller'){
        ?>
            <a href="<?php echo Yii::$app->homeUrl . 'product'; ?>" class="btn btn-default <?php echo ($controllerName == 'product') ? 'active' : ''; ?>" title="My Products"><i class="fa fa-product-hunt " aria-hidden="true"></i>My Products</a>
        <?php } ?>
    </div>
</div>
