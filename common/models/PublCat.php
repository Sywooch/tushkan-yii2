<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pu_pu".
 *
 * @property integer $id
 * @property integer $parentID
 * @property string $isGroup
 * @property string $position
 * @property string $num_data
 * @property string $name
 * @property string $descr
 * @property string $who_can_read
 * @property string $who_can_load
 * @property string $who_can_add
 * @property string $password
 */
class PublCat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pu_pu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parentID', 'isGroup', 'position', 'num_data', 'name', 'descr', 'who_can_read', 'who_can_load', 'who_can_add', 'password'], 'required'],
            [['parentID'], 'integer'],
            [['isGroup', 'position', 'num_data', 'name', 'descr', 'who_can_read', 'who_can_load', 'who_can_add', 'password'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parentID' => 'Parent ID',
            'isGroup' => 'Is Group',
            'position' => 'Position',
            'num_data' => 'Num Data',
            'name' => 'Name',
            'descr' => 'Descr',
            'who_can_read' => 'Who Can Read',
            'who_can_load' => 'Who Can Load',
            'who_can_add' => 'Who Can Add',
            'password' => 'Password',
        ];
    }
}
