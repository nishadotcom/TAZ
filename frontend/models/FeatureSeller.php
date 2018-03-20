<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "taz_feature_seller".
 *
 * @property integer $id
 * @property integer $seller_id
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
            [['seller_id', 'date_from', 'date_to', 'created_on'], 'required'],
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
            'seller_id' => 'Seller ID',
            'date_from' => 'Date From',
            'date_to' => 'Date To',
            'status' => 'Status',
            'created_on' => 'Created On',
        ];
    }
}
