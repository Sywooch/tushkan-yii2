<?php

use yii\helpers\Url;
use yii\helpers\StringHelper;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<style type="text/css">
    .film-card {
        height: 360px;
        margin-bottom: 10px;
        overflow: hidden;
    }
</style>

            <?= \frontend\widgets\TopFilms::widget(['number'=>5]); ?>

            <div class="main-titles"><?=$category->name?></div>

            <section class="index-first-row">
                
                <?php foreach($models as $model): 
                $href = "/news/".$model->sbscr."/".date('Y-m-d', $model->urltime)."-".$model->id;
                ?>
                <div class="film-card">
                    <a href="<?=$href?>">
                        <img src="<?=$model->other1?>" alt="">
                        <p><?=$model->title?></p>  
                    </a>
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

            </section>
            <div class="main-titles">ПОПУЛЯРНЫЕ ФИЛЬМЫ <a href="#">Смотреть больше</a></div>
            <?= \frontend\widgets\Popular::widget(['type'=>'films']); ?>

            <div class="main-titles">ПОПУЛЯРНЫЕ МУЛЬТФИЛЬМЫ <a href="#">Смотреть больше</a></div>
            <?= \frontend\widgets\Popular::widget(['type'=>'mults']); ?>

            <div class="main-titles">ПОПУЛЯРНЫЕ СЕРИАЛЫ <a href="#">Смотреть больше</a></div>
            <?= \frontend\widgets\Popular::widget(['type'=>'serials']); ?>

            <div class="main-titles">ПОПУЛЯРНЫЕ ПЕРЕДАЧИ <a href="#">Смотреть больше</a></div>
            <?= \frontend\widgets\Popular::widget(['type'=>'casts']); ?>

            
<!-- 
            <div class="above-footer-main-titles">СМОТРЕТЬ КИНО ОНЛАЙН БЕСПЛАТНО, ФИЛЬМЫ ОНЛАЙН СМОТРЕТЬ НА ТУШКАНЕ
            </div> -->
            <section class="above-footer-main">
                <?=$title['title_down']?>
                
            </section>