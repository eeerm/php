<?php 
require 'page.php';
?>
    <div id="block-right" class="floats">
        <h2>Generowanie tabliczki mnożenia</h2>
        <form action="tabliczka.php" method="get">
            Liczba kolumn: <input type="number" name="col" min=1 ><br>
            Liczba wierszy: <input type="number" name="row" min=1 ><br>
            <input type="submit" value="Generuj Tabliczkę">
        </form>
<?php
include 'functions.php';
$col = $_GET['col'];
$row = $_GET['row'];
tabliczka($col, $row);
?>
    </div>


    <footer>
        <p>Autor: Rosiak</p>
    </footer>
</body>
</html>