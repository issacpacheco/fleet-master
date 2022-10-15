<?php
include_once("../class/allClass.php");
use conexionbd\mysqlconsultas;
$ejecucion = new mysqlconsultas();

$id_tracker = filter_input(INPUT_POST, 'id_tracker',      FILTER_SANITIZE_NUMBER_INT);
$desague    = filter_input(INPUT_POST, 'cantidad',        FILTER_SANITIZE_SPECIAL_CHARS);
echo $desague;
$qry = "INSERT INTO notificaciones_desague (id_tracker, registro, fch_registro, hra_registro) VALUES ($id_tracker,$desague,curdate(),curtime())";
$ejecucion->ejecuta($qry);