<?php
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\models\ProductImage;

echo $this->render('//layouts/mail/header', ['title' => $title]);
?>
<tr width="100%"> 
    <td valign="top" align="left" style="border-bottom-left-radius:4px;border-bottom-right-radius:4px;background:#fff;padding:18px"> 
        <h1 style="font-size:20px;margin:0;color:#333"> Hello <?= $username; ?>, </h1>
        <p style="font:15px/1.25em 'Helvetica Neue',Arial,Helvetica;color:#333"> 
            Welcome and thank you for signing up for <?= Yii::$app->name; ?>! <br>
            <strong><?= Yii::$app->name; ?></strong> is a revolutionizing business shopping platform.<br>
        Happy Shopping with <strong><?= Yii::$app->name; ?></strong></p>
        <p style="font:15px/1.25em 'Helvetica Neue',Arial,Helvetica;margin-bottom:0;text-align:center;color:#333">
            <a href="<?= $baseURL; ?>" style="border-radius:3px;background:#3aa54c;color:#fff;display:block;font-weight:700;font-size:16px;line-height:1.25em;margin:24px auto 24px;padding:10px 18px;text-decoration:none;width:180px;text-align:center" target="_blank"> Start Shopping </a> 
        </p>
        <p style="font:15px/1.25em 'Helvetica Neue',Arial,Helvetica;color:#939393;margin-bottom:0"> 
            
            <a href="<?= $baseURL; ?>" target="_blank"></a>
        </p>
    </td> 
</tr>

<?php echo $this->render('//layouts/mail/footer'); ?>