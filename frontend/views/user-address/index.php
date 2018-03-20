<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\widgets\ProfileMenu;
use common\models\User;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\UserAddressSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'My Address';
$this->params['breadcrumbs'][] = $this->title;

$contact_details = '';
?>
<div class="row">
    <?= ProfileMenu::widget(); ?>
</div>


          <div class="row">
            <div class="col-xs-12">
              <div class="innerWrapper">
                <div class="orderBox myAddress">
                  <h4>My Address</h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Address</th>
                          <th>Street</th>
                          <th>City</th>
                          <th>State</th>
                          <th>Country</th>
                          <th>Pincode</th>
                          <th width="11%" align="center" style="text-align: center"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Shipping</td>
                          <td><?php echo ($shippingAddress) ? $shippingAddress->street : '';?></td>
                          <td><?php echo ($shippingAddress) ? $shippingAddress->city : '';?></td>
                          <td><?php echo ($shippingAddress) ? $shippingAddress->state : '';?></td>
                          <td><?php echo ($shippingAddress) ? $shippingAddress->country : '';?></td>
                          <td><?php echo ($shippingAddress) ? $shippingAddress->pin_code : '';?></td>
                          <td align="center" style="text-align: center">
                            <a type="button" class="btn btn-default" href="<?= Yii::$app->homeUrl.'user-address/update/'.$userid.'/Shipping'; ?>">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>Billing</td>
                          <td><?php echo ($billingAddress) ? $billingAddress->street : '';?></td>
                          <td><?php echo ($billingAddress) ? $billingAddress->city : '';?></td>
                          <td><?php echo ($billingAddress) ? $billingAddress->state : '';?></td>
                          <td><?php echo ($billingAddress) ? $billingAddress->country : '';?></td>
                          <td><?php echo ($billingAddress) ? $billingAddress->pin_code : '';?></td>
                          <td style="text-align: center">
                            <a type="button" class="btn btn-default" href="<?= Yii::$app->homeUrl.'user-address/update/'.$userid.'/Billing'; ?>">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                          </td>
                        </tr>
                        <!--<tr>
                          <td>Samsung</td>
                          <td>Adam Smith</td>
                          <td>9/4 C Babor Road, Mohammad Pur, Dhaka</td>
                          <td>Bangladesh</td>
                          <td>+884 5452 6452</td>
                          <td>
                            <div class="btn-group" role="group">
                              <button type="button" class="btn btn-default"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                              <button type="button" class="btn btn-default"><i class="fa fa-times" aria-hidden="true"></i></button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>Motorola</td>
                          <td>Adam Smith</td>
                          <td>9/4 C Babor Road, Mohammad Pur, Dhaka</td>
                          <td>Bangladesh</td>
                          <td>+884 5452 6452</td>
                          <td>
                            <div class="btn-group" role="group">
                              <button type="button" class="btn btn-default"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                              <button type="button" class="btn btn-default"><i class="fa fa-times" aria-hidden="true"></i></button>
                            </div>
                          </td>
                        </tr>-->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

<?php /*
$this->title = 'User Addresses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-address-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User Address', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'street',
            'city',
            'state',
            // 'country',
            // 'pin_code',
            // 'address_type',
            // 'updated_on',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
<?php */ ?>