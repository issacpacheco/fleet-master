<style>	
	.left-nav-label {
		margin-top: 2px;
	}
    .essubmenu{
        width: 300px;
        /* color: rgba(255,255,255,1); */
        font-weight: 600;
        font-size: 13.5px;
        line-height: 25px;
        padding: 11px 15px 12px 15px;
        margin: 6px 0 0 60px;
    }
    .white{
        color: #fff;
    }
</style>
<div class="sidebar" data-color="green" data-background-color="black" data-image="./images/backgrounds/background_dark.jpg">
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            Fleet Master MX
        </a>
    </div>
    <div class="sidebar-wrapper navigation">
        <ul class="nav primary">
            <li data-color="green">
                <a class="nav-link" href="./" data-color="green">
                    <i class="fal fa-home material-icons"></i>
                    <p>Panel administrativo</p>
                </a>
            </li>
            <li>
                <a href="#submenuGasolina" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fal fa-table"></i>
                    <span>Datos a guardar</span>
                </a>
                <ul class="collapse essubmenu" id="submenuGasolina">
                    <?php 
                        $usuario = explode("@",$_SESSION['usuario']);
                        if($usuario[0] == "ventas"){ 
                    ?>
                    <li>
                        <a onclick="getPageMenu('pr-usuarios')" style="margin-left: -10px;">
                            <i class="fal fa-users white"></i>
                            <span class="white">Usuarios</span>
                        </a>
                    </li>
                    <?php } ?>
                    <li>
                        <a onclick="getPageMenu('pr-registro-gasolina')" style="margin-left: -10px;">
                            <i class="fal fa-digital-tachograph white"></i>
                            <span class="">Registro gasolina</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="" data-toggle="collapse" aria-expanded="false" class="nav-link" onclick="getPageVehiculos()">
                    <i class="fal fa-cars"></i>
                    <span>Graficas de vehiculos</span>
                </a>
            </li>
            <li>
                <a href="" data-toggle="collapse" aria-expanded="false" class="nav-link" onclick="getPageVehiculosLis()">
                    <i class="fal fa-list"></i>
                    <span>Lista de vehiculos</span>
                </a>
            </li>
            <li>
                <a href="https://tracking.fleetmaster.mx/#/pro-ui/reports/reports" target="_blank" class="nav-link">
                    <i class="fal fa-file-chart-line"></i>
                    <span>Generar reportes   </span>
                </a>
            </li>
        </ul>
    </div>
    <div class="time text-center">
        <h5 class="current-time2 white">&nbsp;</h5>
        <h5 class="current-time white">&nbsp;</h5>
    </div>
</div>