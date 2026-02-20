<?php
namespace compiled;

use phuety\component;
use phuety\data_container;
use phuety\phuety;
use phuety\tag;
use phuety\asset;
use phuety\phuety_context;

use function phuety\dbg;



use site;


class sanity_link_component extends component {
    public string $uid = "sanity_link---69988d3fa3a83";
    public bool $is_layout = false;
    public string $name = "sanity_link";
    public string $tagname = "sanity.link";
    public bool $has_template = true;
    public bool $has_code = true;
    public bool $has_style = false;
    public array $assets = array (
);
    public array $custom_tags = array (
);
    public int $total_rootelements = 1;
    public ?array $components = NULL;

    public function run_code(data_container $props, array $slots, data_container $helper, phuety_context $phuety, asset $assetholder): array{
        // dbg("++ props for component", $this->name, $props);
[$url, $text] = site::link($props->navitem->link, $helper);
// debug_js("int", $internal);

        return get_defined_vars();
    }

    public function render($__runner, data_container $__d, array $slots=[]):void {
        // ob_start();
        // if($this->is_layout) print '<!DOCTYPE html>';
        $__s = [];
        ?><?= tag::tag_open_merged_attrs("a", ["href"=> $__d->_get("url")], array (
) , $__d->_get("props")) ?><?= tag::h($__d->_get("text")) ?></a><?php // return ob_get_clean();
        // dbg("+++ assetsholder ", $this->is_start, $this->assetholder);
    }

    public function debug_info(){
        return array (
  'src' => '/Users/rw/dev/lux-berlin/slowfoot/src/components/sanity_link.phue.php',
  'php' => 2,
);
    }
}
