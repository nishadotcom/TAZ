<?php

namespace app\Modules\defaults\models;

use Yii;

/**
 * This is the model class for table "ProjectStatus".
 *
 * @property integer $id
 * @property string $name
 */
class ProjectStatus extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'ProjectStatus';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 25],
            [['name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * To display project status by id
     * @param type $username
     * @return type
     */
    public static function findById($projectId) {
        $projectStatus = ProjectStatus::find()
                ->where(['id' => $projectId])
                ->one();
        return $projectStatus->name;
    }
    
      /*
     * To upload multiple files
     */
    public static function importCSV($data)
    {
      $connection = \Yii::$app->db; // DB connection
      $result = $connection->createCommand("SELECT name FROM DefectStatus WHERE name = '".$data[0]."'")->queryAll(); // To get the defect status name
       if (!$result) {				
                $connection = \Yii::$app->db;
                $result =  $connection->createCommand()
                       ->insert('DefectStatus', [
                       'name' => $data[0], // 
                       ])->execute();                            
                
                return true;     
        }else{
            return FALSE; 
         }
    }

}
