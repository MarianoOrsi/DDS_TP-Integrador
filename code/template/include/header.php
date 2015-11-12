<?php 
if(isset($_GET["logout"]) && $_GET["logout"]==1){
		unset($_SESSION["idUsuario"]); 
		session_destroy();
		
		}
?>
<header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                   <a class="navbar-brand" href="../index.php"><span>Que</span> comemos?</a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li class="active" ><a href="../index.php">Inicio</a></li>
						
						<?php if(isset($_SESSION["idUsuario"])){ // SI no esta seteado, muestra lo primero
								echo '<li><a href="../interfaz/mostrarRecetas.php">Mis Recetas</a></li>';
                                echo '<li><a href="../interfaz/gestionGrupos.php">Mis Grupos</a></li>';
                                echo '<li><a href="../interfaz/EstadisticasInterfaz.php">Estadisticas y Reportes</a></li>';
                                echo '<li><a href="../negocio/perfil.php">Perfil</a></li>';
								echo '<li class="active"><a href="../index.php?logout=1">Salir</a></li>';
								}
								else {
								echo '<li><a href="../interfaz/iniciarSesion.html">Ingresar</a></li>';
                                echo '<li><a href="../interfaz/registrarme.html">Registrarse</a></li>';
										
								}
								?>
								
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
	</header>