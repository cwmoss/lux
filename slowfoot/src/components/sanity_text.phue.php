<?php

use Sanity\BlockContent;
use Sanity\Client as SanityClient;
use site;
use slowfoot_plugin\sanity\sanity;

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
