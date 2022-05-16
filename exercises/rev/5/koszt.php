<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>5</title>
</head>
<body>
  <form action="./koszt.php" method="get">
    <input type="text" name="koszt" id="koszt" placeholder="Koszt">
    <input type="number" name="km" id="km" placeholder="Ilość kilometrów">
    <input type="text" name="avg" id="avg" placeholder="Średnie spalanie">
    <input type="submit" value="Oblicz">
  </form>

  <?php 
function oblicz($c, $d, $a) {
  return $c * $d * $a / 100;
} 

if (!(isset($_GET['koszt']) and isset($_GET['km']) and isset($_GET['avg']))) {
  echo "Proszę wprowadzić wszystkie dane <br>";
} else {
  echo "Twój wynik to: " . oblicz((float)$_GET['koszt'], $_GET['km'], (float)$_GET['avg']);
}
  ?>
</body>
</html>