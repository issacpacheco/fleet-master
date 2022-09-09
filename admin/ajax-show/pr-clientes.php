<?php
include('../class/allClass.php');

use nsusuarios\usuarios;
use nsfunciones\funciones;

$info   = new usuarios();
$fn     = new funciones();

$clientes = $info->obtener_clientes();
$cclientes = $fn->cuentarray($clientes);

?>
<div class="row">
    <div class="col-sm-12">
        <div class="panel">
            <div class="row panel-heading">
                <div class="col-sm-6">
                    Lista de clientes
                </div>
                <div class="col-6 mright textright">
                    <button id="idtest" onclick="universalLoad(this)" data-postload="0" data-regresar="pr-clientes" data-valores="" data-form="" data-page="clientes-add" data-carpeta="ajax-add" data-load="contenedor" data-id="" class="btngral botonVerde mright"><span class="fas fa-plus-circle font16"></span><span class="letrablanca font14">
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
                                <th> Nombre </th>
                                <th> Direccion </th>
                                <th> Telefono </th>
                                <th> Correo </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php for($i = 0,$a=0; $i < $cclientes; $i++){ $a = $a+1;?>
                            <tr onclick="universalLoad(this)" data-postload="0" data-returnpage="pr-clientes" data-form="" data-page="clientes-edit" data-carpeta="ajax-edit" data-load="contenedor" data-valores="" data-id="<?php echo $clientes["id"][$i]; ?>">
                                <td><?php echo $a; ?></td>
                                <td><?php echo $clientes['nombre'][$i]; ?></td>
                                <td><?php echo $clientes['direccion'][$i]; ?></td>
                                <td><?php echo $clientes['telefono'][$i]; ?></td>
                                <td><?php echo $clientes['correo'][$i]; ?></td>
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