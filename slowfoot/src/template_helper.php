<?php

return [
    'sanity_link' => function ($sl, $opts=[]) use ($ds) {
        //print_r($sl);
        return sanity_link($sl, $opts, $ds);
    },

];
