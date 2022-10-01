
<?php session_start(); ?>
<div class="row">
    <?php 
        $jsonvehiculos = $_SESSION['vehiculos'];
        $json = json_encode($jsonvehiculos);
        $json = json_decode($json);
        for($i=0;$i<$_SESSION["totaldispositivos"];$i++){ 
            if($json[$i]->ID == '1625513' || $json[$i]->ID == '768858' || $json[$i]->ID == '1632526'){ ?>
	<div class="col-lg-4">
		<figure class="highcharts-figure">
			<div id="container-speed_<?php echo $json[$i]->ID ?>" class="chart-container"></div>
            <input type="hidden" name="" id="variable_combustible_<?php echo $json[$i]->ID; ?>" value="1">
			<!-- <div id="container-rpm" class="chart-container"></div> -->
			<div id="container"></div>
			<p class="highcharts-description">
				Grafica de gasolina del dispositivo <?php echo $json[$i]->nombre ?>
			</p>
		</figure>
	</div>
    <?php } }?>
</div>
<?php 
        $jsonvehiculos = $_SESSION['vehiculos'];
        $json = json_encode($jsonvehiculos);
        $json = json_decode($json);
        for($i=0;$i<$_SESSION["totaldispositivos"];$i++){ 
            if($json[$i]->ID == '1625513' || $json[$i]->ID == '768858' || $json[$i]->ID == '1632526'){ ?>
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
                        if(response.inputs[a].label == 'DIESEL' && response.inputs[a].value != ultimo_valor){
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
                                        if(response.inputs[b].label == 'DIESEL'){
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
<?php } }?>