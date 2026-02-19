<?php
namespace compiled;

use phuety\component;
use phuety\data_container;
use phuety\phuety;
use phuety\tag;
use phuety\asset;
use phuety\phuety_context;

use function phuety\dbg;



class layout_default_component extends component {
    public string $uid = "layout_default---699768ff95c41";
    public bool $is_layout = true;
    public string $name = "layout_default";
    public string $tagname = "layout.default";
    public bool $has_template = true;
    public bool $has_code = true;
    public bool $has_style = false;
    public array $assets = array (
);
    public array $custom_tags = array (
);
    public int $total_rootelements = 2;
    public ?array $components = array (
  0 => 'phuety.assets',
  1 => 'sanity.link',
);

    public function run_code(data_container $props, array $slots, data_container $helper, phuety_context $phuety, asset $assetholder): array{
        // dbg("++ props for component", $this->name, $props);
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
        return get_defined_vars();
    }

    public function render($__runner, data_container $__d, array $slots=[]):void {
        // ob_start();
        // if($this->is_layout) print '<!DOCTYPE html>';
        $__s = [];
        ?><!DOCTYPE html><html lang="de"><head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
    <meta name="description" content="Leiseste Unterhaltung Xberg -- Club, Tanzbar, Partylocation in Berlin Kreuzberg">
    <?= tag::tag_open_merged_attrs("link", ["href"=> $__d->_call("path_asset")("/gfx/favicon-32x32.png", true)], array (
  'rel' => 'SHORTCUT ICON',
  'type' => 'image/png',
) ) ?>

    <?= tag::tag_open_merged_attrs("link", ["href"=> $__d->_call("path_asset")("/js/glightbox.min.css")], array (
  'rel' => 'stylesheet',
) ) ?>
    <?= tag::tag_open_merged_attrs("script", ["src"=> $__d->_call("path_asset")("/js/glightbox.min.js")], array (
) ) ?></script>

    <?= tag::tag_open_merged_attrs("link", ["href"=> $__d->_call("path_asset")("/css/app.css", $__d->_get("rev"))], array (
  'rel' => 'stylesheet',
  'type' => 'text/css',
) ) ?>
    <script src="/happygoetz.php?__script"></script>
    <title><?= $__d->_get("doc_title") ?></title>
    <?php $__runner($__runner, "phuety.assets", $__d->_get("phuety")->with($this->tagname, "phuety.assets"), [] + array (
  'head' => '',
) ); ?>


</head><body>
    <header>
        <h1 class="logo"><a href="/"><span class="l">L.</span><span class="u">U.</span><?= tag::tag_open_merged_attrs("span", ["title"=> $__d->_get("title")], array (
  'class' => 'x',
) ) ?>X</span></a></h1>

    </header>

    <?=$slots["default"]??""?>


    <footer>
        <nav>
            <?php foreach($__d->_get("nav")->items as  $nav){$__d->_add_block(["nav"=>$nav ]); ?><?php array_unshift($__s, []); ob_start(); ?>link<?php $__runner($__runner, "sanity.link", $__d->_get("phuety")->with($this->tagname, "sanity.link"), ["navitem"=> $__d->_get("nav")] + array (
) , ["default" => ob_get_clean()]+array_shift($__s)); ?><?php $__d->_remove_block();} ?>
        </nav>
    </footer>

    <?= tag::tag_open_merged_attrs("script", ["src"=> $__d->_call("path_asset")("/js/app.js", $__d->_get("rev"))], array (
) ) ?></script>


</body></html><?php // return ob_get_clean();
        // dbg("+++ assetsholder ", $this->is_start, $this->assetholder);
    }

    public function debug_info(){
        return array (
  'src' => '/Users/rw/dev/lux-berlin/slowfoot/src/layouts/default.phue.php',
  'php' => 37,
);
    }
}
