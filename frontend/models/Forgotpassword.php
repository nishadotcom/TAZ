<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "taz_user_forgot_password".
 *
 * @property int $id
 * @property int $user_id
 * @property string $password_key
 * @property string $expire_at
 * @property string $status
 * @property string $created_on
 *
 * @property User $user
 */
class Forgotpassword extends \yii\db\ActiveRecord
{
    public $userEmail;
    public $newPassword;
    public $repeatNewPassword;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'taz_user_forgot_password';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userEmail'], 'required', 'on'=>'createForgorPassword'],
            [['newPassword'], 'required', 'on'=>'updateForgorPassword'],
            [['repeatNewPassword'], 'required', 'message'=>'Retype Password cannot be blank.', 'on'=>'updateForgorPassword'],
            [['user_id'], 'integer'],
            [['expire_at', 'created_on'], 'safe'],
            [['status'], 'string'],
            [['password_key'], 'string', 'max' => 12],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['userEmail'], 'exist', 'skipOnError' => false, 'targetClass' => User::className(), 'targetAttribute' => ['userEmail' => 'email'], 'message'=>'Email does not exist'],
            ['repeatNewPassword', 'compare', 'compareAttribute'=>'newPassword', 'message'=>"Passwords doesn't match" ],
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
            'password_key' => 'Password Key',
            'expire_at' => 'Expire At',
            'status' => 'Status',
            'created_on' => 'Created On',
            'userEmail' => 'Email',
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
