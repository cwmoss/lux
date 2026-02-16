<?php

use slowfoot\configuration;
use slowfoot\util\html;

function image_source_set($asset, array $widths, configuration $config) {
    $assetsconf = $config->assets;
    $imgs = [];
    foreach ($widths as $w) {
        dbg("sourceset", $w);
        $imgs[$w] = image($asset, ['size' => $w . 'x'], $assetsconf);
    }
    dbg("images", $imgs);
    $default = current($imgs);
    $srcset = array_map(fn($img) => PATH_PREFIX . $assetsconf->path . '/' . $img['resize_url'] . ' ' . $img['resize'][0] . 'w', $imgs);
    $srcset = join(', ', $srcset);
    dbg("++ result", $srcset);
    return html::html_tag("img", [
        'src' => PATH_PREFIX . $assetsconf->path . '/' . $default['resize_url'],
        'width' => $default['resize'][0],
        'height' => $default['resize'][1],
        'srcset' => $srcset,
        'sizes' => '50vw',
        'alt' => "",
        'class' => '',
        'loading' => 'lazy'
    ]);
}
