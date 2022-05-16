<?php 
// error_reporting(E_ALL ^ E_ALL);
if (isset($_POST['login'])) $login = $_POST['login'];
if (isset($_POST['pass'])) $pass = $_POST['pass'];


echo "twój login: $login <br>";

$sha1_pass = sha1($pass);
echo "hasło sha1: $sha1_pass <br>";

$md5_pass = md5($pass);
echo "hasło md5: $md5_pass <br>";

if (!isset($_POST['rem'])) {
  echo "Nie zaznaczono pola zapamiętaj mnie <br>";
} else {
  echo "Zaznaczono pole zapamiętaj mnie <br>";

  $f = fopen("haslo.txt", "w+");
  fwrite($f, "$sha1_pass\n$md5_pass\n");
  while(!feof($f)) echo fgets($f) . "<br>";
  fclose($f);

}
?>