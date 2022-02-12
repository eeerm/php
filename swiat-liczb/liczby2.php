<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Ciągi liczbowe</title>
    <link rel="stylesheet" href="styl2.css">
</head>
<body>
    <div class="banner floats"><h2>Poznaj Ciągi Liczbowe</h2></div> 
    <div class="banner floats"><a href="liczby.php"><h5>Ciągi arytmetyczne</h5></a></div>
    <div class="banner floats"><a href="fib.php"><h5>Ciąg Fibonacciego</h5></a></div>
    <div class="banner floats"><img src="obraz1.png" alt="Fibonacci"></div>

    <div id="block-left" class="floats">
        <ol>
            <li><a href="liczby.php">ciągi arytmetyczne</a></li>
            <li><a href="liczby2.php">ciągi geometryczne</a></li>
            <li><a href="fib.php">ciąg Fibonacciego</a></li>
            <li><a href="tabliczka.php">tabliczka mnożenia</a></li>
        </ol>
    </div>

    <div id="block-right" class="floats">
        <h2>Generowanie ciągu geometrycznego</h2>
        <form action="liczby2.php" method="get">
            Pierwszy wyraz A1: <input type="number" name="num"><br>
            Iloraz ciągu Q: <input type="number" name="dif"><br>
            Liczba wyrazów w ciągu N: <input type="number" name="cnt" min="1"><br>
            <input type="submit" value="Generuj Ciąg">
        </form>
<?php
include 'functions.php';
$num = $_GET['num'];
$dif = $_GET['dif'];
$cnt = $_GET['cnt'];
geometryczny($num, $dif, $cnt);
?>
    </div>


    <footer>
        <p>Autor: Rosiak</p>
    </footer>
</body>
</html>