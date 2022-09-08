<?php
require('../class/allClass.php');
error_reporting(0);
$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_SPECIAL_CHARS);
$contra  = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

use nsnewsesion\newsesion;
use nsfunciones\funciones;

$fn = new funciones();
$get = new newsesion();

$logeo = $get->login($usuario, $contra);
// $clogeo = $fn->cuentarray($logeo);
$inicio = $logeo['id'][0];

if($inicio > 0){
    $id             = $logeo['id'][0];
    $id_almacen     = $logeo['id_almacen'][0];
    $id_empresa     = $logeo['id_empresa'][0];
    $almacen        = $logeo['almacen'][0];
    $empresa        = $logeo['empresa'][0];
    $id_area        = $logeo['id_area'][0];
    $nombre         = $logeo['nombre'][0];
    $nivel          = $logeo['nivel'][0];
    $calendario     = $logeo['iframe_google'][0];
    $color          = $logeo['tema_color'][0];
    $plan           = $logeo['plan'][0];
    $plan_armado    = $logeo['arma_plan'][0];
    $fch_ini        = $logeo['fch_ini'][0];
    $fch_fin        = $logeo['fch_fin'][0];
    $estatus        = $logeo['estatus_empresa'][0];
    $nueva_sesion   = $get->crearsesion($id, $id_almacen, $id_area, $nombre, $nivel, $calendario, $color, $almacen, $empresa, $id_empresa, $plan, $plan_armado, $fch_ini, $fch_fin, $estatus);
    echo "1";
}else{
    echo "0";
	exit();	
}
?>