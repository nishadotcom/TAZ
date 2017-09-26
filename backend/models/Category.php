<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "taz_category".
 *
 * @property integer $id
 * @property string $category_name
 * @property string $category_description
 * @property string $category_image
 * @property string $category_status
 * @property string $created_on
 * @property string $updated_on
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_name'], 'required'],
            [['category_image'],'required','on'=>'create'],
            [['category_description', 'category_status'], 'string'],
            [['created_on', 'updated_on'], 'safe'],
            [['category_name'], 'string', 'max' => 150],
            [['category_image'], 'string', 'max' => 500],
            [['category_image'], 'image', 'extensions' =>['jpg', 'png','jpeg']],
            [['category_image'], 'file', 'maxSize' =>1024*1024*2,'tooBig'=> \Yii::t("app", "Maximum File Size {fileSize}",['fileSize' => '2MB'])],
            [['category_name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_name' => 'Category Name',
            'category_description' => 'Category Description',
            'category_image' => 'Category Image',
            'category_status' => 'Category Status',
            'created_on' => 'Created On',
            'updated_on' => 'Updated On',
        ];
    }
}
