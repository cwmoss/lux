<?php

define('SLOWFOOT_START', microtime(true));
define('SLOWFOOT_BASE', dirname(__DIR__));

print "base: ".SLOWFOOT_BASE;

require SLOWFOOT_BASE . '/vendor/autoload.php';

$NOCLI = true;

require SLOWFOOT_BASE . '/vendor/cwmoss/slowfoot-lib/src/webdeploy.php';
