<?php
	function table($w = 10, $h = 10) {
		echo "$w x $h";
		echo '<table style="width:400px;height:400px;text-align:center;margin:auto">';
		$i = 1;
		while ($i <= $w) {
			echo '<tr>';
			$j = 1;
			while ($j <= $h) {
				if ($i == 1 or $j == 1) {
					echo '<td style="border:8px dashed darkslategray;">' . ($i * $j) . "<td>";
				} else {
					echo '<td style="border:8px double lime;">' . ($i * $j) . "<td>";
				}
				$j++;
			}
			echo "</tr>";
			$i++;
		}
		echo "</table>";
		}	
 ?>