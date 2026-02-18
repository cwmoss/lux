<?php

use site;

$sizes = explode(",", $props->sizes);

print site::responsive_image($props->img, $sizes, $props->globals->config->assets, $helper);
