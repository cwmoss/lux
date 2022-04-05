<?php
if (!$page['is_page']) {
    return "";
}

layout('default');

#$links = query('*[_id=="$id"]{articles[]->, pix[]->}[0]', ['id' =>$_id]);
$links = [];
$subtitle = "untertitel";
$backbutton=true;
?>
 <article class="">
        <h2><?=$page['title']?></h2>
        
        <?=$sanity_text($page['body'])?>
</article>