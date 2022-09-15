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
		$vehiculos[] = array("ID" => $respuesta->list[$i]->id, "nombre" => $respuesta->list[$i]->label);
	}
	$_SESSION['totaldispositivos'] = $contador;
	$_SESSION['vehiculos'] = $vehiculos;
}else{
	// echo "LISTO TODO";
}


?>