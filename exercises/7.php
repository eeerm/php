<form action="index.php" method="get">
    <input type="date" name="brt">
    <input type="submit" value="submit">
</form>
<?php 

$date1 = date_create_from_format('Y-m-d', $_GET['brt']);
$date2 = date_create_from_format('Y-m-d', date('Y-m-d'));
$diff = (array) date_diff($date1, $date2);

$arr = array();
$i = 0;
while ($i < 20) {
    $arr[$i++]=rand(1,100);
}
echo '<pre>' . print_r($arr, true) . '</pre>';

if ($diff['y'] >= 16) {
    echo "Max: " . max($arr) . "<br>";
    echo "MIN: " . min($arr) . "<br>";
    echo "AVG: " . (array_sum($arr)/count($arr)) . "<br>";
    echo "3: " . count(array_keys($arr, '3')) . "<br>";
    sort($arr);
    echo '<pre>' . print_r($arr, true) . '</pre>';

    $c_ev = $c_od = 0;
    foreach ($arr as $i => $value) {
        if ($value % 2 == 0) $c_ev++;
        else $c_odd++;
    }

    echo "Parzyste: $c_ev, nieparzyste $c_odd <br>";

    sort($arr);

    $med = count($arr) % 2 ? $arr[count($arr)/2] : ($arr[count($arr)/2] + $arr[count($arr)/2-1])/2;
    echo "Mediana: $med";

    for ($i=0; $i < 20; $i++) { 
        $arr[$i] *= $arr[$i];
    }

    echo '<pre>' . print_r($arr, true) . '</pre>';

    $minarr = array_slice($arr, 0, 3);
    $maxarr = array_slice($arr, -3, 3);
    echo "<pre>3MIN: " . print_r($minarr, true);
    echo "3MAX: " . print_r($maxarr, true) . '</pre>';
}


?>