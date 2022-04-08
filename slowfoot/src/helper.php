<?php
hook::add_filter('sanity.block_serializers', function ($serializers, $opts, $ds, $config) {
    return [
        'marks'=>[
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
            
        ]
        ,
        'main_image' => function ($item, $parent, $htmlBuilder) use ($ds, $opts, $config) {
            //print_r($item);
            $asset = $ds->ref($item['attributes']['asset']);
            return \slowfoot\image_tag($asset, $opts, [], $config['assets']);
            return "<div>IMAGE! {$opts['profile']}</div>";
        },
        
        'reference' => function ($item, $parent, $htmlBuilder) use ($ds) {
            // print_r($item);
            return sprintf(
                '<div class="video">link %s %s</div>',
                $item['attributes']['_ref'],
                $ds->get_path($item['attributes']['_ref'])
            );
        },
        
        'videoEmbed' =>function ($item, $parent, $htmlBuilder) {
            // print_r($item);
            return sprintf('<div class="video">%s</div>', convertYoutube($item['attributes']['url']));
        },
        
    ];
});

/*
    $sl could be
    - a sanity#link object
    - a sanity#nav_item
*/
function sanity_link($sl, $opts=[], $ds)
{
    $link = $sl['link'];
    if (!$link) {
        $link = $sl;
    }
    #print_r($link);
    $url = sanity_link_url($link, $ds);

    $text = $opts['text']?:$sl['text'];
    if (!$text) {
        if ($link['internal']) {
            $internal = $ds->ref($link['internal']);
            $text = $internal['title'];
        } else {
            $text = $url;
        }
    }
    return sprintf('<a href="%s/">%s</a>', $url, $text);
}

function sanity_link_url($link, $ds)
{
    return $link['internal'] ? $ds->get_path($link['internal']['_ref']) : ($link['route'] ? path_page($link['route']): $link['external']);
}

function termin_date($date, $with_weekday = true, $lang='de')
{
    if (!is_numeric($date)) {
        $date = strtotime($date);
    }
    $lang = strtolower($lang)=='de'?'de_DE':'en_US';
    
    if (date("Y", $date) != date("Y")) {
        $Y = 'y';
    } else {
        $Y = '';
    }
    if ($lang=="de_DE") {
        $format = "d.M.".$Y;
        if ($with_weekday) {
            $format = "ccc'<br>'".$format;
        }
    } else {
        $format = "MMM d ".$Y;
        if ($with_weekday) {
            $format = 'eee, '.$format;
        }
    }
    $formatter = new IntlDateFormatter($lang, IntlDateFormatter::FULL, IntlDateFormatter::FULL, null, null, $format);
    return $formatter->format($date); //. " ($format)";
}
/*

if (!defined('SLOWFOOT_BASE')) {
    define('SLOWFOOT_BASE', __DIR__ . '/../');
}
*/

/*

function load_preview_object($id, $type = null, $config) {
    // print_r($config);
    //print_r(apache_request_headers());
    //print_r($_COOKIE);
    $client = sanity_client($config['preview']['sanity']);

    $document = $client->getDocument($id);
    //print_r($document);
    return $document;
    return [
        '_id' => $id,
        '_type' => 'artist',
        'title' => 'hoho',
        'firstname' => 'HEiko',
        'familyname' => 'van Gogh'
    ];
}

function load_sanity($opts, $config) {
    $client = sanity_client($opts);
    $query = $config['query'] ?? '*[!(_type match "system.*") && !(_id in path("drafts.**"))]';
    $res = $client->fetch($query);
    return $res;
}

function sanity_client($config) {
    return new SanityClient($config);
}
function split_tags($tags) {
    return array_filter(array_map('trim', preg_split('/[,;]/', $tags)), 'trim');
}
*/