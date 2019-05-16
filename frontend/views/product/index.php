<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use frontend\widgets\ProfileMenu;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'My Products';
$this->params['breadcrumbs'][] = $this->title;
$pathPrdImg   = Yii::$app->params['PATH_PRODUCT_IMAGE'];
$prdNoImg     = 'noImage.png';
?>

<div class="row">
         <?= ProfileMenu::widget(); ?>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="innerWrapper">
            <div class="orderBox myAddress"> <!-- btn-md btn-success-filled btn-rounded -->
                <!--<h4>-->
                    <a class="btn btn-primary" href="<?php echo Yii::$app->homeUrl.'product/create'; ?>" title="Add New Product">Add New Product</a>
                    <!--</h4>-->
                <div class="table-responsive"> 
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'pager'=>[
                            'firstPageLabel'=>'First',
                            'lastPageLabel'=>'Last'
                            //'maxButtonCount' => 2,
                            /*'options'=>[
                                'tag' => 'ul',
                                'class' => 'Page navigation',
                            ]*/
                        ],
                        'layout'=>"{items}{summary}{pager}",
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            //'id',
                            //'product_category_id',
                            //'product_subcategory_id',
                            [
                                'attribute' => 'cover_photo',
                                'label' => 'Image',
                                'format' => 'raw',
                                'value' => function($data) use ($pathPrdImg){
                                    if(isset($data->productImages[0])){
                                        $coverImage = ($data->productImages[0]->crop_image) ? $data->productImages[0]->crop_image : $data->productImages[0]->cover_photo;
                                    }else{
                                        $coverImage = '';
                                    }
                                    $prdImage   = (isset($data->productImages[0])) ? $pathPrdImg.$data->product_code.'/'.$coverImage : $pathPrdImg.$prdNoImg;
                                    return Html::img($prdImage, ['width'=>'60']);
                                }
                            ],
                            //'product_code:ntext',
                            'product_name:ntext',
                            // 'product_owner_id',
                            'product_price',
                            //'product_sale_price',
                            // 'product_retail_price',
                            // 'product_material',
                            // 'product_color',
                            // 'product_dimension_type',
                            // 'product_height',
                            // 'product_length',
                            // 'product_breadth',
                            // 'product_weight',
                            // 'product_short_description:ntext',
                            // 'product_long_description:ntext',
                            // 'product_discount_status',
                            // 'product_guarantee_status',
                            //'product_status',
                            [
                                'attribute'=>'product_status',
                                'filter'=>array('AFA'=>'Awaiting for Approval', 'Active'=>'Active', 'Suspended'=>'Suspended', 'Deleted'=>'Deleted', 'Denied'=>'Denied', 'Needs Improvement'=>'Needs Improvement'),
                                'value' => function ($model) {
                                    return ($model->product_status == 'AFA') ? 'Awaiting for Approval' : $model->product_status;
                                }
                            ],
                            // 'created_on',
                            // 'updated_on',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template'=>'{promote} {view} {update} {delete}',
                                'buttons'=>[
                                    'promote' => function($url,$model,$key){
                                        $btn = Html::a('<span class="glyphicon glyphicon-bullhorn"></span>', ['/product/promote/'.$key], ['class'=>'', 'title'=>'Promote / Depromote']);
                                        /*$btn = Html::a("Promote",[
                                            'value'=>Yii::$app->urlManager->createUrl('product/promote/'.$key), //<---- here is where you define the action that handles the ajax request
                                            'class'=>'promote',
                                            'title'=>'Promote'
                                        ]);*/
                                        return $btn;
                                    }
                                ]
                            ],
                        ],
                    ]); ?>
              </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="promote-modal" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Promote Product</h4>
            </div>
            <div class="modal-body">
                <div class="on-sale-form">

                    <?php $form = ActiveForm::begin(['action'=>'/product/promote']); ?>

                    <?php //$form->field($OnSaleModel, 'on_sale_product_id')->textInput() ?>

                    <?= $form->field($OnSaleModel, 'discount')->textInput() ?>

                    <?php //$form->field($OnSaleModel, 'status')->dropDownList([ 'Waiting' => 'Waiting', 'Approved' => 'Approved', 'Supended' => 'Supended', ], ['prompt' => '']) ?>

                    <?php //$form->field($OnSaleModel, 'created_on')->textInput() ?>

                    <div class="form-group">
                        <?php //echo Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                        <?php 
                        echo Html::submitButton('Save', [
                            'title' => Yii::t('yii', 'Close'),
                            'onclick'=>"$('#close').dialog('open');//for jui dialog in my page
                            $.ajax({
                                type     :'POST',
                                cache    : false,
                                url  : 'product/promote',
                                success  : function(response) {
                                    //$('#close').html(response);
                                    alert('Success');
                                }
                            });return false;",
                        ]);
                        ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>