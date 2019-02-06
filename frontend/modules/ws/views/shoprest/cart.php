<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\models\Cart;

$pathPrdImg = Yii::$app->params['PATH_PRODUCT_IMAGE'];
$prdNoImg = 'noImage.jpg';
?>
<?=
GridView::widget([
    'dataProvider' => $dataProvider,
    //'filterModel' => $searchModel,
    'columns' => [
            [
            'attribute' => 'cart_product_image',
            'label' => '',
            'format' => 'image',
            'contentOptions' => ['class' => 'col-xs-2'],
            'content' => function($data) use ($pathPrdImg) {
                //return $pathPrdImg.$data->cart_product_code.'/'.$data->cart_product_image;
                $im = '<button type="button" class="close remove-cart-item" data-dismiss="alert" aria-label="Close" title="" data-cartid="' . $data->id . '">
                                                    <span aria-hidden="true">×</span></button>
                                                    <span class="cartImage">' .
                        Html::img($pathPrdImg . $data->cart_product_code . '/' . $data->cart_product_image, ['width' => '70px'])
                        . '</span>';
                return $im;
                //return Html::img($pathPrdImg.$data->cart_product_code.'/'.$data->cart_product_image, ['width' => '70px']);
            }
        ],
        'cart_product_name:ntext',
        'cart_product_price',
        'cart_product_quantity',
    ],
]);
?>



 