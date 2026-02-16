<?php


use slowfoot\util\html;

$sizes = explode(",", $props->sizes);
$image_source_set = function ($asset, array $widths, $assetsconf, $helper) {

    $imgs = [];
    foreach ($widths as $w) {
        dbg("sourceset", $w);
        $imgs[] = $helper->image($asset, $w);
    }

    dbg("*********** images", $imgs, $imgs[0]->resize[0]);

    $srcset = array_map(fn($img) => PATH_PREFIX . $assetsconf->path . '/' .
        $img->resize_url . ' ' . $img->resize[0] . 'w', $imgs);

    $srcset = join(', ', $srcset);

    $default = current($imgs);
    dbg("*********** result", $srcset, " ++++ ", $imgs[0]->resize[0]);
    return html::html_tag("img", [
        'src' => PATH_PREFIX . $assetsconf->path . '/' . $default->resize_url,
        'width' => $default->resize[0],
        'height' => $default->resize[1],
        'srcset' => $srcset,
        'sizes' => '50vw',
        'alt' => "",
        'class' => '',
        'loading' => 'lazy'
    ]);
};

print $image_source_set($props->img, $sizes, $props->globals->config->assets, $helper);
