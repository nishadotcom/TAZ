
<?php
use frontend\widgets\ProfileMenu;

$this->title = 'My Account';

?>
<div id="dashboard" class="tabcontent">
<!-- <div class="container">
<div class="row">
<div class="col-12 col-lg-12 col-md-12 col-sm-12 col-xl-12"> -->


<main class="container" role="main">
          <div class="row custon-four-box">
            <div class="col-md-6 col-lg-6 col-xl-3 mb-5">
              <div class="card card-tile card-xs bg-primary bg-gradient text-center">
                <div class="card-body p-2">
                  <!-- Accepts .invisible: Makes the items. Use this only when you want to have an animation called on it later -->
                  <div class="tile-left">
                    <i class="fas fa-user fa-5x"></i>
                  </div>
                  <div class="tile-right">
                    <div class="tile-number">1,359</div>
                    <div class="tile-description">Customers Online</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 mb-5">
              <div class="card card-tile card-xs bg-secondary bg-gradient text-center">
                <div class="card-body p-2">
                  <div class="tile-left">
                    <i class="fas fa-user fa-5x"></i>
                  </div>
                  <div class="tile-right">
                    <div class="tile-number">$7,349.90</div>
                    <div class="tile-description">Today's Sales</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 mb-5">
              <div class="card card-tile card-xs bg-primary bg-gradient text-center">
                <div class="card-body p-2">
                  <div class="tile-left">
                    <i class="fas fa-user fa-5x"></i>
                  </div>
                  <div class="tile-right">
                    <div class="tile-number">26</div>
                    <div class="tile-description">Open Tickets</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 mb-5">
              <div class="card card-tile card-xs bg-secondary bg-gradient text-center">
                <div class="card-body p-2">
                  <div class="tile-left">
                    <i class="fas fa-user fa-5x"></i>
                  </div>
                  <div class="tile-right">
                    <div class="tile-number">476</div>
                    <div class="tile-description">New Orders</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-lg-6 col-xl-8 mb-5">
              <div class="card">
                <div class="card-header">
                  Sales Overview
                  
                </div>
                <div class="card-body">
                  <div class="card-chart" data-chart-color-1="#07a7e3" data-chart-color-2="#32dac3" data-chart-legend-1="Sales ($)" data-chart-legend-2="Orders" data-chart-height="281"></div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4 mb-5">
              <div class="card card-md">
                <div class="card-header">
                  Traffic Sources
                  
                </div>
                <div class="card-body text-center">
                
                  
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-lg-4 mb-5">
              <div class="card card-sm bg-info">
                <div class="card-body">
                  <div class="mb-4 clearfix">
                    <div class="float-left text-warning text-left">
                      <i class="fas fa-user fa-5x"></i>
                    </div>
                    <div class="float-right text-right">
                      <h6 class="m-0">Twitter Followers</h6>
                    </div>
                  </div>
                  <div class="text-right clearfix">
                    <div class="display-4">65,452</div>
                    <div class="m-0">+72 Today</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-5">
              <div class="card card-sm">
                <div class="card-body">
                  <div class="mb-4 clearfix">
                    <div class="float-left text-warning text-left">
                      <i class="fas fa-user fa-5x"></i>
                    </div>
                    <div class="float-right text-right">
                      <h6 class="m-0">Reviews</h6>
                    </div>
                  </div>
                  <div class="text-right clearfix">
                    <div class="display-4">7,842</div>
                    <div class="m-0">
                      <a href="#">Read More</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-lg-4 mb-5">
              <div class="card card-sm bg-danger">
                <div class="card-body">
                  <div class="mb-4 clearfix">
                    <div class="float-left text-left">
                      <i class="fas fa-user fa-5x"></i>
                    </div>
                    <div class="float-right text-right">
                      <h6 class="m-0">Products Returned</h6>
                    </div>
                  </div>
                  <div class="text-right clearfix">
                    <div class="display-4">231</div>
                    <div class="m-0">-4% Today</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-lg-5 col-xl-3 mb-5">
              <div class="card card-md card-team-members">
                <div class="card-header">
                  Team Members
                </div>
                <div class="card-media-list mCustomScrollbar _mCS_1 mCS-autoHide"><div id="mCSB_1" class="mCustomScrollBox mCS-dark mCSB_vertical mCSB_inside" style="max-height: 305.004px;" tabindex="0"><div id="mCSB_1_container" class="mCSB_container" style="position:relative; top:0; left:0;" dir="ltr">
                  


                  <div class="media clickable" data-qp-link="profiles-member-profile.html">
                    <div class="profile-picture bg-gradient bg-primary float-right d-flex mr-3">
                      <img src="../TEMPLATE/img/profile-pic-6.jpg" width="44" height="44" class="mCS_img_loaded">
                    </div>
                    <div class="media-body">
                      <div class="heading mt-1">
                        Jacklin O'neil
                      </div>
                      <div class="subtext">jakjak</div>
                    </div>
                  </div>
                </div><div id="mCSB_1_scrollbar_vertical" class="mCSB_scrollTools mCSB_1_scrollbar mCS-dark mCSB_scrollTools_vertical mCSB_scrollTools_onDrag_expand" style="display: block;"><div class="mCSB_draggerContainer"><div id="mCSB_1_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; display: block; height: 158px; max-height: 295px; top: 0px;"><div class="mCSB_dragger_bar" style="line-height: 30px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div></div>
              </div>
            </div>
            <div class="col-md-6 col-lg-7 col-xl-6 mb-5">
              <div class="card card-md card-customer-location">
                <div class="card-header">
                  Customer Location
                </div>
                <div class="card-body">
                  <div class="card-chart" data-chart-color-selected="#07a7e3">
                    
                  <div id="customer-location" style="width: 461.031px; height: 20px; position: relative; overflow: hidden; background-color: rgb(255, 255, 255);"> </div></div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-xl-3 mb-5">
              <div class="row mb-4">
                <div class="col-sm-12">
                  <div class="card card-sm bg-primary bg-gradient text-center">
                    <div class="card-body" style="padding-left: 0px; padding-right: 0px; padding-bottom: 0px; position: relative;">
                      <i class="fas fa-user fa-5x"></i>
                      <h6 class="mt-1">Database Load</h6>
                      <div class="card-chart" data-chart-color-1="#FFFFFF" data-chart-color-2="#FFFFFF" style="position: absolute; bottom: 0px;"><canvas id="database-load" width="240" height="82" style="width: 240.5px; height: 82px; display: block;"></canvas></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="card card-sm bg-secondary bg-gradient text-center">
                    <div class="card-body" style="padding-left: 0px; padding-right: 0px;">
                      <div class="card-chart" data-chart-color-1="#FFFFFF" data-chart-color-2="#FFFFFF"></div>
                      <h6>Profit/Loss (18 Months)</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 col-md-6 col-xl-4 mb-5">
              <div class="card card-task card-md">
                <div class="card-header">
                  Task List
                
                
                </div>
                <div class="card-task-list mCustomScrollbar _mCS_4 mCS-autoHide">
                <div id="" class="mCustomScrollBox mCS-dark mCSB_vertical mCSB_inside" tabindex="0" style="max-height: 263.004px;">
                <div id="" class="mCSB_container" style="position:relative; top:0; left:0;" dir="ltr">
                
                </div>
                <div id="mCSB_4_scrollbar_vertical" class="mCSB_scrollTools mCSB_4_scrollbar mCS-dark mCSB_scrollTools_vertical mCSB_scrollTools_onDrag_expand" style="display: block;"><div class="mCSB_draggerContainer"><div id="mCSB_4_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; display: block; height: 109px; max-height: 253px; top: 0px;"><div class="mCSB_dragger_bar" style="line-height: 30px;"></div></div>
                <div class="mCSB_draggerRail"></div></div></div></div></div>
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-xl-3 mb-5">
              <div class="card card-md bg-primary bg-gradient text-center card-goal-reached">
                <!-- Accepts qp-animate-type which contains an optional animation type from animate.css -->
                <div class="card-body">
                  <h6 class="my-5">Goal Reached</h6>
                  <i class="fas fa-user fa-5x"></i>
                  <div class="display-4 mt-3">4,294</div>
                  <p>of 4,000 Target Downloads</p>
                  <p>Congratulations! You surpassed your target goal.</p>
                  <a class="btn btn-secondary waves-effect waves-light">See Details</a>
                </div>
              </div>
            </div>
            <div class="col-xl-5 mb-5">
              <div class="card card-activity card-md">
                <div class="card-header">
                  Activity
                </div>
                <div class="card-media-list mCustomScrollbar _mCS_2 mCS-autoHide"><div id="mCSB_2" class="mCustomScrollBox mCS-dark mCSB_vertical mCSB_inside" tabindex="0" style="max-height: 305.004px;"><div id="mCSB_2_container" class="mCSB_container" style="position:relative; top:0; left:0;" dir="ltr">
                  <div class="media clickable" data-qp-link="task-list.html">
                    <div class="profile-picture bg-gradient bg-primary has-message float-right d-flex mr-3">
                      <img src="../TEMPLATE/img/profile-pic.jpg" width="44" height="44" class="mCS_img_loaded">
                    </div>
                    <div class="media-body">
                      <div class="heading mt-1">
                        You were assigned a new task.
                      </div>
                      <div class="subtext">by Johanna Quinn</div>
                    </div>
                  </div>

                  <div class="media clickable" data-qp-link="task-list.html">
                    <div class="profile-picture bg-gradient bg-primary has-message float-right d-flex mr-3">
                      <img src="../TEMPLATE/img/profile-pic-3.jpg" width="44" height="44" class="mCS_img_loaded">
                    </div>
                    <div class="media-body">
                      <div class="heading mt-1">
                        Teal'c Jaffa was added to your team members.
                      </div>
                      <div class="subtext">by George Hammond</div>
                    </div>
                  </div>


                  
                </div><div id="mCSB_2_scrollbar_vertical" class="mCSB_scrollTools mCSB_2_scrollbar mCS-dark mCSB_scrollTools_vertical mCSB_scrollTools_onDrag_expand" style="display: block;"><div class="mCSB_draggerContainer"><div id="mCSB_2_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; display: block; height: 152px; max-height: 295px; top: 0px;"><div class="mCSB_dragger_bar" style="line-height: 30px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div></div>
              </div>
            </div>
          </div>
          <div class="row mb-5">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  User Management
                </div>
                <div class="card-table table-responsive">
                  <table class="table table-hover align-middle">
                    <thead class="thead-light">
                      <tr>
                        <th>Member</th>
                        <th>Email</th>
                        <th class="text-center">Status</th>
                        <th>Created</th>
                        <th class="text-right">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    
                      <tr>
                        <td>
                          <div class="media">
                            <div class="profile-picture bg-gradient bg-primary has-message float-right d-flex mr-3">
                              <img src="../TEMPLATE/img/profile-pic-3.jpg" width="44" height="44">
                            </div>
                            <div class="media-body">
                              <div class="heading mt-1">
                                Teal'c Jaffa
                              </div>
                              <div class="subtext">tealc</div>
                            </div>
                          </div>
                        </td>
                        <td>
                          <a href="#">tealc.jaffa@kawoosh.com</a>
                        </td>
                        <td class="text-center">
                          <span class="badge badge-success">Reviewing</span>
                        </td>
                        <td>15th Jan 2017</td>
                        <td class="text-right">
                          <a class="btn btn-primary waves-effect waves-light">
                            <i class="fas fa-eye fa-1x"></i>
                          </a>
                          <a class="btn btn-success waves-effect waves-light">
                            <i class="fas fa-eye fa-1x"></i>
                          </a>
                        </td>
                      </tr>
                      
                      
                      <tr>
                        <td>
                          <div class="media">
                            <div class="profile-picture bg-gradient bg-primary float-right d-flex mr-3">
                              <img src="../TEMPLATE/img/profile-pic-5.jpg" width="44" height="44">
                            </div>
                            <div class="media-body">
                              <div class="heading mt-1">
                                Daniella Jackson
                              </div>
                              <div class="subtext">jacksond</div>
                            </div>
                          </div>
                        </td>
                        <td>
                          <a href="#">daniella.jackson@chabaai.com</a>
                        </td>
                        <td class="text-center">
                          <span class="badge badge-default">Banned</span>
                        </td>
                        <td>5th Jan 2017</td>
                        <td class="text-right">
                          <a class="btn btn-primary waves-effect waves-light">
                            <i class="fas fa-eye fa-1x"></i>
                          </a>
                          <a class="btn btn-success waves-effect waves-light">
                            <i class="fas fa-eye fa-1x"></i>
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="media">
                            <div class="profile-picture bg-gradient bg-primary float-right d-flex mr-3">
                              <img src="../TEMPLATE/img/profile-pic-6.jpg" width="44" height="44">
                            </div>
                            <div class="media-body">
                              <div class="heading mt-1">
                                Jacklin O'neil
                              </div>
                              <div class="subtext">jakjak</div>
                            </div>
                          </div>
                        </td>
                        <td>
                          <a href="#">jack.oneill@ancientgene.com</a>
                        </td>
                        <td class="text-center">
                          <span class="badge badge-info">Action Required</span>
                        </td>
                        <td>1st Jan 2017</td>
                        <td class="text-right">
                          <a class="btn btn-primary waves-effect waves-light">
                            <i class="fas fa-eye fa-1x"></i>
                          </a>
                          <a class="btn btn-success waves-effect waves-light">
                            <i class="fas fa-eye fa-1x"></i>
                          </a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col-md-12">
              
            </div>
          </div>
        </main>




<!--
  </div>
  </div>
</div> -->

</div>
<?php /* ?>
<div class="row">
         <?= ProfileMenu::widget(); ?>
</div>

<div class="row">
            <div class="col-xs-12">
              <div class="innerWrapper">
                
                <h3 id="testTour">Hello <span><?php echo $user['firstname'];?> !</span></h3>
                <hr>
        
                
                <?php 
                if(Yii::$app->user->identity->user_type == 'Buyer'){
                  if($unPaidOrders){
                ?>
                    <div class="orderBox" id="orderBox">
                      <h4>Unpaid Orders</h4>
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Order ID</th>
                              <th>Date</th>
                              <th>Total Price</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                            
                              foreach ($unPaidOrders as $key => $unPaidOrder) {
                                //$orderJsonData  = json_encode($unPaidOrder->order_data);
                                $orderData      = json_decode($unPaidOrder->order_data, true);
                                $txnid = (isset($orderData['txnid'])) ? $orderData['txnid'] : '';
                                $transactionId = Yii::$app->Common->generateTransactionID();
                              ?>
                                <tr>
                                <td><?= $unPaidOrder->order_code; ?></td>
                                <td><?= $unPaidOrder->order_date; ?></td>
                                <td>&#x20B9; <?= $unPaidOrder->total_amount; ?></td>
                                <td><a href="<?= Yii::$app->homeUrl . 'order/step1?from=CANCELORDER-'.$unPaidOrder->id.'&transactionId='.$transactionId; ?>" class="btn btn-default" title="PAY NOW">Pay Now</a></td>
                                </tr>
                                <?php
                              }
                            
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                <?php }
                } elseif(Yii::$app->user->identity->user_type == 'Seller'){
                    echo '<ul class="list-inline text-center"><li>Your dashboard is under construction</li></ul>';
                } ?>
                <!--<div class="orderBox">
                  <h4>Pending Warranty Claims</h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Order ID</th>
                          <th>Date</th>
                          <th>Product Code</th>
                          <th>Product Name</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>#252125</td>
                          <td>Mar 25, 2016</td>
                          <td>Z - 45263</td>
                          <td>Lorem ipsum doler</td>
                          <td><a href="#" class="btn btn-default">View</a></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>-->
              </div>
            </div>
          </div>
<?php */ ?>