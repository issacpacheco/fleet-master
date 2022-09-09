<div class="row">
    <div class="col-sm-12">
        <div class="panel">
            <div class="row panel-heading">
                <div class="col-sm-6">
                    Gastos
                </div>
            </div>
            <div class="panel-body">
                <div class="left full fondoblanco relative paddingtop15" id="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div id="contenedor_form">
                                <div class="form-group">
                                    <label for="importe">Importe</label>
                                    <input data-requerido="true" type="number" id="importe" class="form-control" placeholder="Importe">
                                </div>
                                <div class="form-group">
                                    <label for="concepto">Concepto</label>
                                    <input data-requerido="true" type="text" id="concepto" class="form-control" placeholder="Concepto">
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <input data-requerido="true" type="text" id="descripcion" class="form-control"
                                        placeholder="Descripción">
                                </div>
                                <div class="form-group">
                                    <label for="no_remision">Número de remisión</label>
                                    <input data-requerido="false" type="text" id="no_remision" class="form-control"
                                        placeholder="Número de remisión">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <button id="guardar_gasto" class="btn btn-success form-control">
                                Guardar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>
<script src="js/gastos.js"></script>