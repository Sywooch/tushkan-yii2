<?php
use yii\helpers\Html;
use yii\helpers\StringHelper;

$this->title = $title->title_main;
 ?>

<div class="main_content-news">
    <div class="main-titles"><?=strip_tags($title->title_up)?></div>
    <div class="main_content-news-container">
        <?php foreach($models as $model): 
        $cat_pass = $model->category->password != "" ? $model->category->password."/" : '';
        $href = "/publ/".$cat_pass.$model->url.'/'.$model->catID.'-1-0-'.$model->id; ?>

        <div class="news_main_container-content">
            <a href="<?=$href?>"><h4 class="news_container-content-title"><?=$model->title ?></h4></a>
            <div class="news_container-content">
                <div class="news_container-content-img">
                    <img class="news_container-content-img-sm" src="http://tushkan.tv<?=$model->asite?>" width="150" alt="">
                </div>
                <p class="news_container-content-descr"><?=StringHelper::truncateWords($model->message, 20, '...')?></p>
            </div>
            <div class="news_container-content-bottom">
                <div class="content_bottom-cinema_news">
                    <span><?=$model->category->name?></span>
                </div>
                <div class="content_bottom-comments" >
                    <span>Комментарии (<?=$model->num_com>0 ? $model->num_com : 0?>)</span>
                </div>
                <div class="content_bottom-added-spn">
                    <span>Добавлена: <?=\common\components\DateHelper::formatDate($model->addtime); ?></span>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

        <div class="text-right">
            <?php 
            if($pages){
                echo yii\widgets\LinkPager::widget([
                    'pagination' => $pages,
                ]);
            }
            ?>
        </div>
        <div class="main-container_content-news">
            <?=$title->title_down?>
        </div>                  
    </div>
</div>