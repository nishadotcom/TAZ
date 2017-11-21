<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "taz_user_address".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $street
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $pin_code
 * @property string $address_type
 * @property string $updated_on
 *
 * @property User $user
 */
class UserAddress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'taz_user_address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'street', 'city', 'state', 'country', 'pin_code'], 'required'],
            [['user_id'], 'integer'],
            [['address_type'], 'string'],
            [['updated_on'], 'safe'],
            [['street'], 'string', 'max' => 500],
            [['city'], 'string', 'max' => 150],
            [['state', 'country'], 'string', 'max' => 200],
            [['pin_code'], 'string', 'max' => 10],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'street' => 'Street',
            'city' => 'City',
            'state' => 'State',
            'country' => 'Country',
            'pin_code' => 'Pin Code',
            'address_type' => 'Address Type',
            'updated_on' => 'Updated On',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public static function insertAddressOnSignup($userid){
        $tableName  = static::tableName();
        //$columnNameArray=['user_id','street','city','state','country','pin_code','address_type'];
        $columnNameArray = ['user_id','address_type'];
        $bulkInsertArray[] = [$userid, 'Billing']; 
        $bulkInsertArray[] = [$userid, 'Shipping'];
        // below line insert all your record and return number of rows inserted
        $insertResutl = Yii::$app->db->createCommand()->batchInsert($tableName, $columnNameArray, $bulkInsertArray)->execute();
        return ($insertResutl) ? TRUE : FALSE;
    }
}
