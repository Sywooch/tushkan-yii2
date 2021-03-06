<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "phpbb3_users".
 *
 * @property integer $user_id
 * @property integer $user_type
 * @property integer $group_id
 * @property string $user_permissions
 * @property integer $user_perm_from
 * @property string $user_ip
 * @property integer $user_regdate
 * @property string $username
 * @property string $username_clean
 * @property string $user_password
 * @property integer $user_passchg
 * @property integer $user_pass_convert
 * @property string $user_email
 * @property integer $user_email_hash
 * @property string $user_birthday
 * @property integer $user_lastvisit
 * @property integer $user_lastmark
 * @property integer $user_lastpost_time
 * @property string $user_lastpage
 * @property string $user_last_confirm_key
 * @property integer $user_last_search
 * @property integer $user_warnings
 * @property integer $user_last_warning
 * @property integer $user_login_attempts
 * @property integer $user_inactive_reason
 * @property integer $user_inactive_time
 * @property integer $user_posts
 * @property string $user_lang
 * @property string $user_timezone
 * @property integer $user_dst
 * @property string $user_dateformat
 * @property integer $user_style
 * @property integer $user_rank
 * @property string $user_colour
 * @property integer $user_new_privmsg
 * @property integer $user_unread_privmsg
 * @property integer $user_last_privmsg
 * @property integer $user_message_rules
 * @property integer $user_full_folder
 * @property integer $user_emailtime
 * @property integer $user_topic_show_days
 * @property string $user_topic_sortby_type
 * @property string $user_topic_sortby_dir
 * @property integer $user_post_show_days
 * @property string $user_post_sortby_type
 * @property string $user_post_sortby_dir
 * @property integer $user_notify
 * @property integer $user_notify_pm
 * @property integer $user_notify_type
 * @property integer $user_allow_pm
 * @property integer $user_allow_viewonline
 * @property integer $user_allow_viewemail
 * @property integer $user_allow_massemail
 * @property integer $user_options
 * @property string $user_avatar
 * @property integer $user_avatar_type
 * @property integer $user_avatar_width
 * @property integer $user_avatar_height
 * @property string $user_sig
 * @property string $user_sig_bbcode_uid
 * @property string $user_sig_bbcode_bitfield
 * @property string $user_from
 * @property string $user_icq
 * @property string $user_aim
 * @property string $user_yim
 * @property string $user_msnm
 * @property string $user_jabber
 * @property string $user_website
 * @property string $user_occ
 * @property string $user_interests
 * @property string $user_actkey
 * @property string $user_newpasswd
 * @property string $user_form_salt
 * @property integer $user_new
 * @property integer $user_reminded
 * @property integer $user_reminded_time
 * @property integer $user_gender
 * @property integer $user_rating_positive
 * @property integer $user_rating_negative
 */
class Phpbb3Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'phpbb3_users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_type', 'group_id', 'user_perm_from', 'user_regdate', 'user_passchg', 'user_pass_convert', 'user_email_hash', 'user_lastvisit', 'user_lastmark', 'user_lastpost_time', 'user_last_search', 'user_warnings', 'user_last_warning', 'user_login_attempts', 'user_inactive_reason', 'user_inactive_time', 'user_posts', 'user_dst', 'user_style', 'user_rank', 'user_new_privmsg', 'user_unread_privmsg', 'user_last_privmsg', 'user_message_rules', 'user_full_folder', 'user_emailtime', 'user_topic_show_days', 'user_post_show_days', 'user_notify', 'user_notify_pm', 'user_notify_type', 'user_allow_pm', 'user_allow_viewonline', 'user_allow_viewemail', 'user_allow_massemail', 'user_options', 'user_avatar_type', 'user_avatar_width', 'user_avatar_height', 'user_new', 'user_reminded', 'user_reminded_time', 'user_gender', 'user_rating_positive', 'user_rating_negative'], 'integer'],
            [['user_permissions', 'user_sig', 'user_occ', 'user_interests'], 'required'],
            [['user_permissions', 'user_sig', 'user_occ', 'user_interests'], 'string'],
            [['user_timezone'], 'number'],
            [['user_ip', 'user_password', 'user_newpasswd'], 'string', 'max' => 40],
            [['username', 'username_clean', 'user_avatar', 'user_sig_bbcode_bitfield', 'user_aim', 'user_yim', 'user_msnm', 'user_jabber'], 'string', 'max' => 255],
            [['user_email', 'user_from'], 'string', 'max' => 100],
            [['user_birthday', 'user_last_confirm_key'], 'string', 'max' => 10],
            [['user_lastpage', 'user_website'], 'string', 'max' => 200],
            [['user_lang', 'user_dateformat'], 'string', 'max' => 30],
            [['user_colour'], 'string', 'max' => 6],
            [['user_topic_sortby_type', 'user_topic_sortby_dir', 'user_post_sortby_type', 'user_post_sortby_dir'], 'string', 'max' => 1],
            [['user_sig_bbcode_uid'], 'string', 'max' => 8],
            [['user_icq'], 'string', 'max' => 15],
            [['user_actkey', 'user_form_salt'], 'string', 'max' => 32],
            [['username_clean'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'user_type' => 'User Type',
            'group_id' => 'Group ID',
            'user_permissions' => 'User Permissions',
            'user_perm_from' => 'User Perm From',
            'user_ip' => 'User Ip',
            'user_regdate' => 'User Regdate',
            'username' => 'Username',
            'username_clean' => 'Username Clean',
            'user_password' => 'User Password',
            'user_passchg' => 'User Passchg',
            'user_pass_convert' => 'User Pass Convert',
            'user_email' => 'User Email',
            'user_email_hash' => 'User Email Hash',
            'user_birthday' => 'User Birthday',
            'user_lastvisit' => 'User Lastvisit',
            'user_lastmark' => 'User Lastmark',
            'user_lastpost_time' => 'User Lastpost Time',
            'user_lastpage' => 'User Lastpage',
            'user_last_confirm_key' => 'User Last Confirm Key',
            'user_last_search' => 'User Last Search',
            'user_warnings' => 'User Warnings',
            'user_last_warning' => 'User Last Warning',
            'user_login_attempts' => 'User Login Attempts',
            'user_inactive_reason' => 'User Inactive Reason',
            'user_inactive_time' => 'User Inactive Time',
            'user_posts' => 'User Posts',
            'user_lang' => 'User Lang',
            'user_timezone' => 'User Timezone',
            'user_dst' => 'User Dst',
            'user_dateformat' => 'User Dateformat',
            'user_style' => 'User Style',
            'user_rank' => 'User Rank',
            'user_colour' => 'User Colour',
            'user_new_privmsg' => 'User New Privmsg',
            'user_unread_privmsg' => 'User Unread Privmsg',
            'user_last_privmsg' => 'User Last Privmsg',
            'user_message_rules' => 'User Message Rules',
            'user_full_folder' => 'User Full Folder',
            'user_emailtime' => 'User Emailtime',
            'user_topic_show_days' => 'User Topic Show Days',
            'user_topic_sortby_type' => 'User Topic Sortby Type',
            'user_topic_sortby_dir' => 'User Topic Sortby Dir',
            'user_post_show_days' => 'User Post Show Days',
            'user_post_sortby_type' => 'User Post Sortby Type',
            'user_post_sortby_dir' => 'User Post Sortby Dir',
            'user_notify' => 'User Notify',
            'user_notify_pm' => 'User Notify Pm',
            'user_notify_type' => 'User Notify Type',
            'user_allow_pm' => 'User Allow Pm',
            'user_allow_viewonline' => 'User Allow Viewonline',
            'user_allow_viewemail' => 'User Allow Viewemail',
            'user_allow_massemail' => 'User Allow Massemail',
            'user_options' => 'User Options',
            'user_avatar' => 'User Avatar',
            'user_avatar_type' => 'User Avatar Type',
            'user_avatar_width' => 'User Avatar Width',
            'user_avatar_height' => 'User Avatar Height',
            'user_sig' => 'User Sig',
            'user_sig_bbcode_uid' => 'User Sig Bbcode Uid',
            'user_sig_bbcode_bitfield' => 'User Sig Bbcode Bitfield',
            'user_from' => 'User From',
            'user_icq' => 'User Icq',
            'user_aim' => 'User Aim',
            'user_yim' => 'User Yim',
            'user_msnm' => 'User Msnm',
            'user_jabber' => 'User Jabber',
            'user_website' => 'User Website',
            'user_occ' => 'User Occ',
            'user_interests' => 'User Interests',
            'user_actkey' => 'User Actkey',
            'user_newpasswd' => 'User Newpasswd',
            'user_form_salt' => 'User Form Salt',
            'user_new' => 'User New',
            'user_reminded' => 'User Reminded',
            'user_reminded_time' => 'User Reminded Time',
            'user_gender' => 'User Gender',
            'user_rating_positive' => 'User Rating Positive',
            'user_rating_negative' => 'User Rating Negative',
        ];
    }
}
