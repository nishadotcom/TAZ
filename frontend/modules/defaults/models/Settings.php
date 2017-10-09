<?php

namespace app\Modules\defaults\models;

use Yii;

/**
 * This is the model class for table "Settings".
 *
 * @property integer $id
 * @property string $name
 * @property string $title
 * @property string $value
 */
class Settings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Settings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'title', 'value'], 'required'],
            [['name', 'title'], 'string', 'max' => 50],
            [['value'], 'string', 'max' => 255],
          [['name', 'value'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'title' => 'Title',
            'value' => 'Value',
        ];
    }
     /*
     * To upload multiple files
     */
    public static function importCSV($data)
    {
      $connection = \Yii::$app->db; // DB connection
      $result = $connection->createCommand("SELECT name FROM Settings WHERE name = '".$data[0]."'")->queryAll(); // To get the name
       if (!$result) {				
                $connection = \Yii::$app->db;
                $result =  $connection->createCommand()
                       ->insert('Settings', [
                       'name' => $data[0], // 
                       'title' => $data[1], //  
                       'value' => $data[2],
                       ])->execute();                            
                
                return true;     
        }else{
            return FALSE; 
         }
    }
}
