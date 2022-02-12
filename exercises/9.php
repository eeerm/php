<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
function napis1($tekst) {
    echo strtoupper($tekst);
    echo '<br>';
    echo strtolower($tekst);
    echo '<br>';
    echo substr(ucfirst(strtolower($tekst)), 0, -1) . strtoupper(substr($tekst, -1));
    echo '<br>';
    $arr = str_split($tekst);
    for ($i=0; $i < count($arr); $i++) { 
        echo $i % 2 == 0 ? strtoupper($arr[$i]) : strtolower($arr[$i]);
    }
    echo '<br>';
}

function napis2($tekst) {
    if (strlen($tekst) >= 3) {
        echo ucfirst(strtolower($tekst));
    } else {
        echo "Tekst jest za krótki";
    }
    echo '<br>';
}

function napis3($tekst) {
    if (!strpos($tekst, "02-543")) {
        echo "Niepoprawny kod pocztowy";
    } else {
        echo "Poprawny kod pocztowy";
    }
    echo '<br>';
}

function napis5($tekst) {
    $nowyTekst = str_replace(' ', '', $tekst);
    $nowyTekst = strtolower($nowyTekst);
    $nowyTekst = trim($nowyTekst);
    if (strcmp($nowyTekst, strrev($nowyTekst)) == 0) {
        echo $tekst . " to palindrom";
    } else {
        echo $tekst . " to nie palindrom";
    }
    echo '<br>';
}

function napis6($tekst1, $tekst2) {
    if (count_chars($tekst1, 1) == count_chars($tekst2, 1)) {
        return 'tak';
    } else {
        return 'nie';
    }
}

function szyfr($tekst) {
    $arr = str_split($tekst);
    foreach ($arr as $ch) {
        $num = 2;
        echo chr((26 + (ord($ch)+$num-97)) % 26 + 97);
    }
    echo '<br>';
}

napis1('Programuje w PHP i BARDZO to lubie');

napis3('Warszawa kod 02-543');

$tekst = "JAVA Script i PHP są super!";
echo substr($tekst, 0, -6); # $tekst - 'super!'
echo '<br>';
echo substr($tekst, 5, 6); # Script
echo '<br>';
echo substr($tekst, 14, 3); # PHP
echo '<br>';

napis5('Elf ukladal kufle            ');

echo napis6('anagram', 'nagaram');
echo '<br>';

szyfr('akz');

?>
</body>
</html>