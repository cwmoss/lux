<?php

use slowfoot\configuration;
use slowfoot\util\html;
use slowfoot_plugin\sanity\sanity;
/*

    functions for resolving the sanity structure
    they can be called from phuety components (everything is an object)
    or from sanity block resolver (where everything is an array)
*/

class site {

    public static function link_url($link, $helper) {
        $link = array_to_object($link);
        return $link->internal ?
            $helper->path($link->internal->_ref)
            : ($link->route ? path_page($link->route)
                : $link->external);
    }

    public static function link($link, $helper): array {
        $link = array_to_object($link);
        $url = self::link_url($link, $helper);

        $text = $link->text;
        // $text = $opts['text'] ?: $sl['text'];
        if (!$text) {
            if ($link->internal) {
                $internal = $helper->ref($link->internal);
                $text = $internal->title;
            } else {
                $text = $url;
            }
        }
        return [$url, $text];
    }
    //  $link['internal'] ? $ds->get_path($link['internal']['_ref']) : ($link['route'] ? path_page($link['route']) : $link['external']);

    public static function responsive_image($asset, array $widths, $assetsconf, $helper) {
        // asset is a block attribute?
        if (is_array($asset) && isset($asset["asset"])) {
            $asset = $helper->ref($asset["asset"]);
            $asset = sanity::sanity_image_to_asset($asset);
        }
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
    }
}
