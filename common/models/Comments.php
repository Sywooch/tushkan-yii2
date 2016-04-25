<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property integer $commentID
 * @property integer $moduleID
 * @property integer $materialID
 * @property string $pending
 * @property integer $addTime
 * @property string $user
 * @property string $name
 * @property string $email
 * @property string $www
 * @property string $ip
 * @property string $message
 * @property string $answer
 * @property integer $userID
 * @property integer $parentID
 * @property string $rate
 * @property string $rateUserIDs
 * @property integer $answerCount
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['moduleID', 'materialID', 'addTime', 'userID', 'parentID', 'answerCount'], 'integer'],
            [['pending', 'user', 'name', 'email', 'www', 'ip', 'message', 'answer', 'rate', 'rateUserIDs'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'commentID' => 'Comment ID',
            'moduleID' => 'Module ID',
            'materialID' => 'Material ID',
            'pending' => 'Pending',
            'addTime' => 'Add Time',
            'user' => 'User',
            'name' => 'Name',
            'email' => 'Email',
            'www' => 'Www',
            'ip' => 'Ip',
            'message' => 'Message',
            'answer' => 'Answer',
            'userID' => 'User ID',
            'parentID' => 'Parent ID',
            'rate' => 'Rate',
            'rateUserIDs' => 'Rate User Ids',
            'answerCount' => 'Answer Count',
        ];
    }

    public function getParent() {
        if($this->moduleID == 3){
            return $this->hasOne(\common\models\Publ::className(), ['id'=>'materialID']);
        } else if($this->moduleID == 2){
            return $this->hasOne(\common\models\News::className(), ['id'=>'materialID']);
        }
    }

}
