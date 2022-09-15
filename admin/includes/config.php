<?php
error_reporting(0);
// require_once('../../includes/conexion.php');
// require_once('../includes/PHPMailer-master/PHPMailerAutoload.php');
require_once('../includes/Mobile_Detect.php');
require_once('../includes/globals.php');
require_once('../includes/funciones.php');

$title = 'FLEET MASTER';

session_start();
if (!isset($_SESSION['hash']))
{
	header("location:../");
}

?>