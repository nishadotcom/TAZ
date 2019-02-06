<?php 
use yii\helpers\Html;
echo $this->render('//layouts/mail/header', ['title'=>'Forgot Password']); 
?>
      
<tr width="100%"> 
    <td valign="top" align="left" style="border-bottom-left-radius:4px;border-bottom-right-radius:4px;background:#fff;padding:18px"> 
        <h1 style="font-size:20px;margin:0;color:#333"> Hello <?= $user; ?>, </h1>
        <p style="font:15px/1.25em 'Helvetica Neue',Arial,Helvetica;color:#333"> 
            We heard you need a password reset. 
            Click the link below and you'll be redirected to secure page from which you can set a new password. </p>
        <p style="font:15px/1.25em 'Helvetica Neue',Arial,Helvetica;margin-bottom:0;text-align:center;color:#333">
            <a href="<?= $forgotPwdURL; ?>" style="border-radius:3px;background:#3aa54c;color:#fff;display:block;font-weight:700;font-size:16px;line-height:1.25em;margin:24px auto 24px;padding:10px 18px;text-decoration:none;width:180px;text-align:center" target="_blank" data-saferedirecturl="#"> Reset Password </a> 
        </p>
        <p style="font:15px/1.25em 'Helvetica Neue',Arial,Helvetica;color:#939393;margin-bottom:0"> 
            If you didn't try to reset your password, 
            <a href="<?= $unsetForgotPwdURL; ?>" target="_blank" data-saferedirecturl="">click here</a> and we'll forget this ever happened. 
        </p>
    </td> 
</tr>

<?php echo $this->render('//layouts/mail/footer');  ?>