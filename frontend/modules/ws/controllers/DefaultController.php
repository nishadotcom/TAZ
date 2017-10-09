<?php

namespace frontend\modules\ws\controllers;

use yii\web\Controller;
use yii\rest\ActiveController;

class DefaultController extends ActiveController
{
	public $modelClass = 'frontend\models\Shop';
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionTest(){
    	echo 'IN'; exit;
    }
}
