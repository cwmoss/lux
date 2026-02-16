<template. :html="html"></template.>


<?php

use Sanity\BlockContent;
use Sanity\Client as SanityClient;

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
