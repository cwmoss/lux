<?php
namespace compiled;

use phuety\component;
use phuety\data_container;
use phuety\phuety;
use phuety\tag;
use phuety\asset;
use phuety\phuety_context;

use function phuety\dbg;



class template_page_component extends component {
    public string $uid = "template_page---69927a0d14c30";
    public bool $is_layout = false;
    public string $name = "template_page";
    public string $tagname = "template.page";
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

#$links = query('*[_id=="$id"]{articles[]->, pix[]->}[0]', ['id' =>$_id]);
$links = [];
$subtitle = "untertitel";
$termine = $page['termine'];
$sections = $page['sections'] ?? [];

/*

$doc = $ref($termin); #strtotime($doc['datum'])
            $eintritt = $doc['admission_text'] ?? ($doc['admission_is_free'] ? 'Eintritt Frei' : ''); 
            
// $image_tag($bild, 'small')


$bild = $ref($doc['main_image']['asset'])
*/

        return get_defined_vars();
    }

    public function render($__runner, data_container $__d, array $slots=[]):void {
        // ob_start();
        // if($this->is_layout) print '<!DOCTYPE html>';
        $__s = [];
        ?><?php array_unshift($__s, []); ob_start(); ?>

    <?php if($__d->_get("page")->body){ ?><aside>
        <?php $__runner($__runner, "sanity.text", $__d->_get("phuety")->with($this->tagname, "sanity.text"), ["block"=> $__d->_get("page")->body] + array (
) ); ?>
    </aside><?php } ?>


    <main class="dates">
        <?php if($__d->_get("termine")){ ?>

            <?php foreach($__d->_get("termine") as  $termin){$__d->_add_block(["termin"=>$termin ]); ?><section>
                <div class="when"> termin_date($doc['datum']) </div>

                <?php if($__d->_get("doc")->main_image){ ?><div class="bild">
                    <a href="$image_url($bild, &#039;gallery_big&#039;)" aria-label="Ich bin ein Bild, klick mich groß" class="ltbx">
                        image_source_set($bild, [300, 600])</a>
                </div><?php } ?>

                <div class="details">
                    <h2><?= tag::h($__d->_get("doc")->title) ?></h2>

                    <?php if($__d->_get("doc")->subtitle){ ?><h3><?= tag::h($__d->_get("doc")->subtitle) ?></h3><?php } ?>

                    <?php if($__d->_get("doc")->body){ ?><?php $__runner($__runner, "sanity.text", $__d->_get("phuety")->with($this->tagname, "sanity.text"), ["text"=> $__d->_get("doc")->body] + array (
) ); ?><?php } ?>

                    <?php if($__d->_get("eintritt")){ ?><p><?= tag::h($__d->_get("eintritt")) ?></p><?php } ?>

                </div>
            </section><?php $__d->_remove_block();} ?>

        <?php } else { ?><aside>
            <p>Leider gerade keine Termine 😩</p>
        </aside><?php } ?>
        

    </main>

    <aside foreach="sections as section">
        <?php $__runner($__runner, "sanity.text", $__d->_get("phuety")->with($this->tagname, "sanity.text"), ["block"=> $__d->_get("doc")->body, "profile"=> $__d->_get("small"), "lightbox"=> $__d->_get("gallery_big")] + array (
) ); ?>
    </aside>

<?php $__runner($__runner, "layout.default", $__d->_get("phuety")->with($this->tagname, "layout.default"), ["page"=> $__d->_get("page")] + array (
  'lang' => 'en',
) , ["default" => ob_get_clean()]+array_shift($__s)); ?><?php // return ob_get_clean();
        // dbg("+++ assetsholder ", $this->is_start, $this->assetholder);
    }

    public function debug_info(){
        return array (
  'src' => '/Users/rw/dev/lux-berlin/slowfoot/src/templates/page.phue.php',
  'php' => 42,
);
    }
}
