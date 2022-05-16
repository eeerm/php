<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>2</title>
</head>
<body>
  <form action="./komentarz.php" method="post">
    <input type="text" name="nick" id="nick" placeholder="Pseudonim">
    <br>
    <textarea name="com" id="com" cols="30" rows="10" placeholder="Miejsce na komentarz"></textarea>
    <br>
    <input type="submit" value="Prześlij">
  </form>

  <?php 
if (isset($_POST['nick']) && isset($_POST['com'])) {
  $pseudonim = $_POST['nick'];
  $komentarz = $_POST['com'];
  $komentarz_tekst_1 = htmlentities($komentarz);
  $komentarz_tekst_2 = htmlspecialchars($komentarz);

  $arr_t = [$pseudonim, $komentarz, $komentarz_tekst_1, $komentarz_tekst_2];

  foreach ($arr_t as $value) {
    echo "<p>$value</p>";
  }
}
  ?>
</body>
</html>