<?php
$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$pos = strrpos($url, '/');
$pagina = $pos === false ? $url : substr($url, $pos + 1);

function mb_ucfirst($string, $encoding)
{
    $strlen = mb_strlen($string, $encoding);
    $firstChar = mb_substr($string, 0, 1, $encoding);
    $then = mb_substr($string, 1, $strlen - 1, $encoding);
	$then = mb_strtolower($then, $encoding);
    return mb_strtoupper($firstChar, $encoding) . $then;
}

function Limpiar($str)
{
	$bom = pack('H*','EFBBBF');
	//$bom = pack('CCC', 0xEF, 0xBB, 0xBF);
    $str = preg_replace("/^$bom/", '', $str);
	$str = str_replace("&quot;","'",$str);
	return $str;
}
function CreaLlave()
{
	$length=3;
    $source = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    if($length>0)
	{
        $rstr = "";
        $source = str_split($source,1);
        for($i=1; $i<=$length; $i++)
		{
            mt_srand((double)microtime() * 1000000);
            $num = mt_rand(1,count($source));
            $rstr .= $source[$num-1];
        }
 
    }
    return $rstr;
}
function CreaFolio()
{
	$length=3;
    $source = '1234567890';
    if($length>0)
	{
        $rstr = "";
        $source = str_split($source,1);
        for($i=1; $i<=$length; $i++)
		{
            mt_srand((double)microtime() * 1000000);
            $num = mt_rand(1,count($source));
            $rstr .= $source[$num-1];
        }
 
    }
    return $rstr;
}

function FechaFormato($f)
{
	if ($f != '0000-00-00')
	{
		return substr($f,8,2)."/". substr($f,5,2)."/".substr($f,0,4);
	}
}

function FormatoFechaReportes($f)
{
	$fecha = str_replace('/', '-',$f);

	$DateTime = DateTime::createFromFormat('d-m-Y', $fecha);
	$fecha = $DateTime->format('Y-m-d');

	return $fecha;
}

function Fecha($f)
{
	if ($f != '0000-00-00')
	{
    	$meses = array("enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");
		return substr($f,8,2)." de ". $meses[intval(substr($f,5,2))-1]." de ".substr($f,0,4);
	}
}
function FechaCorta($f)
{
	if ($f != '0000-00-00')
	{
    	$meses = array("ene", "feb", "mar", "abr", "may", "jun", "jul", "ago", "sep", "oct", "nov", "dic");
		return substr($f,8,2)." ". $meses[intval(substr($f,5,2))-1];
	}
}
function Mes($mes)
{
	$meses = array("enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");
	return $meses[$mes-1];
}
function MesCorto($mes)
{
	$meses = array("ENE", "FEB", "MAR", "ABR", "MAY", "JUN", "JUL", "AGO", "SEP", "OCT", "NOV", "DIC");
	return $meses[$mes-1];
}
function Dia($dia)
{
	$dias = array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
	return $dias[$dia];
}
function HoraCorta($hora)
{
	return date('h:i a', strtotime($hora));
}

//ARCHIVOS
function BorrarCarpeta($dir) 
{
	$Res = false;
	if ( file_exists($dir) )
	{
		$dh = opendir($dir);
		while ($file=readdir($dh)) 
		{
			if ($file!="." && $file!="..") 
			{
				$fullpath = $dir."/".$file;
				if (!is_dir($fullpath)) 
				{
					unlink($fullpath);
				} 
				else 
				{
					BorrarCarpeta($fullpath);
				}
			}
		}
		closedir($dh);
		if (rmdir($dir)) 
		{
			$Res = true;
		} 
	}
	return $Res;
}
function esArchivo($nombreArchivo, $extensionesPermitidas ) 
{
	$extension = substr(strrchr($nombreArchivo, '.'), 1);
	foreach ($extensionesPermitidas as $extensiones)
	{
		if(!strcasecmp($extension, $extensiones)) 
		{
			return true;
		}
	}
}
function LeerImagenes($path)
{
	$dir = opendir($path);
	while ($elemento = readdir($dir)) 
	{
		if($elemento == '.' || $elemento == '..') {}
		elseif (esArchivo($elemento,array("jpeg", "jpg","png","gif"))) 
		{						
			$elementos[] = $elemento;
		}
	}
	return $elementos;
	closedir($dir); 
}

function LeerVideos($path)
{
	$dir = opendir($path);
	while ($elemento = readdir($dir)) 
	{
		if($elemento == '.' || $elemento == '..') {}
		elseif (esArchivo($elemento,array("mp4"))) 
		{						
			$elementos[] = $elemento;
		}
	}
	return $elementos;
	closedir($dir); 
}

function curPageURL() 
{
	$pageURL = 'http';
 	if ($_SERVER["HTTPS"] == "on") 
	{	
		$pageURL .= "s";
	}
 	$pageURL .= "://";
 	if ($_SERVER["SERVER_PORT"] != "80") 
	{
  		$pageURL .= $_SERVER["SERVER_NAME"];//.":".$_SERVER["SERVER_PORT"];//.$_SERVER["REQUEST_URI"];
 	} 
	else 
	{
  		$pageURL .= $_SERVER["SERVER_NAME"];//.$_SERVER["REQUEST_URI"];
 	}
 return $pageURL;
}

function br2nl ( $string )
{
    return preg_replace('/\<br(\s*)?\/?\>/i', PHP_EOL, $string);
}
function urls_amigables($url) 
{
	// Tranformamos todo a minusculas
	$url = strtolower($url);

	//Rememplazamos caracteres especiales latinos
	$find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
	$repl = array('a', 'e', 'i', 'o', 'u', 'n');
	$url = str_replace ($find, $repl, $url);

	// Añaadimos los guiones
	$find = array(' ', '&', '\r\n', '\n', '+'); 
	$url = str_replace ($find, '-', $url);

	// Eliminamos y Reemplazamos demás caracteres especiales

	$find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
	$repl = array('', '-', '');
	$url = preg_replace ($find, $repl, $url);
	return $url;
}

function CalculaEdad( $fecha ) {
    $fecha_nac = new DateTime(date('Y/m/d',strtotime($fecha))); // Creo un objeto DateTime de la fecha ingresada
	$fecha_hoy =  new DateTime(date('Y/m/d',time())); // Creo un objeto DateTime de la fecha de hoy
	$edad = date_diff($fecha_hoy,$fecha_nac); // La funcion ayuda a calcular la diferencia, esto seria un objeto
	return $edad;
}
?>