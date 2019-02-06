<?php 
use yii\helpers\Html;
use yii\helpers\Url;
?>
<html>
<head>
    <title><?= Yii::$app->name.' - '.$title; ?></title>
</head>
<body>
    <table style="width:100%!important">
   <tbody>
       <tr style="background-color:blue;" width="834px" height="60">
         <td>
            <table width="100%" cellspacing="0" cellpadding="0" height="60" style="width:600px!important;text-align:center;margin:0 auto">
               <tbody>
                  <tr>
                     <td>
                        <table style="width:640px;max-width:640px;padding-right:20px;padding-left:20px">
                           <tbody>
                              <tr>
                                 <td style="width:40%;text-align:left;padding-top:5px"> 
                                     <a style="text-decoration:none;outline:none;color:#ffffff;font-size:22px" href="<?= Url::base('http'); ?>" target="_blank"> 
                                        <?= Yii::$app->name; ?> <?php /* ?><img border="0" src="<?= Url::base('http').$this->theme->baseUrl;?>/assets/img/logo.png" alt="Talozo" style="border:none"> <?php */ ?>
                                     </a> 
                                 </td>
                                 <td style="width:60%;text-align:right;padding-top:5px">
                                    <p style="color:rgba(255,255,255,0.8);font-family:Arial;font-size:16px;text-align:right;color:#ffffff;font-style:normal;font-stretch:normal"><?= $orderStatus; ?></p>
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
      <tr>
          <td>
              <table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" bgcolor="#f5f5f5">
                  <tbody>
                      <tr>
                          <td align="center" valign="top" bgcolor="#f5f5f5">