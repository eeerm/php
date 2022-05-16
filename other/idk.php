<!DOCTYPE html>
<html>
<head>
	<title>Strona</title>
</head>
<body>
	<h1>Wpisz liczbę wierszy i kolumn</h1>
	<form method="post" action="idk.php">
		<input type="number" name="w" min="1">
		<input type="number" name="h" min="1">
		<input type="radio" name="dstyle" value="dstyle">
		<label for="dstyle">dark</label>
		<input type="radio" name="lstyle" value="lstyle">
		<label for="dstyle">light</label>
		<input type="submit" name="" value="Submit">
	</form>
	<br>
	<div style="margin:auto;text-align:center;">Tabliczka mnożenia<br>
	<?php
		include 'table-func.php';
		
		$w = $_POST['w'];
		$h = $_POST['h'];

		table($w, $h);

		if(isset($_POST['dstyle'])) {
			echo "<style>
				body {
					background-color:black;
					color:white;
				}
				table {
					border:4px solid lightgreen;
				}
				</style>";
		};
		if(isset($_POST['lstyle'])) {
			echo "<style>
				body {
					background-color:white;
					color: black;
				}
				table {
					border:4px solid forestgreen;
				}
				</style>";
		};
	?>
	</div>
</body>
</html>