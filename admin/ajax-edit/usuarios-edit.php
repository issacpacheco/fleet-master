<?php
include('../class/allClass.php');

$regresar   = filter_input(INPUT_POST, 'regresar',      FILTER_SANITIZE_SPECIAL_CHARS);
$postload   = filter_input(INPUT_POST, 'returnpage',    FILTER_SANITIZE_SPECIAL_CHARS);
$div        = filter_input(INPUT_POST, 'load',          FILTER_SANITIZE_SPECIAL_CHARS);
$id         = filter_input(INPUT_POST, 'id',            FILTER_SANITIZE_NUMBER_INT);

use nsusuarios\usuarios;
use nsfunciones\funciones;

$info   = new usuarios();
$fn     = new funciones();



$usuario    = $info     -> obtener_usuario($id);

?>

<div class="col-sm-12">
    <div class="panel">
        <div class="panel-heading">
            Editar usuario
        </div>
        <div class="panel-body">
            <form id="frmRegistro">
                <input type="hidden" name="id_cliente" id="id_cliente" value="<?php echo $id; ?>">
                <div class="row">
                    <div class="form-wrapper col-sm-4">
                        <label>Nombre</label>
                        <div class="form-group">
                            <input type="text" class="form-control validar" name="nombre" id="nombre" placeholder="Nombre(s)" value="<?php echo $usuario['nombre'][0] ?>">
                        </div>
                    </div>
                    <div class="form-wrapper col-sm-4">
                        <label>Apellido Paterno</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="apellido_paterno" id="apellido_paterno" placeholder="Apellido Paterno" value="<?php echo $usuario['paterno'][0] ?>">
                        </div>
                    </div>
                    <div class="form-wrapper col-sm-4">
                        <label>Apellido Materno</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="apellido_materno" id="apellido_materno" placeholder="Apellido Materno" value="<?php echo $usuario['materno'][0] ?>">
                        </div>
                    </div>
                    <div class="form-wrapper col-sm-4">
                        <label>Telefono</label>
                        <div class="form-group">
                            <input type="text" class="form-control esnumero" name="telefono" id="telefono" placeholder="Telefono" value="<?php echo $usuario['telefono'][0] ?>">
                        </div>
                    </div>
                    <div class="form-wrapper col-sm-4">
                        <label for="">Correo</label>
                        <div class="form-group">
                            <input type="mail" name="correo" id="correo" class="form-control" value="<?php echo $usuario['correo'][0] ?>" placeholder="Correo electronico">
                        </div>
                    </div>
                    <div class="form-wrapper col-sm-4">
                        <label for="">Usuario</label>
                        <div class="form-group">
                            <input type="text" name="usuario" id="usuario" class="form-control" value="<?php echo $usuario['usuario'][0] ?>" placeholder="Usuario del cliente">
                        </div>
                    </div>
                    <div class="form-wrapper col-sm-4">
                        <label for="">Contraseña</label>
                        <div class="form-group">
                            <input type="text" name="password" id="password" class="form-control" value="<?php echo ($usuario['password'][0]) ?>" placeholder="Contraseña del usuario">
                        </div>
                    </div>
                </div>
                <div class="mright textright">
                    <button type="button" class="btnRegresar right btngral" onclick="saveInfo('cliente-edit', 'pr-usuarios', this);">
                        <span class="letrablanca font14">Guardar</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--cropper-->
<script src="plugins/cropper-master/dist/cropper.min.js"></script>
<script src="js/crop_avatar.js"></script>
<script>
    $(document).ready(function () {
        $('#mostrar_contrasena').click(function () {
            if ($('#mostrar_contrasena').is(':checked')) {
                $('#contrasena_personal').attr('type', 'text');
            } else {
                $('#contrasena_personal').attr('type', 'password');
            }
        });
    });
</script>