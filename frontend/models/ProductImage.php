<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "taz_product_image".
 *
 * @property integer $id
 * @property integer $product_id
 * @property string $type
 * @property string $file_name
 * @property string $cover_photo
 *
 * @property Product $product
 */
class ProductImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'taz_product_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'cover_photo'], 'required'],
            [['product_id'], 'integer'],
            [['type'], 'string', 'max' => 6],
            //[['file_name', 'cover_photo'], 'string', 'max' => 500],
			[['file_name', 'cover_photo'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'], 
			[['file_name'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4],
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
            'type' => 'Type',
            'file_name' => 'Product Other Images',
            'cover_photo' => 'Product Cover Image',
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
