<?php

namespace frontend\controllers;

use Yii;
use frontend\models\UserForgotPassword;
use frontend\models\UserForgotPasswordSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\User;
use yii\helpers\Url;

/**
 * UserForgotPasswordController implements the CRUD actions for UserForgotPassword model.
 */
class TestController extends Controller
{

    public function actionTest($id)
    {
        echo 'Hello World';
        exit;
    }
}
