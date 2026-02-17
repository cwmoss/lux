<?php
namespace compiled;

use phuety\component;
use phuety\data_container;
use phuety\phuety;
use phuety\tag;
use phuety\asset;
use phuety\phuety_context;

use function phuety\dbg;



use slowfoot\util\html;


class image_set_component extends component {
    public string $uid = "image_set---6993c6efb624c";
    public bool $is_layout = false;
    public string $name = "image_set";
    public string $tagname = "image.set";
    public bool $has_template = false;
    public bool $has_code = true;
    public bool $has_style = false;
    public array $assets = array (
);
    public array $custom_tags = array (
);
    public int $total_rootelements = 0;
    public ?array $components = NULL;

    public function run_code(data_container $props, array $slots, data_container $helper, phuety_context $phuety, asset $assetholder): array{
        // dbg("++ props for component", $this->name, $props);<?php

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

        return get_defined_vars();
    }

    public function render($__runner, data_container $__d, array $slots=[]):void {
        // ob_start();
        // if($this->is_layout) print '<!DOCTYPE html>';
        $__s = [];
        ?><?php // return ob_get_clean();
        // dbg("+++ assetsholder ", $this->is_start, $this->assetholder);
    }

    public function debug_info(){
        return array (
  'src' => '/Users/rw/dev/lux-berlin/slowfoot/src/components/image_set.phue.php',
  'php' => 1,
);
    }
}
