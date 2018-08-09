<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "taz_order_detail".
 *
 * @property int $id
 * @property int $order_id
 * @property string $category_name
 * @property string $subcategory_name Subcategory is not required now. It is future enhancement
 * @property int $product_id Refers to Product table id
 * @property string $product_code
 * @property string $product_name
 * @property string $product_seo
 * @property int $product_owner_id
 * @property string $seller_name
 * @property string $product_price
 * @property string $product_material
 * @property string $product_color
 * @property string $product_height
 * @property string $product_length
 * @property string $product_breadth
 * @property string $product_weight Weight is in KG
 * @property string $product_description
 * @property string $created_on
 *
 * @property Order $order
 * @property Product $product
 */
class OrderDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'taz_order_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'category_name', 'product_id', 'product_code', 'product_name', 'product_seo', 'product_owner_id', 'seller_name', 'product_material', 'product_color', 'created_on'], 'required'],
            [['order_id', 'product_id', 'product_owner_id'], 'integer'],
            [['product_code', 'product_name', 'product_seo', 'product_description'], 'string'],
            [['product_price', 'product_height', 'product_length', 'product_breadth', 'product_weight'], 'number'],
            [['created_on'], 'safe'],
            [['category_name', 'subcategory_name'], 'string', 'max' => 100],
            [['seller_name'], 'string', 'max' => 250],
            [['product_material'], 'string', 'max' => 600],
            [['product_color'], 'string', 'max' => 30],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id' => 'id']],
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
            'order_id' => 'Order ID',
            'category_name' => 'Category Name',
            'subcategory_name' => 'Subcategory Name',
            'product_id' => 'Product ID',
            'product_code' => 'Product Code',
            'product_name' => 'Product Name',
            'product_seo' => 'Product Seo',
            'product_owner_id' => 'Product Owner ID',
            'seller_name' => 'Seller Name',
            'product_price' => 'Product Price',
            'product_material' => 'Product Material',
            'product_color' => 'Product Color',
            'product_height' => 'Product Height',
            'product_length' => 'Product Length',
            'product_breadth' => 'Product Breadth',
            'product_weight' => 'Product Weight',
            'product_description' => 'Product Description',
            'created_on' => 'Created On',
        ];
    }

    public function orderTotalAmountbyOrderId($orderId){
        $query = OrderDetail::find()->where(['order_id'=>$orderId]);
        $totalAmount = $query->sum('product_price');
        return $totalAmount;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    public function getProductImages()
    {
        return $this->hasMany(ProductImage::className(), ['product_id' => 'product_id']);
    }
}
