<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "taz_user_bank_account_detail".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $account_number
 * @property string $ifsc
 * @property string $pan
 *
 * @property User $user
 */
class UserBankAccountDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'taz_user_bank_account_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'account_number', 'ifsc'], 'required'],
            [['user_id'], 'integer'],
            [['account_number', 'ifsc'], 'string', 'max' => 20],
            [['pan'], 'string', 'max' => 25],
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
            'account_number' => 'Account Number',
            'ifsc' => 'Ifsc',
            'pan' => 'Pan',
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
