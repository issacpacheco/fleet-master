<?php
session_start();
if(!isset($_SESSION['vehiculos'])){
	$datos  = "hash=".$_SESSION['hash'];

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,"https://api.navixy.com/v2/tracker/list");
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $datos);
	
	// Receive server response ...
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$server_output = curl_exec($ch);
	$respuesta = json_decode($server_output);
	curl_close ($ch);

	$contador = count($respuesta->list);

	for($i=0;$i<$contador;$i++){
		$datas = $datos."&tracker_id=".$respuesta->list[$i]->id;
		$ch_sensores = curl_init();
		curl_setopt($ch_sensores, CURLOPT_URL,"https://api.navixy.com/v2/tracker/sensor/list");
		curl_setopt($ch_sensores, CURLOPT_POST, 1);
		curl_setopt($ch_sensores, CURLOPT_POSTFIELDS, $datas);
		
		// Receive server response ...
		curl_setopt($ch_sensores, CURLOPT_RETURNTRANSFER, true);
		$server_output_sensores = curl_exec($ch_sensores);
		$respuesta_sensores = json_decode($server_output_sensores);
		curl_close ($ch_sensores);

		$sesires = [];
		for($a = 0; $a < count($respuesta_sensores->list); $a++){
			$sesires[] = array('sensor_id' => $respuesta_sensores->list[$a]->id, 'nombre_sensor' => $respuesta_sensores->list[$a]->name);
		}

		$vehiculos[] = array("ID" => $respuesta->list[$i]->id, 
							 "nombre" => $respuesta->list[$i]->label, 
							 "lista_sensores" => $sesires, 
							 "reg_number" => null,
							 "norm_avg_fuel_consumption" => null,
							 "fuel_cost" => null,
							 "type" => null,
							 "max_speed" => null,
							 "fuel_type" => null,
							 "fuel_grade" => null,
							 "fuel_tank_volume" => null);
	}
	$_SESSION['totaldispositivos'] = $contador;
	$_SESSION['vehiculos'] = $vehiculos;
}else{
	// echo "LISTO TODO";
}


?>