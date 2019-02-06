<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\Product;
use frontend\models\ProductImage;
use frontend\models\ProductAddress; 
use backend\models\Category;
use frontend\models\Shop; 
use yii\rest\ActiveController;
use yii\helpers\ArrayHelper;
use yii\web\Response;
/**
 * Shop controller
 */
class ApprestController extends ActiveController
{
	public $modelClass = 'frontend\models\Product';
	 public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
    	/*$behaviors = parent::behaviors();
        return $behaviors;*/
        /*return ArrayHelper::merge(parent::behaviors(), [
        [
              //'class' => 'yii\filters\ContentNegotiator',
              //'only' => ['view', 'index'],  // in a controller
              // if in a module, use the following IDs for user actions
              // 'only' => ['user/view', 'user/index']
              'formats' => [
                  'application/json' => Response::FORMAT_JSON,
              ],
              'languages' => [
                  'en',
                  'de',
              ],
          ],
      ]);*/
      	$behaviors = parent::behaviors();
    	$behaviors['contentNegotiator']['formats']['application/json'] = Response::FORMAT_JSON;
    	return $behaviors;
    }

    public function actionIndex($id){
		//return ['Hello', 'World'];
		return Product::findOne(1);
	}

}
