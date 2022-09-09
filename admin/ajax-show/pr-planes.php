<?php
include('../class/allClass.php');

use nsalmacen\almacen;
use nsfunciones\funciones;

$info   = new almacen();
$fn     = new funciones();

$planes     = $info->obtener_planes();
$cplanes    = $fn->cuentarray($planes);

?>
<div class="row">
    <div class="col-sm-12">
        <div class="panel">
            <div class="row panel-heading">
                <div class="col-sm-6">
                    Lista de Planes
                </div>
                <div class="col-6 mright textright">
                    <button id="idtest" onclick="universalLoad(this)" data-postload="0" data-regresar="pr-planes" data-valores="" data-form="" data-page="planes-add" data-carpeta="ajax-add" data-load="contenedor" data-id="" class="btngral botonVerde mright"><span class="fas fa-plus-circle font16"></span><span class="letrablanca font14">
                        <span class="letrablanca font14">Agregar</span>
                    </button>
                </div>
            </div>
            <div class="panel-body">
                <div class="left full fondoblanco relative paddingtop15" id="content">
                    <table class="display fullimportant" id="tabla">
                        <thead>
                            <tr>
                                <th> Nombre </th>
                                <th> Precio Mensual </th>
                                <th> Precio Anual </th>
                                <th> Estatus </th>
                            
                            </tr>
                        </thead>
                        <tbody>
                        <?php for($i = 0,$a=0; $i < $cplanes; $i++){ $a = $a+1;?>
                            <tr onclick="universalLoad(this)" data-postload="0" data-returnpage="pr-planes" data-form="" data-page="planes-edit" data-carpeta="ajax-edit" data-load="contenedor" data-valores="" data-id="<?php echo $planes["id"][$i]; ?>">
                                <td><?php echo $planes['nombre'][$i]; ?></td>
                                <td><?php echo $planes['precio_mensual'][$i]; ?></td>
                                <td><?php echo $planes['precio_anual'][$i]; ?></td>
                                <td><?php echo $planes['estatus'][$i]; ?></td>
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