<?php
include('../class/allClass.php');

use nsregistros\registros;
use nsfunciones\funciones;

$info   = new registros();
$fn     = new funciones();

$registro = $info->obtener_registros_gasolina();
$cregistro = $fn->cuentarray($registro);

?>
<div class="row">
    <div class="col-sm-12">
        <div class="panel">
            <div class="row panel-heading">
                <div class="col-sm-6">
                    Historial de registros
                </div>
                <div class="col-6 mright textright">
                    <button id="idtest" onclick="universalLoad(this)" data-postload="0" data-regresar="pr-registro-gasolina" data-valores="" data-form="" data-page="registro-gasolina-add" data-carpeta="ajax-add" data-load="contenedor" data-id="" class="btngral botonVerde mright"><span class="fas fa-plus-circle font16"></span><span class="letrablanca font14">
                        <span class="letrablanca font14">Agregar</span>
                    </button> 
                </div>
            </div>
            <div class="panel-body">
                <div class="left full fondoblanco relative paddingtop15" id="content">
                    <table class="display fullimportant" id="tabla">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Empresa </th>
                                <th> Fecha </th>
                                <th> Cantidad </th>
                                <th> Importe </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php for($i = 0,$a=0; $i < $cregistro; $i++){ $a = $a+1;?>
                            <tr onclick="universalLoad(this)" data-postload="0" data-returnpage="pr-registro-gasolina" data-form="" data-page="registro-gasolina-edit" data-carpeta="ajax-edit" data-load="contenedor" data-valores="" data-id="<?php echo $registro["id"][$i]; ?>">
                                <td><?php echo $a; ?></td>
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