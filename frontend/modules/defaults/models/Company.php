<?php

namespace app\Modules\defaults\models;

use Yii;

/**
 * This is the model class for table "Company".
 *
 * @property integer $id
 * @property string $name
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100],
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
            'name' => 'Name',
        ];
    }
     /*
     * To upload multiple files
     */
    public static function importCSV($data)
    {
         $connection = \Yii::$app->db; // DB connection
         $result = $connection->createCommand("SELECT name FROM Company WHERE name = '".$data[0]."'")->queryAll(); //to get company name
        if (!$result) {				
                $connection = \Yii::$app->db;
                $result =  $connection->createCommand()
                       ->insert('Company', [
                       'name' => $data[0], 
                       ])->execute();                            
                    return true;     
        }
    }
    
     /**
     * To display contractor name by id
     * @param type $username
     * @return type
     */
    public static function findById($Id) {
        $company = Company::find()
                ->where(['id' => $Id])
                ->one();
        return $company['name'];
    }
    
}
