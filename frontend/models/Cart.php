<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "taz_cart".
 *
 * @property integer $id
 * @property integer $cart_user_id
 * @property string $cart_product_category_name
 * @property string $cart_product_subcategory_NAME
 * @property integer $cart_product_id
 * @property string $cart_product_code
 * @property string $cart_product_name
 * @property string $cart_product_seo
 * @property integer $cart_product_owner_id
 * @property string $cart_product_price
 * @property string $cart_product_material
 * @property string $cart_product_color
 * @property string $cart_product_dimension_type
 * @property string $cart_product_height
 * @property string $cart_product_length
 * @property string $cart_product_breadth
 * @property string $cart_product_weight
 * @property string $cart_product_short_description
 * @property string $cart_product_long_description
 * @property string $cart_product_discount
 * @property integer $cart_product_quantity
 * @property string $product_available_status
 * @property string $cart_added_on
 */
class Cart extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'taz_cart';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['cart_user_id', 'cart_product_category_name', 'cart_product_id', 'cart_product_code', 'cart_product_name', 'cart_product_seo', 'cart_product_owner_id', 'cart_product_material', 'cart_product_color', 'cart_added_on'], 'required'],
            [['cart_user_id', 'cart_product_id', 'cart_product_owner_id', 'cart_product_quantity'], 'integer'],
            [['cart_product_code', 'cart_product_name', 'cart_product_seo', 'cart_product_dimension_type', 'cart_product_short_description', 'cart_product_long_description', 'product_available_status'], 'string'],
            [['cart_product_price', 'cart_product_height', 'cart_product_length', 'cart_product_breadth', 'cart_product_weight'], 'number'],
            [['cart_added_on'], 'safe'],
            [['cart_product_category_name', 'cart_product_subcategory_NAME'], 'string', 'max' => 100],
            [['cart_product_material'], 'string', 'max' => 600],
            [['cart_product_color'], 'string', 'max' => 30],
            [['cart_product_discount'], 'string', 'max' => 6],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cart_user_id' => 'Cart User ID',
            'cart_product_category_name' => 'Cart Product Category Name',
            'cart_product_subcategory_NAME' => 'Cart Product Subcategory  Name',
            'cart_product_id' => 'Cart Product ID',
            'cart_product_code' => 'Cart Product Code',
            'cart_product_name' => 'Cart Product Name',
            'cart_product_seo' => 'Cart Product Seo',
            'cart_product_owner_id' => 'Cart Product Owner ID',
            'cart_product_price' => 'Cart Product Price',
            'cart_product_material' => 'Cart Product Material',
            'cart_product_color' => 'Cart Product Color',
            'cart_product_dimension_type' => 'Cart Product Dimension Type',
            'cart_product_height' => 'Cart Product Height',
            'cart_product_length' => 'Cart Product Length',
            'cart_product_breadth' => 'Cart Product Breadth',
            'cart_product_weight' => 'Cart Product Weight',
            'cart_product_short_description' => 'Cart Product Short Description',
            'cart_product_long_description' => 'Cart Product Long Description',
            'cart_product_discount' => 'Cart Product Discount',
            'cart_product_quantity' => 'Cart Product Quantity',
            'product_available_status' => 'Product Available Status',
            'cart_added_on' => 'Cart Added On',
        ];
    }
}
