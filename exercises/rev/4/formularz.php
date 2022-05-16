<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>4</title>
</head>
<body>
  <form action="./formularz.php" method="get">
    <input type="text" name="bgc" id="bgc" placeholder="Kolor tła">
    <input type="text" name="c" id="c" placeholder="Kolor tekstu">
    <input type="submit" value="Prześlij">
  </form>

  <?php 
$background_color = '000';
$text_color = 'fff';

if (isset($_GET['bgc'])) {
  $t = $_GET['bgc'];
  if (!preg_match('/[A-Fa-f0-9]{6}/', $t)) {
    echo "Niepoprawny kolor tła<br>";
  } else {
    $background_color = $t;
  }
}
if (isset($_GET['c'])) {
  $t = $_GET['c'];
  if (!preg_match('/[A-Fa-f0-9]{6}/', $t)) {
    echo "Niepoprawny kolor czcionki<br>";
  } else {
    $text_color = $t;
  }
}

echo "
<style>
  .par {
    height: 50%;
    width: 50%;
    margin: 50px auto;
    border: 2px dashed red;
    background-color: #$background_color;
    color: #$text_color;
  }
</style>
<p class=par>Maciej Rosiak</p>
";
  ?>
</body>
</html>