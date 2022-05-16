<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Kraina figur</title>
    <style>
        table, td {
            border: 2px solid #144B84;
            border-collapse: collapse;
        }
        th, td:first-child {
            background: #123B62;
            border: 2px solid #144B84;
            color: white;
        }
        th {
            height: 50px;
        }
        td:first-child {
            text-transform: uppercase;
        }
    </style>
</head>
<body>

<header>
    <h1><b>Kraina figur</b></h1>
<?php
$quotes = array(
    "„Nie przejmuj się, jeżeli masz problemy z matematyką. Zapewniam Cię, że ja mam jeszcze większe.“ — Albert Einstein",
    "„Przetnij kamień na pół, a będziesz miał dwa kamienie. Ale przetnij żabę na pół, a będziesz miał tylko jedną martwą żabę.“ — Archimedes",
    "„Trudno jest iść przez życie wieloma drogami jednocześnie.“ — Pitagoras",
    "„Nieskończoność! Żadne inne pytanie nie poruszyło tak głęboko duszy człowieka.“ — David Hilbert",
    "„W matematyce nie ma drogi specjalnie dla królów.“ — Euklides"
);
echo '<h4><i>' . $quotes[rand(0,4)] . '</i></h4>';
?>
</header>

<main>
    <form action="index.php" method="post">
        <label for="tri_a">Trójkąt - pole: <br>bok: </label>
        <input type="number" name="tri_a" id="tri_a" min=0>
        <label for="tri_h"><br>wysokość: </label>
        <input type="number" name="tri_h" id="tri_h" min=0>
        <br>
        <label for="ptri_a"><br>Trójkąt - obwód: <br>bok 1.: </label>
        <input type="number" name="ptri_a" id="ptri_a" min=0>
        <label for="ptri_b"><br>bok 2.: </label>
        <input type="number" name="ptri_b" id="ptri_b" min=0>
        <label for="ptri_c"><br>bok 3.: </label>
        <input type="number" name="ptri_c" id="ptri_c" min=0>
        <br>
        <label for="rect_a"><br>Prostokąt: <br>bok 1.: </label>
        <input type="number" name="rect_a" id="rect_a" min=0>
        <label for="rect_b"><br>bok 2.: </label>
        <input type="number" name="rect_b" id="rect_b" min=0>
        <br>
        <label for="trp_a"><br>Trapez - pole: <br>podstawa 1.: </label>
        <input type="number" name="trp_a" id="trp_a" min=0>
        <label for="trp_b"><br>podstawa 2.: </label>
        <input type="number" name="trp_b" id="trp_b" min=0>
        <label for="trp_h"><br>wysokość: </label>
        <input type="number" name="trp_h" id="trp_h" min=0>
        <br>
        <label for="ptrp_a"><br>Trapez - obwód: <br>bok 1.: </label>
        <input type="number" name="ptrp_a" id="ptrp_a" min=0>
        <label for="ptrp_b"><br>bok 2.: </label>
        <input type="number" name="ptrp_b" id="ptrp_b" min=0>
        <label for="ptrp_c"><br>bok 3.: </label>
        <input type="number" name="ptrp_c" id="ptrp_c" min=0>
        <label for="ptrp_d"><br>bok 4.: </label>
        <input type="number" name="ptrp_d" id="ptrp_d" min=0>
        <br>
        <label for="crl_r"><br>Koło: <br>promień: </label>
        <input type="number" name="crl_r" id="crl_r" min=0>
        <br> <br>
        <input type="submit" value="Oblicz">
        <br><br>
    </form>
<?php 
include 'funkcje.php';

if ($_POST['tri_a'] != '' and $_POST['tri_h'] != '') {
    $tri = array("a" => $_POST['tri_a'], "h" => $_POST['tri_h']);
    $ar_tri = area_tri($tri['a'], $tri['h']);
}
if ($_POST['ptri_a'] != '' and $_POST['ptri_b'] != '' and $_POST['ptri_c'] != '') {
    $ptri = array("a" => $_POST['ptri_a'], "b" => $_POST['ptri_b'], "c" => $_POST['ptri_c']);
    $pr_tri = per_tri($ptri['a'], $ptri['b'], $ptri['c']);
}
if ($_POST['rect_a'] != '' and $_POST['rect_b'] != '') {
    $rect = array("a" => $_POST['rect_a'], "b" => $_POST['rect_b']);
    $ar_rect = area_rect($rect['a'], $rect['b']);
    $pr_rect = per_rect($rect['a'], $rect['b']);
}
if ($_POST['trp_a'] != '' and $_POST['trp_b'] != '' and $_POST['trp_h'] != '') {
    $trp = array("a" => $_POST['trp_a'], "b" => $_POST['trp_b'], "h" => $_POST['trp_h']);
    $ar_trp = area_trp($trp['a'], $trp['b'], $trp['h']);
}
if ($_POST['ptrp_a'] != '' and $_POST['ptrp_b'] != '' and $_POST['ptrp_c'] != '' and $_POST['ptrp_d'] != '') {
    $ptrp = array("a" => $_POST['ptrp_a'], "b" => $_POST['ptrp_b'], "c" => $_POST['ptrp_c'], "d" => $_POST['ptrp_d']);
    $pr_trp = per_trp($ptrp['a'], $ptrp['b'], $ptrp['c'], $ptrp['d']);
}
if ($_POST['crl_r'] != '') {
    $crl = array("r" => $_POST['crl_r']);
    $ar_crl = area_crl($crl['r']);
    $cr_crl = cir_crl($crl['r']);
}

echo '<table>';
echo '<tr><th>Nazwa figury</th><th>Rysunek</th><th>Przykładowe pole</th><th>Przykładowy obwód</th></tr>';
if ($tri or $ptri) {
    echo '<tr>';
    echo '<td>trójkąt</td>' . '<td><img src="img0.png" alt="trójkąt"></td>';
    if ($tri) {
        echo "<td>Pole trójkąta o podstawie " . $tri['a'] . " i wysokości " . $tri['h'] . " wynosi: $ar_tri</td>";
    } else {
        echo "<td></td>";
    }
    if ($ptri) {
        if ($pr_tri == -1) {
            echo "<td>Z boków " . $ptri['a'] . ', ' . $ptri['b'] . ' i ' . $ptri['c'] . " nie można zbudować trójkąta</td>";
        } else {
            echo "<td>Obwód trójkąta o bokach " . $ptri['a'] . ', ' . $ptri['b'] . ' i ' . $ptri['c'] . " wynosi $pr_tri</td>";
        }
    } else {
        echo "<td></td>";
    }
    echo '</tr>';
}
if ($rect) {
    echo '<tr>';
    echo '<td>prostokąt</td>' . '<td><img src="img1.png" alt="prostokąt"></td>';
    echo "<td>Pole prostokąta o bokach " . $rect['a'] . ' i ' . $rect['b'] . " wynosi: $ar_rect</td>";
    echo "<td>Obwód prostokąta o bokach " . $rect['a'] . ' i ' . $rect['b'] . " wynosi: $pr_rect</td>";
    echo '</tr>';
}
if ($trp or $ptrp) {
    echo '<tr>';
    echo '<td>trapez</td>' . '<td><img src="img2.png" alt="trapez"></td>';
    if ($trp) {
        echo "<td>Pole trapezu o podstawach " . $trp['a'] . ' oraz ' . $trp['b'] . ' i wysokości ' . $trp['h'] . " wynosi: $ar_trp</td>";
    } else {
        echo "<td></td>";
    }
    if ($ptrp) {
        echo "<td>Obwód trapezu o bokach " . $ptrp['a'] . ', ' . $ptrp['b'] . ', ' . $ptrp['c'] . ' i ' . $ptrp['d'] . " wynosi: $pr_trp</td>";
    } else {
        echo "<td></td>";
    }
    echo '</tr>';
}
if ($crl) {
    echo '<tr>';
    echo '<td>koło</td>' . '<td><img src="img3.png" alt="koło"></td>';
    echo "<td>Pole koła o promieniu " . $crl['r'] . " wynosi: $ar_crl</td>";
    echo "<td>Obwód koła o promieniu " . $crl['r'] . " wynosi: $cr_crl</td>";
    echo '</tr>';
}

# jeśli nic nie ma wyświetl przykładowy trójkąt

if (!$crl and !$tri and !$ptri and !$rect and !$trp and !$ptrp) {
    echo '<tr>';
    echo '<td>trójkąt</td>' . '<td><img src="img0.png" alt="trójkąt"></td>';
    echo "<td>Pole trójkąta o podstawie 4 i wysokości 7 wynosi: " . area_tri(4, 7) . "</td>";
    echo "<td>Obwód trójkąta o bokach 4, 5 i 6 wynosi: " . per_tri(4, 5, 6) . "</td>";
    echo '</tr>';
}


echo '</table>';
?>

</main>

<footer>
    <h3>Maciej Rosiak</h3>
</footer>

</body>
</html>