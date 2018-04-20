<?php
namespace console\controllers;
 
use Yii;
use yii\helpers\Url;
use yii\console\Controller;
use frontend\models\Shop; 
use backend\models\FeatureSeller;

class CronFeatureSellerController extends Controller {
 
    public function actionIndex() {
    	$connection 	= Yii::$app->getDb();
    	$mysqlDate 		= Yii::$app->Common->mysqlDateTime();
    	$sellersCount 	= 0;
        // GET SELLERS
        $sellers = Shop::getSellersForFeatureSeller();
        if($sellers){
        	
        	// SUSPEND ALL FEATURE SELLERS
        	$suspendAllQuery 	= 'UPDATE taz_feature_seller SET status="Suspended"';
        	$command      		= $connection->createCommand($suspendAllQuery);
        	$result 			= $command->execute();
        	//$insertQuery 		= 'INSERT INTO taz_feature_seller (seller_id, date_from, date_to, status, created_on) VALUES';
        	$insertQuery 		= 'INSERT INTO taz_feature_seller (seller_id, status, created_on) VALUES';
        	foreach ($sellers as $key => $value) {
        		$insertQuery 	.= '('.$value['id'].', "Active", "'.$mysqlDate.'")';
        	}
        	$insertCommand      = $connection->createCommand($insertQuery);
        	$insertResult 		= $insertCommand->execute();
        }
        // COUNT FEATURE SELLERS
        $fsCount = FeatureSeller::find()->where(['status' => 'Active'])->count();
        if($fsCount < 5){
        	$moreFSCount = 5-$fsCount;
        	//FeatureSeller::find()->where(['status' => 'Suspended'])->orderBy('RAND()')->limit($moreFSCount);
        	$fsQuery 		= 'SELECT id FROM `taz_feature_seller` WHERE `status`="Suspended" ORDER BY RAND() LIMIT '.$moreFSCount;
        	$fsommand      	= $connection->createCommand($fsQuery);
        	$fsResult 		= $fsommand->queryAll();
        	
        	if($fsResult){
        		$fsTblIds 		= array_map(function($x){ return $x['id']; }, $fsResult);
        		$ids = implode(',', $fsTblIds);
        		$addMoreFSQuery 	= 'UPDATE taz_feature_seller SET status="Active" WHERE id IN ('.$ids.')';
        		$command      		= $connection->createCommand($addMoreFSQuery);
        		$result 			= $command->execute();
        	}
        }
    }
}