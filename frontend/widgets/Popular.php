<?php

namespace frontend\widgets;
use yii\base\Widget;
use yii\db\Expression;
use \common\models\Settings;
use \common\models\News;

class Popular extends Widget {
    public $type = 'films';
    public $number = 5;

    public $beforeTime = '-37 days';

    private function getOrder(){
        return Settings::find()->where(['key'=>'sort_popular_films'])->one()->value;
    }

    private function getLimit(){
        return Settings::find()->where(['key'=>'limit_popular_films'])->one()->value;
    }

    public function getFilms(){

        $models = News::find()->where(['BETWEEN', 'addtime', strtotime($this->beforeTime), time()])
        ->andWhere(['IN', 'catID', [8,26,17,2,16,6,18,24,10,5,13,15,9,1]])
        ->orderBy($this->getOrder().' DESC')
        ->limit($this->number)->all();

        return $models;
    }

    public function getItemsByCat($cat = 0){
        $models = News::find()->where(['BETWEEN', 'addtime', strtotime($this->beforeTime), time()])
        ->andWhere(['catID' => $cat])
        ->orderBy($this->getOrder().' DESC')
        ->limit($this->number)->all();

        return $models;
    }

    function run() {
        switch ($this->type):
            case 'films': $models = $this->getFilms(); break;
            case 'serials': $models = $this->getItemsByCat(7);  break;
            case 'mults': $models = $this->getItemsByCat(20);  break;
            case 'casts': $models = $this->getItemsByCat(3);  break;
        endswitch;
        

        return $this->render('popular',compact('models'));
    }
}