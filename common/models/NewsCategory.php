<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "nw_nw".
 *
 * @property integer $id
 * @property string $position
 * @property string $num_data
 * @property string $name
 * @property string $description
 */
class NewsCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nw_nw';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'position', 'num_data', 'name', 'description'], 'required'],
            [['id'], 'integer'],
            [['position', 'num_data', 'name', 'description'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'position' => 'Position',
            'num_data' => 'Num Data',
            'name' => 'Name',
            'description' => 'Description',
        ];
    }
}
