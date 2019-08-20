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
<?php 
    //echo '<pre>';
    //print_r($model);
    //echo '</pre>';
if($model){
    foreach ($model as $key => $product) {
?>
<div class="modal-content modal-order">
    <!-- Modal Header -->
    <div class="modal-header">
        <div>
            <div class="d-md-flex d-block">
                <div class="p-2 col-12 col-md-3"><h4>Created On</h4>
                    <p class="p-white"><?php echo date('d M Y', strtotime($product->created_on)); ?></p>
                </div>
                <div class="p-2 col-12 col-md-2">
                    <h4>Amount</h4>
                    <p class="p-white"> <?php echo $product->product_sale_price; ?> </p>
                </div>
                <!--<div class="p-2 col-12 col-md-2">
                    <h4 class="text-left">SHIP TO</h4>
                    <p class="text-left">Dohni</p>
                </div>-->
                <div class="p-2 ml-auto col-12 col-md-4">
                    <h4 class="text-right"> Product # <?php echo $product->product_code; ?></h4>
                    <!--<a href="#" class="text-right">Order Details Invoice</a>-->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal body -->
    <div class="modal-body order-info">
        <!--<div class="row">
            <div class="col-12 col-lg-9 col-md-9 col-sm-9 col-xl-9">
                <h4 class="text-left">Delivered 27-Apr-2019</h4>
                <p>Package was handed directly to the customer.</p>
                <p>Signed by: Vijayakanth.</p>
            </div>
            <div class="col-12 col-lg-3 col-md-3 col-sm-3 col-xl-3 align-self-end">
                <button type="button" class="btn btn-primary btn-sm w-100 track-btn">Track Page</button>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-9 col-md-9 col-sm-9 col-xl-9">&nbsp;</div>
            <div class="col-12 col-lg-3 col-md-3 col-sm-3 col-xl-3">&nbsp;</div>
        </div>-->

        <div class="row">
            <div class="col-12 col-lg-9 col-md-9 col-sm-9 col-xl-9">
                <div class="d-md-flex">
                    <div class="p-0 col-12 col-md-2">
                        <?php 
                        if(isset($product->productImages[0])){
                            $coverImage = ($product->productImages[0]->crop_image) ? $product->productImages[0]->crop_image : $product->productImages[0]->cover_photo;
                        }else{
                            $coverImage = '';
                        }
                        $prdImage   = (isset($product->productImages[0])) ? $pathPrdImg.$product->product_code.'/'.$coverImage : $pathPrdImg.$prdNoImg;
                        ?>
                        <img src="<?php echo $prdImage; ?>" class="img-fluid">
                    </div>
                    <div class="p-0 col-12 col-md-10 px-3 product-info">
                        <a href="#" title="Product" class="">
                            <h4><?php echo $product->product_name; ?> </h4>
                        </a>
                        <!--<p>Sold by: Cloudtail India</p>-->
                        <p><?php echo $product->product_long_description; ?> </p>
                        <p class="red-text"><?php echo $product->product_sale_price; ?></p>
                        <!--<button type="button" class="btn btn-primary btn-sm product-info-btn ">Update</button>-->
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3 col-md-3 col-sm-3 col-xl-3 align-self-end">
                <a href="<?php echo Yii::$app->homeUrl . 'product/promote/'.$product->id; ?>" class="btn btn-primary btn-sm product-info-btn " style="margin: 10px 0 0 0;color: #fff;">
                    Promote
                </a>
                <a href="<?php echo Yii::$app->homeUrl . 'product/view/'.$product->id; ?>" class="btn btn-info btn-sm product-info-btn " style="margin: 10px 0 0 0;color: #fff;">
                    View
                </a>
                <a href="<?php echo Yii::$app->homeUrl . 'product/update/'.$product->id; ?>" class="btn btn-warning btn-sm product-info-btn " style="margin: 10px 0 0 0;color: #fff;">
                    Update
                </a>
                <a href="<?php echo Yii::$app->homeUrl . 'product/delete/'.$product->id; ?>" class="btn btn-danger btn-sm product-info-btn " style="margin: 10px 0 0 0;color: #fff;">
                    Delete
                </a>
            </div>
        </div>
    </div>
</div>
<?php 
    } //foreach statement 
} // if statement ?>
<?php /* ?>
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
                            //'options'=>[
                            //    'tag' => 'ul',
                            //    'class' => 'Page navigation',
                            //]
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
                                        //$btn = Html::a("Promote",[
                                            'value'=>Yii::$app->urlManager->createUrl('product/promote/'.$key), //<---- here is where you define the action that handles the ajax request
                                        //    'class'=>'promote',
                                        //    'title'=>'Promote'
                                        //]);
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

<?php */ ?>