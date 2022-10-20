<?php
include("../class/allClass.php");
use nsfunciones\funciones;
use nsregistros\registros;
$registro = new registros();
$fn = new funciones();


$desa = $registro->obtener_categorias_desague();
$cdesa = $fn->cuentarray($desa);
$lista = $registro->obtener_lista_desague();
$clista = $fn->cuentarray($lista);
$jsonvehiculos = $_SESSION['vehiculos'];
$json = json_encode($jsonvehiculos);
$json = json_decode($json);

$valores = [];
for($l = 0; $l < $clista; $l++){
    for($i=0;$i<$_SESSION["totaldispositivos"];$i++){
        if($lista['id_tracker'][$l] == $json[$i]->ID){
            $html = "{name:'".$json[$i]->nombre."',data:[";
        
                for($e = 0;$e < $cdesa;$e++){
                    $graf = $registro->obtener_grafica_desague($json[$i]->ID,$desa['fch_registro'][$e]);
                    if(isset($graf['fch_registro'][0])){
                        $html .= $graf['total'][0].",";
                    }else{
                        $html .= "0,";
                    }
                }
            
                $valores[] = $html .= "]},";
        }

        
    
    }
    echo $html .= "]},";
}


$valores = json_encode($valores);
print_r($valores);
?>