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


class sanity_text_component extends component {
    public string $uid = "sanity_text---69929e970499f";
    public bool $is_layout = false;
    public string $name = "sanity_text";
    public string $tagname = "sanity.text";
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

$ds = $helper;
$block = \object_to_array($props->block);

$plugin = $props->globals->config->plugins[0];
$serializers = [
    'marks' => [
        'link' => [
            'head' => function ($mark) use ($ds) {
                return '<a href="' . sanity_link_url($mark, $ds) . '">';
            },
            'tail' => '</a>'
        ],
        'authorLink' => [
            'head' => function ($mark) use ($ds) {
                return '<a href="' . sanity_link_url($mark, $ds) . '">';
            },
            'tail' => '</a>'
        ],

    ],
    'main_image' => function ($item, $parent, $htmlBuilder) use ($ds, $opts, $config) {
        //print_r($item);
        $asset = $ds->ref($item['attributes']['asset']);
        return "main-image";
        // return image_source_set($asset, [300, 600, 900]);
        // return \slowfoot\image_tag($asset, $opts, [], $config['assets']);
        // return "<div>IMAGE! {$opts['profile']}</div>";
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

        return get_defined_vars();
    }

    public function render($__runner, data_container $__d, array $slots=[]):void {
        // ob_start();
        // if($this->is_layout) print '<!DOCTYPE html>';
        $__s = [];
        ?><?= $__d->_get("html") ?><?php // return ob_get_clean();
        // dbg("+++ assetsholder ", $this->is_start, $this->assetholder);
    }

    public function debug_info(){
        return array (
  'src' => '/Users/rw/dev/lux-berlin/slowfoot/src/components/sanity_text.phue.php',
  'php' => 3,
);
    }
}
