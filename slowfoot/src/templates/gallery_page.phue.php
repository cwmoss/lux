<layout.default lang="de" :page="page">
    <article class="gallery_page">

        <h2>{{ page.title}}</h2>
        <div :if="page.body" class="body">
            <sanity.text :block="page.body"></sanity.text>
        </div>
        <div class="gallery">
            <div :foreach="images as item">
                <a :href="item[0]" class="ltbx" :html="item[1]"></a>
            </div>
        </div>

    </article>
</layout.default>

<?php

use slowfoot_plugin\sanity\sanity;

$store = $props->globals->config->get_store();

$images = array_map(function ($it) use ($helper, $store) {
    $img = sanity::sanity_imagefield_to_slft($it, $store);
    // $img = (array) $helper->ref($it->asset);
    return [
        $helper->image_url($img, "gallery_big"),
        $helper->image_tag($img, "gallery")
    ];
}, (array)$props->page->gallery->images);
