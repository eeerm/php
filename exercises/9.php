<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Document</title>
</head>
<body>
    <form action="9.php" method="post">
        ć1: <input type="text" name="c1" id="c1"><br>
        ć2: <input type="text" name="c2" id="c2"><br>
        ć3: <input type="text" name="c3" id="c3"><br>
        ć5: <input type="text" name="c5" id="c5"><br>
        ć6: <input type="text" name="c6" id="c6">
        <input type="text" name="c6-2" id="c6-2"><br>
        ć7: <input type="text" name="c7" id="c7"><br>
        <input type="submit" value="Wykonaj">
    </form>
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
    # strrev dla polskich znaków
    function utf8_strrev($str){
        preg_match_all('/./u', $str, $ar); # $ar[0] = str_split($str), z użyciem utf-8
        return implode(array_reverse($ar[0]));
    }
    $nowyTekst = str_replace(' ', '', $tekst);
    $nowyTekst = trim($nowyTekst);
    if (strcasecmp($nowyTekst, utf8_strrev($nowyTekst))) {
        echo $tekst . " to nie palindrom";
    } else {
        echo $tekst . " to palindrom";
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


$inputs = [];
foreach ($_POST as $k => $v) {
    array_push($inputs, $v);
}

echo '<h5>1.:</h5>';
# napis1('Programuje w PHP i BARDZO to lubie');
napis1($inputs[0]);

echo '<h5>2.:</h5>';
napis2($inputs[1]);

echo '<h5>3.:</h5>';
# napis3('Warszawa kod 02-543');
napis3($inputs[2]);

echo '<h5>4.:</h5>';
$tekst = "JAVA Script i PHP są super!";
echo substr($tekst, 0, -6); # $tekst - 'super!'
echo '<br>';
echo substr($tekst, 5, 6); # Script
echo '<br>';
echo substr($tekst, 14, 3); # PHP
echo '<br>';


echo '<h5>5.:</h5>';
# napis5('Elf ukladal kufle            ');
napis5($inputs[3]);

echo '<h5>6.:</h5>';
# echo napis6('anagram', 'nagaram');
# echo '<br>';
echo napis6($inputs[4], $inputs[5]) . '<br>';

echo '<h5>7.:</h5>';
# szyfr('akz');
szyfr($inputs[6]);

?>
</body>
</html>