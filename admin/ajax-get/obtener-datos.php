<?php
session_start();
if(isset($_SESSION['hash'])){
		$trackerID = filter_input(INPUT_POST, 'tracker_id', FILTER_SANITIZE_NUMBER_INT);
?>
<style>
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
</style>
<figure class="highcharts-figure">
    <!-- <div id="container-speed" class="chart-container"></div> -->
    <!-- <div id="container-rpm" class="chart-container"></div> -->
	<input type="hidden" name="" id="hash" value="<?php echo $_SESSION['hash']; ?>">
	<input type="hidden" name="" id="trackerid" value="<?php echo $trackerID; ?>">
	<div id="container"></div>
    <p class="highcharts-description">
        Grafica de gasolina del dispositivo <?php echo $trackerID ?>
    </p>
</figure>
<script>
	// window.onload = cargargrafica();
	$(document).ready(function(){
		cargargrafica();
	})
	function cargargrafica(){
		var hash = document.getElementById("hash").value;
		var trackerid = document.getElementById("trackerid").value;
		Highcharts.chart('container', {
			chart: {
				type: 'gauge',
				plotBackgroundColor: null,
				plotBackgroundImage: null,
				plotBorderWidth: 0,
				plotShadow: false,
				height: '80%'
			},

			title: {
				text: 'Gasolina'
			},

			pane: {
				startAngle: -90,
				endAngle: 89.9,
				background: null,
				center: ['50%', '75%'],
				size: '110%'
			},

			// the value axis
			yAxis: {
				min: 0.00,
				max: 150.00,
				tickPixelInterval: 72,
				tickPosition: 'inside',
				tickColor: Highcharts.defaultOptions.chart.backgroundColor || '#FFFFFF',
				tickLength: 20,
				tickWidth: 2,
				minorTickInterval: null,
				labels: {
					distance: 20,
					style: {
						fontSize: '14px'
					}
				},
				// stops: [
				// 	[0.1, '#DF5353'], // red DF5353
				// 	[0.5, '#DDDF0D'], // yellow
				// 	[0.9, '#55BF3B'] // green 55BF3B
				// ],
				plotBands: [{
					from: 0,
					to: 120,
					color: '#DF5353', // red
					thickness: 20
				}, {
					from: 120,
					to: 160,
					color: '#DDDF0D', // yellow
					thickness: 20
				}, {
					from: 160,
					to: 200,
					color: '#55BF3B', // green
					thickness: 20
				}]
			},

			series: [{
				name: 'Speed',
				data: [0],
				tooltip: {
					valueSuffix: ' Litros'
				},
				dataLabels: {
					format: '{y} Litros',
					borderWidth: 0,
					color: (
						Highcharts.defaultOptions.title &&
						Highcharts.defaultOptions.title.style &&
						Highcharts.defaultOptions.title.style.color
					) || '#333333',
					style: {
						fontSize: '16px'
					}
				},
				dial: {
					radius: '80%',
					backgroundColor: 'gray',
					baseWidth: 12,
					baseLength: '0%',
					rearLength: '0%'
				},
				pivot: {
					backgroundColor: 'gray',
					radius: 6
				}
			}]
		});
		setInterval(() => {
			$.ajax({
				type: "POST",
				url: "https://api.navixy.com/v2/tracker/readings/list",
				// dataType: "json",
				data: {hash: '<?php echo $_SESSION['hash'] ?>', tracker_id: <?php echo $trackerID; ?>},
				success: function (response) {
					console.log(response);
					for(var a = 0; a < response.inputs.length; a++){
						if(response.inputs[a].label == 'DIESEL'){
							const chart = Highcharts.charts[0];
							valor_min = Number(response.inputs[a].min_value);
							valor_max = Number(response.inputs[a].max_value);
							chart.yAxis[0].setExtremes(valor_min,valor_max);
						}
					}
					// setInterval(() => {
						const chart = Highcharts.charts[0];
						if (chart && !chart.renderer.forExport) {
							const point = chart.series[0].points[0];
							for(var b = 0; b < response.inputs.length; b++){
							if(response.inputs[b].label == 'DIESEL'){
									inc = Number(response.inputs[b].value);
								}
							}
							point.update(inc);
						}
					// }, 1000);
				},
				failure: function (response) {

				},
				error: function (response) {

				}
			});
		}, 5000);
	}
	
</script>
<?php
}else{
	// echo "NO HAY DATOS";
}
?>