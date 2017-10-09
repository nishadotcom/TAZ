<?php

namespace app\Modules\defaults\models;

use Yii;

/**
 * This is the model class for table "ProjectLocation".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property string $address
 * @property string $locationMap
 */
class ProjectLocation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ProjectLocation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'name', 'address'], 'required'],
            [['address'], 'string'],
            [['code'], 'string', 'max' => 25],
            [['name', 'locationMap'], 'string', 'max' => 100],
            [['name','code'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'name' => 'Name',
            'address' => 'Address',
            'locationMap' => 'Location Map',
        ];
    }
	
	 /**
     * To display project location by id
     * @param type $username
     * @return type
     */
    public static function findById($projectId) {
        $ProjectLocation = ProjectLocation::find()
                ->where(['id' => $projectId])
                ->one();
        return $ProjectLocation['name'];
    }
    
    /*
     * To upload multiple files
     */
    public static function importCSV($data)
    {
      $connection = \Yii::$app->db; // DB connection
      $result = $connection->createCommand("SELECT code,name FROM ProjectLocation WHERE code = '".$data[0]."' AND name = '".$data[1]."'")->queryAll(); // To get the project locaton code
       if (!$result) {				
                $connection = \Yii::$app->db;
                $result =  $connection->createCommand()
                       ->insert('ProjectLocation', [
                       'code' => $data[0], // 
                        'name' => $data[1], 
                       ])->execute();                            
                
                return true;     
        }else{
            return FALSE; 
         }
    }
}
