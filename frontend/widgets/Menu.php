<?php

namespace frontend\widgets;

use Yii;
use yii\base\Widget;
use frontend\components\ShopComponent;


class Menu extends Widget {
    
    public $action;
    
    public function init() {
        parent::init();                
    }

    public function run() {
        $cartCount = (!Yii::$app->user->isGuest) ? ShopComponent::getCartCount(Yii::$app->user->id) : FALSE;
        return $this->render('menu',['cartCount'=>$cartCount]);
    }

}

?>
