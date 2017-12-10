<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Become a Seller';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
	<div class="col-md-2 col-sm-3 col-xs-12">
		<div class="thumbnail">
			<img src="<?php echo $this->theme->baseUrl; ?>/assets/img/products/profile/profile-image.jpg" alt="profile-image">
		</div>
	</div>   
	<div class="col-md-10 col-sm-9 col-xs-12">
		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever 
			since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
			Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever 
			since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
			Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever 
					since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
			Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever 
					since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
		<p class="pull-right">
			<!--<button type="button" class="btn btn-lg btn-success-filled btn-rounded" data-toggle="modal" data-target='#signup'>Become a Seller</button>-->
			<!--<button type="button" class="btn btn-lg btn-success-filled btn-rounded">Become a Seller</button>-->
                        <a href="<?php echo Yii::$app->homeUrl . 'site/become-seller-signup'; ?>" class="btn btn-lg btn-success-filled btn-rounded">Become a Seller</a>
		</p>
	</div>
</div>


<div class="grid margin-top-30">
	<div class="row">
		<div class="col-md-3">
			<div class="box">
				<i class="fa fa-shopping-cart"></i>
				<h4>Restaurants &amp; Bars</h4>
				<p class="quote">"ZoomShift has been a sanity saver for me. I'm recommending it to all business owners and friends!"</p>
				<span class="by">Micky / Mount Vernon Confections</span>
			</div>
		</div>
		<div class="col-md-3">
			<div class="box">
				<i class="fa fa-shopping-cart"></i>
				<h4>Restaurants &amp; Bars</h4>
				<p class="quote">"ZoomShift has been a sanity saver for me. I'm recommending it to all business owners and friends!"</p>
				<span class="by">Micky / Mount Vernon Confections</span>
			</div>
		</div>
		<div class="col-md-3">
			<div class="box">
				<i class="fa fa-shopping-cart"></i>
				<h4>Restaurants &amp; Bars</h4>
				<p class="quote">"ZoomShift has been a sanity saver for me. I'm recommending it to all business owners and friends!"</p>
				<span class="by">Micky / Mount Vernon Confections</span>
			</div>
		</div>
		<div class="col-md-3">
			<div class="box">
				<i class="fa fa-shopping-cart"></i>
				<h4>Restaurants &amp; Bars</h4>
				<p class="quote">"ZoomShift has been a sanity saver for me. I'm recommending it to all business owners and friends!"</p>
				<span class="by">Micky / Mount Vernon Confections</span>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
      <div class="page-header text-center margin-top-30">
        <h3>How much will I pay?</h3>
      </div>
	  <p><strong class='lead text-warning'>Nothing!</strong></p> 
	  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever 
		since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
    </div>
</div>

<div class="row clearfix">
	<div class="col-xs-12 margin-top-30">
		<div class="page-header">
			<h4>Who else is on DEMO?</h4>
		</div>
	</div>
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="productBox">
			<div class="productImage clearfix">
				<img src="<?php echo $this->theme->baseUrl; ?>/assets/img/products/products-01.jpg" alt="products-img">
			</div>
			<div class="productCaption clearfix">
				<h5>Nike Sportswear</h5>
				<p>
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever 
					since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
				</p>
			</div>
		</div>
	</div>
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="productBox">
			<div class="productImage clearfix">
				<img src="<?php echo $this->theme->baseUrl; ?>/assets/img/products/products-01.jpg" alt="products-img">
			</div>
			<div class="productCaption clearfix">
				<h5>Nike Sportswear</h5>
				<p>
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever 
					since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
				</p>
			</div>
		</div>
	</div>
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="productBox">
			<div class="productImage clearfix">
				<img src="<?php echo $this->theme->baseUrl; ?>/assets/img/products/products-01.jpg" alt="products-img">
			</div>
			<div class="productCaption clearfix">
				<h5>Nike Sportswear</h5>
				<p>
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever 
					since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
				</p>
			</div>
		</div>
	</div>
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="productBox">
			<div class="productImage clearfix">
				<img src="<?php echo $this->theme->baseUrl; ?>/assets/img/products/products-01.jpg" alt="products-img">
			</div>
			<div class="productCaption clearfix">
				<h5>Nike Sportswear</h5>
				<p>
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever 
					since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
				</p>
			</div>
		</div>
	</div>
</div>

<!-- signup modal -->
<div class="modal fade" id="signup" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3 class="modal-title">Become a Seller</h3>
          </div>
          <div class="modal-body">
            <form action="" method="POST" role="form">
              <div class="form-group">
                <label for="">First Name</label>
                <input type="text" class="form-control" id="">
              </div>
			  <div class="form-group">
                <label for="">Last Name</label>
                <input type="text" class="form-control" id="">
              </div>
			  <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" id="">
              </div>
			  <div class="form-group">
                <label for="">Mobile</label>
                <input type="number" class="form-control" id="">
              </div>
              <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" id="">
              </div>
              <div class="form-group">
                <label for="">Confirm Password</label>
                <input type="password" class="form-control" id="">
              </div>
              <button type="submit" class="btn btn-primary btn-block">Sign up</button>
            </form>  
          </div>
        </div>
      </div>
</div>
<!-- end of signup modal -->


<aside id="sticky-social">
    <ul>
        <li><a href="#" class="entypo-facebook" target="_blank"><i class="fa fa-shopping-cart"> </i><span>Facebook</span></a></li>
        <li><a href="#" class="entypo-twitter" target="_blank"><i class="fa fa-shopping-cart"></i><span>Twitter</span></a></li>
        <li><a href="#" class="entypo-gplus" target="_blank"><i class="fa fa-shopping-cart"></i><span>Google+</span></a></li>
    </ul>
</aside>