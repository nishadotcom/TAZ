<?php

$this->title = 'Single Product';
?>

<div class="row singleProduct">
            <div class="col-xs-12">
              <div class="media">
                <div class="media-right productSlider">
                  <div id="carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                      <div class="item active" data-thumb="0">
                        <img src="<?php echo $this->theme->baseUrl; ?>/assets/img/products/signle-product/product-slide-big-01.jpg">
                      </div>
                      <div class="item" data-thumb="1">
                        <img src="<?php echo $this->theme->baseUrl; ?>/assets/img/products/signle-product/product-slide-big-02.jpg">
                      </div>
                      <div class="item" data-thumb="2">
                        <img src="<?php echo $this->theme->baseUrl; ?>/assets/img/products/signle-product/product-slide-big-03.jpg">
                      </div>
                      <div class="item" data-thumb="3">
                        <img src="<?php echo $this->theme->baseUrl; ?>/assets/img/products/signle-product/product-slide-big-04.jpg">
                      </div>
                    </div>
                  </div> 
                  <div class="clearfix">
                    <div id="thumbcarousel" class="carousel slide" data-interval="false">
                      <div class="carousel-inner">
                          <div data-target="#carousel" data-slide-to="0" class="thumb"><img src="<?php echo $this->theme->baseUrl; ?>/assets/img/products/signle-product/product-slide-small-01.jpg"></div>
                          <div data-target="#carousel" data-slide-to="1" class="thumb"><img src="<?php echo $this->theme->baseUrl; ?>/assets/img/products/signle-product/product-slide-small-02.jpg"></div>
                          <div data-target="#carousel" data-slide-to="2" class="thumb"><img src="<?php echo $this->theme->baseUrl; ?>/assets/img/products/signle-product/product-slide-small-03.jpg"></div>
                          <div data-target="#carousel" data-slide-to="3" class="thumb"><img src="<?php echo $this->theme->baseUrl; ?>/assets/img/products/signle-product/product-slide-small-04.jpg"></div>
                      </div>
                      <a class="left carousel-control" href="#thumbcarousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                      </a>
                      <a class="right carousel-control" href="#thumbcarousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="media-body">
                  <ul class="list-inline">
                    <li><a href="<?php echo Yii::$app->homeUrl.'demo/categoryproducts'; ?>"><i class="fa fa-reply" aria-hidden="true"></i>Continue Shopping</a></li>
                    <li><a href="#"><i class="fa fa-plus" aria-hidden="true"></i>Share This</a></li>
                  </ul>
                  <h2>Pellentesque non risus quis tellus</h2>
                  <h3>$149</h3>
                  <p>Mauris lobortis augue ex, ut faucibus nisi mollis ac. Sed volutpat scelerisque ex ut ullamcorper. Cras at velit quis sapien dapibus laoreet a id odio. Sed sit amet accumsan ante, eu congue metus. Aenean eros tortor, cursus quis feugiat sed, vestibulum vel purus. Etiam aliquam turpis quis blandit finibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor placerat lectus, facilisis ornare leo tincidunt vel. Duis rutrum felis felis, eget malesuada massa tincidunt a.</p>
                  <span class="quick-drop">
                    <select name="guiest_id3" id="guiest_id3" class="select-drop">
                      <option value="0">Size</option>
                      <option value="1">Small</option>
                      <option value="2">Medium</option>
                      <option value="3">Big</option>            
                    </select>
                  </span>
                  <span class="quick-drop resizeWidth">
                    <select name="guiest_id4" id="guiest_id4" class="select-drop">
                      <option value="0">Qty</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>            
                    </select>
                  </span>
                  <div class="btn-area">
                    <a href="<?php echo Yii::$app->homeUrl.'demo/cart'; ?>" class="btn btn-primary btn-block">Add to cart <i class="fa fa-angle-right" aria-hidden="true"></i></a> 
                  </div>
                  <div class="tabArea">
                    <ul class="nav nav-tabs">
                      <li class="active"><a data-toggle="tab" href="#details">details</a></li>
                      <li><a data-toggle="tab" href="#about-art">about art</a></li>
                      <li><a data-toggle="tab" href="#sizing">sizing</a></li>
                      <li><a data-toggle="tab" href="#shipping">shipping</a></li>
                    </ul>
                    <div class="tab-content">
                      <div id="details" class="tab-pane fade in active">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <ul class="list-unstyled">
                          <li>Black, Crew Neck</li>
                          <li>75% Cotton, 25% Rayon</li>
                          <li>Waterbased Ink</li>
                          <li>Wash Cold, dry low</li>
                        </ul>
                      </div>
                      <div id="about-art" class="tab-pane fade">
                        <p>Nulla facilisi. Mauris efficitur, massa et iaculis accumsan, mauris velit ultrices purus, quis condimentum nibh dolor ut tortor. Donec egestas tortor quis mattis gravida. Ut efficitur elit vitae dignissim volutpat. </p>
                      </div>
                      <div id="sizing" class="tab-pane fade">
                        <p>Praesent dui felis, gravida a auctor at, facilisis commodo ipsum. Cras eu faucibus justo. Nullam varius cursus nisi, sed elementum sem sagittis at. Nulla tellus massa, vestibulum a commodo facilisis, pulvinar convallis nunc.</p>
                      </div>
                      <div id="shipping" class="tab-pane fade">
                        <p>Mauris lobortis augue ex, ut faucibus nisi mollis ac. Sed volutpat scelerisque ex ut ullamcorper. Cras at velit quis sapien dapibus laoreet a id odio. Sed sit amet accumsan ante, eu congue metus. Aenean eros tortor, cursus quis feugiat sed, vestibulum vel purus.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>