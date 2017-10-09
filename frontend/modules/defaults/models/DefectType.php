<?php

namespace app\Modules\defaults\models;

use Yii;

/**
 * This is the model class for table "DefectType".
 *
 * @property integer $id
 * @property string $name
 * @property integer $durationToFix
 */
class DefectType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'DefectType';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 25],	
            //[['durationToFix'],'integer','message'=> Yii::t("app","Duration To Fix should be in days.")],
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
            //'durationToFix' => 'Duration To Fix',
        ];
    }
	
	/**
     * To display Defect Type by id
     * @param type $username
     * @return type
     */
    public static function findById($id) {
        $result = self::find()
                ->where(['id' => $id])
                ->one();
        return $result['name'];
    }
     /*
     * To upload multiple files
     */
    public static function importCSV($data)
    {
      $connection = \Yii::$app->db; // DB connection
      $result = $connection->createCommand("SELECT name FROM DefectType WHERE name = '".$data[0]."'")->queryAll(); // To get the name,durationToFix 
       if (!$result) {				
                $connection = \Yii::$app->db;
                $result =  $connection->createCommand()
                       ->insert('DefectType', [
                       'name' => $data[0], // 
                       //'durationToFix' => $data[1], 
                       ])->execute();                            
                
                return true;     
        }else{
            return FALSE; 
         }
    }
}
