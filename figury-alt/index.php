<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Kraina figur</title>
    <style>
        body {
            background-color: lightsteelblue;
        }
        table, th, td {
            background-color: white;
            border: 2px solid royalblue;
            border-collapse: collapse;
            color: black;
        }
        th, td:first-child {
            background-color: darkblue;
            color: white;
        }
        th {
            height: 40px;
        }
        td:first-child {
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    <h1><b>Kraina figur</b></h1>
<?php
$quotes = array(
    "Nie przejmuj się, jeżeli masz problemy z matematyka. Zapewniam Cię, że ja mam jeszcze większe. - Albert Einstein",
    "Matematyk to ślepiec w ciemnym pokoju szukający czarnego kota, którego tam w ogóle nie ma. - Karol Darwin",
    "Matematykę można zdefiniować jako przedmiot, w którym nigdy nie wiadomo, o czym się mówi, ani, czy to, o czym się mówi, jest prawdziwe. - Bertrand Russell",
    "Przetnij kamień na pół, a będziesz miał dwa kamienie. Ale przetnij żabę na pół, a będziesz miał tylko jedną martwą żabę. - Archimedes",
    "Matematyka jest alfabetem, za pomocą którego Bóg opisał wszechświat. -  Galileusz"
);
echo '<h4><i>' . $quotes[rand(0,4)] . '</i></h4>';
?>
    <form action="index.php" method="post">
        <label for="tri_a">Trójkąt (pole): <br>bok: </label>
        <input type="number" name="tri_a" id="tri_a" min=0>
        <label for="tri_h"><br>wysokość: </label>
        <input type="number" name="tri_h" id="tri_h" min=0>
        <br>
        <br>Trójkąt (pole i/lub obwód):
        <input type="checkbox" name="tri_cha" id="tri_cha">
        <label for="tri_cha">pole</label>
        <input type="checkbox" name="tri_chp" id="tri_chp">
        <label for="tri_chp">obwód</label>
        <label for="tri_b"><br>bok 1.: </label>
        <input type="number" name="tri_b" id="tri_b" min=0>
        <label for="tri_c"><br>bok 2.: </label>
        <input type="number" name="tri_c" id="tri_c" min=0>
        <label for="tri_d"><br>bok 3.: </label>
        <input type="number" name="tri_d" id="tri_d" min=0>
        <br>
        <br>Prostokąt: 
        <input type="checkbox" name="rect_cha" id="rect_cha">
        <label for="rect_cha">pole</label>
        <input type="checkbox" name="rect_chp" id="rect_chp">
        <label for="rect_chp">obwód</label>
        <label for="rect_a"><br>bok 1.: </label>
        <input type="number" name="rect_a" id="rect_a" min=0>
        <label for="rect_b"><br>bok 2.: </label>
        <input type="number" name="rect_b" id="rect_b" min=0>
        <br>
        <label for="trp_a"><br>Trapez: (pole) <br>podstawa 1.: </label>
        <input type="number" name="trp_a" id="trp_a" min=0>
        <label for="trp_b"><br>podstawa 2.: </label>
        <input type="number" name="trp_b" id="trp_b" min=0>
        <label for="trp_h"><br>wysokość: </label>
        <input type="number" name="trp_h" id="trp_h" min=0>
        <br>
        <label for="trp_c"><br>Trapez: (obwód) <br>bok 1.: </label>
        <input type="number" name="trp_c" id="trp_c" min=0>
        <label for="trp_d"><br>bok 2.: </label>
        <input type="number" name="trp_d" id="trp_d" min=0>
        <label for="trp_e"><br>bok 3.: </label>
        <input type="number" name="trp_e" id="trp_e" min=0>
        <label for="trp_f"><br>bok 4.: </label>
        <input type="number" name="trp_f" id="trp_f" min=0>
        <br>
        <br>Koło: 
        <input type="checkbox" name="crl_cha" id="crl_cha">
        <label for="crl_cha">pole</label>
        <input type="checkbox" name="crl_chp" id="crl_chp">
        <label for="crl_chp">obwód</label>
        <label for="crl_r"><br>promień: </label>
        <input type="number" name="crl_r" id="crl_r" min=0>
        <br><br>
        <input type="submit" value="Oblicz">
    </form>
<?php 
include 'funkcje.php';

if (($_POST['tri_a'] != '' and $_POST['tri_h'] != '') or ($_POST['tri_b'] != '' and $_POST['tri_c'] != '' and $_POST['tri_d'] != '')) {
    if (!(isset($_POST['tri_cha']) or isset($_POST['tri_chp']))) {
        $tri = array("a" => $_POST['tri_a'], "h" => $_POST['tri_h']);
        $ar_tri = area_tri($tri['a'], $tri['h']);
    } else {
        $tri = array("b" => $_POST['tri_b'], "c" => $_POST['tri_c'], "d" => $_POST['tri_d']);
        $ar_tri = area_tri_he($tri['b'], $tri['c'], $tri['d']);
        $pr_tri = per_tri($tri['b'], $tri['c'], $tri['d']);
    }
}
if ($_POST['rect_a'] != '' and $_POST['rect_b'] != '') {
    $rect = array("a" => $_POST['rect_a'], "b" => $_POST['rect_b']);
    $ar_rect = area_rect($rect['a'], $rect['b']);
    $pr_rect = per_rect($rect['a'], $rect['b']);
}
if (($_POST['trp_a'] != '' and $_POST['trp_b'] != '' and $_POST['trp_h'] != '') or ($_POST['trp_c'] != '' and $_POST['trp_d'] != '' and $_POST['trp_e'] != '' and $_POST['trp_f'] != '')) {
    $trp = array("a" => $_POST['trp_a'], "b" => $_POST['trp_b'], "h" => $_POST['trp_h'], "c" => $_POST['trp_c'],  "d" => $_POST['trp_d'],  "e" => $_POST['trp_e'],  "f" => $_POST['trp_f']);
    if ($_POST['trp_a'] != '' and $_POST['trp_b'] != '' and $_POST['trp_h'] != '') {
        $ar_trp = area_trp($trp['a'], $trp['b'], $trp['h']);
    } 
    if ($_POST['trp_c'] != '' and $_POST['trp_d'] != '' and $_POST['trp_e'] != '' and $_POST['trp_f'] != '') {
        $pr_trp = per_trp($trp['c'], $trp['d'], $trp['e'], $trp['f']);
    }
}
if ($_POST['crl_r'] != '') {
    $crl = array("r" => $_POST['crl_r']);
    $ar_crl = area_crl($crl['r']);
    $cr_crl = crf_crl($crl['r']);
}

echo '<table>';
echo '<tr><th>Nazwa figury</th><th>Rysunek</th><th>Przykładowe pole</th><th>Przykładowy obwód</th></tr>';
if ($tri and (!$pr_tri or (isset($_POST['tri_cha']) or isset($_POST['tri_chp'])))) {
    echo '<tr>';
    echo '<td>trójkąt</td>' . '<td><img src="img0.png" alt="trójkąt"></td>';
    if (!$pr_tri) {
        echo "<td>Pole trójkąta o podstawie " . $tri['a'] . " i wysokości " . $tri['h'] . " wynosi: $ar_tri</td>";
    } else {
        if (isset($_POST['tri_cha'])) {
            echo '<td>pole trójkąta o bokach ' . $tri['b'] . ' i ' . $tri['c'] . ' oraz ' . $tri['d'] . " wynosi $ar_tri";
        } else {
            echo '<td></td>';
        }
        if (isset($_POST['tri_chp'])) {
            echo '<td>obwód trójkąta o bokach ' . $tri['b'] . ' i ' . $tri['c'] . ' oraz ' . $tri['d'] . " wynosi $pr_tri";
        } else {
            echo '<td></td>';
        }
    }
    echo '</tr>';
}
if ($rect and (isset($_POST['rect_cha']) or isset($_POST['rect_chp']))) {
    echo '<tr>';
    echo '<td>prostokąt</td>' . '<td><img src="img1.png" alt="prostokąt"></td>';
    if (isset($_POST['rect_cha'])) {
        echo '<td>pole prostokąta o bokach ' . $rect['a'] . ' i ' . $rect['b'] . " wynosi $ar_rect";
    } else {
        echo '<td></td>';
    }
    if (isset($_POST['rect_chp'])) {
        echo '<td>obwód prostokąta o bokach ' . $rect['a'] . ' i ' . $rect['b'] . " wynosi $pr_rect";
    } else {
        echo '<td></td>';
    }
}
if ($trp) {
    echo '<tr>';
    echo '<td>trapez</td>' . '<td><img src="img2.png" alt="trapez"></td>';
    if ($ar_trp) {
        echo '<td>pole trapezu o podstawach ' . $trp['a'] . ' i ' . $trp['b'] . ' oraz wysokości ' . $trp['h'] . " wynosi $ar_trp";
    } else {
        echo '<td></td>';
    }
    if ($pr_trp) {
        echo '<td>obwód trapezu o bokach ' . $trp['c'] . ', ' . $trp['d'] . ', ' . $trp['e'] . ' i ' . $trp['f'] . " wynosi $pr_trp";
    } else {
        echo '<td></td>';
    }
}
if ($crl and (isset($_POST['crl_cha']) or isset($_POST['crl_chp']))) {
    echo '<tr>';
    echo '<td>koło</td>' . '<td><img src="img3.png" alt="koło"></td>';
    if (isset($_POST['crl_cha'])) {
        echo '<td>pole koła o promieniu ' . $crl['r'] . " wynosi $ar_crl";
    } else {
        echo '<td></td>';
    }
    if (isset($_POST['crl_chp'])) {
        echo '<td>obwód koła o promieniu ' . $crl['r'] . " wynosi $cr_crl";
    } else {
        echo '<td></td>';
    }
}
echo '</table>';
?>
    <footer>
        <h3>Maciej Rosiak</h3>
    </footer>
</body>
</html>