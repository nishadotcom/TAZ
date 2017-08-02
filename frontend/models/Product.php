<?php
namespace app\models;
use Yii;
use backend\models\Category;

/**
 * This is the model class for table "taz_product".
 *
 * @property integer $id
 * @property integer $product_category_id
 * @property integer $product_subcategory_id
 * @property string $product_code
 * @property string $product_name
 * @property integer $product_owner_id
 * @property string $product_price
 * @property string $product_sale_price
 * @property string $product_retail_price
 * @property string $product_material
 * @property string $product_color
 * @property string $product_dimension_type
 * @property string $product_height
 * @property string $product_length
 * @property string $product_breadth
 * @property string $product_weight
 * @property string $product_short_description
 * @property string $product_long_description
 * @property string $product_discount_status
 * @property string $product_guarantee_status
 * @property string $product_status
 * @property string $created_on
 * @property string $updated_on
 *
 * @property Category $productCategory
 * @property User $productOwner
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'taz_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_category_id', 'product_code', 'product_name', 'product_owner_id', 'product_material', 'product_color', 'created_on'], 'required'],
            [['product_category_id', 'product_subcategory_id', 'product_owner_id'], 'integer'],
            [['product_code', 'product_name', 'product_dimension_type', 'product_short_description', 'product_long_description', 'product_discount_status', 'product_guarantee_status', 'product_status'], 'string'],
            [['product_price', 'product_sale_price', 'product_retail_price', 'product_height', 'product_length', 'product_breadth', 'product_weight'], 'number'],
            [['created_on', 'updated_on'], 'safe'],
            [['product_material'], 'string', 'max' => 600],
            [['product_color'], 'string', 'max' => 30],
            [['product_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['product_category_id' => 'id']],
            [['product_owner_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['product_owner_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_category_id' => 'Product Category ID',
            'product_subcategory_id' => 'Product Subcategory ID',
            'product_code' => 'Product Code',
            'product_name' => 'Product Name',
            'product_owner_id' => 'Product Owner ID',
            'product_price' => 'Product Price',
            'product_sale_price' => 'Product Sale Price',
            'product_retail_price' => 'Product Retail Price',
            'product_material' => 'Product Material',
            'product_color' => 'Product Color',
            'product_dimension_type' => 'Product Dimension Type',
            'product_height' => 'Product Height',
            'product_length' => 'Product Length',
            'product_breadth' => 'Product Breadth',
            'product_weight' => 'Product Weight',
            'product_short_description' => 'Product Short Description',
            'product_long_description' => 'Product Long Description',
            'product_discount_status' => 'Product Discount Status',
            'product_guarantee_status' => 'Product Guarantee Status',
            'product_status' => 'Product Status',
            'created_on' => 'Created On',
            'updated_on' => 'Updated On',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'product_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductOwner()
    {
        return $this->hasOne(User::className(), ['id' => 'product_owner_id']);
    }
}
