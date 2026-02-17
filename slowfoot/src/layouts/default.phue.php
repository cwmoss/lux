<!DOCTYPE html>
<html lang="de">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
    <meta name="description" content="Leiseste Unterhaltung Xberg -- Club, Tanzbar, Partylocation in Berlin Kreuzberg">
    <link rel="SHORTCUT ICON" type="image/png" :href="path_asset('/gfx/favicon-32x32.png', true)">

    <link rel="stylesheet" :href="path_asset('/js/glightbox.min.css')" />
    <script :src="path_asset('/js/glightbox.min.js')"></script>

    <link rel="stylesheet" :href="path_asset('/css/app.css', rev)" type="text/css">
    <script defer src="/happygoetz.php?__script"></script>
    <title :html="doc_title"></title>
    <phuety.assets head></phuety.assets>
</head>

<body>
    <header>
        <h1 class="logo"><a href="/"><span class="l">L.</span><span class="u">U.</span><span class="x" :title="title">X</span></a></h1>

    </header>

    <slot.></slot.>


    <footer>
        <nav>
            <sanity.link :foreach="nav.items as nav" :navitem="nav">link</sanity.link>
        </nav>
    </footer>

    <script :src="path_asset('/js/app.js', rev)"></script>
</body>

</html>
<?php
$settings = $helper->get('site_settings');
$doc_title = $settings->title;
$nav = $helper->ref($settings->nav_footer);
debug_js("helper", $helper);
debug_js("navigation", $nav);
$rev = 6;

/*
foreach ($nav['items'] as $n) { ?>
                <?= $sanity_link($n) 
                */