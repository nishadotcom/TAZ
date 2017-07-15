<?php
namespace frontend\models;
use Yii;

/**
 * This is the model class for table "taz_user_contact_detail".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $mobile
 * @property string $land_line_number
 * @property string $street
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $pin_code
 *
 * @property User $user
 */
class UserContactDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_contact_detail}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mobile','street','city','state','country','pin_code'], 'required'],
            [['user_id'], 'integer'],
            [['mobile'], 'string', 'max' => 15],
            [['land_line_number'], 'string', 'max' => 25],
            [['street'], 'string', 'max' => 500],
            [['city'], 'string', 'max' => 150],
            [['state', 'country'], 'string', 'max' => 200],
            [['pin_code'], 'string', 'max' => 10],
            //[['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'mobile' => 'Mobile',
            'land_line_number' => 'Land Line Number',
            'street' => 'Street',
            'city' => 'City',
            'state' => 'State',
            'country' => 'Country',
            'pin_code' => 'Pin Code',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
