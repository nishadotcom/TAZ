<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "taz_on_sale".
 *
 * @property int $id
 * @property int $on_sale_product_id
 * @property double $discount
 * @property string $status
 * @property string $created_on
 *
 * @property Product $onSaleProduct
 */
class OnSale extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'taz_on_sale';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['on_sale_product_id', 'created_on', 'discount'], 'required'],
            [['on_sale_product_id'], 'integer'],
            [['discount'], 'number'],
            [['status'], 'string'],
            [['created_on'], 'safe'],
            //[['on_sale_product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['on_sale_product_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'on_sale_product_id' => 'On Sale Product ID',
            'discount' => 'Discount',
            'status' => 'Status',
            'created_on' => 'Created On',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOnSaleProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'on_sale_product_id']);
    }
}
