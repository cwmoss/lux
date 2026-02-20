<?php
namespace compiled;

use phuety\component;
use phuety\data_container;
use phuety\phuety;
use phuety\tag;
use phuety\asset;
use phuety\phuety_context;

use function phuety\dbg;



class template_content_component extends component {
    public string $uid = "template_content---6998891c8cb96";
    public bool $is_layout = false;
    public string $name = "template_content";
    public string $tagname = "template.content";
    public bool $has_template = true;
    public bool $has_code = false;
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
        return get_defined_vars();
    }

    public function render($__runner, data_container $__d, array $slots=[]):void {
        // ob_start();
        // if($this->is_layout) print '<!DOCTYPE html>';
        $__s = [];
        ?><?php array_unshift($__s, []); ob_start(); ?>
    <?php if($__d->_get("page")->is_page){ ?><article>
        <h2><?= tag::h($__d->_get("page")->title) ?></h2>
        <?php $__runner($__runner, "sanity.text", $__d->_get("phuety")->with($this->tagname, "sanity.text"), ["block"=> $__d->_get("page")->body] + array (
) ); ?>
    </article><?php } ?>
<?php $__runner($__runner, "layout.default", $__d->_get("phuety")->with($this->tagname, "layout.default"), ["page"=> $__d->_get("page")] + array (
  'lang' => 'de',
) , ["default" => ob_get_clean()]+array_shift($__s)); ?><?php // return ob_get_clean();
        // dbg("+++ assetsholder ", $this->is_start, $this->assetholder);
    }

    public function debug_info(){
        return array (
  'src' => '/Users/rw/dev/lux-berlin/slowfoot/src/templates/content.phue.php',
  'php' => NULL,
);
    }
}
