<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;


$categories = \common\models\NewsCategory::find()->all();

$category_images = [
"/triller.png",
"/series.png",
"/anime.png",
"/thriller.png",
"/war.png",
"/detective.png",
"/documental.png",
"/dram.png",
"/history.png",
"/comedy.png",
"/criminal.png",
"/mel_dram.png",
"/music.png",
"/m_films.png",
"/adventure.png",
"/family.png",
"/sport.png",
"/broadcast.png",
"/thriller1.png",
"/horrors.png",
"/fantastic.png",
"/interesting.png",];





AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>


<div class="wrapper">
    <div class="wrap">
        <header>
            <div class="logo-block">
                <div class="logo">
                    <a href="<?=Url::to('/')?>"><img src="/template/images/logo.png" alt="Логотип"></a>
                </div>
                <form action="">
                    <input type="text" placeholder="Поиск фильма">
                    <input type="submit" value="Искать">
                </form>
                <button class="player">Плеер от тушкана</button>
                <div class="enter">
                    <a href="">Войти</a>
                    <a href="">Регистрация</a>
                </div>
            </div>
            <div class="menu-block">
                <div class="menu-wrap">
                    <a href="#" id="pull">Меню</a>
                    <ul>
                        <li><a href="<?=Url::to('/')?>">Главная</a></li>
                        <li><a href="<?=Url::to('/publ')?>">Новости кино</a></li>
                        <li><a href="<?=Url::to('/index/orderdesc')?>">Стол заказов</a></li>
                        <li><a href="<?=Url::to('/index/tv_onlajn/0-51')?>">Тв онлайн</a></li>
                        <li><a href="">Заработайте на тушкане</a></li>
                    </ul>
                </div>
                <div class="buttons">
                    <div data-target="#categories-block-hidden" class="cat-button button-toggle">КАТЕГОРИИ
                    </div>  
                    <!--выпадающее меню навигации -->
                    <div data-target="#navigation-block-hidden" class="naw-button button-toggle">НАВИГАЦИЯ
                        <div id="accordion">
                            <h3>Новинки кино</h3>
                            <div>Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</div>
                            <h3>Фильмы в HD</h3>
                            <div>Phasellus mattis tincidunt nibh.</div>
                            <h3>Сериалы онлайн</h3>
                            <div>Nam dui erat, auctor a, dignissim quis.</div>
                            <h3>По году</h3>
                            <div>
                                <ul class="years">
                                    <li><a href="#">2016года</a></li>
                                    <li><a href="#">2015года</a></li>
                                    <li><a href="#">2014года</a></li>
                                    <li><a href="#">2013года</a></li>
                                    <li><a href="#">2012года</a></li>
                                    <li><a href="#">2011года</a></li>
                                    <li><a href="#">2010года</a></li>
                                    <li><a href="#">2009года</a></li>
                                </ul>
                            </div>
                            <h3>По странам</h3>
                            <div>
                            <ul class="countries">
                                <li><a href="#"><img src="/template/images/russia.png" alt="">&#160;Россия</a></li>
                                <li><a href="#"><img src="/template/images/ukraine.png" alt="">&#160;Украина</a></li>
                                <li><a href="#"><img src="/template/images/usa.png" alt="">&#160;США</a></li>
                                <li><a href="#"><img src="/template/images/china.png" alt="">&#160;Китай</a></li>
                                <li><a href="#"><img src="/template/images/india.png" alt="">&#160;Индия</a></li>
                                <li><a href="#"><img src="/template/images/italy.png" alt="">&#160;Италия</a></li>
                                <li><a href="#"><img src="/template/images/france.png" alt="">&#160;Франция</a></li>
                                <li><a href="#"><img src="/template/images/germany.png" alt="">&#160;Германия</a></li>
                                <li><a href="#"><img src="/template/images/great_britan.png" alt="">&#160;Великобритания</a></li>
                            </ul>
                            </div>
                            <h3>ТОП</h3>
                            <div>
                                <ul class="top">
                                    <li><a href="">По рейтингу</a></li>
                                    <li><a href="">По просмотрам</a></li>
                                    <li><a href="">По комментаpиям</a></li>
                                </ul>
                            </div>
                        </div>
                    </div> <!--выпадающее меню навигации -->
                </div>
            </div>
                <div id="categories-block-hidden" class="categories-pop">
                    <div class="navigation-titles">
                        <div class="main-titles">КАТЕГОРИИ ФИЛЬМОВ</div>
                    </div>
                    <div class="navigation">
                        <ul class="navigation-cat">
                        <?php $step=6; $i=1; foreach($categories as $key => $category):?>
                        <li><a href="/news/<?php if($category->description != ""){ echo $category->description."/";}?>1-0-<?=$category->id;?>"><img src="/template/images/<?=$category_images[$key]?>" alt="">&#160;<?=$category->name?></a></li>
                             <?php if($i%$step===0){
                                echo "</ul><ul class=\"navigation-cat\">";
                                $i=0;
                                $step = $step == 5 ? 6 : 5;
                            }
                            $i++;
                            endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div id="navigation-block-hidden" class="navigation-wrap">
                    <!-- <div class="navigation-titles">
                        <div class="main-titles">НАВИГАЦИЯ</div>
                    </div>
                    <div id="accordion-sample" class="navigation">
                        <h3>Новинки кино</h3>
                        <ul class="years">
                            <li><a href="#">2016года</a></li>
                            <li><a href="#">2015года</a></li>
                            <li><a href="#">2014года</a></li>
                            <li><a href="#">2013года</a></li>
                            <li><a href="#">2012года</a></li>
                            <li><a href="#">2011года</a></li>
                            <li><a href="#">2010года</a></li>
                            <li><a href="#">2009года</a></li>
                        </ul>
                        <h3>Фильмы в HD</h3>
                        <ul class="countries">
                            <li><a href="#"><img src="/template/images/russia.png" alt="">&#160;Россия</a></li>
                            <li><a href="#"><img src="/template/images/ukraine.png" alt="">&#160;Украина</a></li>
                            <li><a href="#"><img src="/template/images/usa.png" alt="">&#160;США</a></li>
                            <li><a href="#"><img src="/template/images/china.png" alt="">&#160;Китай</a></li>
                            <li><a href="#"><img src="/template/images/india.png" alt="">&#160;Индия</a></li>
                            <li><a href="#"><img src="/template/images/italy.png" alt="">&#160;Италия</a></li>
                            <li><a href="#"><img src="/template/images/france.png" alt="">&#160;Франция</a></li>
                            <li><a href="#"><img src="/template/images/germany.png" alt="">&#160;Германия</a></li>
                            <li><a href="#"><img src="/template/images/great_britan.png" alt="">&#160;Великобритания</a></li>
                        </ul>
                        <h3>Сериалы онлайн</h3>
                        <ul class="top">
                            <li><a href=""><img src="/template/images/by_rate.png" alt="">&#160;&#160;По рейтингу</a></li>
                            <li><a href=""><img src="/template/images/by_views.png" alt="">&#160;&#160;По просмотрам</a></li>
                            <li><a href=""><img src="/template/images/by_comments.png" alt="">&#160;&#160;По комментаpиям</a></li>
                        </ul>
                        <h3>По году</h3>
                        <ul class="new">
                            <li><a href="#"><span>NEW</span>&#160;Новинки кино</a></li>
                            <li><a href="#"><span>HD</span>&#160;Фильмы в HD</a></li>
                            <li><a href="#"><img src="/template/images/series.png" alt="">&#160;Сериалы онлайн</a></li>
                        </ul>
                        <h3>По странам</h3>
                        <ul class="new">
                            <li><a href="#"><span>NEW</span>&#160;Новинки кино</a></li>
                            <li><a href="#"><span>HD</span>&#160;Фильмы в HD</a></li>
                            <li><a href="#"><img src="/template/images/series.png" alt="">&#160;Сериалы онлайн</a></li>
                        </ul>
                        <h3>ТОП</h3>
                        <ul class="new">
                            <li><a href="#"><span>NEW</span>&#160;Новинки кино</a></li>
                            <li><a href="#"><span>HD</span>&#160;Фильмы в HD</a></li>
                            <li><a href="#"><img src="/template/images/series.png" alt="">&#160;Сериалы онлайн</a></li>
                        </ul>
                    </div> -->
                </div>  
        </header>

        <?= $content ?>

        <footer>
            <ul class="footer-menu">
                <li><a href="#">Контакти</a></li>
                <li><a href="#">Карта сайта</a></li>
                <li><a href="#">Карта форума</a></li>
                <li><a href="#">RSS</a></li>
                <li><a href="#">Все сериалы на Tushkan.net</a></li>
                <li><a href="#">Форум</a></li>
            </ul>
            <div class="coperite">Copyright Tushkan.NET © 2010-2016</div>
        </footer>
    </div>
</div>







<div class="wrap">
    <?php
    /*NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();*/
    ?>




<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
