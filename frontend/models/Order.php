<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "taz_order".
 *
 * @property int $id
 * @property int $user_id
 * @property string $order_code
 * @property string $total_amount
 * @property string $payment_status
 * @property string $order_status
 * @property string $order_date
 *
 * @property User $user
 * @property OrderAddress[] $orderAddresses
 * @property OrderDetail[] $orderDetails
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'taz_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'order_code', 'payment_status', 'order_status', 'order_date'], 'required'],
            [['user_id'], 'integer'],
            [['total_amount'], 'number'],
            [['payment_status', 'order_status'], 'string'],
            [['order_date'], 'safe'],
            [['order_code'], 'string', 'max' => 24],
            [['order_code'], 'unique'],
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
            'order_code' => 'Order Code',
            'total_amount' => 'Total Amount',
            'payment_status' => 'Payment Status',
            'order_status' => 'Order Status',
            'order_date' => 'Order Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderAddresses()
    {
        return $this->hasMany(OrderAddress::className(), ['order_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderDetails()
    {
        return $this->hasMany(OrderDetail::className(), ['order_id' => 'id']);
    }
}
