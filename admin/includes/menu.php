<style>	
	.left-nav-label {
		margin-top: 2px;
	}
    .essubmenu{
        width: 225px;
        color: rgba(255,255,255,1);
        font-weight: 600;
        font-size: 13.5px;
        line-height: 25px;
        padding: 11px 15px 12px 15px;
        margin: 6px 0 0 10px;
    }
    .white{
        color: #fff;
    }
	</style>
    
	<div class="navigation">
        <a class="navbar-brand">
            <i class="fal fa-bars text-primary left-nav-toggle pull-right vcentered"></i>
        </a>
        
        <ul class="nav primary">
            <li class="">
                <a href="./">
                    <i class="fal fa-home"></i>
                    <span>Panel administrativo</span>
                </a>
            </li>
            
            <li>
                <a href="#submenuAccessos" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fal fa-cars"></i>
                    <span>Vehiculos</span>
                </a>
                
                <ul class="collapse nav primary essubmenu" id="submenuAccessos">
                <?php 
                    $jsonvehiculos = $_SESSION['vehiculos'];
                    $json = json_encode($jsonvehiculos);
                    $json = json_decode($json);
                    for($i=0;$i<$_SESSION["totaldispositivos"];$i++){ 
                ?>
                    <li>
                        <a onclick="getPageMenu('pr-usuarios')">
                            <i class="fal fa-car white"></i>
                            <span class="white"><?php echo $json[$i]->nombre; ?></span>
                        </a>
                    </li>
                <?php } ?>
                </ul>
                
            </li>
        </ul>
        
        <div class="time text-center">
            <h5 class="current-time2 white">&nbsp;</h5>
            <h5 class="current-time white">&nbsp;</h5>
        </div>
    </div>