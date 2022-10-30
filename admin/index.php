<?php
include("includes/config.php");
include("ajax-get/obtener-lista.php");
?>
<!doctype html>
<html lang="en">

<head>
  <title>Panel de administración | SIAA</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300" rel="stylesheet" type="text/css"/> -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.0/css/all.css">
  <!-- Material Kit CSS -->
  <link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.4/sl-1.2.5/datatables.min.css"/>
	<!-- DataTables CSS -->
	<link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css" rel="stylesheet">
	<!-- Select2 -->
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css"/>
</head>

<body class="dark-edition">
  <div class="wrapper">
    <?php include("includes/menu.php");?>
    <div class="main-panel">
      <!-- Navbar -->
      <?php include("includes/header.php") ?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid" id="contenedor">
          <?php include("ajax-show/panel.php"); ?>
        </div>
        
      </div>
      <?php include("includes/footer.php"); ?>
      <div class="alertas cajaAlertaRoja" role="alert">
        <span class="fas fa-plus iconoalertas" title="Cerrar alerta" style="color: white; transform: rotate(45deg);" onclick="escondeAlertas();"></span>
        <span class="fas fa-exclamation-triangle" style="color: white;position: absolute;left: 13px;bottom: 30px;font-size: 20px;"></span>
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
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="./assets/js/core/jquery.min.js"></script>
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="https://unpkg.com/default-passive-events"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="./assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="./assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/material-dashboard.js?v=2.1.0"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="./assets/demo/demo.js"></script>
  <!-- <script type="text/javascript" src="js/jquery.js"></script> -->
        <!-- Addons -->
  <!-- <script src="addons/jquery/jquery.min.js"></script> -->
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
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
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
									alertaRoja("El vehiculo <?php echo $json[$i]->nombre; ?> Reporte de desagüe aprox. " + restante.toFixed(2) + " Litros");
                  $.ajax({
                    type: "POST",
                    url: "ajax-save/registro-desague.php",
                    data: {id_tracker: <?php echo $json[$i]->ID ?>, cantidad: restante.toFixed(2)},
                    success: function(response){
                      // alertaVerde("Se registra desagüe del vehiculo: <?php echo $json[$i]->nombre; ?>");
                    }
                  });
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