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
		<p>
		    Hey there! Welcome to <strong>Talozo</strong>. Now that you are here, let’s get you started. In this short tutorial, you will find all the information needed to setup and start selling!
		    <br> But first, a little bit about us. We are on a mission to change this world. Make it more beautiful. Revive our lost tradition in arts. Make the world and the people in it aware of the majesty, serenity and intricacy of art form.
		    <br> We celebrate our partners, which is you. We want you to be able to reach a million people around the world and tell your story through your art. And we are here to help you in your journey.
		    <br> How do you get started ? It’s simple!
		    <br> Click on the <strong style="color: green;">Become Seller</strong> button and sign up with your details. After that one of our associates will help you set up the rest!
		</p>
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


<div id="sidebar_becomeaseller" class="sidebar_becomeaseller" style="right: 0px; display: none;">
	<a href="<?php echo Yii::$app->homeUrl . 'site/become-seller-signup'; ?>" title="Become a Seller">
		<div class="sidebar_right"></div>
	</a>
</div>