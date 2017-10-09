<?php

namespace frontend\widgets;

use Yii;
use yii\base\Widget;
use frontend\models\FeatureSeller;


class WidgetFeatureSeller extends Widget {
    
    public $action;
    
    public function init() {
        parent::init();                
    }

    public function run() {
    	$feature_sellers = FeatureSeller::find()->where(['status'=>Yii::$app->params['STATUS_ACTIVE']])->all();
        return $this->render('featureSeller', ['feature_sellers'=>$feature_sellers]);
    }

}

?>
