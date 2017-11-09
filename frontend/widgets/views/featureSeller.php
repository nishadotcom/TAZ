<?php
use yii\helpers\Html;

if($feature_sellers){
?>
<!-- FEATURE SELLER SECTION -->
<div class="row testimonialSection">
	<div class="col-xs-12">
		<div class="page-header">
	    	<h4>Feature Sellers</h4>
	  	</div>
	  	<div class="owl-carousel testimonialSlider">
	        <div class="slide">
	          <div class="testimonial-inner">
	            <div class="testimonialImage text-center">
	              <img src="<?php echo $this->theme->baseUrl; ?>/assets/img/about-us/people-03.jpg" alt="Image">
	            </div>
	            <div class="testimonialText">
	              <h5 class="sub-title">RituRaj</h5>
	              <div class="testimonial-content">
	                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.</p>
	              </div>
	            </div>
	          </div>
	        </div>
	        <div class="slide">
	          <div class="testimonial-inner">
	            <div class="testimonialImage text-center">
	              <img src="<?php echo $this->theme->baseUrl; ?>/assets/img/about-us/people-02.jpg" alt="Image">
	            </div>
	            <div class="testimonialText">
	              <h5 class="sub-title">Hello World</h5>
	              <div class="testimonial-content">
	                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.</p>
	              </div>
	            </div>
	          </div>
	        </div>

	        <!--<div class="slide">
	          <div class="testimonial-inner">
	            <div class="testimonialImage text-center">
	              <img src="<?php echo $this->theme->baseUrl; ?>/assets/img/about-us/people-03.jpg" alt="Image">
	            </div>
	            <div class="testimonialText">
	              <h4 class="sub-title">RituRaj</h4>
	              <div class="testimonial-content">
	                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.</p>
	              </div>
	            </div>
	          </div>
	        </div>-->
	  </div>
	</div>  
</div>
<?php } ?>
