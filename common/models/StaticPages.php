<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "static_pages".
 *
 * @property integer $id
 * @property string $catID
 * @property string $year
 * @property string $month
 * @property string $day
 * @property string $pending
 * @property string $ontop
 * @property string $com_may
 * @property string $addtime
 * @property string $urltime
 * @property string $num_com
 * @property string $author
 * @property string $title
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
 * @property string $other6
 * @property string $uid
 * @property string $sbscr
 * @property string $lastmod
 * @property string $opt
 * @property string $opt1
 * @property string $opt2
 * @property string $opt3
 * @property string $opt4
 */
class StaticPages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'static_pages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['catID', 'year', 'month', 'day', 'pending', 'ontop', 'com_may', 'addtime', 'urltime', 'num_com', 'author', 'title', 'brief', 'message', 'attach', 'files', 'rating', 'rate_num', 'rate_sum', 'rate_ip', 'other1', 'other2', 'other3', 'other4', 'other5', 'other6', 'uid', 'sbscr', 'lastmod', 'opt', 'opt1', 'opt2', 'opt3', 'opt4'], 'string'],
            [['urltime'], 'required'],
            [['reads1'], 'integer'],
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
        ];
    }
}
