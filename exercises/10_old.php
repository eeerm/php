<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<title>10</title>
</head>
<body>
	<form method="post" action="index.php">
		<input type="text" name="imie" id="imie">
		<label for="imie">Imię <br></label>
		<input type="text" name="nazwisko" id="nazwisko">
		<label for="nazwisko">Nazwisko <br></label>
		<input type="text" name="durodzenia" id="durodzenia">
		<label for="durodzenia">Data urodzenia <br></label>
		<input type="text" name="pesel" id="pesel">
		<label for="pesel">PESEL<br></label>
		<input type="text" name="nip" id="nip">
		<label for="nip">NIP<br></label>
		<input type="text" name="kpocz" id="kpocz">
		<label for="kpocz">Kod pocztowy<br></label>
		<input type="text" name="miasto" id="miasto">
		<label for="miasto">Miasto <br></label>
		<input type="text" name="adres" id="adres">
		<label for="adres">Adres <br></label>
		<input type="text" name="email" id="email">
		<label for="email">E-Mail <br></label>
		<input type="text" name="telkom" id="telkom">
		<label for="telkom">Telefon komórkowy <br></label>
		<input type="text" name="telstac" id="telstac">
		<label for="telstac">Telefon stacjonarny <br></label>
		<input type="radio" name="s" id="k" value="k">
		<label for="k">K</label>
		<input type="radio" name="s" id="m" value="m">
		<label for="m">M</label>
		<br>
		<input type="submit" value="Wprowadź dane">
	</form>

<?php
echo '<pre>' . print_r($_POST, true) . '</pre>';

$out = [];
if (isset($_POST['imie'])) {
	$imie = $_POST['imie'];
	if (preg_match('/[A-ZĆŚŻŹ][a-ząćęłńóśźż]+/', $imie)) {
		array_push($out, $imie);
	} else {
		inval('i');
	}
}
if(isset($_POST['nazwisko'])) {
	$nazwisko = $_POST['nazwisko'];
	if (preg_match('/[A-ZĆŚŻŹ][a-ząćęłńóśźż]+/', $nazwisko)) {
		array_push($out, $nazwisko);
	} else {
		inval('n');
	}
}
if(isset($_POST['durodzenia'])) {
	$durodzenia = $_POST['durodzenia'];
	if (preg_match('//', $durodzenia)) {
		array_push($out, $durodzenia);
	} else {
		inval('d');
	}
}
if(isset($_POST['pesel'])) {
	$pesel = $_POST['pesel'];
	if (preg_match('/[0-9]{11}/', $pesel)) {
		array_push($out, $pesel);
	} else {
		inval('p');
	}
}
if(isset($_POST['nip'])) {
	$nip = $_POST['nip'];
	if (preg_match('/([0-9]{3}-){2}[0-9]{2}-[0-9]{2}/', $nip)) {
		array_push($out, $nip);
	} else {
		inval('N');
	}
}
if (isset($_POST['miasto'])) {
	$miasto = $_POST['miasto'];
	if (preg_match('/[A-ZĆŚŻŹ][a-ząćęłńóśźż]+\s/', $miasto)) {
		array_push($out, $miasto);
	} else {
		inval('m');
	}
}
if (isset($_POST['adres'])) {
	$adres = $_POST['adres'];
	if (preg_match('/[A-ZĆŚŻŹa-ząćęłńóśźż]+\s{1}[0-9]+/', $adres)) {
		array_push($out, $adres);
	} else {
		inval('a');
	}
}
if (isset($_POST['email'])) {
	$email = $_POST['email'];
	if (preg_match('/[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+(\.[a-z0-9!#$%&\'*+\/=?^_`{|}~-])*@([a-z0-9]+\.?)[a-z0-9]+/', $email)) {
		array_push($out, $email);
	} else {
		inval('e');
	}
}
if (isset($_POST['telkom'])) {
	$telkom = $_POST['telkom'];
	if (preg_match('/\+{1}[0-9]{2}\s{1}([0-9]{3}\s{1}){2}[0-9]{3}/', $telkom)) {
		array_push($out, $telkom);
	} else {
		inval('tk');
	}
}
if (isset($_POST['telstac'])) {
	$telstac = $_POST['telstac'];
	if (preg_match('/[0-9]{2}\s{1}[0-9]{3}(\s{1}[0-9]{2}){2}/', $telstac)) {
		array_push($out, $telstac);
	} else {
		inval('ts', $telstac);
	}
}
// if (isset($_POST['s'])) {
// 	$s = $_POST['s'];
// 	array_push($out, $s);
// } else {
// 	inval('s', $s);
// }

function inval($e, $v) {
	return "Błąd w $e: $v";
}

?>

</body>
</html>