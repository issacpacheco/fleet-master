
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
<style>
    .accordion-header {
        margin-bottom: 0;
    }
    .accordion-item:last-of-type .accordion-button.collapsed {
        border-bottom-width: 1px;
        border-bottom-right-radius: 0.25rem;
        border-bottom-left-radius: 0.25rem;
    }
    .accordion-item:first-of-type .accordion-button {
        border-top-left-radius: 0.25rem;
        border-top-right-radius: 0.25rem;
    }
    .accordion-button {
        position: relative;
        display: flex;
        align-items: center;
        width: 100%;
        padding: 1rem 1.25rem;
        font-size: 1rem;
        color: #212529;
        text-align: left;
        background-color: transparent;
        border: 1px solid rgba(0,0,0,.125);
        border-radius: 0;
        overflow-anchor: none;
        transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out,border-radius .15s ease;
    }
    .accordion-item:first-of-type .accordion-button {
        border-top-left-radius: 0.25rem;
        border-top-right-radius: 0.25rem;
    }
    .accordion-button:focus {
        z-index: 3;
        border-color: #86b7fe;
        outline: 0;
        box-shadow: 0 0 0 0.25rem rgb(13 110 253 / 25%);
    }
    .accordion-button:not(.collapsed) {
        color: #0c63e4;
        background-color: #e7f1ff;
    }
    [type=button]:not(:disabled), [type=reset]:not(:disabled), [type=submit]:not(:disabled), button:not(:disabled) {
        cursor: pointer;
    }

    .accordion-button::after {
        flex-shrink: 0;
        width: 1.25rem;
        height: 1.25rem;
        margin-left: auto;
        content: "";
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23212529'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-size: 1.25rem;
        transition: transform .2s ease-in-out;
    }
    .accordion-button:not(.collapsed)::after {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23212529'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
        transform: rotate(180deg);
    }
</style>
<div class="row">
    <div class="col-sm-12">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Matricula</th>
                    <th scope="col">Ultimo reporte de GPS</th>
                    <th scope="col">Nivel de combustible</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $jsonvehiculos = $_SESSION['vehiculos'];
                $json = json_encode($jsonvehiculos);
                $json = json_decode($json);
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
    setInterval(function () {
        $.ajax({
            type: "GET",
            url: "https://api.navixy.com/v2/tracker/get_fuel",
            // dataType: "json",
            data: {hash: '<?php echo $_SESSION['hash'] ?>', tracker_id: <?php echo $json[$i]->ID ?>},
            success: function (response) {
                var ultimo_valor = document.getElementById("variable_combustible_<?php echo $json[$i]->ID ?>").value;
                for(var a = 0; a < response.inputs.length; a++){
                    if((response.inputs[a].label == 'DIESEL' || response.inputs[a].label == 'COMBUSTIBLE' || response.inputs[a].label == 'combustible') && response.inputs[a].value != ultimo_valor){
                        inc = Number(response.inputs[a].value);
                        valoraria = document.querySelector("#progress_bar_<?php echo $json[$i]->ID; ?>");

                        $("#progress_bar_<?php echo $json[$i]->ID; ?>").attr("aria-valuenow", inc);
                        $("#progress_bar_<?php echo $json[$i]->ID; ?>").attr("aria-valuemin", response.inputs[a].min_value);
                        $("#progress_bar_<?php echo $json[$i]->ID; ?>").attr("aria-valuemax", response.inputs[a].max_value);

                        var valor = inc;
                        var porcentaje = Number(100);
                        var max = Number(response.inputs[a].max_value);

                        var porcentaje_final = Number((valor*porcentaje)/max);

                        // console.log(porcentaje);
                        if(porcentaje_final < 26){
                            $("#progress_bar_<?php echo $json[$i]->ID; ?>").css({"background-color" : "red"})
                        }else if(porcentaje_final < 51){
                            $("#progress_bar_<?php echo $json[$i]->ID; ?>").css({"background-color" : "yellow"})
                        }else if(porcentaje_final < 76){
                            $("#progress_bar_<?php echo $json[$i]->ID; ?>").css({"background-color" : "orange"})
                        }else if(porcentaje_final > 75){
                            $("#progress_bar_<?php echo $json[$i]->ID; ?>").css({"background-color" : "green"})
                        }

                        $("#progress_bar_<?php echo $json[$i]->ID; ?>").css({"width" : porcentaje_final.toFixed(2)+'%'})
                        $("#progress_bar_<?php echo $json[$i]->ID; ?>").text(porcentaje_final.toFixed(2)+"%");
                    }
                }

            }
        });
    },5000);
</script>
<script>
    $(document).ready(function(){
        ultimo_dato_gps();
    })
    function ultimo_dato_gps(){
        var dato_gps = document.getElementById("dato-gps_<?php echo $json[$i]->ID ?>").textContent;
        if(dato_gps == ""){
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
        }else{
            setInterval({

            }, 300000)
        }
    }
    
</script>
<?php }}}?>