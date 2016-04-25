<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property integer $catID
 * @property string $year
 * @property string $month
 * @property string $day
 * @property string $pending
 * @property integer $ontop
 * @property string $com_may
 * @property integer $addtime
 * @property integer $urltime
 * @property string $num_com
 * @property string $author
 * @property string $title
 * @property integer $duration
 * @property string $brief
 * @property string $message
 * @property string $attach
 * @property string $files
 * @property integer $reads1
 * @property string $rating
 * @property string $rate_num
 * @property string $rate_sum
 * @property string $rate_ip
 * @property string $other1
 * @property string $other2
 * @property string $other3
 * @property string $other4
 * @property string $other5
 * @property integer $other6
 * @property string $uid
 * @property string $sbscr
 * @property integer $lastmod
 * @property string $opt
 * @property string $opt1
 * @property string $opt2
 * @property string $opt3
 * @property string $opt4
 * @property integer $hide_on_site
 * @property string $createtime
 * @property string $tags
 * @property string $tags_set
 * @property string $file
 * @property integer $cool
 * @property integer $bad
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['catID', 'ontop', 'addtime', 'createtime', 'tags', 'file'], 'required'],
            [['catID', 'ontop', 'addtime', 'urltime', 'duration', 'reads1', 'other6', 'lastmod', 'hide_on_site', 'cool', 'bad'], 'integer'],
            [['year', 'month', 'day', 'pending', 'com_may', 'num_com', 'author', 'title', 'brief', 'message', 'attach', 'files', 'rating', 'rate_num', 'rate_sum', 'rate_ip', 'other1', 'other2', 'other3', 'other4', 'other5', 'uid', 'sbscr', 'opt', 'opt1', 'opt2', 'opt3', 'opt4', 'tags', 'tags_set'], 'string'],
            [['createtime', 'file'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'catID' => 'Cat ID',
            'year' => 'Year',
            'month' => 'Month',
            'day' => 'Day',
            'pending' => 'Pending',
            'ontop' => 'Ontop',
            'com_may' => 'Com May',
            'addtime' => 'Addtime',
            'urltime' => 'Urltime',
            'num_com' => 'Num Com',
            'author' => 'Author',
            'title' => 'Title',
            'duration' => 'Duration',
            'brief' => 'Brief',
            'message' => 'Message',
            'attach' => 'Attach',
            'files' => 'Files',
            'reads1' => 'Reads1',
            'rating' => 'Rating',
            'rate_num' => 'Rate Num',
            'rate_sum' => 'Rate Sum',
            'rate_ip' => 'Rate Ip',
            'other1' => 'Other1',
            'other2' => 'Other2',
            'other3' => 'Other3',
            'other4' => 'Other4',
            'other5' => 'Other5',
            'other6' => 'Other6',
            'uid' => 'Uid',
            'sbscr' => 'Sbscr',
            'lastmod' => 'Lastmod',
            'opt' => 'Opt',
            'opt1' => 'Opt1',
            'opt2' => 'Opt2',
            'opt3' => 'Opt3',
            'opt4' => 'Opt4',
            'hide_on_site' => 'Hide On Site',
            'createtime' => 'Createtime',
            'tags' => 'Tags',
            'tags_set' => 'Tags Set',
            'file' => 'File',
            'cool' => 'Cool',
            'bad' => 'Bad',
        ];
    }

    public function getCategories() {
        return $this->hasMany(\common\models\NewsCategory::className(), ['id'=>'catID']);
    }
}
