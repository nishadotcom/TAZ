<?php
$this->title = 'Shipping Method';
?>

<!-- MAIN CONTENT SECTION -->
 <div class="row">
            <div class="col-xs-12">
              <div class="innerWrapper clearfix stepsPage">
                <div class="row progress-wizard" style="border-bottom:0;">

                  <div class="col-xs-3 progress-wizard-step complete fullBar">
                    <div class="text-center progress-wizard-stepnum">Billing &amp; Shipping Address</div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <a href="<?php echo Yii::$app->homeUrl.'demo/checkout'; ?>" class="progress-wizard-dot"></a>
                  </div>

                  <div class="col-xs-3 progress-wizard-step complete fullBar">
                    <div class="text-center progress-wizard-stepnum">Shipping Method</div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <a href="<?php echo Yii::$app->homeUrl.'demo/checkout-step2'; ?>" class="progress-wizard-dot"></a>
                  </div>

                  <div class="col-xs-3 progress-wizard-step complete fullBar">
                    <div class="text-center progress-wizard-stepnum">Payment Method</div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <a href="<?php echo Yii::$app->homeUrl.'demo/checkout-step3'; ?>" class="progress-wizard-dot"></a>
                  </div>

                  <div class="col-xs-3 progress-wizard-step complete">
                    <div class="text-center progress-wizard-stepnum">Review</div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <a href="<?php echo Yii::$app->homeUrl.'demo/checkout-step4'; ?>" class="progress-wizard-dot"></a>
                  </div>
                </div>
                
                <form action="" class="row" method="POST" role="form">
                  <div class="col-xs-12">
                    <div class="page-header">
                      <h4>Choose your Delivery method</h4>
                    </div>
                  </div>
                  <div class="form-group col-sm-4 col-xs-12">
                    <label for="">Conutry</label>
                    <span class="step-drop">
                      <select name="guiest_id3" id="guiest_id3" class="select-drop">
                        <option value="0">Choose</option>
                        <option value="1">Choose 1</option>
                        <option value="2">Choose 2</option>
                        <option value="3">Choose 3</option>            
                      </select>
                    </span>
                  </div>
                  <div class="form-group col-sm-4 col-xs-12">
                    <label for="">State</label>
                    <span class="step-drop">
                      <select name="guiest_id3" id="guiest_id3" class="select-drop">
                        <option value="0">Choose</option>
                        <option value="1">Choose 1</option>
                        <option value="2">Choose 2</option>
                        <option value="3">Choose 3</option>            
                      </select>
                    </span>
                  </div>
                  <div class="form-group col-sm-4 col-xs-12">
                    <label for="">Zip Code</label>
                    <input type="text" class="form-control" id="">
                  </div>
                  <div class="col-xs-12">
                    <div class="orderBox">
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Carrier</th>
                              <th>Method</th>
                              <th>Information</th>
                              <th>Price</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="col-xs-1"><i class="fa fa-plane" aria-hidden="true"></i></td>
                              <td>by Air</td>
                              <td>Delivery next day!</td>
                              <td>$ 99.00</td>
                              <td>
                                <div class="checkboxArea">
                                  <input id="checkbox1" type="checkbox" name="checkbox" value="1" checked="checked">
                                  <label for="checkbox1"><span></span></label>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="col-xs-1"><i class="fa fa-ship" aria-hidden="true"></i></td>
                              <td>by Ship</td>
                              <td>Pick up in-store</td>
                              <td>$ 39.00</td>
                              <td>
                                <div class="checkboxArea">
                                  <input id="checkbox2" type="checkbox" name="checkbox" value="1">
                                  <label for="checkbox2"><span></span></label>
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <div class="well well-lg clearfix">
                      <ul class="pager">
                      <li class="previous"><a href="<?php echo Yii::$app->homeUrl.'demo/checkout-step2'; ?>">back</a></li>
                        <li class="next"><a href="<?php echo Yii::$app->homeUrl.'demo/checkout-step3'; ?>">Continue</a></li>
                      </ul>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>