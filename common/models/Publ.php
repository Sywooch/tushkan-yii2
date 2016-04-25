<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "publ".
 *
 * @property integer $id
 * @property string $sectionID
 * @property integer $catID
 * @property string $sort
 * @property string $ontop
 * @property integer $addtime
 * @property string $pending
 * @property string $com_may
 * @property string $num_com
 * @property string $rating
 * @property string $rate_num
 * @property string $rate_sum
 * @property string $rate_ip
 * @property string $title
 * @property string $brief
 * @property string $user
 * @property string $aname
 * @property string $aemail
 * @property string $asite
 * @property string $source
 * @property string $message
 * @property integer $reads1
 * @property integer $uid
 * @property string $subscription
 * @property string $files
 * @property integer $lastmod
 * @property string $url
 * @property string $other2
 * @property string $other3
 * @property string $other4
 * @property string $other5
 * @property string $other6
 * @property string $other7
 * @property string $other8
 * @property integer $hide_on_site
 * @property string $createtime
 */
class Publ extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'publ';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sectionID', 'sort', 'ontop', 'pending', 'com_may', 'num_com', 'rating', 'rate_num', 'rate_sum', 'rate_ip', 'title', 'brief', 'user', 'aname', 'aemail', 'asite', 'source', 'message', 'subscription', 'files', 'url', 'other2', 'other3', 'other4', 'other5', 'other6', 'other7', 'other8'], 'string'],
            [['catID', 'addtime', 'reads1', 'uid', 'lastmod', 'hide_on_site'], 'integer'],
            [['createtime'], 'required'],
            [['createtime'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sectionID' => 'Section ID',
            'catID' => 'Cat ID',
            'sort' => 'Sort',
            'ontop' => 'Ontop',
            'addtime' => 'Addtime',
            'pending' => 'Pending',
            'com_may' => 'Com May',
            'num_com' => 'Num Com',
            'rating' => 'Rating',
            'rate_num' => 'Rate Num',
            'rate_sum' => 'Rate Sum',
            'rate_ip' => 'Rate Ip',
            'title' => 'Title',
            'brief' => 'Brief',
            'user' => 'User',
            'aname' => 'Aname',
            'aemail' => 'Aemail',
            'asite' => 'Asite',
            'source' => 'Source',
            'message' => 'Message',
            'reads1' => 'Reads1',
            'uid' => 'Uid',
            'subscription' => 'Subscription',
            'files' => 'Files',
            'lastmod' => 'Lastmod',
            'url' => 'Url',
            'other2' => 'Other2',
            'other3' => 'Other3',
            'other4' => 'Other4',
            'other5' => 'Other5',
            'other6' => 'Other6',
            'other7' => 'Other7',
            'other8' => 'Other8',
            'hide_on_site' => 'Hide On Site',
            'createtime' => 'Createtime',
        ];
    }

    public function getCategory(){
        return $this->hasOne(\common\models\PublCat::className(), ['id'=>'catID']);
    }

}
