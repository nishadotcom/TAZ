<?php

namespace frontend\widgets;

use Yii;
use yii\base\Widget;


class HomeProduct extends Widget {
    
    public $action;
    
    public function init() {
        parent::init();                
    }

    public function run() {
        $topFavoriteProducts = Yii::$app->ShopComponent->getTopFavoritedProdicts();
    	$psaProducts 	= Yii::$app->ShopComponent->getProductsByCategoryId(1);
    	$slpProducts 	= Yii::$app->ShopComponent->getProductsByCategoryId(2);
    	$otlProducts 	= Yii::$app->ShopComponent->getProductsByCategoryId(3);
    	$frcProducts 	= Yii::$app->ShopComponent->getProductsByCategoryId(4);
        return $this->render('homeProduct', [
        	'psaProducts'=>$psaProducts,
        	'slpProducts'=>$slpProducts,
        	'otlProducts'=>$otlProducts,
        	'frcProducts'=>$frcProducts,
            'topFavoriteProducts' => $topFavoriteProducts,
        ]);
    }

}

?>
