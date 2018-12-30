<?php
//echo $serverName;
$linux_user = exec('who');
//if ($linux_user && (strpos($linux_user, 'nisha') || (strpos($linux_user, 'nisha') == 0))) {
if($serverName=='dev.talozo.local'){
    return [
        'PROFILE_IMAGE_UPLOAD_PATH' => \Yii::getAlias('@common') . '/uploads/profile_images/',
        'PROFILE_IMAGE_UPLOAD_PATH_FRONTEND' => 'common/uploads/profile_images/',
        'PATH_PROFILE_IMAGE' => '/common/uploads/profile_images/',
        'SLIDER_IMAGE_UPLOAD_PATH' => \Yii::getAlias('@common') . '/uploads/banner/',
        'SLIDER_IMAGE_DISPLAY_PATH_BACKEND' => '../common/uploads/banner/',
        'PATH_BANER_IMAGE' => '/common/uploads/banner/',
        'CATEGORY_IMAGE_UPLOAD_PATH' => \Yii::getAlias('@common') . '/uploads/category_images/',
        'CATEGORY_IMAGE_DISPLAY_PATH_BACKEND' => '../common/uploads/category_images/',
        'CATEGORY_IMAGE_DISPLAY_PATH_FRONTEND' => 'common/uploads/category_images/',
        'PATH_UPLOAD_PRODUCT_IMAGE' => \Yii::getAlias('@common') . '/uploads/product_images/',
        'PATH_PRODUCT_IMAGE' => '/common/uploads/product_images/',
    ];
} else {
    // Online
    return [
        'PROFILE_IMAGE_UPLOAD_PATH' => \Yii::getAlias('@common') . '/uploads/profile_images/',
        'PROFILE_IMAGE_UPLOAD_PATH_FRONTEND' => 'common/uploads/profile_images/',
        'PATH_PROFILE_IMAGE' => 'common/uploads/profile_images/',
        'SLIDER_IMAGE_UPLOAD_PATH' => \Yii::getAlias('@common') . '/uploads/banner/',
        'SLIDER_IMAGE_DISPLAY_PATH_BACKEND' => '../common/uploads/banner/',
        'PATH_BANER_IMAGE' => 'common/uploads/banner/',
        'CATEGORY_IMAGE_UPLOAD_PATH' => \Yii::getAlias('@common') . '/uploads/category_images/',
        'CATEGORY_IMAGE_DISPLAY_PATH_BACKEND' => '../common/uploads/category_images/',
        'CATEGORY_IMAGE_DISPLAY_PATH_FRONTEND' => 'common/uploads/category_images/',
        'PATH_UPLOAD_PRODUCT_IMAGE' => \Yii::getAlias('@common') . '/uploads/product_images/',
        'PATH_PRODUCT_IMAGE' => 'common/uploads/product_images/',
    ];
}

