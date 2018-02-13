<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "taz_order_address_temp".
 *
 * @property int $id
 * @property int $txn_id
 * @property string $name
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $pin_code
 * @property string $phone
 * @property string $address_type
 * @property string $created_on
 */
class OrderAddressTemp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'taz_order_address_temp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['txn_id', 'name'], 'required'],
            //[['txn_id'], 'integer'],
            [['address_type'], 'string'],
            [['created_on'], 'safe'],
            [['name'], 'string', 'max' => 250],
            [['address'], 'string', 'max' => 500],
            [['city'], 'string', 'max' => 150],
            [['state', 'country'], 'string', 'max' => 200],
            [['pin_code'], 'string', 'max' => 10],
            [['phone'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'txn_id' => 'Txn ID',
            'name' => 'Name',
            'address' => 'Address',
            'city' => 'City',
            'state' => 'State',
            'country' => 'Country',
            'pin_code' => 'Pin Code',
            'phone' => 'Phone',
            'address_type' => 'Address Type',
            'created_on' => 'Created On',
        ];
    }
}
