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
</section>