<?php
use yii\helpers\Html;
use yii\helpers\Url;

$controller = Yii::$app->controller;
$action 	= $controller->action->id;
?>
            <div class="col-xs-12">
              <div class="btn-group" role="group" aria-label="...">
                <a href="<?php echo Yii::$app->homeUrl.'profile-dashboard'; ?>" class="btn btn-default active"><i class="fa fa-th" aria-hidden="true"></i>Account Dashboard</a>
                <a href="<?php echo Yii::$app->homeUrl.'profile-update'; ?>" class="btn btn-default"><i class="fa fa-user" aria-hidden="true"></i>Profile</a>
                <a href="<?php echo Yii::$app->homeUrl.'contact-details'; ?>" class="btn btn-default"><i class="fa fa-map-marker" aria-hidden="true"></i>My Address</a>
                <a href="<?php echo Yii::$app->homeUrl.'demo/all-orders'; ?>" class="btn btn-default"><i class="fa fa-list" aria-hidden="true"></i>All Orders</a>
                <a href="<?php echo Yii::$app->homeUrl.'demo/wish-list'; ?>" class="btn btn-default"><i class="fa fa-gift" aria-hidden="true"></i>Wishlist</a>
				<a href="<?php echo Yii::$app->homeUrl.'seller/my-products'; ?>" class="btn btn-default <?php echo ($action == 'my-products') ? 'active' : ''; ?>" title="My Products"><i class="fa fa-product-hunt " aria-hidden="true"></i>My Products</a>
              </div>
            </div>
