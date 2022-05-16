<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>Rejestracja</title>
    </head>
    <body>
        <b>Formularz kontaktowy</b>
        <form action="form.php" method="post">
            <label for="nazwisko">Nazwisko:</label>
            <input type="text" name="nazwisko" id="nazwisko">
            <br>
            <label for="imie">Imię:</label>
            <input type="text" name="imie" id="imie">
            <br>
            <label for="zawod">Zawód:</label>
            <input type="text" name="zawod" id="zawod">
            <br>
            <label for="email">Adres e-mail:</label>
            <input type="text" name="email" id="email">
            <br>
            <br>
            Wykształcenie:<br>
            <input type="radio" name="wyksztalcenie" id="podstawowe" value="podstawowe" checked>
            <label for="podstawowe">Podstawowe</label> 
            <br>
            <input type="radio" name="wyksztalcenie" id="srednie" value="srednie">
            <label for="srednie">Średnie</label>
            <br>
            <input type="radio" name="wyksztalcenie" id="wyzsze" value="wyzsze">
            <label for="wyzsze">Wyższe</label>
            <br>
            <br>
            W jakim języku programujesz?<br>
            <input type="checkbox" name="prog[]" id="PhP" value="php">
            <label for="PhP">PhP</label>
            <br>
            <input type="checkbox" name="prog[]" id="js" value="js">
            <label for="js">JavaScript</label>
            <br>
            <input type="checkbox" name="prog[]" id="py" value="py">
            <label for="py">Python</label>
            <br>
            <input type="checkbox" name="prog[]" id="cpp" value="cpp">
            <label for="cpp">C++</label>
            <br>
            <input type="checkbox" name="prog[]" id="java" value="java">
            <label for="java">Java</label>
            <br>
            <br>
            <input type="checkbox" name="rodo" id="rodo" value="rodo">
            <label for="rodo">Zgadzam się na przetwarzanie danych osobowych</label>
            <br>
            <br>
            <b>Wybór języka</b><br>
            <select multiple name="langs[]" id="langs">
                <option value="polski">język polski</option>
                <option value="angielski">język angielski</option>
                <option value="francuski">język francuski</option>
                <option value="niemiecki">język niemiecki</option>
                <option value="rosyjski">język rosyjski</option>
            </select>
            <br>
            <br>
            <input type="submit" value="Wyślij">
            <input type="reset" value="Wyczyść">
            <br>
            <br>
<?php 
echo '<pre>';
print_r($_POST);
echo '</pre>';

echo 'Nazwisko: ' . $_POST['nazwisko'] . '<br>';
echo 'Imie: ' . $_POST['imie'] . '<br>';
echo 'Zawód: ' . $_POST['zawod'] . '<br>';
echo 'Adres e-mail: ' . $_POST['email'] . '<br>';

echo 'Wykształcenie: ' . $_POST['wyksztalcenie'] . '<br>';

if(!isset($_POST['prog'])) {
    echo 'Brak znajomości języków<br>';
} else {
    $n = count($_POST['prog']);
    echo "Wybrane $n języki: ";
    foreach($_POST['prog'] as $v) {
        echo $v . ', ';
    }
    echo '<br>';
}

if(!isset($_POST['rodo'])) {
    echo 'Nie wyrażono zgody';
} else {
    echo 'Wyrażono zgodę';
}
echo ' na przetwarzanie danych osobowych<br>';

if(empty($_POST['langs'])) {
    echo 'Brak znajomości języków<br>';
} else {
    echo 'Wybrane jezyki: <ul>';
    foreach($_POST['langs'] as $v) {
        echo '<li>' . $v . '</li>';
    }
    echo '</ul><br>';
}
?>
        </form> 
    </body>
</html>