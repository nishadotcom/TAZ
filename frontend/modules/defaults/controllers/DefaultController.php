<?php

namespace app\modules\defaults\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        return $this->redirect('defaults/department/');
        
        //return $this->render('index');
    }
}
