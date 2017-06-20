<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;


/**
 * Demo controller
 */
class DemoController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionCategoryproducts()
    {
        return $this->render('categoryproducts');
    }

    public function actionSingleproduct()
    {
        return $this->render('singleproduct');
    }
    public function actionProfiledashboard()
    {
        return $this->render('profiledashboard');
    }
    
}
