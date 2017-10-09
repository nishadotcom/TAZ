<?php

use frontend\widgets\HomeProduct;
use frontend\widgets\FeatureProduct;
use frontend\widgets\WidgetFeatureSeller;
use frontend\widgets\Shipping;

$this->title = 'Home';
?>

      
<!-- DEAL SECTION -->
<?= HomeProduct::widget(); ?>

<!-- NEW ARRIVALS / ON SALE SECTION -->
<?= FeatureProduct::widget(); ?>

<!-- FEATURE SELLER -->
<?= WidgetFeatureSeller::widget(); ?>

<!-- SHIPPING / 24 X 7 SUPPOORT SECTION -->
<?= Shipping::widget(); ?>
