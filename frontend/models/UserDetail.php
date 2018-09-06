<?php
namespace frontend\models;
use common\models\User;
use Yii;
/**
 * This is the model class for table "taz_user_detail".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $my_interest
 * @property string $long_about_me
 *
 * @property User $user
 */
class UserDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_detail}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           [['user_id', 'long_about_me'], 'required'],
           [['user_id'], 'integer'],
           [['my_interest', 'long_about_me'], 'string'],
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
            'my_interest' => 'My Interest',
            'long_about_me' => 'About Me',
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
