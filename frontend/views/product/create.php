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

                <div class="orderBox profile">
					<div class="row">
            <?php 
            /*echo 'Model Errors<br>';
            print_r($errors);
            echo '<br>Addrss<br>';
            print_r($aerrors);
            echo '<br>Imaf<br>';
            print_r($ierrors);*/
            ?>
						<!--<div class="col-md-10 col-sm-9 col-xs-12">-->
						<!--<div class="col-sm-6">-->
						<?= $this->render('_form', [
							'model' => $model,
							'imageModel' => $imageModel,
              'addressModel' => $addressModel
						]) ?>
						<!--</div>-->
					</div>
                </div>
              </div>
            </div>
          </div>
