<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news_blocks".
 *
 * @property integer $id
 * @property integer $id_category_news
 * @property string $title_main
 * @property string $title_up
 * @property string $title_down
 * @property string $meta_keywords
 * @property string $meta_description
 */
class NewsBlocks extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news_blocks';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_category_news', 'title_main', 'title_up', 'title_down', 'meta_keywords', 'meta_description'], 'required'],
            [['id_category_news'], 'integer'],
            [['title_main', 'title_up', 'title_down', 'meta_keywords', 'meta_description'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_category_news' => 'Id Category News',
            'title_main' => 'Title Main',
            'title_up' => 'Title Up',
            'title_down' => 'Title Down',
            'meta_keywords' => 'Meta Keywords',
            'meta_description' => 'Meta Description',
        ];
    }
}
