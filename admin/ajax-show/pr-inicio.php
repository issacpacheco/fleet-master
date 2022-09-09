<?php
include("class/allClass.php");

use nsalmacen\almacen;
use nsfunciones\funciones;
use nsgraficas\graficas;
use nsroot\root;

$infoAlmacen    = new almacen();
$graficas       = new graficas();
$root           = new root();
$fn             = new funciones();

//Esta es información para usuarios administradores
$solicitudes    = $infoAlmacen->obtener_solicitudes();
$csolicitudes   = $fn->cuentarray($solicitudes);

$stock          = $infoAlmacen->obtener_materiales_por_agotarse();
$cstock         = $fn->cuentarray($stock);

$prestamos      = $infoAlmacen->obtener_materiales_prestados();
$cprestamos     = $fn->cuentarray($prestamos);

$transfers      = $infoAlmacen->obtener_transferencias_en_curso();
$ctransfers     = $fn->cuentarray($transfers);

$areas          = $infoAlmacen -> obtener_areas();
$careas         = $fn -> cuentarray($areas);

$almacen         = $infoAlmacen -> obtener_todos_almacenes();
$calmacen        = $fn -> cuentarray($almacen);

//Esta es informacion para los usuarios chofer

$misenvios      = $infoAlmacen->obtener_mis_envios();
$cmisenvios     = $fn->cuentarray($misenvios);

$misenviosfin   = $infoAlmacen->obtener_mis_envios_finalizados();
$cmisenviosfin  = $fn->cuentarray($misenviosfin);

//Consulta de graficas
$top6           = $graficas -> top6_mas_solicitados();
$topventas      = $graficas -> top_materiales_mas_vendidos();
$activos        = $graficas -> productos_activos();
$gatosdelmes    = $graficas -> gastos_del_mes();
// $grafia_anio    = $graficas -> grafica_gasto_año();
$ventasalmacen  = $graficas -> ventas_almacenes();
$cventasalmacen = $fn       -> cuentarray($ventasalmacen);
// $cgrafia_anio   = $fn       -> cuentarray($grafia_anio);
$ctop           = $fn       -> cuentarray($top6);
$cventas        = $fn       -> cuentarray($topventas);

$gasto  = $gatosdelmes['total'][0];
// $gasto = 0;
// for($i = 0;$i < count($gatosdelmes); $i++){
//     $gasto = $gasto + $gatosdelmes['total'][$i];
// }

?>
<style>
    @import "https://code.highcharts.com/css/highcharts.css";

.highcharts-figure,
.highcharts-data-table table {
    min-width: 310px;
    max-width: 800px;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
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
}

.highcharts-data-table thead tr,
.highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}

.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

.highcharts-yaxis .highcharts-axis-line {
    stroke-width: 2px;
}

/* Link the series colors to axis colors */
/* .highcharts-color-0 {
    fill: #7cb5ec;
    stroke: #7cb5ec;
}

.highcharts-axis.highcharts-color-0 .highcharts-axis-line {
    stroke: #7cb5ec;
}

.highcharts-axis.highcharts-color-0 text {
    fill: #7cb5ec;
}

.highcharts-color-1 {
    fill: #90ed7d;
    stroke: #90ed7d;
}

.highcharts-axis.highcharts-color-1 .highcharts-axis-line {
    stroke: #90ed7d;
}

.highcharts-axis.highcharts-color-1 text {
    fill: #90ed7d;
} */
</style>
<div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Hola <?php echo utf8_encode(html_entity_decode($_SESSION['nombre'])); ?>, <span>Bienvenid@ de nuevo al sistema de inventario</span></h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">
                    <!-- /# row -->
                    <?php //if($_SESSION['nivel'] == 1){ ?>
                    <!-- <div class="row card">
                        <div class="row">
                            <div class="col-sm-6">
                                <label> ¿Necesita ver toda esta información de un area en especifico? Solo seleccione el area en el siguiente listado </label>
                                <select name="id_area" class="form-control" id="id_area" onchange="obtener_info_area(this.value);">
                                    <option value="0" selected>Seleccione un area</option>
                                    <?php //for($i = 0; $i < $careas; $i++){ ?>
                                    <option value="<?php //echo $areas['id'][$i] ?>"><?php //echo utf8_decode($areas['nombre'][$i]); ?></option>
                                    <?php //} ?>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label> Selecciona un almacen </label>
                                <select name="id_almacen" class="form-control" id="id_almacen" onchange="obtener_info_area(this.value);">
                                    <option value="0" selected>Seleccione un almacen</option>
                                    <?php //for($i = 0; $i < $calmacen; $i++){ ?>
                                    <option value="<?php //echo $almacen['id'][$i] ?>"><?php //echo utf8_decode($almacen['nombre'][$i]); ?></option>
                                    <?php //} ?>
                                </select>
                            </div>
                        </div>
                    </div> -->
                    <?php //} ?>
                    <div class="row card">
                        <h4>Ventas totales del mes por almacen</h4>
                        <?php for($i = 0; $i < $cventasalmacen; $i++){ ?>
                        <div class="col-sm-3 barras-almacenes margin10">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h2><?php echo $ventasalmacen['nombre'][$i]; ?></h2>
                                </div>
                                <div class="col-sm-12">
                                    <h3><span>$</span><?php echo number_format($ventasalmacen['total'][$i],2,'.',','); ?></h3>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="row card">
                        <h4>Top materiales mas solicitados</h4>
                        <?php for($i = 0; $i < $ctop; $i++){ ?>
                        <div class="col-lg-2 tajetatop">
                            <div class="card p-0 maxwidth">
                                <div class="stat-widget-three home-widget-three">
                                    <div class="stat-icon bg-danger" style="padding: 0;">
                                        <?php $fototop1 = $infoAlmacen -> obtener_fotos_prestamo('upload/materiales/'.$top6['id_producto'][$i]); ?>
                                        <img src="<?php echo file_get_contents($fototop1["archivo"][$i]) ? $fototop1["archivo"][$i] : 'upload/generales/not-found-img.png'; ?>"  class="responsive" style="width: 100px;height: 85px;" />
                                    </div>
                                    <div class="stat-content">
                                        <div class="stat-digit"><p><?php echo isset($top6['total'][$i]) ? $top6['total'][$i] : 'Sin información'; ?></p></div>
                                        <div class="stat-text"><p><?php echo isset($top6['nombre'][$i]) ? $top6['nombre'][$i] : 'Sin información'; ?></p></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="row card">
                        <h4>Top materiales mas vendidos</h4>
                        <?php for($i = 0; $i < $cventas; $i++){ ?>
                        <div class="col-lg-2 tajetatop">
                            <div class="card p-0 maxwidth">
                                <div class="stat-widget-three home-widget-three">
                                    <div class="stat-icon bg-danger" style="padding: 0;">
                                        <?php $fototop1 = $infoAlmacen -> obtener_fotos_prestamo('upload/materiales/'.$topventas['id_producto'][$i]); ?>
                                        <img src="<?php echo file_get_contents($fototop1["archivo"][$i]) ? $fototop1["archivo"][$i] : 'upload/generales/not-found-img.png'; ?>"  class="responsive" style="width: 100px;height: 85px;" />
                                    </div>
                                    <div class="stat-content">
                                        <div class="stat-digit"><p><?php echo isset($topventas['total'][$i]) ? (int)$topventas['total'][$i] : 'Sin información'; ?></p></div>
                                        <div class="stat-text"><p><?php echo isset($topventas['nombre'][$i]) ? $topventas['nombre'][$i] : 'Sin información'; ?></p></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="row card">
                        <div class="col-lg-8">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"><i class="ti-money color-success border-success"></i>
                                        </div>
                                        <div class="stat-content dib">
                                            <div class="stat-text"><p>Total gasto del mes</p></div>
                                            <div class="stat-digit"><p>$<?php echo number_format($gasto,2,'.',','); ?></p></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"><i class="ti-layout-grid2 color-pink border-pink"></i>
                                        </div>
                                        <div class="stat-content dib">
                                            <div class="stat-text"><p>Materiales activos</p></div>
                                            <div class="stat-digit"><p><?php echo $activos['disponibles'][0] ?></p></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-title">
                                        <h4>Grafica de gastos mensuales</h4>

                                    </div>
                                    <div class="card-body">
                                        <figure class="highcharts-figure">
                                            <div id="container-gastos"></div>
                                            <p class="highcharts-description">
                                                Esta grafica refleja los gastos totales que se hicieron por mes de todos los almacenes disponibles
                                            </p>
                                            <button id="plain">Plano</button>
                                            <button id="inverted">Invertido</button>
                                            <button id="polar">Polar</button>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="col-lg-12">
                                <div class="card" style="height: 68.5rem;">
                                    <div class="calendariogoogle">
                                        <?php 
                                        echo html_entity_decode(str_replace("'", '"',$_SESSION['calendario'])); ?>
                                    </div>
                                </div>
                                <!-- /# card -->
                            </div>
                        </div>
                    </div>
                    <div class="row card">
                        <div class="col-lg-12">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-title">
                                        <h4>Grafica de ventas mensuales</h4>
                                    </div>
                                    <div class="card-body">
                                    <figure class="highcharts-figure">
                                        <div id="container-ventas"></div>
                                        <p class="highcharts-description">
                                            Esta grafica refleja las ventas totales que se hicieron por mes de todos los almacenes disponibles
                                        </p>
                                    </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main-content">
                        <?php if($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 99){ ?>
                        <div class="row ">
                            <div class="col-sm-12 card">
                                <h3 class="text-center">Listado de solicitudes</h3>
                                <div class="card-body">
                                    <div class="table-responsive" id="content"> 
                                        <table class="table student-data-table m-t-20" id="tabla1">
                                            <thead>
                                                <tr>
                                                    <th> # </th>
                                                    <th> Solicitante </th>
                                                    <th> Fecha de solicitud </th>
                                                    <th> Hora de solicitud </th>
                                                    <th> Clave de solicitud </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php for($i = 0,$a=0; $i < $csolicitudes; $i++){ $a = $a+1; ?>
                                                <tr onclick="universalLoad(this)" data-postload="0" data-returnpage="pr-inicio" data-form="" data-page="salida-prestamo-edit" data-carpeta="ajax-edit" data-load="contenedor" data-valores="" data-id="<?php echo $solicitudes['clave_solicitud'][$i]; ?>">
                                                    <td class="btn-info"><?php echo $a; ?></td>
                                                    <td class="btn-info"><?php echo $solicitudes['nombre'][$i]; ?></td>
                                                    <td class="btn-info"><?php echo $solicitudes['fecha'][$i]; ?></td>
                                                    <td class="btn-info"><?php echo $solicitudes['hora'][$i]; ?></td>
                                                    <td class="btn-info"><?php echo $solicitudes['clave_solicitud'][$i]; ?></td>
                                                </tr>
                                            <?php } ?>    
                                            </tbody>    
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 card">
                                <h3 class="text-center">Listado de materiales por agotarse o agotados</h3>
                                <div class="card-body">
                                    <div class="table-responsive" id="content">
                                        <table class="table student-data-table m-t-20" id="tabla2">
                                            <thead>
                                                <tr>
                                                    <th> # </th>
                                                    <th> Producto/Material </th>
                                                    <th> Cantidad </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php for($i = 0,$a=0; $i < $cstock; $i++){ $a = $a+1; ?>
                                                <tr>
                                                    <td class="btn-danger"><?php echo $a; ?></td>
                                                    <td class="btn-danger"><?php echo $stock['nombre'][$i]; ?></td>
                                                    <td class="btn-danger"><?php echo $stock['cantidad'][$i]; ?></td>
                                                </tr>
                                            <?php } ?>    
                                            </tbody>    
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-sm-12 card">
                                <h3 class="text-center">Lista de materiales prestados</h3>
                                <div class="card-body">
                                    <div class="table-responsive" id="content">
                                        <table class="table student-data-table m-t-20" id="tabla3">
                                            <thead>
                                                <tr>
                                                    <th> Solicitante </th>
                                                    <th> Material </th>
                                                    <th> Fecha/Hora </th>
                                                    <th> Clave </th>
                                                    <th> Cantidad </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php for($i = 0,$a=0; $i < $cprestamos; $i++){ ?>
                                                <tr>
                                                    <td class="btn-warning"><?php echo $prestamos['usuario'][$i]; ?></td>
                                                    <td class="btn-warning"><?php echo $prestamos['nombre'][$i]; ?></td>
                                                    <td class="btn-warning"><?php echo $prestamos['fecha'][$i].'-/-'.$prestamos['hora'][$i]; ?></td>
                                                    <td class="btn-warning"><?php echo $prestamos['clave_solicitud'][$i]; ?></td>
                                                    <td class="btn-warning"><?php echo $prestamos['cantidad_prestada'][$i]; ?></td>
                                                </tr>
                                            <?php } ?>    
                                            </tbody>    
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 card">
                                <h3 class="text-center">Transferencias en curso</h3>
                                <div class="card-body">
                                    <div class="table-responsive" id="content">
                                        <table class="table student-data-table m-t-20" id="tabla4">
                                            <thead>
                                                <tr>
                                                    <th> # </th>
                                                    <th> Origen </th>
                                                    <th> Destino </th>
                                                    <th> Clave de envio </th>
                                                    <th> Reporte </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php for($i = 0,$a=0; $i < $ctransfers; $i++){ $a = $a+1;  ?>
                                                <tr>
                                                    <td class="btn-success"><?php echo $a; ?></td>
                                                    <td class="btn-success"><?php echo utf8_encode(html_entity_decode($transfers['almacen_origen'][$i])); ?></td>
                                                    <td class="btn-success"><?php echo $transfers['almacen_destino'][$i]; ?></td>
                                                    <td class="btn-success"><?php echo $transfers['codigo_transfer'][$i]; ?></td>
                                                    <td class="text-center btn-success"><i class="btn btn-danger fas fa-file-pdf" onclick="generarreporte('<?php echo $transfers['codigo_transfer'][$i]; ?>');"></i></td>
                                                </tr>
                                            <?php } ?>    
                                            </tbody>    
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if($_SESSION['area'] == 4){ ?>
                        <div class="row ">
                            <div class="col-sm-12 card">
                                <h3 class="text-center">Envios asignado</h3>
                                <div class="card-body">
                                    <div class="table-responsive" id="content">
                                        <table class="table student-data-table m-t-20" id="tabla1">
                                            <thead>
                                                <tr>
                                                    <th> # </th>
                                                    <th> Origen </th>
                                                    <th> Destino </th>
                                                    <th> Clave de envio </th>
                                                    <th> Reporte </th>
                                                    <th> Iniciar viaje </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php for($i = 0,$a=0; $i < $cmisenvios; $i++){ $a = $a+1; ?>
                                                <tr>
                                                    <td class="btn-primary"><?php echo $a; ?></td>
                                                    <td class="btn-primary"><?php echo $misenvios['almacen_origen'][$i]; ?></td>
                                                    <td class="btn-primary"><?php echo $misenvios['almacen_destino'][$i]; ?></td>
                                                    <td class="btn-primary"><?php echo $misenvios['codigo_transfer'][$i]; ?></td>
                                                    <td class="text-center btn-primary"><i class="btn btn-danger fas fa-file-pdf" onclick="generarreporte('<?php echo $misenvios['codigo_transfer'][$i]; ?>');"></i></td>
                                                    <td class="btn-primary"><input type="button" id="validacion" class="btn btn-info" value="iniciar viaje" onclick="validarviaje('<?php echo $misenvios['codigo_transfer'][$i]; ?>');"></td>
                                                </tr>
                                            <?php } ?>    
                                            </tbody>    
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 card">
                                <h3 class="text-center">Envios Finalizados</h3>
                                <div class="card-body">
                                    <div class="table-responsive" id="content">
                                        <table class="table student-data-table m-t-20" id="tabla2">
                                            <thead>
                                                <tr>
                                                    <th> # </th>
                                                    <th> Origen </th>
                                                    <th> Destino </th>
                                                    <th> Clave de envio </th>
                                                    <th> Reporte </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php for($i = 0,$a=0; $i < $cmisenviosfin; $i++){ $a = $a+1; ?>
                                                <tr>
                                                    <td class="btn-success"><?php echo $a; ?></td>
                                                    <td class="btn-success"><?php echo $misenviosfin['almacen_origen'][$i]; ?></td>
                                                    <td class="btn-success"><?php echo $misenviosfin['almacen_destino'][$i]; ?></td>
                                                    <td class="btn-success"><?php echo $misenviosfin['codigo_transfer'][$i]; ?></td>
                                                    <td class="text-center btn-success"><i class="btn btn-danger fas fa-file-pdf" onclick="generarreporte('<?php echo $misenvios['codigo_transfer'][$i]; ?>');"></i></td>
                                                </tr>
                                            <?php } ?>    
                                            </tbody>    
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="row">
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- highcharts -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-more.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <!-- scripts para graficas -->
    <script>
        var chart = Highcharts.chart('container-gastos', {

        chart: {
            type: 'column'
        },

        title: {
            text: 'Grafica de gastos mensuales del año en curso'
        },

        legend: {
            align: 'right',
            verticalAlign: 'middle',
            layout: 'vertical'
        },

        xAxis: {
            categories: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            labels: {
                x: -10
            }
        },

        // yAxis: {
        //     allowDecimals: false,
        //     title: {
        //         text: 'Total'
        //     }
        // },
        yAxis: {
            title: {
                useHTML: true,
                text: 'Gastos'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },

        series: [<?php for($i = 0; $i < $calmacen; $i++){
            $html = '{ name: "'.$almacen['nombre'][$i].'",
                        data: [';
                        $gfa = $graficas -> grafica_gasto_año($almacen['id'][$i]);
                        $datos = "";
                        for($a=1;$a<13;$a++){
                            $datos .= $gfa[$a][0].","; 
                        }
                        $html .= $datos; 
                        
                        $html .= ']},';
                        echo $html;
        }?>],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        align: 'center',
                        verticalAlign: 'bottom',
                        layout: 'horizontal'
                    },
                    yAxis: {
                        labels: {
                            align: 'left',
                            x: 0,
                            y: -5
                        },
                        title: {
                            text: null
                        }
                    },
                    subtitle: {
                        text: null
                    },
                    credits: {
                        enabled: false
                    }
                }
            }]
        }
        });

        document.getElementById('plain').addEventListener('click', () => {
            chart.update({
                chart: {
                    inverted: false,
                    polar: false
                }
            });
        });

        document.getElementById('inverted').addEventListener('click', () => {
            chart.update({
                chart: {
                    inverted: true,
                    polar: false
                }
            });
        });

        document.getElementById('polar').addEventListener('click', () => {
            chart.update({
                chart: {
                    inverted: false,
                    polar: true
                }
            });
        });
    </script>
    <script>
        function obtener_info_area(value){
            var id = value;
            $.ajax({
                type: 'POST',
                url: 'ajax-get/panel-principal',
                data: {id_area: id},
                success: function(response){
                    $('#contenedor').html(response);
                }
            })
        }
        Highcharts.chart('container-ventas', {
            chart: {
                type: 'column',
                styledMode: true
            },

            title: {
                text: 'Grafica de ventas del año en curso'
            },

            xAxis: {
                categories: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                labels: {
                    x: -10
                }
            },

            yAxis: [{ // Primary axis
                className: 'highcharts-color-0',
                title: {
                    text: 'Ventas'
                }
            }, { // Secondary axis
                className: 'highcharts-color-1',
                opposite: true,
                title: {
                    text: 'Ventas'
                }
            }],

            plotOptions: {
                column: {
                    borderRadius: 5
                }
            },

            series: [<?php for($i = 0; $i < $calmacen; $i++){
            $html = '{ name: "'.$almacen['nombre'][$i].'",
                        data: [';
                        $gfa = $graficas -> grafica_venta_año($almacen['id'][$i]);
                        $datos = "";
                        for($a=1;$a<13;$a++){
                            $datos .= $gfa[$a][0].","; 
                        }
                        $html .= $datos; 
                        
                        $html .= ']},';
                        echo $html;
            }?>]
        });
    </script>