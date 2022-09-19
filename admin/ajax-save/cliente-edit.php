<?php
include_once("../class/allClass.php");
use conexionbd\mysqlconsultas;
$ejecucion = new mysqlconsultas();

$id                 = filter_input(INPUT_POST, 'id_cliente',        FILTER_SANITIZE_NUMBER_INT);
$nombre             = filter_input(INPUT_POST, 'nombre',            FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$apellido_paterno   = filter_input(INPUT_POST, 'apellido_paterno',  FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$apellido_materno   = filter_input(INPUT_POST, 'apellido_materno',  FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$telefono           = filter_input(INPUT_POST, 'telefono',          FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$correo             = filter_input(INPUT_POST, 'correo',            FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$usuario            = filter_input(INPUT_POST, 'usuario',           FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$password           = filter_input(INPUT_POST, 'password',          FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$passhash           = md5($password);

$qry = "UPDATE usuarios  SET nombre = '$nombre', paterno = '$apellido_paterno', materno = '$apellido_materno', telefono = '$telefono', correo = '$correo', usuario = '$usuario', `password` = '$passhash' WHERE id = '$id'";
$ejecucion->ejecuta($qry);
