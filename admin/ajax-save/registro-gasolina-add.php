<?php
include_once("../class/allClass.php");
use conexionbd\mysqlconsultas;
$ejecucion = new mysqlconsultas();

$empresa          = filter_input(INPUT_POST, 'empresa',          FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$fch_carga        = filter_input(INPUT_POST, 'fch_carga',        FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$hra_carga        = filter_input(INPUT_POST, 'hra_carga',        FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$cantidad_litros  = filter_input(INPUT_POST, 'cantidad_litros',  FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$importe          = filter_input(INPUT_POST, 'importe',          FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$usuario          = filter_input(INPUT_POST, 'usuario',          FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$autoriza         = filter_input(INPUT_POST, 'autoriza',         FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$id_tracker       = filter_input(INPUT_POST, 'id_tracker',       FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$qry = "INSERT INTO registro_gasolina (empresa, fch_carga, hra_carga, cantidad_litros, importe, usuario_carga, autoriza, id_tracker) VALUES ('$empresa', '$fch_carga', '$hra_carga', '$cantidad_litros', '$importe', '$usuario', '$autoriza', '$id_tracker')";
$ejecucion->ejecuta($qry);