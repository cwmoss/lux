<?php
layout('default');

#$links = query('*[_id=="$id"]{articles[]->, pix[]->}[0]', ['id' =>$_id]);
$links = [];
$subtitle = "untertitel";
$termine = $page['termine'];
$sections = $page['sections'] ?? [];
?>

<? if ($page['body']) { ?>
    <aside>
        <?= $sanity_text($page['body']); ?>
    </aside>
<? } ?>

<main class="dates">
    <? if ($termine) {
        foreach ($termine as $termin) {
            $doc = $ref($termin); #strtotime($doc['datum'])
            $eintritt = $doc['admission_text'] ?? ($doc['admission_is_free'] ? 'Eintritt Frei' : ''); ?>
            <section>
                <div class="when"><?= termin_date($doc['datum']) ?></div>
                <? if ($doc['main_image']) {
                    $bild = $ref($doc['main_image']['asset']); ?>
                    <div class="bild"><a href="<?= $image_url($bild, 'gallery_big') ?>" aria-label="Ich bin ein Bild, klick mich groß" class="ltbx"><?= $image_tag($bild, 'small') ?></a></div>
                <?php
                } ?>
                <div class="details">
                    <h2><?= $doc['title'] ?></h2>
                    <? if ($doc['subtitle']) { ?>
                        <h3><?= $doc['subtitle'] ?></h3>
                    <? } ?>
                    <? if ($doc['body']) { ?>
                        <?= $sanity_text($doc['body']); ?>
                    <? } ?>

                    <? if ($eintritt) { ?>
                        <p><?= $eintritt ?></p>
                    <? } ?>

                </div>
            </section>

        <?php
        } ?>

    <?php
    } else { ?>

        <aside>
            <p>Leider gerade keine Termine 😩</p>
        </aside>
    <? } ?>
</main>


<? foreach ($sections as $section) {
    $doc = $ref($section['ref'])
?>
    <aside>
        <?= $sanity_text($doc['body'], ['profile' => 'small', 'lightbox' => 'gallery_big']); ?>
    </aside>
<?php
} ?>