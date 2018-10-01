<?php
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\models\ProductImage;

echo $this->render('//layouts/mail/orderMailHeader', ['title' => 'Order Placed', 'orderStatus'=>$orderStatus]);
?>
<table border="0" cellpadding="0" cellspacing="0" style="width:640px;max-width:640px;padding-right:20px;padding-left:20px;background-color:#fff;padding-top:20px">
    <tbody>
        <tr>
            <td align="left">
                <table width="350" border="0" cellpadding="0" cellspacing="0" align="left">
                    <tbody>
                        <tr>
                            <td valign="top">
                                <p style="font-family:Arial;color:#878787;font-size:12px;font-weight:normal;font-style:normal;font-stretch:normal;margin-top:0px;line-height:14px;padding-top:0px;margin-bottom:7px"> Hi 
                                    <span style="font-weight:bold;color:#191919"> <?= $username; ?>,</span> 
                                </p>
                                <p style="font-family:Arial;font-size:12px;color:#878787;line-height:14px;padding-top:0px;margin-top:0px;margin-bottom:7px">Your order has been successfully placed.</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table width="250" border="0" cellpadding="0" cellspacing="0" align="right">
                    <tbody>
                        <tr>
                            <td valign="top">
                                <p style="font-family:Arial;color:#747474;font-size:11px;font-weight:normal;text-align:right;font-style:normal;line-height:14px;font-stretch:normal;margin-top:0px;padding-top:0px;color:#878787;margin-bottom:7px">Order placed on <span style="font-weight:bold;color:#000"><?= $orderDate; ?></span></p>
                                <p style="font-family:Arial;font-size:11px;color:#878787;line-height:14px;text-align:right;padding-top:0px;margin-top:0;margin-bottom:7px">Order ID <span style="font-weight:bold;color:#000"><?= $orderCode; ?></span></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td border="1" align="left" style="background-color:rgba(245,245,245,0.5);background:rgba(245,245,245,0.5);border:.5px solid #6ed49e;border-radius:2px;padding-top:20px;padding-bottom:20px;border-color:#6ed49e;border-width:.08em;border-style:solid;border:.08em solid #6ed49e">
                <table width="360" border="0" cellpadding="0" cellspacing="0" align="left" style="margin-bottom:20px;padding-left:15px">
                    <tbody>
                        <tr>
                            <td valign="top">
                                <!--<img src="" alt="Delivery" style="margin-bottom:20px"> -->
                                <p style="font-family:Arial;font-size:12px;line-height:1.42;color:#212121;margin-top:0px;margin-bottom:20px"><span style="display:inline-block;width:125px;vertical-align:top">Delivery </span><span style="font-family:Arial;font-size:12px;font-weight:bold;line-height:1.42;color:#139b3b;display:inline-block;width:220px"><?= $deliveryDate; ?></span></p>
                                <p style="font-family:Arial;font-size:12px;line-height:1.42;color:#212121;margin-bottom:20px;margin-top:0px"> <span style="display:inline-block;width:125px;min-width:125px;max-width:125px"> Amount Paid </span><span style="font-family:Arial;font-size:12px;font-weight:bold;line-height:1.42;color:#139b3b;display:inline-block;width:220px">₨. <?= $amountPaid; ?></span> 
                                </p>
                                <p style="margin-bottom:0px;margin-top:0"> 
                                    <a href="<?= Url::base('http'); ?>/order" style="background-color:rgb(41,121,251);color:#fff;padding:0px;border:0px;font-size:14px;display:inline-block;margin-top:0px;border-radius:2px;text-decoration:none;width:160px;text-align:center;line-height:32px;line-height:32px" target="_blank">Manage Your Order</a> </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table width="225" border="0" cellpadding="0" cellspacing="0" align="right" style="margin-bottom:20px;padding-right:15px">
                    <tbody>
                        <tr>
                            <td valign="top" align="left">
                                <div style="max-width:220px;padding-top:0px;margin-bottom:20px">
                                    <p style="font-family:Arial;font-size:14px;font-weight:bold;line-height:20px;color:#212121;margin-top:0px;margin-bottom:4px">Delivery Address</p>
                                    <p style="font-family:Arial;font-size:12px;line-height:1.42;color:#212121;margin-top:0px;margin-bottom:0"> 
                                        <?= $shippingAddress->name; ?> <br> 
                                        <span style="font-family:Arial;font-size:12px;line-height:1.42;color:#212121"> <?= $shippingAddress->address; ?> <br> <?= $shippingAddress->city; ?> <br> <?= $shippingAddress->state.'-'.$shippingAddress->pin_code;?> </span> </p>
                                </div>
                                <!--<p style="line-height:1.56;margin-top:0;margin-bottom:0"><span style="font-family:Arial;font-size:14px;font-weight:bold;text-align:left;color:#212121;display:block;line-height:20px;margin-bottom:4px">SMS updates sent to</span><span style="font-family:Arial;font-size:12px;color:#212121">9655196928</span> </p>-->
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!--<table width="600" border="0" cellpadding="0" cellspacing="0" align="left" style="padding-left:15px;padding-right:15px"> 
                   <tbody>
                       <tr> 
                           <td valign="top" align="left"> <p style="font-family:Arial;font-size:12px;text-align:left;color:#212121;padding-top:0px;padding-bottom:0px;line-height:19px;margin-top:0;margin-bottom:0"> You will receive the next update when the item in your order is packed/shipped by the seller. </p> <p style="font-family:Arial;font-size:12px;text-align:left;color:#212121;padding-top:0px;padding-bottom:0px;line-height:19px;margin-top:0;margin-bottom:0"><strong> Beware of fraudulent calls &amp; messages.</strong> We don’t ask bank info for offers or demand money. <a href="#" style="color:#2175ff;font-size:11px" target="_blank" >Read More</a></p> </td> 
                       </tr> 
                   </tbody>
                   </table> --> 
            </td>
        </tr>
        <tr>
            <td> </td>
        </tr>
        <tr>
            <td align="left">
                <table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-top:0px">
                    <tbody>
                        <tr>
                            <td height="1" style="background-color:#f0f0f0;font-size:0px;line-height:0px" bgcolor="#f0f0f0"></td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
<table border="0" width="600" cellpadding="0" cellspacing="0" style="padding-right:20px;padding-left:20px;background-color:#fff;width:642px;max-width:642px;padding-top:0px;padding-bottom:0px">
    <tbody>
        <tr>
            <td>
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="padding-bottom:20px;">
                    <tbody>
                        <tr>
                            <td align="left">
                                <!-- ORDER DETAIL TABLE-->
                                <table border="0" cellpadding="0" cellspacing="0" align="left" style="border-bottom:1px solid #f0f0f0">
                                    <tbody>
                                        <?php 
                                        $baseUrl = Url::base('http');
                                        $pathPrdImg = Yii::$app->params['PATH_PRODUCT_IMAGE'];
                                        $prdNoImg = 'noImage.png';
                                        foreach ($orderedItems as $orderItem){
                                            // GET PRODUCT IMAGE 
                                            $imageData = ProductImage::find()->where(['product_id'=>$orderItem->product_id])->one();
                                            if($imageData && $imageData->crop_image){
                                                $productImage = $pathPrdImg.$imageData->crop_image;
                                            }elseif($imageData && !$imageData->crop_image){
                                                $productImage = $pathPrdImg.$imageData->cover_photo;
                                            }else{
                                                $productImage = $pathPrdImg.$prdNoImg;
                                            } 
                                        ?>
                                        <tr>
                                            <td valign="middle" width="120" align="center" style="padding-top:20px;padding-bottom: 6px;"> 
                                                <a style="color:#027cd8;text-decoration:none;outline:none;color:#fff;font-size:13px" href="" target="_blank"> 
                                                    <img border="0" src="<?= $baseUrl.'/'.$productImage;?>" alt="<?= $orderItem->product_name;?>" style="border:none;max-width:125px;max-height:125px"> </a> 
                                            </td>
                                            <td valign="middle" align="left" style="padding-top:20px;padding-left:15px">
                                                <p style="margin-top:0;margin-bottom:7px"> 
                                                    <a href="#" style="font-family:Arial;font-size:14px;font-weight:normal;font-style:normal;font-stretch:normal;line-height:20px;color:#212121;text-decoration:none!important;word-spacing:0.2em;max-width:360px;display:inline-block;min-width:360px;width:360px" target="_blank"><?= $orderItem->product_name; ?></a>
                                                    <span style="min-width:100px;font-size:12px;font-weight:bold;padding-right:0px;line-height:20px;text-align:right;display:inline-block">₨. <?= $orderItem->product_price; ?></span> </p>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <!-- ORDER DETAIL TABLE ENDS HERE -->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table width="100%" style="margin-bottom:0px;padding-top:20px;padding-bottom:20px;border-bottom:1px solid #f0f0f0">
                                    <tbody>
                                        <tr>
                                            <td width="50%"></td>
                                            <td align="right" width="34%">
                                                <p style="margin-top:0px;font-family:Arial;font-size:14px;text-align:right;color:#3f3f3f;line-height:14px;padding-top:0px;margin-bottom:0"> <span style="color:#212121;text-align:right;font-weight:bold"> Total Amount </span> </p>
                                            </td>
                                            <td>
                                                <p style="margin-top:0px;font-family:Arial;font-size:14px;text-align:right;color:#3f3f3f;padding-top:0px;margin-bottom:0"><span style="padding-right:0px;font-weight:bold">₨. <?= $amountPaid; ?></span></p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>

<?php echo $this->render('//layouts/mail/orderMailFooter'); ?>