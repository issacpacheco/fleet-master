<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div id="navbar" class="navbar-collapse">
            <ul class="breadcrumb">
                <div class="btn-group dropright">
                    <!-- <button type="button" class="btn dropdown-toggle colorboton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <p><i class="fas fa-cog"></i> Cambio de color</p>
                    </button>
                    <div class="dropdown-menu colorboton">
                        <ul>
                            <li><a href="index.php?color=theme-dark.css">Oscuro</a></li>
                            <li><a href="index.php?color=theme-green.css">Verde</a></li>
                            <li><a href="index.php?color=theme-red.css">Rojo</a></li>
                            <li><a href="index.php?color=theme-purple.css">Purpura</a></li>
                            <li><a href="index.php?color=theme-blue.css">Azul</a></li>
                            <li><a href="index.php?color=theme-orange.css">Naranja</a></li>
                            <li><a href="index.php?color=theme-white-dark.css">Oscuro y blanco</a></li>
                        </ul>
                    </div> -->
                </div>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="white">
                    <a href="#">
                        <i class="fas fa-warehouse headernav"></i>  
                    </a>
                </li>
                <li>
                    <a href="../logout">
                        Salir <i class="fa fa-sign-out headernav"></i> 
                    </a>
                </li>
                <li class="profile">
                    <a onclick="universalLoad(this)" data-postload="0" data-returnpage="pr-inicio" data-form="" data-page="perfil" data-carpeta="ajax-edit" data-load="contenedor" data-valores="" data-id="<?php echo $_SESSION['id_admin']; ?>">
                        <?php
                           
                            $img = 'images/avatar.png';
                            
                        ?>
                        <img alt="" src="<?php echo $img; ?>" class="img-circle">
                        <div class="vcentered">
                            <p class="profile-name"></p>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>