<?php
include_once("../class/allClass.php");
use conexionbd\mysqlconsultas;
$ejecucion = new mysqlconsultas();

$id_tracker = filter_input(INPUT_POST, 'id_tracker',      FILTER_SANITIZE_NUMBER_INT);
$desague    = filter_input(INPUT_POST, 'cantidad',        FILTER_SANITIZE_SPECIAL_CHARS);

$qry = "INSERT INTO notificaciones_desague (id_tracker, registro, fch_registro, hra_registro) VALUES ($id_tracker,$desague,curdate(),curtime())";
$ejecucion->ejecuta($qry);

$mensaje = "<!DOCTYPE html>
<html lang='en' xmlns='http://www.w3.org/1999/xhtml' xmlns:o='urn:schemas-microsoft-com:office:office'>
<head>
	<meta charset='UTF-8'>
	<meta name='viewport' content='width=device-width,initial-scale=1'>
	<meta name='x-apple-disable-message-reformatting'>
	<title></title>
	<!--[if mso]>
	<noscript>
		<xml>
			<o:OfficeDocumentSettings>
				<o:PixelsPerInch>96</o:PixelsPerInch>
			</o:OfficeDocumentSettings>
		</xml>
	</noscript>
	<![endif]-->
	<style>
		table, td, div, h1, p {font-family: Arial, sans-serif;}
	</style>
</head>
<body style='margin:0;padding:0;'>
	<table role='presentation' style='width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;'>
		<tr>
			<td align='center' style='padding:0;'>
				<table role='presentation' style='width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;'>
					<tr>
						<td align='center' style='padding:40px 0 30px 0;background:#000;'>
							<img src='https://demo-fleet.seticmid.com/admin/images/png.png' alt='logo-imperio-b' width='300' style='height:auto;display:block;' />
						</td>
					</tr>
					<tr>
						<td style='padding:36px 30px 42px 30px;'>
							<table role='presentation' style='width:100%;border-collapse:collapse;border:0;border-spacing:0;'>
								<tr>
									<td style='padding:0 0 36px 0;color:#153643;'>
										<h1 style='font-size:24px;margin:0 0 20px 0;font-family:Arial,sans-serif;'>Gracias por poneter en contacto</h1>
										<p style='margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;'>
                                            Hola, se ha registro un desagüe de ".$desague." Litros
                                            <br>
                                            del vehiculo: ".$id_tracker."
                                            </p>
										<p style='margin:0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;'><a href='https://fleetmaster.mx' style='color:#ee4c50;text-decoration:underline;'>fleetmaster.mx</a></p>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td style='padding:30px;background:#ee4c50;'>
							<table role='presentation' style='width:100%;border-collapse:collapse;border:0;border-spacing:0;font-size:9px;font-family:Arial,sans-serif;'>
								<tr>
									<td style='padding:0;width:50%;' align='left'>
										<p style='margin:0;font-size:14px;line-height:16px;font-family:Arial,sans-serif;color:#ffffff;'>
											&reg; FleetMaster MX 2022<br/><!--<a href='http://www.example.com' style='color:#ffffff;text-decoration:underline;'>Unsubscribe</a>-->
										</p>
									</td>
									<td style='padding:0;width:50%;' align='right'>
										<table role='presentation' style='border-collapse:collapse;border:0;border-spacing:0;'>
											<tr>
												<td style='padding:0 0 0 10px;width:38px;'>
												</td>
												<td style='padding:0 0 0 10px;width:38px;'>
													<a href='https://www.facebook.com/Imperio-B-169791443667509' style='color:#ffffff;'><img src='https://assets.codepen.io/210284/fb_1.png' alt='Facebook' width='38' style='height:auto;display:block;border:0;' /></a>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>";


//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
// include("../vendor/PHPMailer/PHPMailer/src");
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../../vendor/autoload.php';
include('../../vendor/phpmailer/phpmailer/src/PHPMailer.php');
include('../../vendor/phpmailer/phpmailer/src/Exception.php');
// include( '../../vendor/phpmailer/phpmailer/src/OAuth.php');
// include( '../../vendor/phpmailer/phpmailer/src/OAuthTokenProvider.php');
include('../../vendor/phpmailer/phpmailer/src/SMTP.php');
// include( '../vendor/phpmailer/phpmailer/src/POP3.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer();

try {
    //Server settings
    $mail->IsSMTP();
 
    //Configuracion servidor mail
    $mail->From = "i.pacheco@seticmid.com"; //remitente
    $mail->FromName = "Equipo de administración";
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl'; //seguridad
    $mail->Host = "seticmid.com"; // servidor smtp
    $mail->Port = 465; //puerto
    $mail->Username ='i.pacheco@seticmid.com'; //nombre usuario
    $mail->Password = 'x7&D{TGeCNIr'; //contraseña

    //Agregar destinatario
    $mail->AddAddress("isaac.pacheco@cert.edu.mx");
    $mail->addCC("isaacpacheco.go@gmail.com");
    $mail->Subject = "Reporte de desagüe";
    $mail->Body = $mensaje;
    $mail->AltBody    = $mensaje;
    $mail->CharSet = 'UTF-8';

    $mail->send();
    echo 'Mensaje enviado con exito!';
} catch (Exception $e) {
    echo "Su mensaje no fue enviado. Error: {$mail->ErrorInfo}, Por favor, intente de nuevo, si el problema continua, no dude en mandar un mensaje al siguiente correo: contacto@banqueteraimperio.com";
}