<?php
$settings = $get('site_settings');
$title = $settings['title'];
$nav = $ref($settings['nav_footer']);
debug_js("navigation", $nav);
$rev = 6;

//  <link href="https://fonts.googleapis.com/css2?family=Arvo:wght@700&family=Inter:wght@400;700&display=swap" rel="stylesheet">

?>
<!doctype html>
<html lang="de">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
    <meta name="description" content="Leiseste Unterhaltung Xberg -- Club, Tanzbar, Partylocation in Berlin Kreuzberg">
    <link rel="SHORTCUT ICON" type="image/png" href="/gfx/favicon-32x32.png">

    <link rel="stylesheet" href="<?= path_asset('/js/glightbox.min.css') ?>" />
    <script src="<?= path_asset('/js/glightbox.min.js') ?>"></script>

    <link rel="stylesheet" href="<?= path_asset('/css/app.css', $rev) ?>" type="text/css">
    <script defer src="/happygoetz.php?__script"></script>
    <title><?= $title ?></title>

</head>

<body>
    <header>
        <h1 class="logo"><a href="/"><span class="l">L.</span><span class="u">U.</span><span class="x" title="<?= h($title) ?>">X</span></a></h1>

        <? if (false && $backbutton) { ?>
            <nav><a href="/" class="back">Zurück</a></nav>
        <? } ?>
    </header>




    <?= $content ?>

    </main>

    <footer>
        <nav>
            <? foreach ($nav['items'] as $n) { ?>
                <?= $sanity_link($n) ?>
            <? } ?>

        </nav>
    </footer>

    <script src="<?= path_asset('/js/app.js', $rev) ?>"></script>
</body>

</html>