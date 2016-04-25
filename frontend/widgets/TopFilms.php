<?php

namespace frontend\widgets;
use yii\base\Widget;
use yii\db\Expression;

class TopFilms extends Widget {
    public $number = 5;

    function run() {
        $string = \common\models\Settings::find()->where(['key'=>'top_film'])->one()->value;
        $array = explode(',', $string);
        shuffle($array);

        $models = \common\models\News::find()
        ->select(['id', 'addtime', 'title', 'other1', 'sbscr', 'catID'])
        ->where(['IN', 'id', $array])->limit(5)->orderBy(new Expression('rand()'))->asArray()->all();

        return $this->render('topfilms',compact('models'));
    }
}