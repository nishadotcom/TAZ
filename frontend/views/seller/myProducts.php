<?php
use frontend\widgets\ProfileMenu;
$this->title = 'My Products';
?>

<div class="row">
         <?= ProfileMenu::widget(); ?>
</div>

<div class="row">
            <div class="col-xs-12">
              <div class="innerWrapper">
                <!--<div class="alert alert-warning alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>Warning!</strong> You have one unpaid order. 
                </div>-->

                <div class="orderBox myAddress">
                  <h4><a class="btn btn-lg btn-success-filled btn-rounded" href="<?php echo Yii::$app->homeUrl.'product/create'; ?>" title="Create New Product">Create New Product</a></h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Code</th>
                          <th>Name</th>
                          <th>Status</th>
                          <th>Admin Note</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>#252125</td>
                          <td>Mar 25, 2016</td>
                          <td>Z - 45263</td>
                          <td>Lorem ipsum doler</td>
							<td>
								<!--<a href="#" class="btn btn-default">View</a>-->
								<div class="btn-group" role="group">
									<button type="button" class="btn btn-default"><i class="fa fa-pencil" aria-hidden="true"></i></button>
									<button type="button" class="btn btn-default"><i class="fa fa-times" aria-hidden="true"></i></button>
								</div>
							</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
