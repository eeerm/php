<?php
function oblicz($d, $is_hot) {
  return !$is_hot ? $d * 0.5 : $d * 0.5 * 1.15;
}

if (!isset($_GET['dist'])) {
  echo "Wprowadź dystans <br>";
} else {
  $bonus = isset($_GET['hot']) ? true : false;
  echo "Twoja pizza kosztuje: " . oblicz($_GET['dist'], $bonus) . "zł";
}
?>