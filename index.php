<?php
function diasMeses()
{
	$retorno = array();

	for ($i = 1; $i <= 12; $i++) {
		$retorno[$i] = cal_days_in_month(CAL_GREGORIAN, $i, date('Y'));
	}
	return $retorno;
}

function calendario()
{
	$daysWeek = array('Mon', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');
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

	$diasMeses = diasMeses();
	$arrayRetorno = array();

	for ($i = 1; $i <= 12; $i++) {
		$arrayRetorno = array();
		for ($n = 1; $n <= $diasMeses[$i]; $n++) {
			$dayMonth = gregoriantojd($i, $n, date('Y'));
			$weekMonth = substr(jddayofweek($dayMonth, 1), 0, 3);
			if ($weekMonth === "Mun") $weekMonth = "Mon";
			$arrayRetorno[$i][$n] = $weekMonth;
		}
	}
	echo "ue";
}
