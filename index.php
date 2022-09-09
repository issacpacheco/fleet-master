<?php
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'off'){
	header("Location: https://siaa.seticmid.com");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>SIAA | SETIC </title>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="apple-touch-icon" sizes="57x57" href="admin/images/icon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="admin/images/icon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="admin/images/icon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="admin/images/icon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="admin/images/icon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="admin/images/icon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="admin/images/icon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="admin/images/icon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="admin/images/icon/apple-icon-180x180.png">
	<link rel="icon" type="imageimages/icon/png" sizes="192x192"  href="admin/images/icon/android-icon-192x192.png">
	<link rel="icon" type="imageimages/icon/png" sizes="32x32" href="admin/images/icon/favicon-32x32.png">
	<link rel="icon" type="imageimages/icon/png" sizes="96x96" href="admin/images/icon/favicon-96x96.png">
	<link rel="icon" type="imageimages/icon/png" sizes="16x16" href="admin/images/icon/favicon-16x16.png">
	<link rel="manifest" href="admin/images/icon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="images/icon/ms-icon-144x144.png">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300" rel="stylesheet" type="text/css"/>

	<!-- Styling -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<!-- <link rel="stylesheet" href="admin/addons/bootstrap/css/bootstrap.css"/> -->
	<link rel="stylesheet" href="admin/addons/toastr/toastr.min.css"/>
	<link rel="stylesheet" href="admin/addons/fontawesome/css/font-awesome.css"/>
	<link rel="stylesheet" href="admin/addons/ionicons/css/ionicons.css"/>
	<link rel="stylesheet" href="admin/addons/noUiSlider/nouislider.min.css"/>

	<link rel="stylesheet" href="admin/styles/style.css"/>
	<link rel="stylesheet" href="admin/styles/theme-dark.css" class="theme"/>
	<!-- End of Styling -->

	<!--Swwetalert-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.0/dist/sweetalert2.min.css">
	<style>
		.modal-backdrop {
			--bs-backdrop-zindex: 1050;
			--bs-backdrop-bg: #000;
			--bs-backdrop-opacity: 0.5;
			position: fixed;
			top: 0;
			left: 0;
			z-index: var(--bs-backdrop-zindex);
			width: 100vw;
			height: 0vh !important;
			background-color: var(--bs-backdrop-bg);
		}
	</style>
</head>

<body>
	<!-- Main content-->
	<div class="content" id="login-page">
		<div class="container-fluid">
			<div class="panel" id="login-panel">
				<div class="panel-heading">
					<i class="fa fa-unlock-alt vcentered"></i>
					<div class="vcentered">
						<h3> Bienvenido </h3>
						<h5> Por favor, identifícate:</h5>
					</div>
				</div>
				<div class="panel-body">
					<form class="row" id="LoginForm">
						<div class="form-wrapper col-sm-6">
							<label for="Login">Correo</label>
							<div class="form-group">
								<input type="text" class="form-control" name="login" placeholder="Correo">
							</div>
						</div>

						<div class="form-wrapper col-sm-6">
							<label for="Password">Contraseña</label>
							<div class="form-group">
								<input type="password" class="form-control" name="password" placeholder="Contraseña">
							</div>
						</div>

						<button type="button" class="btn btn-lg btn-info btn-block" style="margin-top: 30px" id="boton_enviar_login" onClick="fnvalidar()"><i class="fa fa-sign-in"></i> Entrar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- End of Main content-->

	<div class="scripts">

		<!-- Addons -->
		<script src="admin/addons/jquery/jquery.min.js"></script>
		<script src="admin/addons/jquery-ui/jquery-ui.min.js"></script>
		<!-- <script src="admin/addons/bootstrap/js/bootstrap.min.js"></script> -->
		<script src="admin/addons/toastr/toastr.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

		<!-- scripts -->
		<script src="admin/addons/scripts.js"></script>
		<!-- SwwetAlert -->
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
		<!-- FUNCIONES -->
        <script type="text/javascript" src="admin/js/funciones.js"></script> 
	</div>
</body>

</html>