<?php

namespace frontend\modules\ws\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\helpers\Url;
use yii\web\Response;
use yii\helpers\Json;
use yii\web\UploadedFile;
use app\models\Defect;
use app\models\DefectHistory;
use app\models\DefectComments;
use app\models\DefectHistoryAttachment;
use app\models\DefectHistoryAttachmentTem;
use app\models\DefectSearch;
use app\modules\defaults\models\Department;
use app\modules\defaults\models\SubDepartment;
use app\modules\defaults\models\DefectType;
use app\models\ProjectDefectType;
use app\modules\defaults\models\DefectStatus;
use app\modules\defaults\models\ProjectLocation;
use app\models\Project;
use app\models\ProjectDepartment;
use common\models\User;

/**
 * DefectController implements the CRUD actions for Defect model.
 */
class DefectController extends ActiveController {

    public $modelClass = 'frontend\models\Shop';
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
     * 
     */
    public function actionUploadAttachments($user_id) {
        if (!$user_id) {
            return $this->_returnResult('raise_defect', '', 301);
        }
        $modelAttachment = new DefectHistoryAttachmentTem();
        //DefectHistoryAttachmentTem[fileName][];
        $file = UploadedFile::getInstanceByName('fileName');
        $projectId = Project::getUserProjectId($user_id);
        $path = ATTACHMENT_UPLOAD_PATH.$projectId.'/';

        if ($file) {
            $fileName = Yii::$app->DefectHelper->removeSpecialCharacter($file->baseName, $file->extension);
            //$fileName = $file->baseName . '.' . $file->extension;
            $file->saveAs($path . $fileName);
            $connection = \Yii::$app->db;
            $connection->createCommand()
                    ->insert('DefectHistoryAttachmentTem', [
                        'fileName' => $fileName,
                        'fileType' => $file->extension,
                        'userId' => $user_id,
                    ])->execute();

            $attachment = DefectHistoryAttachmentTem::find()->where('userId=' . $user_id)->orderBy(['id' => SORT_DESC])->one();
            $arr = [];

            $arr['id'] = $attachment->id;
            $arr['fileName'] = $attachment->fileName;
            $arr['fileType'] = $attachment->fileType;
            $arr['filePath'] = Url::to('@attachmentPath') . '/'.$projectId.'/' . $attachment->fileName;

            return $this->_returnResult('attachments', $arr, 508);
        } else {
            return $this->_returnResult('attachments', '', 509);
        }
    }

    /**
     * Creates a new Defect model.
     * If creation is successful, the browser will be redirected to the 'index' page.
     * @return mixed
     */
    public function actionRaiseDefect() {
        /* [{"username":"John", "password":"Doe"}] */
        //$serialNum = Yii::$app->DefectHelper->getSerialNum(); // To get the serial number

        $post_data = Yii::$app->getRequest()->getRawBody(); // To get the json post data
        $data = Json::decode($post_data); //To decode the json data

        if ($data) {
            //print_r($data); exit;
            $btn = $data['buttonType']; // To get the button type
            // To get the 
            $userId = $data['userId'];
            $projectId = $data['projectId'];
            
            // Basic validation
            if (empty($userId)) {
                return $this->_returnResult('raise_defect', '', 401);
            }
            
            if (empty($projectId)) {
                return $this->_returnResult('raise_defect', '', 402);
            }
            
            // To get the Serial Number generating defectId
            $projectCode = Project::getUserProjectCode($userId);
            $serialNum = Yii::$app->DefectHelper->getSerialNum($projectId); // To get the serial number
            $defectId = Yii::$app->DefectHelper->getDefectId($projectCode, $serialNum);
            $locId = ($data['locId']) ? $data['locId'] : '';
            $description = $data['description'];
            $defectTypeId = ($data['defectTypeId']) ? $data['defectTypeId'] : '';
            $fixByDate = ($data['fixByDate']) ? Yii::$app->Common->mysqlDate($data['fixByDate']) : '';
            $comments = $data['comments'];
            $assignedTo = ($data['assignedTo']) ? $data['assignedTo'] : '';
            $nominateVerifier = ($data['nominateVerifier']) ? $data['nominateVerifier'] : '';
            $nominateApprover = ($data['nominateApprover']) ? $data['nominateApprover'] : '';
            $dependentDefectId = ($data['dependentDefectId']) ? $data['dependentDefectId'] : '';
            $deptId = ($data['deptId']) ? $data['deptId'] : '';
            $subDeptId = ($data['subDeptId']) ? $data['subDeptId'] : '';
            //$statusId           = $data['statusId'];
            $raisedOn = Yii::$app->Common->mysqlDateTime();
            $tempId = $data['tempId'];
            $model = new Defect();
            
            
            // Basic validation goes here
            if (empty($defectId)) {
                return $this->_returnResult('raise_defect', '', 403);
            }
			if(!$deptId && $subDeptId){
				return $this->_returnResult('raise_defect', '', 412);
			}
            // To check the button type
            if ($btn == 'save') {
                if ($data['defectId']) {
                    $findDefectId = Defect::find()->where('defectId="' . $data['defectId'] . '"')->one();
                    $model = Defect::findOne($findDefectId->id);
                    $model->description = $description;
                    $model->userId = $userId;
                    $model->nominateVerifier = $nominateVerifier;
                    $model->deptId = $deptId;
                    $model->locId = $locId;
                    $model->fixByDate = Yii::$app->Common->mysqlDate($fixByDate);
                    $model->projectId = $projectId;
                    $model->assignedTo = $assignedTo;
                    $model->defectTypeId = $defectTypeId;
                    $model->subDeptId = $subDeptId;
                    $model->raisedOn = $raisedOn;

                    if ($model->save()) {
                        $defects = Defect::find()->where('id=' . $model->id . ' ORDER BY id DESC')->all();
                        // file upload
                        if ($tempId) {
                            $sql = 'SELECT * FROM DefectHistoryAttachmentTem WHERE id IN (' . $tempId . ') AND userId = ' . $model->userId;
                            $attachments = DefectHistoryAttachmentTem::findBySql($sql)->all();
                            foreach ($attachments as $attachment) {
                                DefectHistoryAttachment::storeUplodedInfo($attachment, $model->id, $userId, $model->statusId);
                                DefectHistoryAttachmentTem::deleteAll('id=' . $attachment->id);
                            }
                        }
                        return $this->_returnResult('raise_defect', $defects, 518);
                    } else {
                        return $this->_returnResult('raise_defect', $defects, 519);
                    }
                } else {
                    // To assign model values
                    $model->userId = $userId;
                    $model->projectId = $projectId;
                    $model->flag = round($serialNum);
                    $model->defectId = $defectId;
                    $model->locId = $locId;
                    $model->description = $description;
                    $model->defectTypeId = $defectTypeId;
                    $model->fixByDate = Yii::$app->Common->mysqlDate($fixByDate);
                    $model->comments = $comments;
                    $model->assignedTo = $assignedTo;
                    $model->nominateVerifier = $nominateVerifier;
                    $model->nominateApprover = $nominateApprover;
                    $model->dependentDefectId = $dependentDefectId;
                    $model->deptId = $deptId;
                    $model->subDeptId = $subDeptId;
                    $model->raisedOn = $raisedOn;

                    $model->statusId = 1; // Default defect status "To Be Assigned"
                    if ($model->save()) {
                        //Yii::$app->DefectHelper->updateDefectFlag($serialNum); // Update the serialNum to generate next serial number
                        $defects = Defect::find()->where('id=' . $model->id . ' ORDER BY id DESC')->all(); // To get the stored defect details
                        // file upload
                        if ($tempId) {
                            $sql = 'SELECT * FROM DefectHistoryAttachmentTem WHERE id IN (' . $tempId . ') AND userId = ' . $model->userId;
                            $attachments = DefectHistoryAttachmentTem::findBySql($sql)->all();
                            foreach ($attachments as $attachment) {
                                DefectHistoryAttachment::storeUplodedInfo($attachment, $model->id, $userId, $model->statusId);
                                DefectHistoryAttachmentTem::deleteAll('id=' . $attachment->id);
                            }
                        }
                        return $this->_returnResult('raise_defect', $defects, 506);
                    } else {
                        return $this->_returnResult('raise_defect', '', 507);
                    }
                }
            } else if ($btn == 'assign') {
                // Validation goes here
                if (empty($locId)) {
                    return $this->_returnResult('raise_defect', '', 404);
                }

                if (empty($description)) {
                    return $this->_returnResult('raise_defect', '', 405);
                }

                if (empty($defectTypeId)) {
                    return $this->_returnResult('raise_defect', '', 406);
                }

                if (empty($fixByDate)) {
                    return $this->_returnResult('raise_defect', '', 407);
                }
                if (empty($assignedTo)) {
                    return $this->_returnResult('raise_defect', '', 409);
                }
                if (!is_numeric($userId)) {
                    return $this->_returnResult('raise_defect', '', 301);
                }

                if (!is_numeric($locId)) {
                    return $this->_returnResult('raise_defect', '', 303);
                }

                if (!is_numeric($defectTypeId)) {
                    return $this->_returnResult('raise_defect', '', 304);
                }

                if (!is_numeric($assignedTo)) {
                    return $this->_returnResult('raise_defect', '', 305);
                }
                
                if ($data['defectId']) {
                    $findDefectId = Defect::find()->where('defectId="' . $data['defectId'] . '"')->one();
                    $model = Defect::findOne($findDefectId->id);
                    $model->userId = $userId;
                    $model->projectId = $projectId;
                    //$model->defectId = $data['defectId'];
                    $model->locId = $locId;
                    $model->description = $description;
                    $model->defectTypeId = $defectTypeId;
                    $model->fixByDate = Yii::$app->Common->mysqlDate($fixByDate);
                    $model->comments = $comments;
                    $model->assignedTo = $assignedTo;
                    $model->nominateVerifier = $nominateVerifier;
                    $model->nominateApprover = $nominateApprover;
                    $model->dependentDefectId = $dependentDefectId;
                    $model->deptId = $deptId;
                    $model->subDeptId = $subDeptId;
                    $model->raisedOn = $raisedOn;
                    
                    // To check the defect already assigned if assigned return the message
                    if($findDefectId->statusId == Yii::$app->params['projectStatusOpen']) {
                        return $this->_returnResultError('assign_defect', $model, 520);
                    }
                } else {
                    $model->userId = $userId;
                    $model->projectId = $projectId;
                    $model->flag = round($serialNum);
                    $model->defectId = $defectId;
                    $model->locId = $locId;
                    $model->description = $description;
                    $model->defectTypeId = $defectTypeId;
                    $model->fixByDate = Yii::$app->Common->mysqlDate($fixByDate);
                    $model->comments = $comments;
                    $model->assignedTo = $assignedTo;
                    $model->nominateVerifier = $nominateVerifier;
                    $model->nominateApprover = $nominateApprover;
                    $model->dependentDefectId = $dependentDefectId;
                    $model->deptId = $deptId;
                    $model->subDeptId = $subDeptId;
                    $model->raisedOn = $raisedOn;
                }
                
                $model->statusId = Yii::$app->params['projectStatusOpen']; // Status Open
                
                if ($model->save()) {
                    //Yii::$app->DefectHelper->updateDefectFlag($serialNum);  // Update the serialNum to generate next serial number
                    $defects = Defect::find()->where('id=' . $model->id . ' ORDER BY id DESC')->all(); // To get the stored defect details
                    // file upload
                    if ($tempId) {
                        $explodedTempId = Yii::$app->Common->explodeBy(',', $tempId);
                        $sql = 'SELECT * FROM DefectHistoryAttachmentTem WHERE id IN (' . $tempId . ') AND userId = ' . $model->userId;
                        $attachments = DefectHistoryAttachmentTem::findBySql($sql)->all();

                        foreach ($attachments as $attachment) {
                            DefectHistoryAttachment::storeUplodedInfo($attachment, $model->id, $userId, $model->statusId);
                            DefectHistoryAttachmentTem::deleteAll('id=' . $attachment->id);
                        }
                    }
                    
                    // To add Defect History when defect is assigned to someone
                    //DefectHistory::createHistory($model,Yii::$app->params['pendingAssignmentId'],$model->statusId);
                    // To send mail while assigning defect
                    $preference = Yii::$app->Common->getUserPreferences($model->assignedTo);
                    if ($preference != 2 || $preference != 3) 
                            (MAIL_MODE) ? $model->sendAssignedMailToFixerForWebService($model, $userId) : '';
                
                    return $this->_returnResult('assign_defect', $defects, 516);
                } else {
                    return $this->_returnResult('assign_defect', '', 517);
                }
            }
        }

        $parms = Yii::$app->request->queryParams;

        if (!$parms || !$parms['user_id']) {
            return $this->_returnResult('raise_defect', '', 301);
        }

        $projects = Project::find()->select('id, code, name')->where('id=' . Project::getUserProjectId($parms['user_id']))->all();
        $locations = ProjectLocation::find('ORDER BY name ASC')->select('id, code, name')->all();
        $assignedTo = Yii::$app->DefectHelper->getAssignedToUsers(Project::getUserProjectId($parms['user_id']));
        $nominateVerifier = Yii::$app->DefectHelper->getNominateVerifiers(Project::getUserProjectId($parms['user_id']));
        //$nominateApprover = Yii::$app->DefectHelper->getNominateApprovers(Project::getUserProjectId($parms['user_id']));
        
        $defectType = ProjectDefectType::find('durationToFix ASC')->where('projectId=' . Project::getUserProjectId($parms['user_id']))->all();
        $projectDefectType = [];
        if(count($defectType) > 0) {
            foreach ($defectType as $i=>$prjDefect) {
                $projectDefectType[$i] = [
					'id'=>$prjDefect->id, 
					'name'=> $prjDefect->defectType->name,//Yii::$app->DefectHelper->getDefectTypeDuration($prjDefect->defectType->name, $prjDefect->durationToFix), 
					'durationToFix'=>$prjDefect->durationToFix];
            }
        }

        //$dependentDefect = Defect::find('ORDER BY defectId ASC')->asArray()->select('id, defectId')->where('projectId = ' . Project::getUserProjectId($parms['user_id']))->all();
        $defectStatus = DefectStatus::find()->where("id IN('1','2') ORDER BY name ASC")->all();


        $raiseDefect = [
            'projects' => $projects,
            //'defectId' => '',
            'locations' => $locations,
            'assignedTo' => $assignedTo,
            'nominateVerifier' => $nominateVerifier,
            //'nominateApprover' => $nominateApprover,
            'defectType' => $projectDefectType,
            //'dependentDefect' => $dependentDefect,
            'departments' => $this->_getDepartmentWithSubDepartment($parms['user_id']),
            'defectStatus' => $defectStatus,
        ];

        return $this->_returnResult('raise_defect', $raiseDefect, 505);
    }

    /**
     * To fix defects
     */
    public function actionFixDefect() {
        $post_data = Yii::$app->getRequest()->getRawBody(); //  To get the json post data
        $data = Json::decode($post_data); // To get the post data that have bee decoded

        if ($data) {
            $btn = $data['buttonType'];
            $defectId = $data['defectId']; // Defect Id
            $userId = $data['userId'];
            $comments = $data['comments'];
            $nominateVerifier = ($data['nominateVerifier']) ? $data['nominateVerifier'] : '';
            $tempId = $data['tempId'];
            $commentedOn = isset($data['commentedOn']) ? Yii::$app->Common->mysqlDateTime($data['commentedOn']) : Yii::$app->Common->mysqlDateTime();

            //echo $nominateVerifier; exit;
            // Basic validation goes here
            if (empty($defectId)) {
                return $this->_returnResult('fix_defect', '', 415);
            }
            if (empty($userId)) {
                return $this->_returnResult('fix_defect', '', 401);
            }
            if (!is_numeric($userId)) {
                return $this->_returnResult('fix_defect', '', 301);
            }
            /* if (empty($comments)) {
              return $this->_returnResult('fix_defect', '', 408);
              } */
            $defectInfo = Defect::find()->where('defectId="' . $defectId . '"')->one();
            $model = $this->findModel($defectInfo->id);
            $modelDefectComments = new DefectComments();
            //$attachments = DefectHistoryAttachmentTem::find()->where('tempId=1')->all(); // To get the temporary files
            // add comment when is rejected alone not on save or fix
            if ($btn == 'save') {
                /* if (empty($comments)) {
                  return $this->_returnResult('fix_defect', '', 408);
                  } */
                // To validate the nominate verifier id
                /* if(is_numeric($nominateVerifier)) {
                  $model->nominateVerifier = $nominateVerifier;
                  }else{
                  return $this->_returnResult('raise_defect', '', 306);
                  } */
                // To check the defect already fixed if fixed return the message
                if($model->statusId == Yii::$app->params['fixedId']) {
                    return $this->_returnResultError('fix_defect', $model, 521);
                }
                $model->statusId = 2; // Default status "Open" 
                if ($model->save()) {
                    if($comments){
                        $modelDefectComments->defectId = $model->id;
                        $modelDefectComments->assignedUserId = $userId;
                        $modelDefectComments->statusId = $model->statusId;
                        $modelDefectComments->dateOn = $commentedOn;
                        $modelDefectComments->comments = $comments;
                        $modelDefectComments->save();
                    }
                    // file upload
                    if ($tempId) {

                        $explodedTempId = Yii::$app->Common->explodeBy(',', $tempId);
                        //$attachments = DefectHistoryAttachmentTem::findAll($explodedTempId)->where('userId='.$userId); 
                        $sql = 'SELECT * FROM DefectHistoryAttachmentTem WHERE id IN (' . $tempId . ') AND userId = ' . $userId;
                        $attachments = DefectHistoryAttachmentTem::findBySql($sql)->all();

                        foreach ($attachments as $attachment) {
                            $attachmentId = DefectHistoryAttachment::storeUplodedInfo($attachment, $model->id, $userId, $model->statusId);
                            $connection = \Yii::$app->db;
                            $connection->createCommand()
                                    ->insert('commentImageMap', [
                                        'commentId' => $modelDefectComments->id,
                                        'attachmentId' => $attachmentId
                                    ])->execute();

                            DefectHistoryAttachmentTem::deleteAll('id=' . $attachment->id);
                        }
                    }

                    return $this->_returnResult('fix_defect', $model, 510);
                } else {
                    return $this->_returnResult('fix_defect', '', 513);
                }
            }

            // To process the defect to be fixed
            if ($btn == 'fixed') {
                /* if (empty($nominateVerifier)) {
                  return $this->_returnResult('fix_defect', '', 410);
                  } */

                /* if(is_numeric($nominateVerifier)) {
                  $model->nominateVerifier = $nominateVerifier;
                  }else{
                  return $this->_returnResult('raise_defect', '', 306);
                  } */
                // To check the defect already fixed if fixed return the message
                if($model->statusId == Yii::$app->params['fixedId']) {
                    return $this->_returnResultError('fix_defect', $model, 521);
                }
                $model->nominateVerifier = ($nominateVerifier) ? $nominateVerifier : $defectInfo->nominateVerifier;
                $model->statusId = 3; // Default status "Open" 
                if ($model->save()) {
                    if ($comments) {
                        $modelDefectComments->defectId = $model->id;
                        $modelDefectComments->assignedUserId = $userId;
                        $modelDefectComments->statusId = $model->statusId;
                       // $modelDefectComments->dateOn = ($commentedOn) ? Yii::$app->Common->mysqlDateTime($commentedOn) : Yii::$app->Common->mysqlDateTime();
                        $modelDefectComments->dateOn = $commentedOn;
                        $modelDefectComments->comments = $comments;
                        $modelDefectComments->save();
                    }
                    // file upload
                    if ($tempId) {
                        $explodedTempId = Yii::$app->Common->explodeBy(',', $tempId);
                        //$attachments = DefectHistoryAttachmentTem::findAll($explodedTempId)->where('userId='.$userId); 
                        $sql = 'SELECT * FROM DefectHistoryAttachmentTem WHERE id IN (' . $tempId . ') AND userId = ' . $model->userId;
                        $attachments = DefectHistoryAttachmentTem::findBySql($sql)->all();
                        foreach ($attachments as $attachment) {
                            DefectHistoryAttachment::storeUplodedInfo($attachment, $model->id, $userId, $model->statusId);
                            DefectHistoryAttachmentTem::deleteAll('id=' . $attachment->id);
                        }
                    }

                    DefectHistory::createHistory($model, 2, $model->statusId, $userId);

                    return $this->_returnResult('fix_defect', $model, 511);
                } else {
                    return $this->_returnResult('fix_defect', '', 514);
                }
            }
            // End fixed 
            // To process the defect to be rejected
            if ($btn == 'rejected') {
                // To validate the nominate verifier id
                /* if(is_numeric($nominateVerifier)) {
                  $model->nominateVerifier = $nominateVerifier;
                  } */
                // To check the defect already fixed if fixed return the message
                if($model->statusId == Yii::$app->params['pendingAssignmentId']) {
                    return $this->_returnResultError('fix_defect', $model, 522);
                }
                if (empty($comments)) {
                    return $this->_returnResult('fix_defect', '', 408);
                }
                $model->statusId = 1; // Default status "To Be Assigned" 

                if ($model->save()) {
                    if($comments){
                        $modelDefectComments->defectId = $model->id;
                        $modelDefectComments->assignedUserId = $userId;
                        $modelDefectComments->statusId = $model->statusId;
                        $modelDefectComments->dateOn = $commentedOn;
                        //$modelDefectComments->dateOn = ($commentedOn) ? Yii::$app->Common->mysqlDateTime($commentedOn) : Yii::$app->Common->mysqlDateTime();
                        $modelDefectComments->comments = $comments;
                        $modelDefectComments->save();
                    }
                    /* if($tempId) {
                      // To check the tempId and attachments are available or not
                      if($attachments) {
                      // To move the temporary files to main table
                      foreach ($attachments as $index=>$attachment) {
                      DefectHistoryAttachment::storeUplodedInfo($attachment, $model->id, $userId, $model->statusId);
                      }
                      // To delete the temporary files
                      if($tempId) {
                      DefectHistoryAttachmentTem::deleteAll('tempId=1');
                      }
                      } else {
                      DefectHistoryAttachmentTem::deleteAll('tempId=1'); //// To delete the temporary files
                      }
                      } */
                    // file upload
                    if ($tempId) {
                        $explodedTempId = Yii::$app->Common->explodeBy(',', $tempId);
                        //$attachments = DefectHistoryAttachmentTem::findAll($explodedTempId)->where('userId='.$userId); 
                        $sql = 'SELECT * FROM DefectHistoryAttachmentTem WHERE id IN (' . $tempId . ') AND userId = ' . $model->userId;
                        $attachments = DefectHistoryAttachmentTem::findBySql($sql)->all();

                        foreach ($attachments as $attachment) {
                            DefectHistoryAttachment::storeUplodedInfo($attachment, $model->id, $userId, $model->statusId);
                            DefectHistoryAttachmentTem::deleteAll('id=' . $attachment->id);
                        }
                    }

                    DefectHistory::createHistory($model, 2, $model->statusId, $userId);

                    return $this->_returnResult('fix_defect', 1, 512);
                } else {
                    return $this->_returnResult('fix_defect', '', 515);
                }
            }
            // End Rejected
        } else {
            return $this->_returnResult('attachments', '', 509);
        }
    }

    /**
     * Finds the Defect model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Defect the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Defect::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /*
     * Return Department with Sub Department
     */

    private function _getDepartmentWithSubDepartment($user_id) {
        //$departments = Department::find('ORDER BY name ASC')->all();
        $departments = ProjectDepartment::find()->where('projectId=' . Project::getUserProjectId($user_id))->groupBy('deptId')->all();
        
        $arr = [];
        if ($departments) {
            foreach ($departments as $index => $dept) {
                
                $countSupDepartments = ProjectDepartment::find()
                ->where(['projectId'=>Project::getUserProjectId($user_id), 'deptId' => $dept->deptId])
                ->count();
                
                $rows = ProjectDepartment::find()->where(['projectId'=>Project::getUserProjectId($user_id), 'deptId' => $dept->deptId])->orderBy('subDeptId ASC')->all();
                $subDepts = [];
               
                if ($countSupDepartments > 0) {
                    foreach ($rows as $i=>$row) {
                        if(!empty($row->subDeptId)) {
                            $subDepts[$i] = ['id'=>$row->subDeptId, 'name'=>$row->subDept->name];
                        }
                    }
                }
                
                $arr[$index] = [
                    'id' => $dept['id'],
                    //'code' => $dept['code'],
                    'name' => $dept->dept->name,
                    $dept->dept->name => $subDepts
                    //$dept['code'] => SubDepartment::find()->select('id, code, name')->where(['deptId' => $dept['id']])->orderBy('name ASC')->all(),
                ];
            }
        }
        
        return $arr;
    }

    /*
     * Return Display format
     */
    private function _returnResult($dataKey, $result, $code, $errorCode = false) {
        return [
            'result' => ($result) ? TRUE : FALSE,
            'msg' => $this->_getStatusCodeMessage($code),
            $dataKey => $result,
            'error' => ($errorCode) ? $errorCode : ''
        ];
    }
    
    /*
     * Return Display format
     */
    private function _returnResultError($dataKey, $result, $code, $errorCode = false) {
        return [
            'result' => FALSE,
            'invalidRecord' => TRUE,
            'msg' => $this->_getStatusCodeMessage($code),
            $dataKey => $result,
            'error' => ($errorCode) ? $errorCode : ''
        ];
    }
    
    /*
     * To get the status code
     */

    private function _getStatusCodeMessage($status) {
        $codes = [
            200 => 'OK',
            505 => 'Raise Defect Dropdown data',
            506 => 'Defect raised successfully.',
            507 => 'Defect has not been raised. Try again later.',
            508 => 'Files have been uploaded successfully.',
            509 => 'Could not find the files',
            510 => 'Defect has been saved successfully.',
            511 => 'Defect has been fixed successfully.',
            512 => 'Defect has been rejected successfully.',
            513 => 'Defect has not been saved. Try again later.',
            514 => 'Defect has not been fixed. Try again later.',
            515 => 'Defect has not been rejected. Try again later.',
            516 => 'Defect has been assigned successfully',
            517 => 'Defect could not be assigned',
            518 => 'Defect updated successfully',
            519 => 'Defect could not be updated',
            520 => 'Defect has been assigned already, You can\'t reassign again.',
            521 => 'Defect has been fixed already, You can\'t fix again.',
            522 => 'Defect has been rejected already, You can\'t reject again.',
            401 => 'User ID is required.',
            402 => 'Project name cannot be empty.',
            403 => 'Defect ID is required.',
            404 => 'Location is required.',
            405 => 'Description is required.',
            406 => 'Defect Type is required.',
            407 => 'Fix By Date is required.',
            408 => 'Comments is required.',
            409 => 'Assigned To is required.',
            410 => 'Nominate Verifier is required.',
            411 => 'Nominate Approver is required',
            412 => 'Department is required.',
            413 => 'Subdepartment is required.',
            414 => 'Date format is not valid, Format should be(yyyy-mm-dd)',
            415 => 'Defect ID (Primary Key of Defect) is required.',
            301 => 'Invalid User ID',
            302 => 'Invalid Project',
            303 => 'Location is not valid',
            304 => 'Invalid Defect Type.',
            305 => 'Invalid Assigned To.',
            306 => 'Invalid Verifier.',
            307 => 'Invalid Approver.',
            308 => 'Invalid Department.',
            309 => 'Invalid Subdepartment.',
            310 => 'Defect ID (Primary Key of Defect) is required.',
            101 => 'Username is required',
            102 => 'Invalid Username',
            103 => 'Password is required',
            104 => 'Invalid Username or Password',
            105 => 'Invalid Access-token',
            106 => 'Access-token is required',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
            503 => 'Results not found',
        ];

        return (isset($codes[$status])) ? $codes[$status] : '';
    }

}
