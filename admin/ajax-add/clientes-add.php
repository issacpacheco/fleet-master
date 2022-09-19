<?php
include("../class/allClass.php");
use nsusuarios\usuarios;
use nsfunciones\funciones;

$usuarios   = new usuarios();
$fn         = new funciones();
?>

<div class="col-sm-12">
    <div class="panel">
        <div class="panel-heading">
            Agregar Cliente
        </div>
        <div class="panel-body">
            <form id="frmRegistro">
                <div class="row">
                    <div class="form-wrapper col-sm-4">
                        <label>Nombre</label>
                        <div class="form-group">
                            <input type="text" class="form-control validar" name="nombre" id="nombre" placeholder="Nombre(s)" value="">
                        </div>
                    </div>
                    <div class="form-wrapper col-sm-4">
                        <label>Apellido Paterno</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="apellido_paterno" id="apellido_paterno" placeholder="Apellido Paterno" value="">
                        </div>
                    </div>
                    <div class="form-wrapper col-sm-4">
                        <label>Apellido Materno</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="apellido_materno" id="apellido_materno" placeholder="Apellido Materno" value="">
                        </div>
                    </div>
                    <div class="form-wrapper col-sm-4">
                        <label>Telefono</label>
                        <div class="form-group">
                            <input type="text" class="form-control esnumero" name="telefono" id="telefono" placeholder="Telefono" value="">
                        </div>
                    </div>
                    <div class="form-wrapper col-sm-4">
                        <label for="">Correo</label>
                        <div class="form-group">
                            <input type="mail" name="correo" id="correo" class="form-control" value="" placeholder="Correo electronico">
                        </div>
                    </div>
                    <div class="form-wrapper col-sm-4">
                        <label for="">Usuario</label>
                        <div class="form-group">
                            <input type="text" name="usuario" id="usuario" class="form-control" value="" placeholder="Usuario del cliente">
                        </div>
                    </div>
                    <div class="form-wrapper col-sm-4">
                        <label for="">Contraseña</label>
                        <div class="form-group">
                            <input type="text" name="password" id="password" class="form-control" value="" placeholder="Contraseña del usuario">
                        </div>
                    </div>
                </div>
            </form>
            <div class="mright textright">
                <button type="button" class="btnRegresar right btngral" onclick="saveInfo('cliente-add', 'pr-usuarios', this);">
                    <span class="letrablanca font14">Guardar</span>
                </button>
            </div>
        </div>
    </div>
</div>