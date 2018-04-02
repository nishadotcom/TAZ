<?php
use yii\helpers\Html;

if($banners){
  ?>
  <div class="bannercontainer">
    <div class="owl-carousel bannerV3">
      <?php 
      foreach ($banners as $key => $banner) {
        ?>
        <div class="slide">
          <img src="<?= Yii::$app->params['PATH_BANER_IMAGE'].$banner->image_name; ?>" alt="<?= $banner->title; ?>">
        </div>
        <?php
      }
      ?>
    </div>
  </div>
  <?php
}

?>