<?php
namespace compiled;

use phuety\component;
use phuety\data_container;
use phuety\phuety;
use phuety\tag;
use phuety\asset;
use phuety\phuety_context;

use function phuety\dbg;



use slowfoot_plugin\sanity\sanity;


class template_gallery_page_component extends component {
    public string $uid = "template_gallery_page---69987fc535815";
    public bool $is_layout = false;
    public string $name = "template_gallery_page";
    public string $tagname = "template.gallery.page";
    public bool $has_template = true;
    public bool $has_code = true;
    public bool $has_style = false;
    public array $assets = array (
);
    public array $custom_tags = array (
);
    public int $total_rootelements = 1;
    public ?array $components = array (
  0 => 'layout.default',
  1 => 'sanity.text',
);

    public function run_code(data_container $props, array $slots, data_container $helper, phuety_context $phuety, asset $assetholder): array{
        // dbg("++ props for component", $this->name, $props);
$store = $props->globals->config->get_store();

$images = array_map(function ($it) use ($helper, $store) {
    $img = sanity::sanity_imagefield_to_slft($it, $store);
    // $img = (array) $helper->ref($it->asset);
    return [
        $helper->image_url($img, "gallery_big"),
        $helper->image_tag($img, "gallery")
    ];
}, (array)$props->page->gallery->images);

        return get_defined_vars();
    }

    public function render($__runner, data_container $__d, array $slots=[]):void {
        // ob_start();
        // if($this->is_layout) print '<!DOCTYPE html>';
        $__s = [];
        ?><?php array_unshift($__s, []); ob_start(); ?>
    <article class="gallery_page">

        <h2><?= tag::h($__d->_get("page")->title) ?></h2>
        <?php if($__d->_get("page")->body){ ?><div class="body">
            <?php $__runner($__runner, "sanity.text", $__d->_get("phuety")->with($this->tagname, "sanity.text"), ["block"=> $__d->_get("page")->body] + array (
) ); ?>
        </div><?php } ?>
        <div class="gallery">
            <?php foreach($__d->_get("images") as  $item){$__d->_add_block(["item"=>$item ]); ?><div>
                <?= tag::tag_open_merged_attrs("a", ["href"=> $__d->_get("item")[0]], array (
  'class' => 'ltbx',
) ) ?><?= $__d->_get("item")[1] ?></a>
            </div><?php $__d->_remove_block();} ?>
        </div>

    </article>
<?php $__runner($__runner, "layout.default", $__d->_get("phuety")->with($this->tagname, "layout.default"), ["page"=> $__d->_get("page")] + array (
  'lang' => 'de',
) , ["default" => ob_get_clean()]+array_shift($__s)); ?><?php // return ob_get_clean();
        // dbg("+++ assetsholder ", $this->is_start, $this->assetholder);
    }

    public function debug_info(){
        return array (
  'src' => '/Users/rw/dev/lux-berlin/slowfoot/src/templates/gallery_page.phue.php',
  'php' => 16,
);
    }
}
