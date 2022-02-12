<?php
error_reporting(E_ALL ^ E_NOTICE);
function arytmetyczny($num, $dif, $cnt) {
    echo 'Ciąg arytmetyczny zawiera wyrazy: ';
    for ($cnt; $cnt > 0; $cnt--) {
        echo $num . ', ';
        $num += $dif;
    }
}

function geometryczny($num, $dif, $cnt) {
    echo 'Ciąg geometryczny zawiera wyrazy: ';
    for ($cnt; $cnt > 0; $cnt--) {
        echo $num . ', ';
        $num *= $dif;
    }
}

function fibonacci($cnt) {
    $num = $num2 = 1;
    echo 'Ciąg Fibonacciego: ';
    for ($cnt; $cnt > 0; $cnt--) {
        echo $num2 < $num ? $num2 : $num;
        $num2 < $num ? $num2 += $num : $num += $num2;
        echo ', ';
    }
}

function tabliczka($col, $row) {
    echo '<table style="text-align:center; border: 1px solid black; max-width: 300px; max-height: 300px;">';
    for ($i = 1; $i <= $col; $i++) {
        echo '<tr>';
        for ($j = 1; $j <= $row; $j++) {
            if ($i == 1 or $j == 1) {
                echo '<td style="border:1px dashed black;background-color: darkslategray; color: white;">' . ($i * $j) . "<td>";
            } else {
                echo '<td style="border:1px double black;">' . ($i * $j) . "<td>";
            }
        }
        echo '</tr>';
    }
    echo '</table>';
}

?>