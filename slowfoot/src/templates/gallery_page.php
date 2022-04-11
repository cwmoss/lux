<?php
layout('default');

#$links = query('*[_id=="$id"]{articles[]->, pix[]->}[0]', ['id' =>$_id]);
$links = [];
$subtitle = "untertitel";
$backbutton=true;
?>
<article class="gallery_page">
        <h2><?=$page['title']?></h2>
        
<div class="gallery">
    <?foreach ($page['gallery']['images'] as $item) {
    $img = $ref($item['asset']); ?>
        <div class="" data-toggle data-big="<?=$image_url($img, 'gallery_big')?>"><?=$image_tag($img, 'gallery')?></div>
    <?php
}?>
        
</div>
        <?=$sanity_text($page['body'])?>
</article>

<dialog id="dialog">
    <header>
      <button class="btn-close" data-close>
        &#x2715;
      </button>
    </header>
    <div class="dialog-content"></div>
    <template class="gallery_item">
        <div class="image">
            <img data-x-src="big" data-bind-click="image_click" class="lb-img">
        </div>
    </template>
</dialog>