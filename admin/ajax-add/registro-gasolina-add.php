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
            Agregar registro de gasolina
        </div>
        <div class="panel-body">
            <form id="frmRegistro">
                <div class="row">
                    <div class="form-wrapper col-sm-4">
                        <label>Empresa</label>
                        <div class="form-group">
                            <input type="text" class="form-control validar" name="empresa" id="empresa" placeholder="Nombre de la empresa despachadora" value="">
                        </div>
                    </div>
                    <div class="form-wrapper col-sm-2">
                        <label>Fecha de carga</label>
                        <div class="form-group">
                            <input type="date" class="form-control" name="fch_carga" id="fch_carga" placeholder="Fecha de carga" value="">
                        </div>
                    </div>
                    <div class="form-wrapper col-sm-2">
                        <label>Hora de carga</label>
                        <div class="form-group">
                            <input type="time" class="form-control" name="hra_carga" id="hra_carga" placeholder="Hora de carga" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-wrapper col-sm-4">
                        <label>Cantidad en litros</label>
                        <div class="form-group">
                            <input type="text" class="form-control esprecio" name="cantidad_litros" id="cantidad_litros" placeholder="Cantidad en litro" value="">
                        </div>
                    </div>
                    <div class="form-wrapper col-sm-4">
                        <label for="">Importe</label>
                        <div class="form-group">
                            <input type="text" name="importe" id="importe" class="form-control esprecio" value="" placeholder="Importe pagado">
                        </div>
                    </div>
                    <div class="form-wrapper col-sm-4">
                        <label for="">Usuario de carga (Quien hizo la carga)</label>
                        <div class="form-group">
                            <input type="text" name="usuario" id="usuario" class="form-control" value="" placeholder="Usuario quien hizo el cargo de gasolina">
                        </div>
                    </div>
                </div>
            </form>
            <div class="mright textright">
                <button type="button" class="btnRegresar right btngral" onclick="saveInfo('registro-gasolina-add', 'pr-registro-gasolina', this);">
                    <span class="letrablanca font14">Guardar</span>
                </button>
            </div>
        </div>
    </div>
</div>