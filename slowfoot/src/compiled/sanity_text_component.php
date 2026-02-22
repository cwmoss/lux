<?php
namespace compiled;

use phuety\component;
use phuety\data_container;
use phuety\phuety;
use phuety\tag;
use phuety\asset;
use phuety\phuety_context;

use function phuety\dbg;


use Sanity\BlockContent;
use Sanity\Client as SanityClient;
use site;
use slowfoot_plugin\sanity\sanity;


class sanity_text_component extends component {
    public string $uid = "sanity_text---699b69ecc1bb3";
    public bool $is_layout = false;
    public string $name = "sanity_text";
    public string $tagname = "sanity.text";
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




$ds = $helper;
$config = $props->globals->config;

$block = \object_to_array($props->block);

$plugin = $props->globals->config->plugins[0];
$serializers = [
    'marks' => [
        'link' => [
            'head' => function ($mark) use ($ds) {
                return '<a href="' . site::link_url($mark, $ds) . '">';
            },
            'tail' => '</a>'
        ],
        'authorLink' => [
            'head' => function ($mark) use ($ds) {
                return '<a href="' . site::link_url($mark, $ds) . '">';
            },
            'tail' => '</a>'
        ],

    ],
    'main_image' => function ($item, $parent, $htmlBuilder) use ($ds, $opts, $config) {
        /*
        example for $item["attributes"]

        array (size=2)
        '_key' => string '69a80d64fe35' (length=12)
        'asset' => 
            array (size=2)
            '_type' => string 'reference' (length=9)
            '_ref' => string 'image-ee6d2784225dd6cb41eaeec278a1eaad21fa078f-2607x1287-jpg' (length=60)

        */
        // <a :href="helper.image_url(bild, 'gallery_big')"
        // aria-label="Ich bin ein Bild, klick mich groß" class="ltbx">
        $asset = $ds->ref($item["attributes"]["asset"]);
        $asset = sanity::sanity_image_to_asset($asset);
        return sprintf(
            '<a href="%s" aria-label="Ich bin ein Bild, klick mich groß" class="ltbx">%s</a>',
            $ds->image_url($asset, "gallery_big"),
            site::responsive_image($asset, [300, 600, 900], $config->assets, $ds)
        );
    },

    'reference' => function ($item, $parent, $htmlBuilder) use ($ds) {
        // print_r($item);
        return sprintf(
            '<div class="video">link %s %s</div>',
            $item['attributes']['_ref'],
            $ds->path($item['attributes']['_ref'])
        );
    },

    'videoEmbed' => function ($item, $parent, $htmlBuilder) {
        // print_r($item);
        // convertYoutube
        return sprintf('<div class="video">%s</div>', $item['attributes']['url']);
    },

];

$html = "";
if ($block) {
    #var_dump($conf);

    $html = BlockContent::toHtml($block, [
        'projectId' => $plugin->project_id,
        'dataset' => $plugin->dataset,
        'serializers' => $serializers,
    ]);
    $html = nl2br($html);
}
print $html;

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
  'src' => '/Users/rw/dev/lux-berlin/slowfoot/src/components/sanity_text.phue.php',
  'php' => 1,
);
    }
}
