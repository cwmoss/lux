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
use IntlDateFormatter;


class lux_termin_component extends component {
    public string $uid = "lux_termin---6993c6efb5fa9";
    public bool $is_layout = false;
    public string $name = "lux_termin";
    public string $tagname = "lux.termin";
    public bool $has_template = true;
    public bool $has_code = true;
    public bool $has_style = false;
    public array $assets = array (
);
    public array $custom_tags = array (
);
    public int $total_rootelements = 1;
    public ?array $components = array (
  0 => 'image.set',
  1 => 'sanity.text',
);

    public function run_code(data_container $props, array $slots, data_container $helper, phuety_context $phuety, asset $assetholder): array{
        // dbg("++ props for component", $this->name, $props);

$eintritt = $props->termin->admission_text ?? ($props->termin->admission_is_free ? 'Eintritt Frei' : '');
$bild = null;
if ($props->termin->main_image) {
    // warum zieht die assets-map nicht?
    // $bild = $helper->ref($props->termin->main_image->asset);
    $bild = sanity::sanity_imagefield_to_slft($props->termin->main_image, $props->globals->config->get_store());
}

/*
image_source_set($bild, [300, 600])
*/

$termin_date_fmt = function ($date, $with_weekday = true, $lang = 'de') {
    if (!is_numeric($date)) {
        $date = strtotime($date);
    }
    $lang = strtolower($lang) == 'de' ? 'de_DE' : 'en_US';

    if (date("Y", $date) != date("Y")) {
        $Y = "'&thinsp;'y";
    } else {
        $Y = '';
    }
    if ($lang == "de_DE") {
        $format = "d.M." . $Y;
        if ($with_weekday) {
            $format = "ccc'<br>'" . $format;
        }
    } else {
        $format = "MMM d " . $Y;
        if ($with_weekday) {
            $format = 'eee, ' . $format;
        }
    }
    $formatter = new IntlDateFormatter($lang, IntlDateFormatter::FULL, IntlDateFormatter::FULL, null, null, $format);
    return $formatter->format($date); //. " ($format)";
};

        return get_defined_vars();
    }

    public function render($__runner, data_container $__d, array $slots=[]):void {
        // ob_start();
        // if($this->is_layout) print '<!DOCTYPE html>';
        $__s = [];
        ?><?= tag::tag_open_merged_attrs("section", [], array (
) , $__d->_get("props")) ?>
    <div class="when"><?= $__d->_call("termin_date_fmt")($__d->_get("termin")->datum) ?></div>

    <?php if($__d->_get("bild")){ ?><div class="bild">
        <?= tag::tag_open_merged_attrs("a", ["href"=> $__d->_get("helper")->image_url($__d->_get("bild"), "gallery_big")], array (
  'aria-label' => 'Ich bin ein Bild, klick mich groß',
  'class' => 'ltbx',
) ) ?>
            <?php $__runner($__runner, "image.set", $__d->_get("phuety")->with($this->tagname, "image.set"), ["img"=> $__d->_get("bild"), "sizes"=> "300,600"] + array (
) ); ?>
        </a>

    </div><?php } ?>

    <div class="details">
        <h2><?= tag::h($__d->_get("termin")->title) ?></h2>

        <?php if($__d->_get("doc")->subtitle){ ?><h3><?= tag::h($__d->_get("termin")->subtitle) ?></h3><?php } ?>

        <?php if($__d->_get("termin")->body){ ?><?php $__runner($__runner, "sanity.text", $__d->_get("phuety")->with($this->tagname, "sanity.text"), ["text"=> $__d->_get("termin")->body] + array (
) ); ?><?php } ?>

        <?php if($__d->_get("eintritt")){ ?><p><?= $__d->_get("eintritt") ?></p><?php } ?>

    </div>
</section><?php // return ob_get_clean();
        // dbg("+++ assetsholder ", $this->is_start, $this->assetholder);
    }

    public function debug_info(){
        return array (
  'src' => '/Users/rw/dev/lux-berlin/slowfoot/src/components/lux_termin.phue.php',
  'php' => 22,
);
    }
}
