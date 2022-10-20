<?php
include_once("../class/allClass.php");
use conexionbd\mysqlconsultas;
$ejecucion = new mysqlconsultas();

$id_tracker_descarga    = filter_input(INPUT_POST, 'id_tracker_descarga',  FILTER_SANITIZE_NUMBER_INT);
$carga                  = filter_input(INPUT_POST, 'carga',                FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$id_tracker_carga       = filter_input(INPUT_POST, 'id_tracker_carga',     FILTER_SANITIZE_NUMBER_INT);

$qry = "INSERT INTO carga_descarga_gasolina (id_tracker_descarga, cantidad, id_tracker_carga, fch_despacho, hra_despacho) VALUES ('$id_tracker_descarga','$carga','$id_tracker_carga',curdate(),curtime())";
$ejecucion->ejecuta($qry);