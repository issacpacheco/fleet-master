<?php
include('../class/allClass.php');

use nsregistros\registros;
use nsfunciones\funciones;

$info   = new registros();
$fn     = new funciones();

$registro = $info->obtener_registros_gasolina();
$cregistro = $fn->cuentarray($registro);

?>
<style>
    .backgruoun-table{
        background-color: #1a2035 !important;
    }
    .border-table{
        background-color: #fff !important;
    }
</style>
<div class="row">
    <div class="col-sm-12">
        <div class="panel">
            <div class="row panel-heading">
                <div class="col-sm-6">
                    Historial de registros
                </div>
                <div class="col-sm-12 mright textright">
                    <button id="idtest" onclick="universalLoad(this)" data-postload="0" data-regresar="pr-registro-gasolina" data-valores="" data-form="" data-page="registro-gasolina-add" data-carpeta="ajax-add" data-load="contenedor" data-id="" class="btngral botonVerde mright"><span class="fas fa-plus-circle font16"></span><span class="letrablanca font14">
                        <span class="letrablanca font14">Agregar</span>
                    </button> 
                </div>
            </div>
            <div class="panel-body">
                <div class="left full  relative paddingtop15" id="content">
                    <table class="display fullimportant table" id="tabla">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Descarga </th>
                                <th> Carga </th>
                                <th> Cantidad </th>
                                <th> Fecha de registro </th>
                            </tr>
                        </thead>
                        <tbody class="boder-table">
                        <?php for($i = 0,$a=0; $i < $cregistro; $i++){ $a = $a+1;?>
                            <tr onclick="universalLoad(this)" class="backgruoun-table" data-postload="0" data-returnpage="pr-registro-gasolina" data-form="" data-page="registro-gasolina-edit" data-carpeta="ajax-edit" data-load="contenedor" data-valores="" data-id="<?php echo $registro["id"][$i]; ?>">
                                <td class="backgruoun-table"><?php echo $a; ?></td>
                                <td><?php echo $registro['empresa'][$i]; ?></td>
                                <td><?php echo $registro['fch_carga'][$i]; ?></td>
                                <td><?php echo $registro['cantidad_litros'][$i]; ?></td>
                                <td><?php echo $registro['importe'][$i]; ?></td>
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
</script>