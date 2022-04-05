<?php
layout('default');

#$links = query('*[_id=="$id"]{articles[]->, pix[]->}[0]', ['id' =>$_id]);
$links = [];
$subtitle = "untertitel";
$termine = $page['termine'];
$sections = $page['sections'];
?>

<main class="dates">
	<?if ($termine) {
    foreach ($termine as $termin) {
        $doc = $ref($termin);
        $eintritt = $doc['admission_text']??($doc['admission_is_free']?'Eintritt Frei':''); ?>
        <section>
            <div class="when"><?=date("d.m", strtotime($doc['datum']))?></div>
            <div class="details">
                <h2><?=$doc['title']?></h2>
				<?if ($doc['body']) {?>
					<?=$sanity_text($doc['body']); ?>
				<?} ?>
                
				<?if ($eintritt) {?>
					<p><?=$eintritt?></p>
				<?} ?>

            </div>
        </section>
		
		<?php
    } ?>
       
	<?php
} else {?>

		<aside><p>Leider gerade keine Termine 😩</p></aside>
	<?}?>
</main>

<?foreach ($sections as $section) {
        $doc = $ref($section['ref'])
    ?>
<aside>
        <?=$sanity_text($doc['body']); ?>
    </aside>
<?php
    }?>