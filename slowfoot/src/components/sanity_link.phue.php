<a :href="url">{{text}}</a>

<?php

use site;

[$url, $text] = site::link($props->navitem->link, $helper);
// debug_js("int", $internal);
