<?php
include("../class/allClass.php");
use nsregistros\registros;
use nsfunciones\funciones;
$fn         = new funciones();

?>
<div class="col-sm-12">
    <div class="panel">
        <div class="panel-heading">
            Agregar registro de gasolina
        </div>
        <div class="panel-body">
            <form id="frmRegistro">
                <div class="row">
                    <div class="form-wrapper col-sm-4">
                        <label for="">Vehiculo receptor</label>
                        <div class="form-group">
                            <select name="id_tracker_descarga" id="id_tracker_descarga" class="form-control" style="background-color: #1a2035;">
                                <option value="0" selected>Selecciona un vehiculo</option>
                            <?php 
                                $jsonvehiculos = $_SESSION['vehiculos'];
                                $json = json_encode($jsonvehiculos);
                                $json = json_decode($json);
                                for($i=0;$i<$_SESSION["totaldispositivos"];$i++){ 
                                     ?>
                                <option value="<?php echo $json[$i]->ID; ?>"><?php echo $json[$i]->nombre; ?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-wrapper col-sm-2">
                        <label>Cantidad</label>
                        <div class="form-group">
                            <input type="text" class="form-control esprecio" name="carga" id="carga" placeholder="Cantidad de carga" value="">
                        </div>
                    </div>
                    <div class="form-wrapper col-sm-2">
                        <label for="">Vehiculo receptor</label>
                        <div class="form-group">
                        <select name="id_tracker_carga" id="id_tracker_carga" class="form-control vehiculo_carga" style="background-color: #1a2035 !important;">
                            <option value="0" selected>Selecciona un vehiculo</option>
                        <?php 
                            $jsonvehiculos = $_SESSION['vehiculos'];
                            $json = json_encode($jsonvehiculos);
                            $json = json_decode($json);
                            for($i=0;$i<$_SESSION["totaldispositivos"];$i++){ 
                                    ?>
                            <option value="<?php echo $json[$i]->ID; ?>">Vehiculo: <?php echo $json[$i]->nombre; ?> - Placa: <?php echo $json[$i]->reg_number; ?></option>
                        <?php } ?>
                        </select>
                    </div>
                </div>
            </form>
            <div class="mright textright">
                <button type="button" class="btnRegresar right btngral" onclick="saveInfo('carga-descarga-add', 'pr-carga-descarga', this);">
                    <span class="letrablanca font14">Guardar</span>
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $(".vehiculo_carga").select2();
    });
</script>