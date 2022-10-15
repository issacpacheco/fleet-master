
<div class="row">
    <div class="col-sm-12">
        <div class="panel">
            <div class="row panel-heading">
                <div class="col-sm-6 white">
                    PANEL PRINCIPAL
                </div>
            </div>
            <div class="panel-body">
                <div class="left full  relative paddingtop15" id="content">
                    <figure class="highcharts-figure">
                        <div id="container"></div>
                        <p class="highcharts-description white">
                            Basic line chart showing trends in a dataset. This chart includes the
                            <code>series-label</code> module, which adds a label to each line for
                            enhanced readability.
                        </p>
                    </figure>
                </div>
            </div>
        </div>  
    </div>
</div>
<script>
    Highcharts.chart('container', {
        colors: ['#058DC7', '#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#fff',
                '#FF9655', '#FFF263', '#00000'],
        chart: {
            backgroundColor: {
                linearGradient: [0, 0, 500, 500],
                stops: [
                    [0, 'rgb(42, 45, 63)'],
                    [1, 'rgb(26, 32, 53)']
                ]
            },
        },
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
            }
        },

        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },

        plotOptions: {
            series: {
                // label: {
                //     connectorAllowed: false
                // },
                // pointStart: 2022
            }
        },
        

        series: [{
            name: 'Installation & Developers',
            data: [43934, 48656, 65165, 81827, 112143, 142383,
                171533, 165174, 155157, 161454, 154610]
        }, {
            name: 'Manufacturing',
            data: [24916, 37941, 29742, 29851, 32490, 30282,
                38121, 36885, 33726, 34243, 31050]
        }, {
            name: 'Sales & Distribution',
            data: [11744, 30000, 16005, 19771, 20185, 24377,
                32147, 30912, 29243, 29213, 25663]
        }, {
            name: 'Operations & Maintenance',
            data: [null, null, null, null, null, null, null,
                null, 11164, 11218, 10077]
        }, {
            name: 'Other',
            data: [21908, 5548, 8105, 11248, 8989, 11816, 18274,
                17300, 13053, 11906, 10073]
        }],

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