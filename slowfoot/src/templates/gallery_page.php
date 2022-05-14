<?php
layout('default');

#$links = query('*[_id=="$id"]{articles[]->, pix[]->}[0]', ['id' =>$_id]);
$links = [];
$subtitle = "untertitel";
$backbutton=true;
?>
<article class="gallery_page">
        <h2><?=$page['title']?></h2>
        
        <?if ($page['body']) {?>
            <div class="body"><?=$sanity_text($page['body'])?></div>
        <?}?>

<div class="gallery">
    <?foreach ($page['gallery']['images'] as $item) {
    $img = $ref($item['asset']); ?>
        <div><a href="<?=$image_url($img, 'gallery_big')?>" class="ltbx"><?=$image_tag($img, 'gallery')?></a></div>
    <?php
}?>
   

    
</div>
        
</article>

