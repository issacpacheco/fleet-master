<?php
session_start();
$login  = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_SPECIAL_CHARS);
$passw  = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

$datos  = "login=".$login."&password=".$passw;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://api.navixy.com/v2/user/auth");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $datos);
   
// Receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$server_output = curl_exec($ch);
$respuesta = json_decode($server_output);
curl_close ($ch);

$_SESSION['hash'] = $respuesta->hash;
$_SESSION['usuario'] = $login;
if($respuesta->success == 1){
    echo "1";
}else{
    echo "0";
}
?>