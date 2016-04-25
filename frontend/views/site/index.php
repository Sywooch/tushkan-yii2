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

            <div class="main-titles">СМОТРЕТЬ ФИЛЬМЫ И СЕРИАЛЫ ОНЛАЙН БЕСПЛАТНО</div>

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

            <div class="main-titles">НОВОСТИ КИНО<a href="<?=Url::to('publ')?>">Смотреть больше</a></div>
            <section>
                <div class="news-block">
                    <?php foreach($news as $new):
                    $pass = $new->category->password != "" ? $new->category->password.'/' : '';
                    $href = "/publ/".$pass.$new->url.'/'.$new->catID.'-1-0-'.$new->id;
                    ?>
                    <div class="news-card">
                        <a href="<?=$href?>">
                            <button>Читать подробнее</button>
                            <img src="http://tushkan.tv<?=$new->asite?>" alt="">
                            <p>100 Самых ожидаемых фильмов 2016 года</p>
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </section>
            <div class="main-titles">ПОСЛЕДНИЕ КОММЕНТАРИИ</div>
            <section>
                <div class="news-block">
                    <?php foreach($comments as $comment): 
                    
                    $href = "/news/".$comment->parent->sbscr."/".date('Y-m-d', $comment->parent->urltime)."-".$comment->parent->id; ?>
                    <div class="last-comment">
                        <a href="<?=$href?>">"<?=$comment->parent->title?>"</a>
                        <p><?=StringHelper::truncateWords($comment->message, 20, '...')?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </section>
            <section class="interview-section">
                <div class="interview">
                <div class="interview-block">ОПРОС</div>
                    <div class="interview-title"><?=$pool['7']?></div>
                    <form action="">
                        <?php for($i = 8; $i < 23; $i++) {
                            if($pool[$i] != ""){ ?>
                            <label><input id="a<?=$pool['1'].($i-7)?>" type="<?php if($pool['2'] == 1){echo "radio";}elseif($pool['2'] == 2){echo "checkbox";} ?>" name="answer" value="<?=$i-7;?>"> <?=$pool[$i]?></label><br>
                        <?php }
                        } ?>
                        <input type="submit" value="ОТВЕТИТЬ">
                    </form>
                    <a href="javascript://" rel="nofollow" id_pool="<? echo $pool['1']?>" class="pollLnk-all">Результаты</a>&#160;&#160;&#160;<a href="javascript://" rel="nofollow" class="pollLnk-archive">Архив опросов</a>
                    <p>Всего ответов <span><?=$pool['38']?></span></p>
                </div>
                <div class="chat">
                    <div class="chat-title">МИНИ ЧАТ</div>
                    <div class="chat-block"></div>
                </div>
            </section>

            
<!-- 
            <div class="above-footer-main-titles">СМОТРЕТЬ КИНО ОНЛАЙН БЕСПЛАТНО, ФИЛЬМЫ ОНЛАЙН СМОТРЕТЬ НА ТУШКАНЕ
            </div> -->
            <section class="above-footer-main">
                <?=$title['title_down']?>
                
            </section>