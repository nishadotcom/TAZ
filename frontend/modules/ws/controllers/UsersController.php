<?php

namespace app\modules\ws\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\helpers\Url;
use yii\web\Response;
use common\models\User;
use common\models\LoginForm;
use app\components\Common;
use app\models\Project;
use app\models\Defect;
use app\models\ProjectDefectType;
use app\models\ProjectDepartment;
use app\modules\defaults\models\SubDepartment;
//use app\models\DefectHistory;
use app\models\DefectSearch;
use app\models\DefectComments;
use app\models\DefectHistoryAttachment;
use yii\helpers\Json;

class UsersController extends ActiveController
{
	public $modelClass = 'common\models\LoginForm';
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
     * This method handles login process
     * */
    public function actionLogin() {
		$postData 	= Yii::$app->getRequest()->getRawBody();
		$postData	= json_decode($postData);
		
		//if(Yii::$app->request->post()) {
		//$post = Yii::$app->request->post();
		$userName = $postData->username;
		$password = $postData->password;

		$model = new LoginForm(); // model obj
		// validate userName and password
		if(empty($userName) && empty($password)){
			return $this->_returnResult('user_data','',201,0,-3); 
		}
		if(empty($userName)){ // userName empty
			return $this->_returnResult('user_data','',101,0,-3); 
		}
		if(empty($password)){ // password empty
			return $this->_returnResult('user_data','',103,0,-3); 
		}
		if($userName && $password){ 
			//$model->load(Yii::$app->request->post());
			$model->username = $userName;
			$model->password = $password;
			$result = $model->getUserForWebService();
			if($result){ 
				//print_r($result->id); exit;
				$userDeatil = User::find()->where('id='.$result->id)->one();//User::find()->where('id='.Yii::$app->user->id)->one();
				$userName 	= $result->username;//Yii::$app->user->identity->username;
				$roleName 	= User::showRoleByUserName($userName);
				$role 		= $roleName['item_name'];
				$userData = [];

					$userData['user_id']		= $userDeatil->id;
					$userData['user_name']		= $userDeatil->username;
					$userData['user_password']		= $password;
					$userData['name'] 			= ($userDeatil->first_name && $userDeatil->last_name) ? $userDeatil->first_name.' '.$userDeatil->last_name : (($userDeatil->first_name && !$userDeatil->last_name) ? $userDeatil->first_name : ((!$userDeatil->first_name && $userDeatil->last_name) ? $userDeatil->first_name : $userDeatil->username));
					$userData['user_role']		= $role;
					$userData['user_photo']		= ($userDeatil->photo) ? Url::to('@profilePath').'/'.$userDeatil->photo : Url::to('@profilePath').'/noPhoto.png';
			
				return $this->_returnResult('user_data',$userData,200,1);
			}else{
				return $this->_returnResult('user_data','',104,0,-1);
			}
		}else{
			return $this->_returnResult('user_data','',104,0,-1);
		}
		//} 
	}
	
	/**
     * This method handles dashboard
     * */
    public function actionDashboard($user_id)
    {
		if(!$user_id){
			return $this->_returnResult('dashboard_data','',505,0,-3);
		}
		// get user detail by the id
		$userDetail = User::find()->where('id='.$user_id)->one();
		if(!$userDetail){
			return $this->_returnResult('dashboard_data','',506,0,-1);
		}
		
		//$userName 	= Yii::$app->user->identity->username;
		$roleName 	= User::showRoleByUserId($user_id);
		$role 		= $roleName['item_name'];
		$userProjectId = Project::getUserProjectId($user_id);
		$projectObj = new Project;
		if($role == Yii::$app->params['role_superadmin'] || $role == Yii::$app->params['role_generalManager'] || $role == Yii::$app->params['roleEngineeringManager']){
			$projects = Project::find()->limit(1)->all();
		}else{
			
			$projects = Project::find()->innerJoin('ProjectMember', '`ProjectMember`.`projectId` = `Project`.`id`')->where('ProjectMember.userId = :userid', [':userid' => $user_id])->limit(1)->all();
		}
		// variable declaration
		$pendingAssignments = 0;
		$total				= 0;
		$fixed				= 0;
		$fix				= 0;
		$toBeAssigned		= 0;
		$data				= [];

		if($projects){
			$projectId 		= $projects[0]->id;

			$searchModel = new DefectSearch();
			$searchModel->projectId = $projects[0]->id;
			$searchModel->userId = $user_id;
			$defectsData = $searchModel->searchByRoleWS(Yii::$app->request->queryParams);
			$defects = $defectsData->getModels();
			$defectsFor = $defectsData->getModels();
			//print_r($defects); exit;
                        
			if (!empty($defects) && count($defects) > 0) {
				$total = count($defects);
				foreach($defects as $key=>$defect){ // counting
					if($defect->statusId == Yii::$app->params['pendingAssignmentId'] && $defect->userId == $user_id){ // pending assignments
						$pendingAssignments = $pendingAssignments + 1;
					}
					if($defect->assignedTo == $user_id && $defect->statusId == Yii::$app->params['openId']){ // fixed $defect->statusId == Yii::$app->params['fixedId']
						$fixed = $fixed + 1;
					}
				}
				$data['to_be_fixed']['to_be_fixed_count'] =  $fixed;
				$data['to_be_assigned']['to_be_assigned_count'] =  $pendingAssignments;
				
				foreach($defectsFor as $key=>$defect){
					/*$defectHistory = DefectHistory::find()->where('defectId = '.$defect->id)->orderBy('defectId DESC')->one();
					if($defectHistory){
						if($defectHistory->toStatusId == 9){
							$rejected = 'Yes';
						}else{
							$rejected = 'No';
						}
					}*/
					//$sql = 'SELECT * FROM `DefectComments` dc INNER JOIN DefectHistoryAttachment da ON dc.defectId = da.defectId WHERE dc.defectId = 38 AND (dc.statusId = 3 OR dc.statusId = 9 )';
					
					if($defect->statusId == Yii::$app->params['pendingAssignmentId'] && $defect->userId == $user_id){ // to be assigned
						$data['to_be_assigned']['to_be_assigned_data'][$toBeAssigned]['id'] = $defect->id;
						$data['to_be_assigned']['to_be_assigned_data'][$toBeAssigned]['userId'] = $defect->userId;
						$data['to_be_assigned']['to_be_assigned_data'][$toBeAssigned]['projectId'] = $defect->projectId;
						$data['to_be_assigned']['to_be_assigned_data'][$toBeAssigned]['project'] = $defect->project->name;
						$data['to_be_assigned']['to_be_assigned_data'][$toBeAssigned]['defectId'] = $defect->defectId;
						$data['to_be_assigned']['to_be_assigned_data'][$toBeAssigned]['location'] = ($defect->locId) ? $defect->loc->name	 : '';
						$data['to_be_assigned']['to_be_assigned_data'][$toBeAssigned]['description'] = ($defect->description) ? $defect->description : '';
						$defectType = ($defect->defectTypeId) ? ProjectDefectType::find()->where('id='.$defect->defectTypeId)->one() : '';
                        $data['to_be_assigned']['to_be_assigned_data'][$toBeAssigned]['defectType'] = ($defectType) ? $defectType->defectType->name : '';
						$data['to_be_assigned']['to_be_assigned_data'][$toBeAssigned]['fixByDate'] = ($defect->fixByDate) ? $defect->fixByDate : '';
						$data['to_be_assigned']['to_be_assigned_data'][$toBeAssigned]['comments'] = ($defect->comments) ? $defect->comments : '';
						$data['to_be_assigned']['to_be_assigned_data'][$toBeAssigned]['assignedTo'] = ($defect->assignedTo) ? User::gerUserNameByIdWS($defect->assignedTo) : '';
						$data['to_be_assigned']['to_be_assigned_data'][$toBeAssigned]['nominateVerifier'] = ($defect->nominateVerifier) ? User::gerUserNameByIdWS($defect->nominateVerifier) : '';
						$data['to_be_assigned']['to_be_assigned_data'][$toBeAssigned]['nominateApprover'] = ($defect->nominateApprover) ? User::gerUserNameByIdWS($defect->nominateApprover) : '';
						$data['to_be_assigned']['to_be_assigned_data'][$toBeAssigned]['dependentDefect'] = ($defect->dependentDefectId) ? $defect->dependentDefect->defectId : '';
						$data['to_be_assigned']['to_be_assigned_data'][$toBeAssigned]['department'] = ($defect->deptId) ? $defect->prjDept->dept->name : '';
						$data['to_be_assigned']['to_be_assigned_data'][$toBeAssigned]['subDepartment'] = ($defect->subDeptId) ? (($defect->subDepartment->name) ? $defect->subDepartment->name : '' ) : '';
						$data['to_be_assigned']['to_be_assigned_data'][$toBeAssigned]['status'] = ($defect->statusId) ? $defect->defectStatus->name : '';
						$data['to_be_assigned']['to_be_assigned_data'][$toBeAssigned]['raisedOn'] = ($defect->raisedOn) ? $defect->raisedOn : '';
						//$fileName = $defect->defectHistoryAttachments->fileName;
						$toBeAssignedAttachments = DefectHistoryAttachment::getDefectAttachment($defect->id);
						if($toBeAssignedAttachments){
							$key= 0;
							foreach($toBeAssignedAttachments as $toBeAssignedAttachment){
								$data['to_be_assigned']['to_be_assigned_data'][$toBeAssigned]['images'][$key]['image_path'] = Url::to('@defectAttachment').'/'.$userProjectId.'/'.$toBeAssignedAttachment->fileName;
								$key = $key + 1;
							}
						}
						
						// deleted attachemnts
						$toBeAssignedDeletedAttachments = DefectHistoryAttachment::getDefectDeletedAttachment($defect->id);
						//echo '<pre>'; print_r($toBeFixedDeletedAttachments); echo '</pre>';exit;
						if($toBeAssignedDeletedAttachments){
							$key6= 0;
							foreach($toBeAssignedDeletedAttachments as $toBeAssignedDeletedAttachment){
								$data['to_be_assigned']['to_be_assigned_data'][$toBeAssigned]['deleted_attachment'][$key6]['id'] = $toBeAssignedDeletedAttachment['id'];
								$data['to_be_assigned']['to_be_assigned_data'][$toBeAssigned]['deleted_attachment'][$key6]['attachment_id'] = $toBeAssignedDeletedAttachment['attachmentId'];
								$data['to_be_assigned']['to_be_assigned_data'][$toBeAssigned]['deleted_attachment'][$key6]['attachment_name'] = $toBeAssignedDeletedAttachment['attachmentName'];
								$data['to_be_assigned']['to_be_assigned_data'][$toBeAssigned]['deleted_attachment'][$key6]['attachment_path'] = Url::to('@defectAttachment').'/'.$userProjectId.'/'.$toBeAssignedDeletedAttachment['attachmentName'];
								$key6 = $key6 + 1;
							}
						}
						$toBeAssigned = $toBeAssigned + 1;
					}
					if($defect->assignedTo == $user_id && $defect->statusId == Yii::$app->params['openId']){ // fixed
						$data['to_be_fixed']['to_be_fixed_data'][$fix]['id'] = $defect->id;
						$data['to_be_fixed']['to_be_fixed_data'][$fix]['userId'] = $defect->userId;
						$data['to_be_fixed']['to_be_fixed_data'][$fix]['projectId'] = $defect->projectId;
						$data['to_be_fixed']['to_be_fixed_data'][$fix]['project'] = $defect->project->name;
						$data['to_be_fixed']['to_be_fixed_data'][$fix]['defectId'] = $defect->defectId;
						$data['to_be_fixed']['to_be_fixed_data'][$fix]['location'] = ($defect->locId) ? $defect->loc->name	 : '';
						$data['to_be_fixed']['to_be_fixed_data'][$fix]['description'] = ($defect->description) ? $defect->description : '';
                                                $defectType = ($defect->defectTypeId) ? ProjectDefectType::find()->where('id='.$defect->defectTypeId)->one() : '';
						$data['to_be_fixed']['to_be_fixed_data'][$fix]['defectType'] = ($defectType) ? $defectType->defectType->name : '';
						$data['to_be_fixed']['to_be_fixed_data'][$fix]['fixByDate'] = ($defect->fixByDate) ? $defect->fixByDate : '';
						$data['to_be_fixed']['to_be_fixed_data'][$fix]['comments'] = ($defect->comments) ? $defect->comments : '';
						$data['to_be_fixed']['to_be_fixed_data'][$fix]['assignedTo'] = ($defect->assignedTo) ? User::gerUserNameByIdWS($defect->assignedTo) : '';
						$data['to_be_fixed']['to_be_fixed_data'][$fix]['nominateVerifier'] = ($defect->nominateVerifier) ? User::gerUserNameByIdWS($defect->nominateVerifier) : '';
						$data['to_be_fixed']['to_be_fixed_data'][$fix]['nominateApprover'] = ($defect->nominateApprover) ? User::gerUserNameByIdWS($defect->nominateApprover) : '';
						$data['to_be_fixed']['to_be_fixed_data'][$fix]['dependentDefect'] = ($defect->dependentDefectId) ? $defect->dependentDefect->defectId : '';
						$data['to_be_fixed']['to_be_fixed_data'][$fix]['department'] = ($defect->deptId) ? $defect->prjDept->dept->name : '';
						$data['to_be_fixed']['to_be_fixed_data'][$fix]['subDepartment'] = ($defect->subDeptId) ? $defect->subDepartment->name : '';
						$data['to_be_fixed']['to_be_fixed_data'][$fix]['status'] = ($defect->statusId) ? $defect->defectStatus->name : '';
						$data['to_be_fixed']['to_be_fixed_data'][$fix]['raisedOn'] = ($defect->raisedOn) ? $defect->raisedOn : '';
						$toBeFixedAttachments = DefectHistoryAttachment::getDefectAttachment($defect->id);
						if($toBeFixedAttachments){
							$key2= 0;
							foreach($toBeFixedAttachments as $toBeFixedAttachment){
								$data['to_be_fixed']['to_be_fixed_data'][$fix]['images'][$key2]['image_path'] = Url::to('@defectAttachment').'/'.$userProjectId.'/'.$toBeFixedAttachment->fileName;
								$key2 = $key2 + 1;
							}
						}
						// deleted attachemnts
						$toBeFixedDeletedAttachments = DefectHistoryAttachment::getDefectDeletedAttachment($defect->id);
						//echo '<pre>'; print_r($toBeFixedDeletedAttachments); echo '</pre>';exit;
						if($toBeFixedDeletedAttachments){
							$key3= 0;
							foreach($toBeFixedDeletedAttachments as $toBeFixedDeletedAttachment){
								$data['to_be_fixed']['to_be_fixed_data'][$fix]['deleted_attachment'][$key3]['id'] = $toBeFixedDeletedAttachment['id'];
								$data['to_be_fixed']['to_be_fixed_data'][$fix]['deleted_attachment'][$key3]['attachment_id'] = $toBeFixedDeletedAttachment['attachmentId'];
								$data['to_be_fixed']['to_be_fixed_data'][$fix]['deleted_attachment'][$key3]['attachment_name'] = $toBeFixedDeletedAttachment['attachmentName'];
								$data['to_be_fixed']['to_be_fixed_data'][$fix]['deleted_attachment'][$key3]['attachment_path'] = Url::to('@defectAttachment').'/'.$userProjectId.'/'.$toBeFixedDeletedAttachment['attachmentName'];
								$key3 = $key3 + 1;
							}
						}
						//$sql = 'SELECT * FROM commentImageMap';
						$getFefectComments = DefectComments::find()->where('defectId = '.$defect->id.' AND statusId = '.Yii::$app->params['openId'])->all(); //AND (statusId = '.Yii::$app->params['fixedId'].' OR statusId = '.Yii::$app->params['rejectedId'].')
						
						if($getFefectComments){
							$commentsKey = 0;
							foreach($getFefectComments as $comment){
								$attachmentKey = 0;
								$sql = 'SELECT * FROM `DefectHistoryAttachment` WHERE id IN( SELECT attachmentId FROM commentImageMap WHERE commentId = '.$comment->id.') AND '.Yii::$app->params['WS_fileTypeCondtion'];
								$commentAttachments = DefectHistoryAttachment::findBySql($sql)->all();//DefectHistoryAttachment::find()->where('defectId = '.$comment->defectId.' AND assignedUserId = '.$comment->assignedUserId.' AND statusId = '.$comment->statusId.' AND dateOn="'.$comment->dateOn.'"')->all(); //AND (statusId = '.Yii::$app->params['fixedId'].' OR statusId = '.Yii::$app->params['rejectedId'].') 
								$data['to_be_fixed']['to_be_fixed_data'][$fix]['fixing_comments'][$commentsKey]['id'] = $comment->id;
								$data['to_be_fixed']['to_be_fixed_data'][$fix]['fixing_comments'][$commentsKey]['comment'] = $comment->comments;
								$data['to_be_fixed']['to_be_fixed_data'][$fix]['fixing_comments'][$commentsKey]['user'] = User::gerUserNameByIdWS($comment->assignedUserId);
								$data['to_be_fixed']['to_be_fixed_data'][$fix]['fixing_comments'][$commentsKey]['date'] = $comment->dateOn;
								if($commentAttachments){
									foreach($commentAttachments as $commentAttachment){
										$data['to_be_fixed']['to_be_fixed_data'][$fix]['fixing_comments'][$commentsKey]['images'][$attachmentKey]['image_path'] = Url::to('@defectAttachment').'/'.$userProjectId.'/'.$commentAttachment->fileName;
										$attachmentKey = $attachmentKey + 1;
									}
								}else{
									$data['to_be_fixed']['to_be_fixed_data'][$fix]['fixing_comments'][$commentsKey]['images'] = '';
								}
								$commentsKey = $commentsKey + 1;
							}
						}else{
							$data['to_be_fixed']['to_be_fixed_data'][$fix]['fixing_comments'] = '';
						}
						$fix = $fix + 1;
					}
				}
			} else {
                            $data['to_be_fixed']['to_be_fixed_count'] =  0;
                            $data['to_be_assigned']['to_be_assigned_count'] =  0;
                        }
                        
			// return value
			return $this->_returnResult('dashboard_data',$data,507,1);	  
		}else{
                        $data['to_be_fixed']['to_be_fixed_count'] =  0;
                        $data['to_be_assigned']['to_be_assigned_count'] =  0;
			return $this->_returnResult('dashboard_data',$data,508,1);	  
		}
    }
	
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    /**
     * This method handles to list project nominate verifiers
     * */
     public function actionNominateverifier($project_id){
		 $nominateVerifiers = Yii::$app->DefectHelper->getNominateVerifiers($project_id);
		 if($nominateVerifiers){
			 $key = 0;
			 foreach($nominateVerifiers as $nominateVerifier){
				 $data[$key]['id'] = $nominateVerifier->id;
				 $data[$key]['name'] = ($nominateVerifier->first_name && $nominateVerifier->last_name) ? $nominateVerifier->first_name.' '.$nominateVerifier->last_name : (($nominateVerifier->first_name && !$nominateVerifier->last_name) ? $nominateVerifier->first_name : ((!$nominateVerifier->first_name && $nominateVerifier->last_name) ? $nominateVerifier->first_name : $nominateVerifier->username));
				 $key = $key + 1;
			 }
			 return $this->_returnResult('nominate_verifier_data',$data,509,1);	  
		 }else{
			return $this->_returnResult('nominate_verifier_data','',510,0);	   
		 }
	 }
	 
	/**
	 * This method handles to delete the deleted attachment
	 * */
	public function actionDeleteDeletedAttachement(){
		$post_data = Yii::$app->getRequest()->getRawBody(); //  To get the json post data
        $data = Json::decode($post_data);
        $connection = \Yii::$app->db;
		 if($data){
			 $deletedAttachments = $data['deletedAttachemnts'];
			 if($deletedAttachments){
				$sql = 'DELETE FROM  DefectDeletedAttachment WHERE id IN (' . $deletedAttachments . ')';
				$result = $connection->createCommand($sql)->execute();
				if($result){
					return $this->_returnResult('delete_deleted_attachment','Success',511,1);	
				}else{
					return $this->_returnResult('delete_deleted_attachment','',512,0);	
				}
			 }else{
				 return $this->_returnResult('delete_deleted_attachment','',400,0);	
			 }
		 }else{
			 return $this->_returnResult('delete_deleted_attachment','',400,0);	
		 }
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
