<?php

namespace frontend\widgets;

use Yii;
use yii\base\Widget;


class NewProfileMenu extends Widget {
    
    public $action;
    
    public function init() {
        parent::init();                
    }

    public function run() {
        return $this->render('newProfileMenu');
    }

}

?>
