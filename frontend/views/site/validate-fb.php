<?php
use yii\helpers\Html;
?>
 
<div class="panel panel-body">
    <div class="page-header">
        <h1>Facebook API Test Results </h1>
    </div>
    <?= $out ?>    
    <hr>
    <?= Html::a('« Return', ['/login'], ['class'=>'btn btn-success']) ?>
</div>
