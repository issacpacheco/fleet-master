<div class="row">
    <div class="col-sm-12">
        <div class="panel">
            <div class="row panel-heading">
                <div class="col-sm-6">
                    Reporte de cajas
                </div>
            </div>
            <div class="panel-body">
                <div class="left full fondoblanco relative paddingtop15" id="content">
                    <div class="row">
                        <div class="row hidden-print">
                            <div class="col-xs-12">
                                <p class="h5 text-justify">Elige el lapso de tiempo en el que quieres que se genere el reporte. Lo que veas aquí
                                    es lo mismo que aparecerá en él.<br>
                                </p>
                            </div>
                        </div>
                        <div class="row hidden-print">
                            <div class="col-xs-6 text-center">
                                <h4>Del</h4>
                                <input id="fecha_inicio" type="datetime-local" class="form-control">
                            </div>
                            <div class="col-xs-6 text-center">
                                <h4>Hasta</h4>
                                <input id="fecha_fin" type="datetime-local" class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-xs-4">
                                <h4 class="text-center" hidden="hidden"><strong>Caja chica:</strong> $<span id="caja_chica"></span></h4>
                            </div>
                            <div class="col-xs-4">
                                <h4 class="text-center" hidden="hidden"><strong>Gastos:</strong> $<span id="gastos"></span></h4>
                            </div>
                            <div class="col-xs-4">
                                <h4 hidden="hidden" class="text-center"><strong>Ventas:</strong> $<span id="ventas"></span></h4>
                            </div>
                            <div class="col-xs-6">
                                <h3 hidden="hidden" class="text-center"><strong>Total en caja:</strong> $<span id="total_caja"></span></h3>
                            </div>
                            <div class="col-xs-6">
                                <h3 hidden="hidden" class="text-center"><strong>Utilidad:</strong> $<span id="utilidad"></span></h3>
                            </div>
                        </div>
                        <div class="row hidden-print">
                            <div class="col-xs-12">

                                <button class="btn btn-info form-control" id="generar_reporte">Generar reporte <i class="fa fa-file-pdf-o"></i>
                                </button>
                            </div>
                        </div>
                        <div class="row"><br>
                            <div class="col-xs-12">
                                <div id="contenedor_tabla" class="table-responsive">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>
<script src="js/reporte-caja.js"></script>