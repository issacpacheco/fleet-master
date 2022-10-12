
<?php 
include("../class/allClass.php");
use nsfunciones\funciones;
use nsregistros\registros;
$registro = new registros();
$fn = new funciones();
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
    <?php 
        $jsonvehiculos = $_SESSION['vehiculos'];
        $json = json_encode($jsonvehiculos);
        $json = json_decode($json);
        for($i=0;$i<$_SESSION["totaldispositivos"];$i++){ 
            for($a = 0; $a < count($json[$i]->lista_sensores); $a++){
                if($json[$i]->lista_sensores[$a]->nombre_sensor == "DIESEL" || $json[$i]->lista_sensores[$a]->nombre_sensor == "COMBUSTIBLE" || $json[$i]->lista_sensores[$a]->nombre_sensor == "combustible"){

              
            // if($json[$i]->ID == '1625513' || $json[$i]->ID == '768858' || $json[$i]->ID == '1632526'){ 
               $ultimo_registro = $registro->obtener_ultima_carga($json[$i]->ID); ?>
	<div class="col-sm-4">
		<figure class="highcharts-figure">
			<div id="container-speed_<?php echo $json[$i]->ID ?>" class="chart-container"></div>
            <input type="hidden" name="" id="variable_combustible_<?php echo $json[$i]->ID; ?>" value="1">
			<!-- <div id="container-rpm" class="chart-container"></div> -->
			<div id="container"></div>
			<p class="highcharts-description">
				Grafica de gasolina del dispositivo <?php echo $json[$i]->nombre ?>
			</p>
		</figure>
        <div class="row">
            <div class="accordion col-lg-12" id="indicaciones_<?php echo $json[$i]->ID ?>">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo_<?php echo $json[$i]->ID ?>">
                    <button class="accordion-button nopadding alert p-0 m-0" type="button" data-toggle="collapse" href="#collapseExample_<?php echo $json[$i]->ID ?>" role="button" aria-expanded="false" aria-controls="collapseExample_<?php echo $json[$i]->ID ?>">
                        <div class="p-2 mb-3" style="border-left: 8px solid red;">
                            <h2 class="fw-bold m-0">Más información</h2>
                        </div>
                    </button>
                    </h2>
                    <div id="collapseExample_<?php echo $json[$i]->ID ?>" class="collapse" aria-labelledby="headingTwo_<?php echo $json[$i]->ID ?>" data-bs-parent="#accordionExample" style="">
                        <div class="accordion-body">
                            <h3>Seguimiento del vehiculo en la plataforma principal <a href="https://tracking.fleetmaster.mx/#/online/trackers/<?php echo $json[$i]->ID ?>"><i class="fal fa-external-link"></i></a></h3>
                        </div>
                        <div class="accordion-body">
                            <h3> Ultima carga de gasolina: <?php echo isset($ultimo_registro['cantidad_litros'][0]) ? $ultimo_registro['cantidad_litros'][0] : "No hay información"; ?></h3>
                        </div>
                        <div class="accordion-body">
                            <h3 id="dato-gps_<?php echo $json[$i]->ID ?>"></h3>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-12">
                <p>
                    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        Link with href
                    </a>
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Button with data-target
                    </button>
                </p>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                    </div>
                </div>
            </div> -->
        </div>
	</div>
    <?php   }
            }}?>
</div>
<?php 
        $jsonvehiculos = $_SESSION['vehiculos'];
        $json = json_encode($jsonvehiculos);
        $json = json_decode($json);
        for($i=0;$i<$_SESSION["totaldispositivos"];$i++){ 
            for($a = 0; $a < count($json[$i]->lista_sensores); $a++){
                if($json[$i]->lista_sensores[$a]->nombre_sensor == "DIESEL" || $json[$i]->lista_sensores[$a]->nombre_sensor == "COMBUSTIBLE" || $json[$i]->lista_sensores[$a]->nombre_sensor == "combustible"){
            //if($json[$i]->ID == '1625513' || $json[$i]->ID == '768858' || $json[$i]->ID == '1632526'){ ?>
<script>
	// window.onload = cargargrafica();
	var gaugeOptions = {
		chart: {
			type: 'solidgauge'
		},

		title: null,

		pane: {
			center: ['50%', '85%'],
			size: '140%',
			startAngle: -90,
			endAngle: 90,
			background: {
				backgroundColor:
					Highcharts.defaultOptions.legend.backgroundColor || '#EEE',
				innerRadius: '60%',
				outerRadius: '100%',
				shape: 'arc'
			}
		},

		exporting: {
			enabled: false
		},

		tooltip: {
			enabled: false
		},

		// the value axis
		yAxis: {
			stops: [
				[0.1, '#DF5353'], // green
				[0.5, '#DDDF0D'], // yellow
				[0.9, '#55BF3B'] // red
			],
			lineWidth: 0,
			tickWidth: 0,
			minorTickInterval: null,
			tickAmount: 2,
			title: {
				y: -70
			},
			labels: {
				y: 16
			}
		},

		plotOptions: {
			solidgauge: {
				dataLabels: {
					y: 5,
					borderWidth: 0,
					useHTML: true
				}
			}
		}
	};
    setInterval(function () {
        $.ajax({
                type: "POST",
                url: "https://api.navixy.com/v2/tracker/readings/list",
                // dataType: "json",
                data: {hash: '<?php echo $_SESSION['hash'] ?>', tracker_id: <?php echo $json[$i]->ID ?>},
                success: function (response) {
                    var ultimo_valor = document.getElementById("variable_combustible_<?php echo $json[$i]->ID ?>").value;
                    for(var a = 0; a < response.inputs.length; a++){
                        if((response.inputs[a].label == 'DIESEL' || response.inputs[a].label == 'COMBUSTIBLE' || response.inputs[a].label == 'combustible') && response.inputs[a].value != ultimo_valor){
                            var chartSpeed = Highcharts.chart('container-speed_<?php echo $json[$i]->ID ?>', Highcharts.merge(gaugeOptions, {
                                yAxis: {
                                    min: response.inputs[a].min_value,
                                    max: response.inputs[a].max_value,
                                    title: {
                                        text: 'Gasolina'
                                    }
                                },

                                credits: {
                                    enabled: false
                                },

                                series: [{
                                    name: 'Gasolina',
                                    data: [0],
                                    dataLabels: {
                                        format:
                                            '<div style="text-align:center">' +
                                            '<span style="font-size:25px">{y}</span><br/>' +
                                            '<span style="font-size:12px;opacity:0.9">Litros</span>' +
                                            '</div>'
                                    },
                                    tooltip: {
                                        valueSuffix: ' Lts'
                                    }
                                }]

                            }));
                            // setInterval(function () {
                                var point,
                                    newVal,
                                    inc;
                                if (chartSpeed) {
                                    point = chartSpeed.series[0].points[0];
                                    for(var b = 0; b < response.inputs.length; b++){
                                        if(response.inputs[b].label == 'DIESEL' || response.inputs[b].label == 'COMBUSTIBLE' || response.inputs[b].label == 'combustible'){
                                            inc = Number(response.inputs[b].value);
                                            $("#variable_combustible_<?php echo $json[$i]->ID ?>").val(inc);
                                        }
                                    }
                                    point.update(inc);
                                }
                            // }, 1000);
                        }
                    }
                },
                failure: function (response) {

                },
                error: function (response) {

                }
        });
    }, 3000);

	
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
                        $("#dato-gps_<?php echo $json[$i]->ID ?>").text("El ultimo registro del vehiculos fue en la locacion: "+"Sin datos");
                    }else{
                        var content = JSON.parse(response);
                        if(response.end_address == undefined){
                            $("#dato-gps_<?php echo $json[$i]->ID ?>").text("El ultimo registro del vehiculos fue en la locacion: "+content.start_address);
                        }else{
                            $("#dato-gps_<?php echo $json[$i]->ID ?>").text("El ultimo registro del vehiculos fue en la locacion: "+content.end_address);
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