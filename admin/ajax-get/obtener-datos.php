<?php
session_start();
if(isset($_SESSION['hash'])){
		$trackerID = filter_input(INPUT_POST, 'tracker_id', FILTER_SANITIZE_NUMBER_INT);
?>
<!-- <style>
	.highcharts-figure .chart-container {
    width: 300px;
    height: 200px;
    float: left;
}

.highcharts-figure,
.highcharts-data-table table {
    width: 600px;
    margin: 0 auto;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}

.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}

.highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
    padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}

.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

@media (max-width: 600px) {
    .highcharts-figure,
    .highcharts-data-table table {
        width: 100%;
    }

    .highcharts-figure .chart-container {
        width: 300px;
        float: none;
        margin: 0 auto;
    }
}
</style> -->
<div class="row">
	<div class="col-sm-4">
		<label>Titulo del reporte</label>
		<input type="text" name="nombre_reporte" id="nombre_reporte" value="" placeholder="Nombre que tendra el reporte" class="form-control">
	</div>
	<div class="col-sm-4">
		<label>Rango de fechas</label>
		<div class="input-group">
			<div class="input-group-addon">
				<i class="fa fa-calendar"></i>
			</div>
			<input type="text" class="form-control pull-right" id="fechas" name="fechas" readonly>
		</div>
	</div>
	<div class="col-sm-3">
		<label></label>
		<button class="btn btn-success form-control" onclick="generarreporte();">Generar reporte</button>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<figure class="highcharts-figure">
			<div id="container-speed" class="chart-container"></div>
			<!-- <div id="container-rpm" class="chart-container"></div> -->
			<div id="container"></div>
			<p class="highcharts-description">
				Grafica de gasolina del dispositivo <?php echo $trackerID ?>
			</p>
		</figure>
	</div>
</div>

<script src="plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

<script>
	$(document).ready(function(){
		$('#fechas').on('cancel.daterangepicker', function(ev, picker) {//do something, like clearing an input
			$('#fechas').val('');
		});

		
		$('#fechas').daterangepicker({
			"locale": {
				"format": "YYYY-MM-DD HH:mm:ss:ss",
				"separator": " / ",
				"applyLabel": "Seleccionar",
				"cancelLabel": "Cancelar",
				"fromLabel": "De",
				"toLabel": "Al",
				"customRangeLabel": "Custom",
				"daysOfWeek": [
					"Do",
					"Lu",
					"Ma",
					"Mi",
					"Ju",
					"Vi",
					"Sa"
				],
				"monthNames": [
					"Enero",
					"Febrero",
					"Marzo",
					"Abril",
					"Mayo",
					"Junio",
					"Julio",
					"Agosto",
					"Septiembre",
					"Octubre",
					"Noviembre",
					"Diciembre"
				],
				"firstDay": 1
			}
		});
	});
	
</script>
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
				[0.1, '#55BF3B'], // green
				[0.5, '#DDDF0D'], // yellow
				[0.9, '#DF5353'] // red
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
	$.ajax({
			type: "POST",
			url: "https://api.navixy.com/v2/tracker/readings/list",
			// dataType: "json",
			data: {hash: '<?php echo $_SESSION['hash'] ?>', tracker_id: <?php echo $trackerID; ?>},
			success: function (response) {
				for(var a = 0; a < response.inputs.length; a++){
					if(response.inputs[a].label == 'DIESEL'){
						var chartSpeed = Highcharts.chart('container-speed', Highcharts.merge(gaugeOptions, {
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
										'<span style="font-size:12px;opacity:0.4">Listros</span>' +
										'</div>'
								},
								tooltip: {
									valueSuffix: ' Lts'
								}
							}]

						}));
						setInterval(function () {
							var point,
								newVal,
								inc;
							if (chartSpeed) {
								point = chartSpeed.series[0].points[0];
								for(var b = 0; b < response.inputs.length; b++){
									if(response.inputs[b].label == 'DIESEL'){
										inc = Number(response.inputs[b].value);
									}
								}
								point.update(inc);
							}
						}, 1000);
					}
				}
			},
			failure: function (response) {

			},
			error: function (response) {

			}
		})

	
</script>
<script>
	function generarreporte(){
		var titulo 	= document.getElementById("nombre_reporte").value;
		var fecha	= document.getElementById("fechas").value;
		const rango_fecha = fecha.split(' / ');
		var hash 	= "<?php echo $_SESSION['hash'] ?>";
		var tracker = <?php echo $trackerID ?>;
		var from	= rango_fecha[0];
		var to		= rango_fecha[1];
		var timefil = {"from": "00:00:00", "to": "23:59:59", "weekdays": [1,2,3,4,5,6,7]};
		var plugin  = {"details_interval_seconds": 300, "plugin_id": 9, "show_seconds": false, "graph_type": "time", "smoothing": false, "sensors": [{"tracker_id": tracker, "sensor_id": 1869214}]};

		var datos 	= "hash="+encodeURI(hash)+
					  "&title="+encodeURI(titulo)+
					  "&trackers=["+tracker+"]&from="+encodeURI(from)+
					  "&to="+encodeURI(to)+
					  "&time_filter="+JSON.stringify(timefil)+
					  "&plugin="+JSON.stringify(plugin);

		// console.log(datos);
		
		$.ajax({
			type: 'POST',
			url: 'https://api.navixy.com/v2/report/tracker/generate?'+datos,
			success: function(response){
				console.log(response);
			}
		})
	}
</script>
<?php
}else{
	// echo "NO HAY DATOS";
}
?>