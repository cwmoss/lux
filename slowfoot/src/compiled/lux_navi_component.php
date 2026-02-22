<?php
namespace compiled;

use phuety\component;
use phuety\data_container;
use phuety\phuety;
use phuety\tag;
use phuety\asset;
use phuety\phuety_context;

use function phuety\dbg;



class lux_navi_component extends component {
    public string $uid = "lux_navi---699b69ecc1526";
    public bool $is_layout = false;
    public string $name = "lux_navi";
    public string $tagname = "lux.navi";
    public bool $has_template = true;
    public bool $has_code = false;
    public bool $has_style = true;
    public array $assets = array (
);
    public array $custom_tags = array (
);
    public int $total_rootelements = 1;
    public ?array $components = array (
  0 => 'sanity.link',
);

    public function run_code(data_container $props, array $slots, data_container $helper, phuety_context $phuety, asset $assetholder): array{
        // dbg("++ props for component", $this->name, $props);
        return get_defined_vars();
    }

    public function render($__runner, data_container $__d, array $slots=[]):void {
        // ob_start();
        // if($this->is_layout) print '<!DOCTYPE html>';
        $__s = [];
        ?><?= tag::tag_open_merged_attrs("nav", [], array (
  'class' => 'lux_navi---699b69ecc1526 root',
) , $__d->_get("props")) ?>
    <?php foreach($__d->_get("nav")->items as  $nav){$__d->_add_block(["nav"=>$nav ]); ?><?php array_unshift($__s, []); ob_start(); ?>link<?php $__runner($__runner, "sanity.link", $__d->_get("phuety")->with($this->tagname, "sanity.link"), ["navitem"=> $__d->_get("nav")] + array (
) , ["default" => ob_get_clean()]+array_shift($__s)); ?><?php $__d->_remove_block();} ?>
</nav>
<?php // return ob_get_clean();
        // dbg("+++ assetsholder ", $this->is_start, $this->assetholder);
    }

    public function debug_info(){
        return array (
  'src' => '/Users/rw/dev/lux-berlin/slowfoot/src/components/lux_navi.phue.php',
  'php' => NULL,
);
    }
}
