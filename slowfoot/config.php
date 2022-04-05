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
            'useCdn' => true,
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
    ],
    'assets' => [
        'dir' => 'images',
        'path' => '/images',
        'profiles' => [
            'small' => [
                'size' => '600x400',
                'mode' => 'fit'
            ],
            'gallery' => [
                'size' => '700x', 
                '4c' => ['creator'=>'Robbie Øfchen']
            ]
        ]
    ],
    'plugins' => [
        'sanity'
    ],
    'hooks' => [
        'on_load' => function ($row, $ds) {
            // [_id] => a-_a:325
         
            return $row;
        }
    ]
];
