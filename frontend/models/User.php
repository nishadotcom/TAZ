<?php
namespace frontend\models;
use Yii;
/**
 * This is the model class for table "taz_user".
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $mobile
 * @property string $password
 * @property string $auth_key
 * @property string $registered_mode
 * @property string $profile_image
 * @property string $profile_status
 * @property integer $product_count
 * @property string $user_loyalty
 * @property string $user_type
 * @property string $status
 * @property string $registration_ip
 * @property string $created_on
 * @property string $updated_on
 *
 * @property UserBankAccountDetail[] $userBankAccountDetails
 * @property UserContactDetail[] $userContactDetails
 * @property UserDetail[] $userDetails
 * @property UserPaymentDetail[] $userPaymentDetails
 */
class User extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'taz_user';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email', 'mobile', 'password', 'created_on'], 'required'],
            [['registered_mode', 'profile_image', 'profile_status', 'user_loyalty', 'user_type', 'status'], 'string'],
            [['product_count'], 'integer'],
            [['created_on', 'updated_on'], 'safe'],
            [['username', 'email'], 'string', 'max' => 500],
            [['mobile', 'registration_ip'], 'string', 'max' => 15],
            [['password', 'auth_key'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'mobile' => 'Mobile',
            'password' => 'Password',
            'auth_key' => 'Auth Key',
            'registered_mode' => 'Registered Mode',
            'profile_image' => 'Profile Image',
            'profile_status' => 'Profile Status',
            'product_count' => 'Product Count',
            'user_loyalty' => 'User Loyalty',
            'user_type' => 'User Type',
            'status' => 'Status',
            'registration_ip' => 'Registration Ip',
            'created_on' => 'Created On',
            'updated_on' => 'Updated On',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserBankAccountDetails()
    {
        return $this->hasMany(UserBankAccountDetail::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserContactDetails()
    {
        return $this->hasMany(UserContactDetail::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserDetails()
    {
        return $this->hasMany(UserDetail::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserPaymentDetails()
    {
        return $this->hasMany(UserPaymentDetail::className(), ['user_id' => 'id']);
    }
}
