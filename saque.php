<?php
	
	if($_REQUEST['valorsaque']){

		$valorsaque = $_REQUEST['valorsaque'];

		$cedulas = [100, 50, 20, 10, 5, 2, 1];
		$moedas  = [50, 25, 10, 05, 01];

		$valorsaque = str_replace('.', '', $valorsaque);
		$partes = explode(',', $valorsaque);

		$valorresto = $partes[0];
		$valorquebrado = $partes[1];

		echo 'Valor requisitado: R$<strong>'.$valorsaque.'</strong><br><br>';

		foreach ($cedulas as $value) {
			if(($valorresto%$value) != $valorresto){
				if(intval($valorresto/$value) != 0){
					echo '+ '.number_format(intval($valorresto/$value))." cedula(s) de R$".$value."<br>";
				}

				$valorresto = $valorresto%$value;
			}
		}

		foreach ($moedas as $value) {
			if(($valorquebrado%$value) != $valorquebrado){
				if(intval($valorquebrado/$value) != 0){
					echo '+ '.number_format(intval($valorquebrado/$value))." moeda(s) de R$0,".$value."<br>";
				}

				$valorquebrado = $valorquebrado%$value;
			}
		}

		echo "<hr>Total: R$".$valorsaque;

	} else{
		echo "Digite um valor!";
	}
