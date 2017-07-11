<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "taz_slideshow".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $image_name
 * @property string $status
 * @property integer $order_by
 * @property string $created_on
 * @property string $modified_on
 */
class Slideshow extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'taz_slideshow';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'image_name', 'created_on'], 'required'],
            [['title', 'description', 'status'], 'string'],
            [['order_by'], 'integer'],
            [['created_on', 'modified_on'], 'safe'],
            [['image_name'], 'string', 'max' => 350],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'image_name' => 'Image Name',
            'status' => 'Status',
            'order_by' => 'Order By',
            'created_on' => 'Created On',
            'modified_on' => 'Modified On',
        ];
    }
}
