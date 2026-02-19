<?php
require_once "site.php";

use slowfoot\configuration;
use slowfoot\image\profile;
use slowfoot\loader\json;
use slowfoot\loader\dataset;
use slowfoot\store;
use slowfoot\file_meta;
use slowfoot_plugin\markdown;
use slowfoot_plugin\phuety;
use slowfoot_plugin\phuety\phuety_adapter;
use slowfoot_plugin\sanity;
use slowfoot\image\configuration as img_config;

$is_buildhost = preg_match("/lux-berlin/", $_SERVER['HTTP_HOST']);

return new configuration(
    site_name: 'L.U.X',
    site_description: 'whats up at the l.u.x?',
    site_url: 'https://lux-berlin.net',
    // TODO: solve genenv vs ENV problem
    path_prefix: getenv('PATH_PREFIX') ?: $_ENV['PATH_PREFIX'] ?: '',
    title_template: '',
    store: 'memory',
    template_engine: phuety_adapter::class,
    plugins: [
        new sanity\sanity('pna8s3iv', $_ENV['SANITY_TOKEN'] ?? "")
    ],
    sources: [
        'sanity' => sanity\sanity::data_loader(...)
    ],
    /*
    'preview' => [
        'sanity' => [
            'dataset' => 'production',
            'projectId' => $_ENV['SANITY_ID'],
            'useCdn' => false,
            //'withCredentials' => true,
            'token' => $_ENV['SANITY_TOKEN']
        ]
    ],*/
    templates: [
        'content' => '/:slug.current',
        'gallery_page' => '/galerie/:slug.current',
        'page' => '/:slug.current',
    ],
    assets: new img_config(
        download: true,
        profiles: [
            "small" => new profile(
                size: "600x400",
                mode: "fit"
            ),
            "gallery" => new profile(
                size: "x400"
            ),
            "gallery_big" => new profile(
                size: "900x"
            ),
            "300" => new profile(
                size: "300x"
            ),
            "600" => new profile(
                size: "600x"
            ),
            "900" => new profile(
                size: "900x"
            )
        ]
    ),

    hooks: [
        'after_build' => function (configuration $conf) {
            file_put_contents($conf->dist . '/Version', date("YmdHis"));

            #$cmd = "/usr/bin/rsync -av {$conf['dist']}/ {$conf['base']}/../www/htdocs/";
            $cmd = "cp -R {$conf->dist}/* {$conf->base}/../../www/htdocs/";
            print "$cmd\n";
            $output = "";
            $ok = exec($cmd, $output, $rc);
            var_dump($output);
            // var_dump($rc);
        }
    ]
);
# rsync -av /WWWROOT/slowfoot/dist/ /WWWROOT/slowfoot/../www/htdocs/