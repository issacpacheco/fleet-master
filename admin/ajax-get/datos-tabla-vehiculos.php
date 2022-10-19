
<?php 
include("../class/allClass.php");
use nsfunciones\funciones;
use nsregistros\registros;
$registro = new registros();
$fn = new funciones();

$jsonvehiculos = $_SESSION['vehiculos'];
$json = json_encode($jsonvehiculos);
$json = json_decode($json);
        
$datas = "hash=".$_SESSION['hash'];
$ch_vehiculo = curl_init();
curl_setopt($ch_vehiculo, CURLOPT_URL,"https://api.navixy.com/v2/vehicle/list");
curl_setopt($ch_vehiculo, CURLOPT_POST, 1);
curl_setopt($ch_vehiculo, CURLOPT_POSTFIELDS, $datas);

// Receive server response ...
curl_setopt($ch_vehiculo, CURLOPT_RETURNTRANSFER, true);
$server_output_vehiculo = curl_exec($ch_vehiculo);
$respuesta_vehiculos = json_decode($server_output_vehiculo);
curl_close ($ch_vehiculo);

for($a = 0; $a < count($respuesta_vehiculos->list); $a++){
    foreach($_SESSION['vehiculos'] as $indice=>$vehiculos){
        if($vehiculos['ID'] == $respuesta_vehiculos->list[$a]->tracker_id){
            $llaves = array_keys($_SESSION['vehiculos'][$indice]);
            $_SESSION['vehiculos'][$indice][$llaves[3]]=$respuesta_vehiculos->list[$a]->reg_number;
            $_SESSION['vehiculos'][$indice][$llaves[4]]=$respuesta_vehiculos->list[$a]->norm_avg_fuel_consumption;
            $_SESSION['vehiculos'][$indice][$llaves[5]]=$respuesta_vehiculos->list[$a]->fuel_cost;
            $_SESSION['vehiculos'][$indice][$llaves[6]]=$respuesta_vehiculos->list[$a]->type;
            $_SESSION['vehiculos'][$indice][$llaves[7]]=$respuesta_vehiculos->list[$a]->max_speed;
            $_SESSION['vehiculos'][$indice][$llaves[8]]=$respuesta_vehiculos->list[$a]->fuel_type;
            $_SESSION['vehiculos'][$indice][$llaves[9]]=$respuesta_vehiculos->list[$a]->fuel_grade;
            $_SESSION['vehiculos'][$indice][$llaves[10]]=$respuesta_vehiculos->list[$a]->fuel_tank_volume;
            $_SESSION["vehiculos"]=array_values($_SESSION["vehiculos"]);
            
        }
    }
}
?>
<div class="row">
    <div class="col-sm-12">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Matricula</th>
                    <th scope="col">Ultimo reporte de GPS</th>
                    <th scope="col">Nivel de combustible</th>
                    <th scope="col">Porcentaje del tanque</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                // $jsonvehiculos = $_SESSION['vehiculos'];
                // $json = json_encode($jsonvehiculos);
                // $json = json_decode($json);
                for($i=0;$i<$_SESSION["totaldispositivos"];$i++){
                    for($a = 0; $a < count($json[$i]->lista_sensores); $a++){
                        if($json[$i]->lista_sensores[$a]->nombre_sensor == "DIESEL" || $json[$i]->lista_sensores[$a]->nombre_sensor == "COMBUSTIBLE" || $json[$i]->lista_sensores[$a]->nombre_sensor == "combustible"){
                    $ultimo_registro = $registro->obtener_ultima_carga($json[$i]->ID); ?>
                <tr>
                    <input type="hidden" name="" id="variable_combustible_<?php echo $json[$i]->ID; ?>" value="1">
                    <td><?php echo $json[$i]->nombre ?></td>
                    <td><?php echo $json[$i]->reg_number == null ? "sin datos" : $json[$i]->reg_number ?></td>
                    <td id="dato-gps_<?php echo $json[$i]->ID ?>"></td>
                    <td>
                        <div class="row">
                            <div class="col-sm-12">
                                <span id="nivel_gasolina_<?php echo $json[$i]->ID ?>"></span>
                            </div>
                            <div class="col-sm-12">
                                <span id="ultima_actualizacion_<?php echo $json[$i]->ID ?>"></span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" id="progress_bar_<?php echo $json[$i]->ID; ?>" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="" style=""></div>
                        </div>
                    </td>
                </tr>
                <?php }}} ?>
            </tbody>
        </table>
    </div>
</div>
<?php 
        $jsonvehiculos = $_SESSION['vehiculos'];
        $json = json_encode($jsonvehiculos);
        $json = json_decode($json);
        for($i=0;$i<$_SESSION["totaldispositivos"];$i++){ 
            for($a = 0; $a < count($json[$i]->lista_sensores); $a++){
                if($json[$i]->lista_sensores[$a]->nombre_sensor == "DIESEL" || $json[$i]->lista_sensores[$a]->nombre_sensor == "COMBUSTIBLE" || $json[$i]->lista_sensores[$a]->nombre_sensor == "combustible"){
?>
<script>
    $(document).ready(function(){
        ultimo_dato_gps<?php echo $json[$i]->ID ?>();
    })
    function ultimo_dato_gps<?php echo $json[$i]->ID ?>(){
        // var dato_gps = document.getElementById("dato-gps_<?php echo $json[$i]->ID ?>").textContent;
        // if(dato_gps == ""){
            $.ajax({
                type: "POST",
                url: "ajax-get/obtener-ultimo-reporte-gps.php",
                data: {id_track: <?php echo $json[$i]->ID ?>},
                success: function (response){
                    if(response == 'sin datos'){
                        $("#dato-gps_<?php echo $json[$i]->ID ?>").text("Sin datos");
                    }else{
                        var content = JSON.parse(response);
                        if(response.end_address == undefined){
                            $("#dato-gps_<?php echo $json[$i]->ID ?>").text(content.start_address);
                        }else{
                            $("#dato-gps_<?php echo $json[$i]->ID ?>").text(content.end_address);
                        }

                        
                    }
                }
            })
        // }else{
        //     setInterval({

        //     }, 300000)
        // }
    }
    
</script>
<?php }}}?>