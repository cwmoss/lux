<a :href="url">{{text}}</a>

<?php
$link = $props->navitem->link;

$url = $link->internal ?
    $helper->path($link->internal->_ref)
    : ($link->route ? path_page($link->route)
        : $link->external);
$text = $link->text;
// $text = $opts['text'] ?: $sl['text'];
if (!$text) {
    if ($link->internal) {
        $internal = $helper->ref($link->internal);
        $text = $internal->title;
    } else {
        $text = $url;
    }
}
// debug_js("int", $internal);
