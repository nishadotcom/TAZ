<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "taz_tag".
 *
 * @property integer $id
 * @property string $tag_name
 * @property string $created_on
 * @property string $updated_on
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'taz_tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tag_name', 'created_on'], 'required'],
            [['created_on', 'updated_on'], 'safe'],
            [['tag_name'], 'string', 'max' => 400],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tag_name' => 'Tag Name',
            'created_on' => 'Created On',
            'updated_on' => 'Updated On',
        ];
    }
}
