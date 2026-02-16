<?php

$termin = function ($date, $with_weekday = true, $lang = 'de') {
    if (!is_numeric($date)) {
        $date = strtotime($date);
    }
    $lang = strtolower($lang) == 'de' ? 'de_DE' : 'en_US';

    if (date("Y", $date) != date("Y")) {
        $Y = 'y';
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
