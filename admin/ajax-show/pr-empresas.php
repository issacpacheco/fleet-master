<?php
include('../class/allClass.php');

use nsalmacen\almacen;
use nsfunciones\funciones;

$info   = new almacen();
$fn     = new funciones();

$empresas     = $info->obtener_empresas();
$cempresas    = $fn->cuentarray($empresas);



?>
<div class="row">
    <div class="col-sm-12">
        <div class="panel">
            <div class="row panel-heading">
                <div class="col-sm-6">
                    Lista de Materiales/Equipos/etc...
                </div>
                <div class="col-6 mright textright">
                    <button id="idtest" onclick="universalLoad(this)" data-postload="0" data-regresar="pr-empresas" data-valores="" data-form="" data-page="empresas-add" data-carpeta="ajax-add" data-load="contenedor" data-id="" class="btngral botonVerde mright"><span class="fas fa-plus-circle font16"></span><span class="letrablanca font14">
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
                                <th> Correo </th>
                                <th> Telefono </th>
                                <th> Plan </th>
                                <th> Status </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php for($i = 0,$a=0; $i < $cempresas; $i++){ $a = $a+1;
                            $id_plan = $empresas['plan'][$i] !== "" ? $empresas['plan'][$i] : 0;
                            $plan    = $info->obtener_plan($id_plan);
                        ;?>
                            <tr onclick="universalLoad(this)" data-postload="0" data-returnpage="pr-empresas" data-form="" data-page="empresas-edit" data-carpeta="ajax-edit" data-load="contenedor" data-valores="" data-id="<?php echo $empresas["id"][$i]; ?>">
                                <td><?php echo $empresas['nombre'][$i]; ?></td>
                                <td><?php echo $empresas['correo'][$i]; ?></td>
                                <td><?php echo $empresas['telefono'][$i]; ?></td>
                                <td><?php echo isset($plan) ? $plan['nombre'][0] : "Sin plan" ?></td>
                                <td><?php echo $empresas['estatus'][$i]; ?></td>
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