<?php 
error_reporting(E_ALL ^ E_NOTICE);

# POLA

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
    return $r * $r * 3.14;
}

# OBWODY

function per_tri($a, $b, $c) {
    if ($a + $b <= $c or $a + $c <= $b or $b + $c <= $a) {
        return -1;
    } else {
        return $a + $b + $c;
    }
}
function per_rect($a, $b) {
    return 2 * ($a + $b);
}
function per_trp($a, $b, $c, $d) {
    return $a + $b + $c + $d;
}
function cir_crl($r) {
    return 2 * $r * 3.14;
}

?>