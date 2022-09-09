<?php
include('../class/allClass.php');

use nsalmacen\almacen;
use nsfunciones\funciones;

$info   = new almacen();
$fn     = new funciones();

$cotizacion     = $info->obtener_cotizaciones();
$ccotizacion    = $fn->cuentarray($cotizacion);

?>
<div class="row">
    <div class="col-sm-12">
        <div class="panel">
            <div class="row panel-heading">
                <div class="col-sm-6">
                    Lista de cotizaciones
                </div>
                <div class="col-6 mright textright">
                    <button id="idtest" onclick="universalLoad(this)" data-postload="0" data-regresar="pr-cotizaciones" data-valores="" data-form="" data-page="cotizaciones-add" data-carpeta="ajax-add" data-load="contenedor" data-id="" class="btngral botonVerde mright"><span class="fas fa-plus-circle font16"></span><span class="letrablanca font14">
                        <span class="letrablanca font14">Crear nueva cotización</span>
                    </button>
                </div>
            </div>
            <div class="panel-body">
                <div class="left full fondoblanco relative paddingtop15" id="content">
                    <table class="display fullimportant" id="tabla">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Folio </th>
                                <th> Nombre cliente </th>
                                <!-- <th> Comentarios </th> -->
                                <th> Fecha y Hora de emisión </th>
                                <th> PDF Cotizacion </th>
                                <th> Realizar venta </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php for($i = 0,$a=0; $i < $ccotizacion; $i++){ $a = $a+1;?>
                            <tr>
                                <td><?php echo $a; ?></td>
                                <td><?php echo $cotizacion['folio'][$i]; ?></td>
                                <td><?php echo $cotizacion['cliente'][$i]; ?></td>
                                <!-- <td><?php //echo $cotizacion['comentarios'][$i]; ?></td> -->
                                <td><?php echo $cotizacion['fch_registro'][$i].' // '.$cotizacion['hra_registro'][$i]; ?></td>
                                <td class="text-center"><button class="btn btn-danger" onclick="generarpdfcot('<?php echo $cotizacion['id'][$i]; ?>');">Descargar PDF <i class="fal fa-file-pdf"></i></button></td>
                                <td><?php if($cotizacion['estatus'][$i] == 1){ ?><button type="button" class="btn btn-success" onclick="RealizarVenta(this, 1800, 900)" data-postload="0" data-returnpage="pr-cotizaciones" data-valores="" data-form="" data-page="obtener-venta" data-carpeta="ajax-get" data-load="board" data-id="<?php echo $cotizacion['id'][$i] ?>">Realizar venta <i class="fal fa-hand-holding-usd"></i></button><?php }else{ echo "Venta realizada"; } ?></td>
                            </tr>
                        <?php } ?>    
                        </tbody>    
                    </table>
                </div>
            </div>
        </div>  
    </div>
</div>
<script>    
    $(document).ready(function () {
        var t = $('#tabla').DataTable({
            "scrollX": true,
            "stateSave": true,
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "No se encontró ningún registro",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros",
                "search": "Buscar",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                }
            }
        });
    });  
    function generarpdfcot(clave){
        window.location.href = "../admin/upload/pdf/pdf-cotizacion.php?id="+clave;
    }

    function RealizarVenta(elem, width, height){
        var form = $(elem).data("form");
        var page = $(elem).data("page");
        var returnpage = $(elem).data("returnpage");
        var divload = $(elem).data("div");
        var vars = $(elem).data("vars");
        var id = $(elem).data("id");

        $('html,body').css('overflow', 'hidden');
        Pace.restart();
        $("#portapopups").show();

        if(form === ''){
            Pace.track(function () {
                Pace.start();
                $.ajax({
                    type: "POST",
                    async: true,
                    url: "ajax-get/" + page,
                    data: vars+"&returnpage="+returnpage+"&div="+divload+"&id="+id,
                    success: function (response) {
                        Pace.stop();
                        popuptamano(width, height);
                        mostrarpopup(response);
                        $("#frmPopup .focus").focus();
                    },
                    failure: function (response) {
                        //----some code here-----//
                    },
                    error: function (response) {
                        //----some code here-----//
                    }
                });
            });
        }else{
            if(vars===''){
                Pace.track(function () {
                    Pace.start();
                    $.ajax({
                        type: "POST",
                        async: true,
                        url: "ajax-get/" + page,
                        data: $("#" + form).serialize()+"&returnpage="+returnpage+"&div="+divload+"&id="+id,
                        success: function (response) {
                            Pace.stop();
                            popuptamano(width, height);
                            mostrarpopup(response);
                            $("#frmPopup .focus").focus();
                        },
                        failure: function (response) {
                            //----some code here-----//
                        },
                        error: function (response) {
                            //----some code here-----//
                        }
                    });
                });
            }else{
                Pace.track(function () {
                    Pace.start();
                    $.ajax({
                        type: "POST",
                        async: true,
                        url: "ajax-popups/" + page,
                        data: $("#" + form).serialize()+"&"+vars+"&returnpage="+returnpage+"&div="+divload+"&id="+id,
                        success: function (response) {
                            Pace.stop();
                            popuptamano(width, height);
                            mostrarpopup(response);
                            $("#frmPopup .focus").focus();
                        },
                        failure: function (response) {
                            //----some code here-----//
                        },
                        error: function (response) {
                            //----some code here-----//
                        }
                    });
                });
            }
        }
    }
</script>