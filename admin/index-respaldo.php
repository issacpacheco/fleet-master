<?php
include("includes/config.php");
include("ajax-get/obtener-lista.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<title>Panel de administración | SIAA</title>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, height=device-height">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="images/icon/ms-icon-144x144.png">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300" rel="stylesheet" type="text/css"/>
    
    <!-- Styling -->
    <link rel="stylesheet" href="addons/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.0/css/all.css">
    <link rel="stylesheet" href="styles/style.css"/>
	<link rel="stylesheet" href="styles/theme-blue.css" class="theme" />
    <!-- End of Styling -->
	<link rel="stylesheet" href="scripts/dropzone-5.7.0/dist/dropzone.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.4/sl-1.2.5/datatables.min.css"/>
	<!-- DataTables CSS -->
	<link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css" rel="stylesheet">
	<!-- Select2 -->
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<!--vewntas --->
	<link href="styles/animate.css" rel="stylesheet">
    <link href="styles/np.css" rel="stylesheet">
    <link href="styles/pnotify.css" rel="stylesheet">
    <link href="styles/cb.css" rel="stylesheet">

	<!-- JS file -->
	

	<!-- CSS file -->
	<link rel="stylesheet" href="plugins/EasyAutocomplete-1.3.5/easy-autocomplete.min.css">
	
	<!----Charts---->
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/highcharts-more.js"></script>
	<script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="https://code.highcharts.com/modules/export-data.js"></script>
	<script src="https://code.highcharts.com/modules/accessibility.js"></script>
	<!----DatePicker JQuery---->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<!-- Daterange Picker -->
	<link rel="stylesheet" href="plugins/bootstrap-daterangepicker/daterangepicker.css">
	<!--ihover-->
	<link rel="stylesheet" href="plugins/ihover/ihover.css">
	<!-- Cropper-->
	<link href="plugins/cropper-master/dist/cropper.min.css" rel="stylesheet">
	<link href="css/crop_avatar.css?v=<?php echo rand();?>" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="plugins/bootstrap-fileupload/bootstrap-fileupload.css" />
	<!-- blueimp Gallery styles -->
	<link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
    <link href="plugins/jQuery-File-Upload-9.12.1/css/jquery.fileupload.css" rel="stylesheet" >
	<link href="plugins/jQuery-File-Upload-9.12.1/css/jquery.fileupload-ui.css" rel="stylesheet" >

	<link href="assets/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <!-- <link href="assets/css/lib/chartist/chartist.min.css" rel="stylesheet"> -->
    <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="assets/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="assets/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="assets/css/lib/weather-icons.css" rel="stylesheet" />
    <!-- <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet"> -->
    <link href="assets/css/lib/helper.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="styles/abc.css">

	<!-- ventas --->
	<script src="lib/pnotify.js"></script>
	<script src="lib/np.js"></script>
	<script src="lib/jquery.js"></script>
	<script src="js/main.js"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css"/>
	<!-- CSS adjustments for browsers with JavaScript disabled -->
    <noscript><link href="plugins/jQuery-File-Upload-9.12.1/css/jquery.fileupload-noscript.css" rel="stylesheet" ></noscript>
    <noscript><link href="plugins/jQuery-File-Upload-9.12.1/css/jquery.fileupload-ui-noscript.css" rel="stylesheet" ></noscript>
</head>

<body class="hold-transition"  onload="nobackbutton();">

	<!-- Header -->
	<?php include("includes/header.php");?>
	<!-- End of Header -->

	<!-- Navigation -->
	<?php include("includes/menu.php");?>
	<!-- End of Navigation -->

	<!-- Scroll up button -->
	<a class="scroll-up"><i class="fas fa-chevron-up"></i></a>
	<!-- End of scroll up button -->

	<!-- Main content-->
	<div class="content">
		<div class="container-fluid" id="contenedor">
            
        </div>
		
		<!-- Footer -->
		<?php include("includes/footer.php");?>
		<!-- End of Footer -->
	</div>
	<!-- End of Main content-->
	<div class="alertas cajaAlertaRoja">
		<span class="fas fa-exclamation-triangle iconoalertas" style="color: white;"></span>
		<p style="color: white;">
			Este es un mensaje de alerta para notificar a los usuarios que necesiten algo.
		</p>
	</div>
	<div class="alertas cajaAlertaVerde">
		<span class="fas fa-exclamation-triangle iconoalertas"></span>
		<p>
			Se ha guardado con exito
		</p>
	</div> 
	<div id="modal_acerca_de" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Acerca de</h4>
				</div>
				<div class="modal-body">
					<div class="well">
						<h1>OkVenta
							<small>v1.0</small>
						</h1>
						<br>
						<h2>Desarrollado y mantenido por <a target="_blank" href="https://parzibyte.me/blog">Parzibyte</a></h2>
					</div>
				</div>
				<div class="modal-footer">
					<div class="col-xs-12">
						<button data-dismiss="modal" class="form-control btn btn-success">Cerrar</button>
					</div>

				</div>
			</div>
		</div>
	</div>

	<div id="portapopups" class="oscuro oculto">
		<div id="popup" style="z-index:1000;"></div>
	</div>

	<div class="scripts">
		<!-- JQUERY -->
		<script type="text/javascript" src="js/jquery.js"></script>
        <!-- Addons -->
        <script src="addons/jquery/jquery.min.js"></script>
        <script src="addons/jquery-ui/jquery-ui.min.js"></script>
        <script src="addons/bootstrap/js/bootstrap.min.js"></script>
		<script src="addons/fullcalendar/lib/moment.min.js"></script>
        <script src="addons/pacejs/pace.min.js"></script>
        <!-- scripts -->
        <script src="addons/scripts.js"></script>
		<!-- MULTISELECTS -->
		<script src="scripts/multiselect/jquery.multiselect.js"></script> 
		<!-- Funciones -->
		<script src="js/generales.js"></script>
		<script src="js/loads.js"></script>
		<script src="js/funciones.js"></script>
		<!-- <script src="js/ventas.js"></script> -->
		<!--Select2-->
		<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
		<!-- InputMask -->
		<script src="plugins/input-mask/jquery.inputmask.js"></script>
		<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
		<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
		<!-- DataTables JS -->
		<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>    
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.4/sl-1.2.5/datatables.min.js"></script>
		<!-- The template to display files available for upload -->
		<script src="plugins/jQuery-File-Upload-9.12.1/js/vendor/jquery.ui.widget.js"></script>
		<script src="//blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
		<script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
		<script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
		<script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
		<script src="plugins/jQuery-File-Upload-9.12.1/js/jquery.iframe-transport.js"></script>
		<script src="plugins/jQuery-File-Upload-9.12.1/js/jquery.fileupload.js"></script>
		<script src="plugins/jQuery-File-Upload-9.12.1/js/jquery.fileupload-process.js"></script>
		<script src="plugins/jQuery-File-Upload-9.12.1/js/jquery.fileupload-image.js"></script>
		<script src="plugins/jQuery-File-Upload-9.12.1/js/jquery.fileupload-audio.js"></script>
		<script src="plugins/jQuery-File-Upload-9.12.1/js/jquery.fileupload-video.js"></script>
		<script src="plugins/jQuery-File-Upload-9.12.1/js/jquery.fileupload-validate.js"></script>
		<!-- CALENDARIO -->
		<link href='scripts/calendario/lib/main.css' rel='stylesheet' />
		<script src='scripts/calendario/lib/main.js'></script>
		<script src='scripts/calendario/lib/locales/es.js'></script>

		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
		
		<!-- GRAFICAS -->
		<script src="scripts/dropzone-5.7.0/dist/dropzone.js"></script>
		<script src="assets/js/lib/calendar-2/moment.latest.min.js"></script>
		<script src="assets/js/lib/calendar-2/pignose.calendar.min.js"></script>
		<script src="assets/js/lib/calendar-2/pignose.init.js"></script>


		<script src="assets/js/lib/weather/jquery.simpleWeather.min.js"></script>
		<script src="assets/js/lib/weather/weather-init.js"></script>
		<script src="assets/js/lib/circle-progress/circle-progress.min.js"></script>
		<script src="assets/js/lib/circle-progress/circle-progress-init.js"></script>
		<script src="assets/js/lib/owl-carousel/owl.carousel.min.js"></script>
		<script src="assets/js/lib/owl-carousel/owl.carousel-init.js"></script>

		<!-- scripit init-->
		<script src="assets/js/dashboard1.js"></script>

		<script src="plugins/EasyAutocomplete-1.3.5/jquery.easy-autocomplete.min.js"></script>

		<!-- Current page scripts -->
        <div class="current-scripts">

        </div>

    </div>
	<!-- <script type="text/javascript">
		function e(q) {
			document.body.appendChild( document.createTextNode(q) );
			document.body.appendChild( document.createElement("BR") );
		}
		function inactividad() {
			// e("Inactivo!!");
			window.location.href = "../logout.php";
		}
		var t=null;
		function contadorInactividad() {
			t=setTimeout("inactividad()",600000);
		}
		window.onblur=window.onmousemove=function() {
			if(t) clearTimeout(t);
			contadorInactividad();
		}
	</script> -->
	<?php 
		$jsonvehiculos = $_SESSION['vehiculos'];
		$json = json_encode($jsonvehiculos);
		$json = json_decode($json);
		for($i=0;$i<$_SESSION["totaldispositivos"];$i++){ 
			for($a = 0; $a < count($json[$i]->lista_sensores); $a++){
				if($json[$i]->lista_sensores[$a]->nombre_sensor == "DIESEL" || $json[$i]->lista_sensores[$a]->nombre_sensor == "COMBUSTIBLE" || $json[$i]->lista_sensores[$a]->nombre_sensor == "combustible"){
	?>
	<div>
		<input type="hidden" id="variable_combustible_<?php echo $json[$i]->ID ?>" value="1">
	</div>
	<script>
		setInterval(function () {
			$.ajax({
				type: "GET",
				url: "https://api.navixy.com/v2/tracker/get_fuel",
				// dataType: "json",
				data: {hash: '<?php echo $_SESSION['hash'] ?>', tracker_id: <?php echo $json[$i]->ID ?>},
				success: function (response) {
					var ultimo_valor = document.getElementById("variable_combustible_<?php echo $json[$i]->ID ?>").value;
					for(var a = 0; a < response.inputs.length; a++){
						if(response.inputs[a].label == 'DIESEL' || response.inputs[a].label == 'COMBUSTIBLE' || response.inputs[a].label == 'combustible'){
							if(response.inputs[a].value < ultimo_valor || response.inputs[a].value > ultimo_valor){
								inc = Number(response.inputs[a].value);
								// console.log(Number(ultimo_valor - inc));
								restante = Number(ultimo_valor - inc);
								if(restante >= 5){
									alertaRoja("El vehiculo <?php echo $json[$i]->nombre; ?> Reporte de desagüe aprox. " + restante + " Litros");
								}
								valoraria = document.querySelector("#progress_bar_<?php echo $json[$i]->ID; ?>");

								$("#progress_bar_<?php echo $json[$i]->ID; ?>").attr("aria-valuenow", inc);
								$("#progress_bar_<?php echo $json[$i]->ID; ?>").attr("aria-valuemin", response.inputs[a].min_value);
								$("#progress_bar_<?php echo $json[$i]->ID; ?>").attr("aria-valuemax", response.inputs[a].max_value);

								var valor = inc;
								var porcentaje = Number(100);
								var max = Number(response.inputs[a].max_value);

								var porcentaje_final = Number((valor*porcentaje)/max);

								

								// console.log(porcentaje);
								//Barras de porcentaje de tanque
								if(porcentaje_final < 26){
									$("#progress_bar_<?php echo $json[$i]->ID; ?>").css({"background-color" : "red"})
								}else if(porcentaje_final < 51){
									$("#progress_bar_<?php echo $json[$i]->ID; ?>").css({"background-color" : "orange"})
								}else if(porcentaje_final < 76){
									$("#progress_bar_<?php echo $json[$i]->ID; ?>").css({"background-color" : "cornflowerblue"})
								}else if(porcentaje_final > 75){
									$("#progress_bar_<?php echo $json[$i]->ID; ?>").css({"background-color" : "green"})
								}

								$("#progress_bar_<?php echo $json[$i]->ID; ?>").css({"width" : porcentaje_final.toFixed(2)+'%'})
								$("#progress_bar_<?php echo $json[$i]->ID; ?>").text(porcentaje_final.toFixed(2)+"%");
								$("#nivel_gasolina_<?php echo $json[$i]->ID ?>").text(inc+" Lts");
								$("#variable_combustible_<?php echo $json[$i]->ID ?>").val(inc);
							}
						}
					}
					//Calculo de tiempo transcurrido desde la ultima actualizacion
					var startTime = new Date(response.update_time); 
					var endTime = new Date();
					var difference = endTime.getTime() - startTime.getTime();
					var resultInMinutes = Math.round(difference / 60000);
					$("#ultima_actualizacion_<?php echo $json[$i]->ID ?>").text("Ultima actualización hace: "+resultInMinutes+" minutos");

				}
			});
		},5000);
	</script>
	<?php }}}?>
</body>

</html>