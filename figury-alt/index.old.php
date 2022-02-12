<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Kraina figur</title>
    <style>
        table, th, td {
            border: 2px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>

    <h1><b>Kraina figur</b></h1>
<?php
$quotes = array("abc", "bca", "acb", "bac", "cba");
echo '<h4><i>' . $quotes[rand(0,4)] . '</i></h4>';
?>
    <form action="index.php" method="post">
        <label for="tri_a">Trójkąt: <br>bok: </label>
        <input type="number" name="tri_a" id="tri_a" min=0>
        <label for="tri_h"><br>wysokość: </label>
        <input type="number" name="tri_h" id="tri_h" min=0>
        <label for="rect_a"><br>Prostokąt: <br>bok 1.: </label>
        <input type="number" name="rect_a" id="rect_a" min=0>
        <label for="rect_b"><br>bok 2.: </label>
        <input type="number" name="rect_b" id="rect_b" min=0>
        <label for="trp_a"><br>Trapez: <br>podstawa 1.: </label>
        <input type="number" name="trp_a" id="trp_a" min=0>
        <label for="trp_b"><br>podstawa 2.: </label>
        <input type="number" name="trp_b" id="trp_b" min=0>
        <label for="trp_h"><br>wysokość: </label>
        <input type="number" name="trp_h" id="trp_h" min=0>
        <label for="crl_r"><br>Koło: <br>promień: </label>
        <input type="number" name="crl_r" id="crl_r" min=0>
        <br>
        <input type="submit" value="Oblicz">
    </form>
<?php 
include 'funkcje.php';

if ($_POST['tri_a'] != '' and $_POST['tri_h'] != '') {
    $tri = array("a" => $_POST['tri_a'], "h" => $_POST['tri_h']);
    $ar_tri = area_tri($tri['a'], $tri['h']);
}
if ($_POST['rect_a'] != '' and $_POST['rect_b'] != '') {
    $rect = array("a" => $_POST['rect_a'], "b" => $_POST['rect_b']);
    $ar_rect = area_rect($rect['a'], $rect['b']);
}
if ($_POST['trp_a'] != '' and $_POST['trp_b'] != '' and $_POST['trp_h'] != '') {
    $trp = array("a" => $_POST['trp_a'], "b" => $_POST['trp_b'], "h" => $_POST['trp_h']);
    $ar_trp = area_trp($trp['a'], $trp['b'], $trp['h']);
}
if ($_POST['crl_r'] != '') {
    $crl = array("r" => $_POST['crl_r']);
    $ar_crl = area_crl($crl['r']);
}

echo '<table>';
echo '<tr><th>Nazwa figury</th><th>Rysunek</th><th>Przykładowe pole</th></tr>';
if ($tri) {
    echo '<tr>';
    echo '<td>trójkąt</td>' . '<td><img src="img0.png" alt="trójkąt"></td>';
    echo "<td>Pole trójkąta o podstawie " . $tri['a'] . " i wysokości " . $tri['h'] . " wynosi: $ar_tri</td>";
    echo '</tr>';
}
if ($rect) {
}
if ($trp) {
}
if ($crl) {
}
echo '</table>';

# echo '<pre>' . print_r($_POST, true) . '</pre>';
?>
    <footer>
        <h3>AMaciej Rosiak</h3>
    </footer>

</body>
</html>