<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>10 Walidacja formularzy</title>
</head>
<body>

    <form action="10.php" method="post">
        <?php 
        $inputs_defaults = [
            "imie" => "Imię",
            "nazwisko" => "Nazwisko",
            "data-urodzenia" => "dd-mm-rrrr",
            "pesel" => "###########",
            "nip" => "###-###-##-##",
            "kod-pocztowy" => "##-###",
            "miasto" => "Miasto",
            "adres" => "Adres",
            "email" => "adres@e.mail",
            "telefon-komorkowy" => "+## ### ### ###",
            "telefon-stacjonarny" => "## ### ## ##",
        ];

        $gs = ["k", "m", "n"];

        function genForm() {
            foreach ($GLOBALS['inputs_defaults'] as $input => $default) {
                $input_label = ucfirst(str_replace("-", " ", $input));
                echo "<input type=\"text\" name=\"$input\" id=\"$input\" placeholder=\"$default\"> <label for=\"$input\">$input_label</label></br>";
            }
            foreach ($GLOBALS['gs'] as $i => $g) {
                echo "<input type=\"radio\" name=\"g\" id=\"$g\" value=\"$g\"";
                if ($g == 'n') echo " checked=\"checked\"";
                echo "><label for=\"$g\">$g</label>";
            }
            echo '<br>';
            echo "<button type=\"submit\">Wprowadź dane</button>";
            echo '<br>';
        }

        genForm();
        ?>
    </form>
    
    <button class="def">Wypełnij przykładowymi wartościami</button>

    <script type="text/javascript">
        const examples = [
            "Jane",
            "Doe",
            "01-01-1970",
            "01234567890",
            "123-123-12-12",
            "01-234",
            "Warszawa",
            "ul. Wiśniowa 56",
            "lol@gmail.com",
            "+48 123 456 789",
            "12 345 67 89",
        ];
        const btn = document.querySelector(".def");
        btn.addEventListener("click", () => {
            const inputs = document.querySelectorAll("input");
            inputs.forEach((input, i)=>{
                input.value = examples[i];
            })
        })
    </script>

    <br>

<?php 


$name_reg = '/^([A-ZĆŁŚŹŻ][a-ząćęłńóśźż]+([ ]?[a-ząćęłńóśźż]?[\'-]?[A-ZĆŁŚŹŻ][a-ząćęńóśźż]+)*)$/';
$regexs = [
    "imie" => $name_reg,
    "nazwisko" => $name_reg,
    "data-urodzenia" => '/([3][0,1]|[0-2]\d)-([1][0-2]|[0]\d)-(\d{4})/',
    "pesel" => '/\d{11}/',
    "nip" => '/(\d{3}-){2}\d{2}-\d{2}/',
    "kod-pocztowy" => '/\d{2}-\d{3}/',
    "miasto" => $name_reg,
    "adres" => '/^(ul\.\s)?([A-Ż\d\.\,]+?)\s(\d+?[A-Ż]?(?:\/\d*[\-A-Ż\d]*)?)$/',
    "email" => '/[\w\.\-]+@[\w\.\-]+\w{2,4}/',
    "telefon-komorkowy" => '/\+{1}\d{2}\s{1}(\d{3}\s{1}){2}\d{3}/',
    "telefon-stacjonarny" => '/\d{2}\s{1}\d{3}(\s{1}\d{2}){2}/',
];


function checkInputs($regexs) {
    $out = [];
    foreach ($regexs as $input => $regex) {
        if (isset($_POST[$input])) {
            $t = $_POST[$input];
            if (preg_match($regex, $t)) {
                $resp = $t;
            } else {
                $resp = invalidInput($input);
            }
            // array_push($out, $resp);
            $out[$input] = $resp;
        } else {
            $out[$input] = "";
        }
    }
    return $out;
}

function invalidInput($input) {
    return "Błąd w $input";
}

function displayOutput($out) {
    echo "<b>Podano następujące dane: <br></b>";
    foreach ($out as $input => $output) {
        $input = ucfirst(str_replace("-", " ", $input));
        echo "$input: <i>$output</i><br>";
    }
    $ge = displayG();
    echo "Płeć: <i>$ge</i><br>";
}

function displayG() {
    if (isset($_POST['g'])) {
        $t = $_POST['g'];
<<<<<<< HEAD
        $gen = ($t == 'k' ? 'Kobieta' : $t == 'm') ? 'Mężczyzna' : 'Wolę nie odpowiadać';
=======
        $gen = $t == 'k' ? 'Kobieta' : $t == 'm' ? 'Mężczyzna' : 'Wolę nie odpowiadać';
>>>>>>> 40467a3fd2787fb0e64d1e5ed3ac63a3684588d6
        return $gen;
    }
}

function saveToDataFile($outs) {
    $file = fopen("dane.txt", "a");
    $entry = "==========\n";
    foreach ($outs as $input => $output) {
        $input = ucfirst(str_replace("-", " ", $input));
        $entry .= "$input: $output\n";
    }
    $entry .= "==========\n";
    fwrite($file, $entry);
    fclose($file);
}

function readFromDataFile() {
    $file = fopen("dane.txt", "r");
    for ($i=0; !feof($file); $i++) { 
        $line[$i] = fgets($file);
        echo $line[$i] . '<br>';
    }
    fclose($file);
}

function cleanDataFile() {
    $file = fopen("dane.txt", "w");
    fwrite($file, "");
    fclose($file);
}

// echo '<pre>' . print_r($_POST, true) . '</pre>';
// echo '<pre>' . print_r($out, true) . '</pre>';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $outputs = checkInputs($regexs);
    displayOutput($outputs);

    saveToDataFile($outputs);
}
?>
    <br>
    <br>
    <br>
    <form action="10.php" method="get">
        <button type="submit">Wyświetl zawartość pliku z danymi</button>
        <input type="checkbox" name="clean" id="clean">
        <label for="clean">Wyczyść plik po wyświetleniu</label>
        <br>
    </form>

<?php 
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    readFromDataFile();
    if (isset($_GET['clean'])) {
        cleanDataFile();
    }
}
?>

</body>
</html>