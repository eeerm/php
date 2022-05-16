<?php 
if (isset($_POST['sel'])) {
  foreach ($_POST['sel'] as $value) {
    echo "$value <br>";
  }
}
if (isset($_POST['bgw'])) {
  echo $_POST['bgw'] . "<br>";
}

if (isset($_POST['zielony'])) {
  echo 'zielony' . "<br>";
}
if (isset($_POST['czerwony'])) {
  echo 'czerwony' . "<br>";
}
if (isset($_POST['niebieski'])) {
  echo 'niebieski' . "<br>";
}
?>


