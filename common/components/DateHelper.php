<?php 
namespace common\components;
use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;

class DateHelper extends Component {
    public function formatDate($timestamp){
        $date_time_array = getdate(time());
        $month = $date_time_array['mon'];
        $day = $date_time_array['mday'];
        $year = $date_time_array['year'];
        $date_time_array = getdate($timestamp);
        $month_2 = $date_time_array['mon'];
        $day_2 = $date_time_array['mday'];
        $year_2 = $date_time_array['year'];
        $date_1 = mktime(0,0,0,$month,$day,$year);
        $date_2 = mktime(0,0,0,$month_2,$day_2,$year_2);
        $date_3 = mktime(0,0,0,$month,$day-1,$year);

        if($date_1 == $date_2){
            return "Сегодня ".date('H:i', $timestamp);
        }elseif($date_2 == $date_3){
            return "Вчера ".date('H:i', $timestamp);
        }else{
            return date('d.m.Y, H:i', $timestamp);
        }
    }
}