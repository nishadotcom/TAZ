<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\widgets\ProfileMenu;
use common\models\User;
use frontend\models\UserContactDetail;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UserContactDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'My Address';
$this->params['breadcrumbs'][] = $this->title;

$contact_details = UserContactDetail::find()->all();
?><div class="row">
    <?= ProfileMenu::widget(); ?>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="innerWrapper">

       <?= Yii::$app->session->getFlash('msg'); ?>

                <div class="orderBox myAddress">
                    <h4>My Address</h4>
                     <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Type</th>
                          <th>Mobile</th>
                          <th class="col-md-2 col-sm-3">Phone</th>
                          <th>Street</th>
                            <th>City</th>
                            <th>State</th>
                              <th>Country</th>
                                <th>Pincode</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if($contact_details) {
                          foreach ($contact_details as $value) {
                        ?>
                        <tr>
                          <td><?php if($value->type == 'shipping_address') { echo 'Shipping Address'; }else { echo 'Billing Address';}?></td>
                          <td><?php echo $value->mobile;?></td>
                          <td><?php echo $value->land_line_number;?></td>
                          <td><?php echo $value->street;?></td>
                          <td><?php echo $value->city;?></td>
                          <td><?php echo $value->state;?></td>
                          <td><?php echo $value->country;?></td>
                          <td><?php echo $value->pin_code;?></td>
                          <td>
                            <div class="btn-group" role="group">
                              <a href="<?php echo Yii::$app->homeUrl.'contact-details/update/'.$value->id; ?>" class="btn btn-default"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            </div>
                          </td>
                        </tr>
                          <?php } } ?>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
