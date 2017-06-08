<?php
use frontend\widgets\Banner;
use frontend\widgets\HomeProduct;
use frontend\widgets\FeatureProduct;
use frontend\widgets\FeatureSeller;
use frontend\widgets\Shipping;

$this->title = 'Home';
?>

<!-- BANNER -->
<?= Banner::widget(); ?>
      
<!-- DEAL SECTION -->
<?= HomeProduct::widget(); ?>

<!-- NEW ARRIVALS / ON SALE SECTION -->
<?= FeatureProduct::widget(); ?>

<!-- FEATURE SELLER -->
<?= FeatureSeller::widget(); ?>

<!-- SHIPPING / 24 X 7 SUPPOORT SECTION -->
<?= Shipping::widget(); ?>
