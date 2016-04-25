<section class="index-first-row">
    <?php foreach($models as $model):
        $link = "/news/".$model['sbscr']."/".date('Y-m-d', $model['addtime']).$model['id'];
        $image = strpos($model['other1'], '/_nw/') < 0 ? "/_nw".$model['other1'] : $model['other1'];
     ?>
    <div class="film-banner">
        <a href="<?=$link?>" title="<?=$model['title']?>"><img src="<?=$image?>" alt="<?=$model['title']?>"></a>
    </div>
    <?php endforeach; ?>
</section>