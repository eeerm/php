<?php
	echo '<head>
	<title>Tabliczka mnożenia</title>
	<link rel="icon" href="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.creative-activity.ie%2Fimage%2Fcache%2Fcatalog%2FOutdoor-Play-Areas-Equipment%2FPlayground-Markings%2FTME01110LSO-Multiplication-Table-10x10-Large-Solid-Outline-74x74.jpg&f=1&nofb=1">
</head>';

	# przy użyciu for

	echo '<div style="margin:auto;text-align:center;">Tabliczka mnożenia przy użyciu pętli for<br>';
	echo '<table style="border:4px solid hotpink;width:400px;height:400px;text-align:center;margin:auto">';
	for ($i = 1; $i <= 10; $i++) {
		echo '<tr>';
		for ($j = 1; $j <= 10; $j++) {
			if ($i == 1 or $j == 1) {
				echo '<td style="border:8px dashed magenta;">' . ($i * $j) . "<td>";
			} else {
				echo '<td style="border:8px double pink;">' . ($i * $j) . "<td>";
			}
			
		}
		echo "</tr>";
	}
	echo "</table></div>";

	# przy użyciu while

	$wi = 1;
	$wj = 1;
	echo '<div style="text-align:center;margin:auto">Tabliczka mnożenia przy użyciu pętli while<br>';
	echo '<table style="border:4px solid maroon;width:400px;height:400px;text-align:center;margin:auto;">';
	while ($wi <= 10) {
		echo '<tr>';
		while ($wj <= 10) {
			if ($wi == 1 or $wj == 1) {
				echo '<td style="border:8px groove green;">' . ($wi * $wj) . "<td>";
			} else {
				echo '<td style="border:8px ridge greenyellow;">' . ($wi * $wj) . "<td>";
			}
			$wj++;
		}
		$wj = 1;
		echo "</tr>";
		$wi++;
	}
	echo "</table></div>";

	# przy użyciu do ... while

	$dwi = 1;
	$dwj = 1;
	echo '<div style="text-align:center;margin:auto;">Tabliczka mnożeniaprzy użyciu pętli do ... while<br>';
	echo '<table style="border:4px solid gold;width:400px;height:400px;text-align:center;margin:auto;">';
	do {
		echo '<tr>';
		do  {
			if ($dwi == 1 or $dwj == 1) {
				echo '<td style="border:8px outset yellow;">' . ($dwi * $dwj) . "<td>";
			} else {
				echo '<td style="border:8px dotted khaki;">' . ($dwi * $dwj) . "<td>";
			}
			$dwj++;
		} while ($dwj <= 10);
		$dwj = 1;
		echo "</tr>";
		$dwi++;
	} while ($dwi <= 10);
	echo "</table></div>";
?>