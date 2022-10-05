<?php
session_start();
if(!isset($_SESSION['vehiculos'])){
    
}else{
	// echo "LISTO TODO";
    // $id_track = filter_input(INPUT_POST, "id_tracker", FILTER_SANITIZE_NUMBER_INT);
    $id_track = "994159";
    $anioActual = date("Y");
    $mesActual = date("n");
    $cantidadDias = cal_days_in_month(CAL_GREGORIAN, $mesActual, $anioActual);

    $fecha1 = $anioActual."-".$mesActual."-01 00:00:00";
    $fecha2 = $anioActual."-".$mesActual."-".$cantidadDias." 23:59:59";

	$datos  = "hash=".$_SESSION['hash']."&tracker_id=".$id_track."&from=".$fecha1."&to=".$fecha2;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,"https://api.navixy.com/v2/track/list");
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $datos);
	
	// Receive server response ...
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$server_output = curl_exec($ch);
	$respuesta = json_decode($server_output);
	curl_close ($ch);
    if(empty($respuesta->list)){
        echo "sin datos";
    }else{
        $valor = end($respuesta->list);
        $valor = json_encode($valor,true);
        print_r($valor);
    }
}


?>