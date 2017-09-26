<?php

namespace frontend\modules\ws\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\helpers\Url;
use yii\web\Response;
use common\models\LoginForm;
use app\components\Common;
use yii\helpers\Json;

class CartrestController extends ActiveController
{
	public $modelClass = 'frontend\models\Cartrest';
	//public $modelClass = 'common\models\LoginForm';
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];
    
    public function behaviors() {
        $behaviors = parent::behaviors();
        
        $behaviors['ContentNegotiator'] = [
             'class' => 'yii\filters\ContentNegotiator',
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
                //'application/xml' => Response::FORMAT_XML,
            ],
        ];
        return $behaviors;
    }

     /**
     * To unset the unwanted actions
     * @return type
     */
    public function actions() {
        $actions = parent::actions();
        unset($actions['index'], $actions['create'], $actions['update'], $actions['delete']);

        return $actions;
    }
    
    /**
     * This method handles login process
     * */
    public function actionRaise() { echo 'in'; exit;
    	//if(!$userDetail){
			return $this->_returnResult('dashboard_data',['hello'],506,0,-1);
		//}
    	//echo 'IN'; exit;
	}
    
    /*
     * Return Display format
     */
    private function _returnResult($dataKey,$result,$code,$trueOrFalse,$errorCode=false) {
        return [
              'result'  => ($trueOrFalse) ? True : False,
              'msg' 	=> $this->_getStatusCodeMessage($code),
              $dataKey 	=> $result,
              'error'	=> ($errorCode) ? $errorCode : ''
            ];
    }
	
	/**
	 * To get the status code
	 * */
	private function _getStatusCodeMessage($status) {
        $codes = [
            200 => 'User found',
            201 => 'Username and Password cannot be blank',
            400 => 'Invalid Request',
            401 => 'Unauthorized',
            403 => 'Forbidden',
            405 => 'You are requesting with an expired access token, please request for a new one.',
            
            101 => 'Username cannot be empty',
            102 => 'Invalid Username',
            103 => 'Password cannot be empty',
            104 => 'Invalid Username or Password',
            105 => 'Invalid Access-token',
            106 => 'Access-token is required',
            
            404 => 'Not Found',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
            503 => 'Results not found',
            504 => 'Logged-in already',
            
            505 => 'Empty Id',
            506 => 'Incorrect User Id',
            507 => 'User dashboard data',
            508 => 'No User dashboard data',
            509 => 'Nominate verifier data.',
            510 => 'No nominated verifiers found.',
            511 => 'Deleted defect attachments have been deleted.',
            512 => 'Deleted defect attachments could not be deleted.',
        ];
        
        return (isset($codes[$status])) ? $codes[$status] : '';
    }
}
