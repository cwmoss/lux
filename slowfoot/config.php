<?php
$is_buildhost = preg_match("/lux-berlin/", $_SERVER['HTTP_HOST']);

return [
    'site_name' => 'L.U.X',
    'site_description' => 'look at beautiful works of art',
    'site_url' => 'https://lux-berlin.net',
    // TODO: solve genenv vs ENV problem
    'path_prefix' => getenv('PATH_PREFIX') ?: $_ENV['PATH_PREFIX'] ?: '',
    'title_template' => '',
    'store' => $is_buildhost?null:'sqlite',
    'sources' => [ 
        'sanity' => [
            'dataset' => 'production',
            'projectId' => 'pna8s3iv', #$_ENV['SANITY_ID'],
            'useCdn' => false,
            'token' => $_ENV['SANITY_TOKEN'],
            // 'query' => '*[_type=="custom-type-query"]'
        ]
       
    ],
    'preview' => [
        'sanity' => [
            'dataset' => 'production',
            'projectId' => $_ENV['SANITY_ID'],
            'useCdn' => false,
            //'withCredentials' => true,
            'token' => $_ENV['SANITY_TOKEN']
        ]
    ],
    'templates' => [
        'page' => '/:slug.current',
        'content' => '/:slug.current',
        'gallery_page' => '/galerie/:slug.current',
    ],
    'assets' => [
        'dir' => 'images',
        'path' => '/images',
        'download' => true,
        'profiles' => [
            'small' => [
                'size' => '600x400',
                'mode' => 'fit'
            ],
            'gallery' => [
                'size' => 'x300', 
            //    '4c' => ['creator'=>'Robbie Øfchen']
            ],
            'gallery_big' => [
                'size' => '900x', 
            //    '4c' => ['creator'=>'Robbie Øfchen']
            ]
        ]
    ],
    'plugins' => [
        'sanity'
    ],
    'hooks' => [
        'after_build' => function ($conf) {
            file_put_contents($conf['dist'].'/Version', date("YmdHis"));
            
            #$cmd = "/usr/bin/rsync -av {$conf['dist']}/ {$conf['base']}/../www/htdocs/";
            $cmd = "cp -R {$conf['dist']}/* {$conf['base']}/../www/htdocs/";
            print "$cmd\n";
            $output ="";
            $ok = exec($cmd, $output, $rc);
            var_dump($output);
            var_dump($rc);
           
        }
    ]
];
# rsync -av /WWWROOT/slowfoot/dist/ /WWWROOT/slowfoot/../www/htdocs/