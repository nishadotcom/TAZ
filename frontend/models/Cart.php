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
class Cart extends \yii\db\ActiveRecord {
    public $cartDelete;
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'taz_cart';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            //[['cart_user_id', 'cart_product_category_name', 'cart_product_id', 'cart_product_code', 'cart_product_name', 'cart_product_seo', 'cart_product_owner_id', 'cart_product_material', 'cart_product_color', 'cart_added_on'], 'required'],
                [['cart_user_id', 'cart_product_id', 'cart_product_owner_id', 'cart_product_quantity'], 'integer'],
                [['cart_product_code', 'cart_product_name', 'cart_product_seo', 'cart_product_dimension_type', 'cart_product_short_description', 'cart_product_long_description', 'product_available_status'], 'string'],
                [['cart_product_price', 'cart_product_height', 'cart_product_length', 'cart_product_breadth', 'cart_product_weight'], 'number'],
                [['cart_added_on', 'cart_product_image'], 'safe'],
                [['cart_product_category_name', 'cart_product_subcategory_NAME'], 'string', 'max' => 100],
                [['cart_product_material'], 'string', 'max' => 600],
                [['cart_product_color'], 'string', 'max' => 30],
                [['cart_product_discount'], 'string', 'max' => 6],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'cart_user_id' => 'User',
            'cart_product_category_name' => 'Category Name',
            'cart_product_subcategory_NAME' => 'Subcategory  Name',
            'cart_product_id' => 'Product ID',
            'cart_product_code' => 'Product Code',
            'cart_product_name' => 'Product Name',
            'cart_product_seo' => 'Product Seo',
            'cart_product_owner_id' => 'Product Owner',
            'cart_product_price' => 'Product Price',
            'cart_product_material' => 'Product Material',
            'cart_product_color' => 'Product Color',
            'cart_product_dimension_type' => 'Dimension',
            'cart_product_height' => 'Height',
            'cart_product_length' => 'Length',
            'cart_product_breadth' => 'Breadth',
            'cart_product_weight' => 'Weight',
            'cart_product_short_description' => 'Product Short Description',
            'cart_product_long_description' => 'Description',
            'cart_product_discount' => 'Discount',
            'cart_product_quantity' => 'Quantity',
            'product_available_status' => 'Product Available Status',
            'cart_added_on' => 'Cart Added On',
        ];
    }
    
    /**
     * This method handles to get total cart amount
     * **/
    public static function getCartTotal($provider, $columnName) {
        $total = 0;
        foreach ($provider as $item) {
            $total += $item[$columnName];
        }
        return '$ '.$total;
    }

    public static function getCount(){
        $data = Cart::find()->where(['cart_user_id'=>Yii::$app->user->id])->count();
        return $data;
    }
    
    public static function getUserCart(){
        $data = [];
        if(!Yii::$app->user->isGuest){
            $data = Cart::find()->select(['cart_product_id'])->where(['cart_user_id'=>Yii::$app->user->id])->asArray()->all();
        }
        return $data;
    }
    
    public static function removeCartItem($id){
        $cart   = Cart::findOne($id);
        $result = $cart->delete();
        $data   = Cart::getUserCart();
        $return['cartItems'] = ($data) ? $data : [];
        if($result){
            $return['result'] = TRUE;
        }else{
            $return['result'] = FALSE;
        }
        
        return $return;
    }
    
}// End of class
