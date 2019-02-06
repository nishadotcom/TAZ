<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "taz_product_address".
 *
 * @property integer $id
 * @property integer $product_id
 * @property string $street
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $pin_code
 *
 * @property Product $product
 */
class ProductAddress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'taz_product_address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['state', 'city', 'country', 'pin_code'], 'required'],
            [['product_id'], 'integer'],
            [['street'], 'string', 'max' => 500],
            [['city'], 'string', 'max' => 150],
            [['state', 'country'], 'string', 'max' => 200],
            [['pin_code'], 'string', 'max' => 10],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'street' => 'Street',
            'city' => 'City',
            'state' => 'State',
            'country' => 'Country',
            'pin_code' => 'Pincode',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
