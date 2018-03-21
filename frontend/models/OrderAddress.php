<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "taz_order_address".
 *
 * @property int $id
 * @property int $order_id
 * @property string $name
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $pin_code
 * @property string $phone
 * @property string $address_type
 * @property string $created_on
 *
 * @property Order $order
 */
class OrderAddress extends \yii\db\ActiveRecord
{
    public $billingName;
    public $billingAddress;
    public $billingCity;
    public $billingState;
    public $billingCountry;
    public $billingPincode;
    public $billingPhone;
    public $guestEmail;
    public $guestName;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'taz_order_address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'name', 'address', 'city', 'state', 'country', 'pin_code', 'phone', 'billingName', 'billingAddress', 'billingCity', 'billingState', 'billingCountry', 'billingPincode', 'billingPhone'], 'required'],
            [['order_id', 'name', 'address', 'city', 'state', 'country', 'pin_code', 'phone', 'billingName', 'billingAddress', 'billingCity', 'billingState', 'billingCountry', 'billingPincode', 'billingPhone', 'guestEmail', 'guestName'], 'required', 'on'=>'guestOrder'],
            [['order_id'], 'integer'],
            [['address_type'], 'string'],
            [['created_on'], 'safe'],
            [['name'], 'string', 'max' => 250],
            [['address'], 'string', 'max' => 500],
            [['city'], 'string', 'max' => 150],
            [['state', 'country'], 'string', 'max' => 200],
            [['pin_code'], 'string', 'max' => 10],
            [['phone'], 'string', 'max' => 15],
            [['guestEmail'], 'email'],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'name' => 'Name',
            'address' => 'Address',
            'city' => 'City',
            'state' => 'State',
            'country' => 'Country',
            'pin_code' => 'Zip Code',
            'phone' => 'Phone',
            'address_type' => 'Address Type',
            'created_on' => 'Created On',
            'billingName' => 'Name',
            'billingAddress' => 'Address',
            'billingCity' => 'City',
            'billingState' => 'State',
            'billingCountry' => 'Country',
            'billingPincode' => 'Zip Code',
            'billingPhone' => 'Phone',
            'guestEmail'=> 'Email',
            'guestName'=> 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }
}
