<?php

$this->title = 'Dashboard';
?>

<div class="row">
            <div class="col-xs-12">
              <div class="btn-group" role="group" aria-label="...">
                <a href="account-dashboard.html" class="btn btn-default active"><i class="fa fa-th" aria-hidden="true"></i>Account Dashboard</a>
                <a href="account-profile.html" class="btn btn-default"><i class="fa fa-user" aria-hidden="true"></i>Profile</a>
                <a href="account-address.html" class="btn btn-default"><i class="fa fa-map-marker" aria-hidden="true"></i>My Address</a>
                <a href="account-all-orders.html" class="btn btn-default"><i class="fa fa-list" aria-hidden="true"></i>All Orders</a>
                <a href="account-wishlist.html" class="btn btn-default"><i class="fa fa-gift" aria-hidden="true"></i>Wishlist</a>
              </div>
            </div>
          </div>

<div class="row">
            <div class="col-xs-12">
              <div class="innerWrapper">
                <div class="alert alert-warning alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>Warning!</strong> You have one unpaid order. 
                </div>
                <h3>Wellcome <span>Adam Smith</span></h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <ul class="list-inline">
                  <li><a href="#" class="btn btn-default btn-lg"><i class="fa fa-user" aria-hidden="true"></i>Profile</a></li>
                  <li><a href="#" class="btn btn-default btn-lg"><i class="fa fa-map-marker" aria-hidden="true"></i>My Address</a></li>
                  <li><a href="#" class="btn btn-default btn-lg"><i class="fa fa-list" aria-hidden="true"></i>All Orders</a></li>
                  <li><a href="#" class="btn btn-default btn-lg"><i class="fa fa-gift" aria-hidden="true"></i>Wishlist</a></li>
                  <!--<li><a href="#" class="btn btn-default btn-lg"><i class="fa fa-plus-circle" aria-hidden="true"></i>New Address</a></li>-->
                </ul>
                <div class="orderBox">
                  <h4>Unpaid Orders</h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Order ID</th>
                          <th>Date</th>
                          <th>Items</th>
                          <th>Total Price</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>#252125</td>
                          <td>Mar 25, 2016</td>
                          <td>2</td>
                          <td>$ 99.00</td>
                          <td><a href="#" class="btn btn-default">Pay now</a></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
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
