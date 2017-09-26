<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\widgets\ProfileMenu;
use frontend\models\UserContactDetail;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UserContactDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'My Address';
$this->params['breadcrumbs'][] = $this->title;

$contact_details = UserContactDetail::find()->all();
?>
<div class="row">
    <?= ProfileMenu::widget(); ?>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="innerWrapper">
                <div class="orderBox myAddress">
                    <h4>My Address</h4>
                    <div class="pull-right">
                    <?= Html::a('Add Contact Details', ['contact-details/add'],['class' => 'btn btn-default active', 'title' => 'Back'])?>
                    </div>
                    <div class="table-responsive">
                  <?= GridView::widget([
                      'dataProvider' => $dataProvider,
                      'filterModel' => $searchModel,
                      'columns' => [
                          ['class' => 'yii\grid\SerialColumn'],

                        //  'id',
                          'mobile',
                          'land_line_number',
                          'street',
                          'city',
                          'state',
                          'country',
                          'pin_code',
                          [
                              'class' => 'yii\grid\ActionColumn',
                              'header' => 'Action',
                              'template'=>'{update}{delete}',
                              'headerOptions' => ['style' => 'width:40px;'],

                          ],
                      ],
                  ]); ?>

                </div>

              <!--  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>

                          <th>Name</th>
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
                        <?php //if($contact_details) {
                          //foreach ($contact_details as $value) {
                        ?>
                        <tr>
                          <td><?php //echo $value->user_id;?></td>
                          <td><?php //echo $value->mobile;?></td>
                          <td><?php //echo $value->land_line_number;?></td>
                          <td><?php //echo $value->street;?></td>
                          <td><?php //echo $value->city;?></td>
                          <td><?php //echo $value->state;?></td>
                          <td><?php //echo $value->country;?></td>
                          <td><?php //echo $value->pin_code;?></td>
                          <td>
                            <div class="btn-group" role="group">
                              <button type="button" class="btn btn-default"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                              <button type="button" class="btn btn-default"><i class="fa fa-times" aria-hidden="true"></i></button>
                            </div>
                          </td>
                        </tr>
                          <?php //} } ?>

                      </tbody>
                    </table>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
