<?php

namespace app\Modules\defaults\models;

use Yii;

/**
 * This is the model class for table "Department".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Department';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            //[['code'], 'string', 'max' => 10],
            [['name'], 'string', 'max' => 50],			
            [['name'], 'unique']
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
        ];
    }
    
     /*
     * To upload multiple files
     */
    public static function importCSV($data)
    {
      $connection = \Yii::$app->db; // DB connection
      $result = $connection->createCommand("SELECT name FROM Department WHERE name = '".$data[0]."'")->queryAll(); // To get the deparment code
       if (!$result) {				
                $connection = \Yii::$app->db;
                $result =  $connection->createCommand()
                       ->insert('Department', [
                       //'code' => $data[0],  
                        'name' => $data[0], 
                       ])->execute();                            
                
                return true;     
        }else{
            return FALSE; 
         }
    }
}
