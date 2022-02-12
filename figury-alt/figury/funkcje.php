<?php 
error_reporting(E_ALL ^ E_NOTICE);
function area_tri($a, $h) {
    return $a * $h /2;
}
function area_rect($a, $b) {
    return $a * $b;
}
function area_trp($a, $b, $h) {
    return ($a + $b) * $h / 2;
}
function area_crl($r) {
    return $r * $r * pi();
}
?>