
<?php
include("./class/allClass.php");
use nsfunciones\funciones;
use nsregistros\registros;

$registro = new registros();
$fn = new funciones();

// $graf = $registro->obtener_grafica_desague();
// $cgraf = $fn->cuentarray($graf);
$lista = $registro->obtener_lista_desague();
$clista = $fn->cuentarray($lista);
$desa = $registro->obtener_categorias_desague();
$cdesa = $fn->cuentarray($desa);
?>
<style>
    /* .highcharts-title{
        color: white !important;
        fill: white !important;
    } */
    .accordion-header {
        margin-bottom: 0;
    }
    .widt-heig{
        height: 50px;
    }
    .progress-bar{
        display: flex;
        flex-direction: column;
        justify-content: center;
        color: #000000;
        text-align: center;
        font-size: 20px;
        text-shadow: 2px 3px 8px #1a2035cc;
        font-weight: bold;
        transition: width 0.6s ease;
    }
    .progress {
        display: flex;
        overflow: hidden;
        font-size: 0.75rem;
        background-color: transparent;
        border: 1px solid gray;
        border-radius: 0.25rem;
        box-shadow: inset 0 0.1rem 0.1rem rgb(0 0 0 / 10%);
    }
</style>
<div class="row">
    <div class="col-sm-12">
        <div class="panel">
            <div class="row panel-heading">
                <div class="col-sm-6">
                    PANEL PRINCIPAL
                </div>
            </div>
            <div class="panel-body">
                <div class="left full  relative paddingtop15" id="content">
                    <figure class="highcharts-figure">
                        <div id="container"></div>
                        <p class="highcharts-description">
                            Esta grafica representa las veces en las que hubo registro de desague en los diferentes dispositivos
                        </p>
                    </figure>
                </div>
                <?php 
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
                                    <th scope="col">Vehiculo</th>
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
                                        <div class="progress widt-heig">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" id="progress_bar_<?php echo $json[$i]->ID; ?>" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="" style=""></div>
                                        </div>
                                    </td>
                                </tr>
                                <?php }}} ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>

<script>
    Highcharts.chart('container', {
        colors: ['#058DC7', '#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#000000',
                '#FF9655', '#FFF263', '#32A79B'],
        // chart: {
        //     backgroundColor: {
        //         linearGradient: [0, 0, 500, 500],
        //         stops: [
        //             [0, 'rgb(42, 45, 63)'],
        //             [1, 'rgb(26, 32, 53)']
        //         ]
        //     },
        // },
        title: {
            text: 'Registro de desague de vehiculos'
        },

        subtitle: {
            text: ''
        },

        yAxis: {
            title: {
                text: 'Number of Employees'
            }
        },

        xAxis: {
            accessibility: {
                rangeDescription: 'Rango de fechas'
            },
            categories: [
                <?php for($g = 0; $g < $cdesa; $g++){
                    echo "'".$desa['fch_registro'][$g]."',";
                } ?>
            ]
        },

        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },

        series: [
            <?php 
            $jsonvehiculos = $_SESSION['vehiculos'];
            $json = json_encode($jsonvehiculos);
            $json = json_decode($json);

            // for($i=0;$i<$_SESSION["totaldispositivos"];$i++){

            //     $html = "{name:'".$json[$i]->nombre."',data:[";

            //     for($e = 0;$e < $cdesa;$e++){
            //         $graf = $registro->obtener_grafica_desague($json[$i]->ID,$desa['fch_registro'][$e]);
            //         if(isset($graf['fch_registro'][0])){
            //             $html .= $graf['total'][0].",";
            //         }else{
            //             $html .= "0,";
            //         }
            //     }

            //     echo $html .= "]},";

            // }
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
                        
                            // $valores[] = $html .= "]},";
                    }
            
                    
                
                }
                echo $html .= "]},";
            }
            ?>
        ],

        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }

    });
</script>
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
        });
    }
    
</script>
<?php }}}?>