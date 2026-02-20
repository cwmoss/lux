<section>
    <div class="when" :html="termin_date_fmt(termin.datum)"></div>

    <div :if="bild" class="bild">
        <a :href="helper.image_url(bild, 'gallery_big')"
            aria-label="Ich bin ein Bild, klick mich groß" class="ltbx">
            <image.set :img="bild" :sizes="'300,600'"></image.set>
        </a>

    </div>

    <div class="details">
        <h2>{{termin.title}}</h2>

        <h3 :if="termin.subtitle">{{termin.subtitle}}</h3>

        <sanity.text :if="termin.body" :block="termin.body"></sanity.text>

        <p :if="eintritt" :html="eintritt"></p>

    </div>
</section>
<?php

use slowfoot_plugin\sanity\sanity;
use IntlDateFormatter;

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
