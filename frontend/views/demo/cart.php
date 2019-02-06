    <div class="tableBlock">
            <div class="row tableInner">
              <div class="col-xs-12">
                <div class="page-title">
                  <h2>cart</h2>
                  <ol class="breadcrumb">
                    <li>
                      <a href="index.html">Home</a>
                    </li>
                    <li class="active">cart</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
<!-- MAIN CONTENT SECTION -->

          <div class="row">
            <div class="col-xs-12">
              <div class="cartListInner">
                <form action="#">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Product Name</th>
                          <th>Price</th>
                          <th>Quantity</th>
                          <th>Sub Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="col-xs-2">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <span class="cartImage"><img src="<?php echo $this->theme->baseUrl; ?>/assets/img/products/cart-image.jpg" alt="image"></span>
                          </td>
                          <td class="col-xs-4">Italian Winter Hat</td>
                          <td class="col-xs-2">$ 99.00</td>
                          <td class="col-xs-2"><input type="text" placeholder="1"></td>
                          <td class="col-xs-2">$ 99.00</td>
                        </tr>
                        <tr>
                          <td class="col-xs-2">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <span class="cartImage"><img src="<?php echo $this->theme->baseUrl; ?>/assets/img/products/cart-image.jpg" alt="image"></span>
                          </td>
                          <td class="col-xs-4">Italian Winter Hat</td>
                          <td class="col-xs-2">$ 99.00</td>
                          <td class="col-xs-2"><input type="text" placeholder="1"></td>
                          <td class="col-xs-2">$ 99.00</td>
                        </tr>
                        <tr>
                          <td class="col-xs-2">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <span class="cartImage"><img src="<?php echo $this->theme->baseUrl; ?>/assets/img/products/cart-image.jpg" alt="image"></span>
                          </td>
                          <td class="col-xs-4">Italian Winter Hat</td>
                          <td class="col-xs-2">$ 99.00</td>
                          <td class="col-xs-2"><input type="text" placeholder="1"></td>
                          <td class="col-xs-2">$ 99.00</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="updateArea">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="I have a discount coupon" aria-describedby="basic-addon2">
                      <a href="#" class="btn input-group-addon" id="basic-addon2">apply coupon</a>
                    </div>
                    <a href="#" class="btn">update cart</a>
                  </div>
                  <div class="row totalAmountArea">
                    <div class="col-sm-4 col-sm-offset-8 col-xs-12">
                      <ul class="list-unstyled">
                        <li>Sub Total <span>$ 792.00</span></li>
                        <li>UK Vat <span>$ 18.00</span></li>
                        <li>Grand Total <span class="grandTotal">$ 810.00</span></li>
                      </ul>
                    </div>
                  </div>
                  <div class="checkBtnArea">
                    <a href="<?php echo Yii::$app->homeUrl.'demo/checkout'; ?>" class="btn btn-primary btn-block">checkout<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                  </div>
                </form>
              </div>
            </div>
          </div>
     