<?php

namespace backend\models;

use Yii;
use frontend\models\User;

/**
 * This is the model class for table "taz_feature_seller".
 *
 * @property int $id
 * @property int $seller_id
 * @property string $date_from
 * @property string $date_to
 * @property string $status
 * @property string $created_on
 */
class FeatureSeller extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'taz_feature_seller';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['seller_id', 'status'], 'required'],
            [['seller_id'], 'integer'],
            [['date_from', 'date_to', 'created_on'], 'safe'],
            [['status'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'seller_id' => 'Seller Name',
            'date_from' => 'Date From',
            'date_to' => 'Date To',
            'status' => 'Status',
            'created_on' => 'Created On',
        ];
    }

    public function getSellerDetail()
    {
        return $this->hasOne(User::className(), ['id' => 'seller_id']);
    }
}
