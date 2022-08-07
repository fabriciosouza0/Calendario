<html>

<head>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<?php calendario(); ?>
</body>

</html>
<?php
function diasMeses()
{
	$data = array();

	for ($i = 1; $i <= 12; $i++) {
		$data[$i] = cal_days_in_month(CAL_GREGORIAN, $i, date('Y'));
	}

	return $data;
}

function calendario()
{
	$daysWeek = array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');
	$diasSemana = array('Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb');
	$meses = array(
		1 => 'Janeiro',
		2 => 'Fevereio',
		3 => 'Março',
		4 => 'Abril',
		5 => 'Maio',
		6 => 'Junho',
		7 => 'Julho',
		8 => 'Agosto',
		9 => 'Setembro',
		10 => 'Novembro',
		11 => 'Outubro',
		12 => 'Dezembro'
	);

	$arrayDiasMeses = diasMeses();
	$arrayRetorno = array();

	for ($i = 1; $i <= 12; $i++) {
		$arrayRetorno[$i] = array();
		for ($n = 1; $n <= $arrayDiasMeses[$i]; $n++) {
			$dayMonth = gregoriantojd($i, $n, date('Y'));
			$weekMonth = substr(jddayofweek($dayMonth, 1), 0, 3);
			if ($weekMonth === "Mun") $weekMonth = "Mon";
			$arrayRetorno[$i][$n] = $weekMonth;
		}
	}

	echo '<table class="picker" border="0px" width="100%"';
	foreach ($meses as $num => $mes) {
		echo '<tbody id="mes_"+' . $num . ' class="mes" >';
		echo '<tr><td colspan="7" >' . $mes . '</td></tr><tr>';
		foreach ($diasSemana as $i  => $day) {
			echo '<td>' . $day . '</td>';
		}
		echo '</tr><tr>';
		$y = 0;
		foreach ($arrayRetorno[$num] as $numero => $dia) {
			$y++;
			if ($numero == 1) {
				$qtd = array_search($dia, $daysWeek);
				for ($i = 1; $i <= $qtd; $i++) {
					echo '<td></td>';
					$y += 1;
				}
			}
			echo '<td>' . $numero . '</td>';
			if ($y === 7) {
				$y = 0;
				echo '</tr><tr>';
			}
		}
		echo '</tr></tbody>';
	}
	echo '</table>';
}
?>