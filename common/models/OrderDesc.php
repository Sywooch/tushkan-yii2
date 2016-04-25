<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "orderlist".
 *
 * @property integer $id
 * @property integer $user
 * @property string $link
 * @property string $title
 * @property string $title_orig
 * @property string $date
 * @property integer $year
 * @property string $category
 * @property integer $rating
 */
class OrderDesc extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orderlist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user', 'link', 'title', 'title_orig', 'year', 'category'], 'required'],
            [['user', 'year', 'rating'], 'integer'],
            [['date'], 'safe'],
            [['link'], 'string', 'max' => 255],
            [['title'], 'string', 'max' => 125],
            [['title_orig'], 'string', 'max' => 150],
            [['category'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user' => 'User',
            'link' => 'Link',
            'title' => 'Title',
            'title_orig' => 'Title Orig',
            'date' => 'Date',
            'year' => 'Year',
            'category' => 'Category',
            'rating' => 'Rating',
        ];
    }

    public function getPuser() {
        return $this->hasOne(\common\models\Phpbb3Users::className(), ['user_id'=>'user']);
    }

}
