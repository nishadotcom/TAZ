<?php

namespace app\Modules\defaults\models;

use Yii;

/**
 * This is the model class for table "SubDepartment".
 *
 * @property integer $id
 * @property integer $deptId
 * @property string $code
 * @property string $name
 *
 * @property Department $dept
 */
class SubDepartment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'SubDepartment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['deptId','name'], 'required'],
            [['deptId'], 'integer'],
           // [['code'], 'string', 'max' => 10],
            [['name'], 'string', 'max' => 50],
            //[['code', 'name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'deptId' => 'Department',
            //'code' => 'Code',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDept()
    {
        return $this->hasOne(Department::className(), ['id' => 'deptId']);
    }
    /*
     * To upload multiple files
     */
    public static function importCSV($data)
    {
      $connection = \Yii::$app->db; // DB connection
        $departmentId = $connection->createCommand("SELECT id FROM Department WHERE name = '".$data[0]."'")->queryAll(); // To get the department name from the department to check
        $result = $connection->createCommand("SELECT name FROM  SubDepartment WHERE name = '".$data[1]."'")->queryAll(); // To get the sub department code
        if (!$result && $departmentId) {	
                 $connection = \Yii::$app->db;
                 $result =  $connection->createCommand()
                       ->insert('SubDepartment', [
                       'deptId' => $departmentId[0]['id'],    
                       //'code' => $data[1], // 
                        'name' => $data[1], 
                       ])->execute();                            
                
                return true;     
        }else{
            return FALSE; 
         }
    }
}
