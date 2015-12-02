<?php session_start();?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>TP Integrador - Grupo 81</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<!-- css -->
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/fancybox/jquery.fancybox.css" rel="stylesheet">
<link href="css/jcarousel.css" rel="stylesheet" />
<link href="css/flexslider.css" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" />
<!-- Theme skin -->
<link href="skins/default.css" rel="stylesheet" />

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<script type = "text/javascript">

			function abrirReceta(IdReceta) {
				
				var posicion_x; 
				var posicion_y; 
				posicion_x=(screen.width/2)-(800/2); 
				posicion_y=(screen.height/2)-(600/2); 
				window.open("./Interfaz/popUpReceta.php?IdReceta="+IdReceta, "popUpReceta", "width=800,height=600,menubar=0,toolbar=0,directories=0,scrollbars=no,resizable=no,left="+posicion_x+",top="+posicion_y+"");
			}

		</script>
</head>
<body>
<div id="wrapper">
	<!-- start header -->
	<?php include("include/header.php")?>
	<!-- end header -->
	<section id="featured">
	<!-- start slider -->
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
	<!-- Slider -->
        <div id="main-slider" class="flexslider">
            <ul class="slides">
              <li>
                <img src="img/slides/4.jpg" alt="imagen" />
                <div class="flex-caption">
                    <h3>MIS RECETAS</h3> 
					<p>Las Mejores Recetas de nuestro sistema</p>
					<?php 
					if(!isset($_SESSION["idUsuario"]))
					{ echo'<a href="interfaz/registrarme.html" class="btn btn-theme">Registrate ya!</a>';}
					else
					{
                     { echo'<a href="interfaz/mostrarRecetas.php" class="btn btn-theme">MIS RECETAS</a>';}	
					}
						?>
                </div>
              </li>
              <li>
                <img src="img/slides/5.jpg" alt="imagen" />
                <div class="flex-caption">
                    <h3>TODAS LAS RECETAS</h3> 
					<p>Las Mejores Recetas de nuestro sistema</p>
					<?php 
					if(!isset($_SESSION["idUsuario"]))
					{ echo'<a href="interfaz/registrarme.html" class="btn btn-theme">Registrate ya!</a>';}
					else
					{
                     { echo'<a href="/interfaz/todasLasRecetas.php" class="btn btn-theme">TODAS LAS RECETAS</a>';}	
					}
						?>
                </div>
              </li>
              <li>
                <img src="img/slides/6.jpg" alt="imagen" />
                <div class="flex-caption">
                    <h3>RECOMENDACIONES</h3> 
					<p>Las Mejores Recomendaciones de nuestro sistema</p>
					<?php 
					if(!isset($_SESSION["idUsuario"]))
					{ echo'<a href="interfaz/registrarme.html" class="btn btn-theme">Registrate ya!</a>';}
					else
					{
                     { echo'<a href="/interfaz/RecomendacionesRecetasInterfaz.php" class="btn btn-theme">RECOMENDACIONES</a>';}	
					}
						?>
                </div>
              </li>
              <li>
                <img src="img/slides/1.jpg" alt="imagen" />
                <div class="flex-caption">
                    <h3>MIS GRUPOS</h3> 
					<p>Administra tus grupos de usuario</p>
					<?php 
					if(!isset($_SESSION["idUsuario"]))
					{ echo'<a href="interfaz/registrarme.html" class="btn btn-theme">Registrate ya!</a>';}
					else
					{
                     { echo'<a href="/interfaz/gestionGrupos.php" class="btn btn-theme">MIS GRUPOS</a>';}	
					}
						?>
                </div>
              </li>
              <li>
                <img src="img/slides/1.jpg" alt="imagen" />
                <div class="flex-caption">
                    <h3>ESTADISTICAS Y REPORTES</h3> 
					<p>Encontra tus estadisticas y reportes en nuestro sistema</p>
					<?php 
					if(!isset($_SESSION["idUsuario"]))
					{ echo'<a href="interfaz/registrarme.html" class="btn btn-theme">Registrate ya!</a>';}
					else
					{
                     { echo'<a href="/interfaz/EstadisticasInterfaz.php" class="btn btn-theme">ESTADISTICAS Y REPORTES</a>';}	
					}
						?>
                </div>
              </li>
                  <li>
                <img src="img/slides/1.jpg" alt="imagen" />
                <div class="flex-caption">
                    <h3>PERFIL</h3> 
					<p>Perfil</p>
					<?php 
					if(!isset($_SESSION["idUsuario"]))
					{ echo'<a href="interfaz/registrarme.html" class="btn btn-theme">Registrate ya!</a>';}
					else
					{
                     { echo'<a href="/negocio/perfil.php" class="btn btn-theme">PERFIL</a>';}	
					}
						?>
                </div>
              </li>
            </ul>
        </div>
	<!-- end slider -->
			</div>
		</div>
	</div>	
	</section>
 <?php
    include("./Negocio/10MejoresRecetasNegocio.php");
  ?>      	
	<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="row">
					<div class="col-lg-3">
						<div>
							<div class="box-gray aligncenter">
								<h4>Recetas Aceptadas</h4>								
								<div class="icon">
								<i class="fa fa-star fa-3x"></i>
								</div>
							
			                     <?php
			                  
								$logica = new logicaDeNegocio();

								$arrayRecetasAceptadas = $logica->selectRecetasAceptadas();

								foreach($arrayRecetasAceptadas as $receta) {
								
									echo "<li>" . $receta->getDesc() . "  ";
									echo "<input type=\"button\" name=\"Ver\" onclick=\"abrirReceta(" . $receta->getId() . ")\" value=\"VER\" class=\"btn btn-theme aligncenter\">";
									echo "</li>";
							                   }
						          ?>
                               
									
							</div>
						</div>
					</div>
				     <div class="col-lg-3">
						<div>
							<div class="box-gray aligncenter">
								<h4>Recetas Calificadas</h4>
								<div class="icon">
								<i class="fa fa-desktop fa-3x" style= ></i>
								</div>
								<?php
				                  
									$logica = new logicaDeNegocio();

									$arrayRecetasCalificadas = $logica->selectRecetasCalificadas();

									foreach($arrayRecetasCalificadas as $receta) {
					
										echo "<li>" . $receta->getDesc() . "  ";
										echo "<input type=\"button\" name=\"Ver\" onclick=\"abrirReceta(".$receta->getId().")\" value=\"VER\" class=\"btn btn-theme aligncenter\">";
										echo "</li>";
								                   }
							          ?>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div>
							<div class="box-gray aligncenter">
								<h4>Recetas Consultadas</h4>
								<div class="icon">
								<i class="fa fa-thumbs-up fa-3x"></i>
								</div>
									<?php
                  
					$logica = new logicaDeNegocio();

					$arrayRecetasConsultadas = $logica->selectRecetasConsultadas();

					foreach($arrayRecetasConsultadas as $receta) {
					    
						echo "<li>" . $receta->getDesc() . "  ";
						echo "<input type=\"button\" name=\"Ver\" onclick=\"abrirReceta(".$receta->getId().")\" value=\"VER\" class=\"btn btn-theme aligncenter\">";
						echo "</li>";
				                   }
			          ?>

									
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div>
							<div class="box-gray aligncenter">
								<h4>Tip 4</h4>
								<div class="icon">
								<i class="fa fa-clock-o fa-3x"></i>
								</div>
								<p>
								 Recetas rápidas: ¡Todo en 20'!<br><br>
								</p>
									
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- divider -->
		<div class="row">
			<div class="col-lg-12">
				<div class="solidline">
				</div>
			</div>
		</div>
		<!-- end divider -->
		<!-- Portfolio Projects -->
		<div class="row">
			<div class="col-lg-12">

				<h4 class="heading">Recomendaciones del día</h4>

				<div class="row">
					<section id="projects">
					<ul id="thumbs" class="portfolio">
						<!-- Item Project and Filter Name -->
						<li class="col-lg-3 overflow: hidden; ">
						<div class="item">
						
						<!-- Thumb Image and Description -->
							<img src="img/asd/1.jpg" alt="imagen">
						</div>
						</li>
						<!-- End Item Project -->
						
						<!-- Item Project and Filter Name -->
						<li class="col-lg-3 overflow: hidden;">
						<div class="item">
						
						<!-- Thumb Image and Description -->
							<img src="img/asd/2.jpg" alt="imagen">
						</div>
						</li>
						<!-- End Item Project -->
						
						<!-- Item Project and Filter Name -->
						<li class="col-lg-3 overflow: hidden;">
						<div class="item">
						
						<!-- Thumb Image and Description -->
							<img src="img/asd/3.jpg" alt="imagen">
						</div>
						</li>
						<!-- End Item Project -->
						
						<!-- Item Project and Filter Name -->
						<li class="col-lg-3 overflow: hidden;">
						<div class="item">
						
						<!-- Thumb Image and Description -->
							<img src="img/asd/4.jpg" alt="imagen">
						</div>
						</li>
						<!-- End Item Project -->
						
					</ul>
					</section>
					
				</div>
					<div class="row">
					<section id="projects">
					<ul id="thumbs" class="portfolio">
						<!-- Item Project and Filter Name -->
						<li class="col-lg-3 overflow: hidden; ">
						<div class="item">
						
						<!-- Thumb Image and Description -->
							<img src="img/asd/5.jpg" alt="imagen">
						</div>
						</li>
						<!-- End Item Project -->
						
						<!-- Item Project and Filter Name -->
						<li class="col-lg-3 overflow: hidden;">
						<div class="item">
						
						<!-- Thumb Image and Description -->
							<img src="img/asd/6.jpg" alt="imagen">
						</div>
						</li>
						<!-- End Item Project -->
						
						<!-- Item Project and Filter Name -->
						<li class="col-lg-3 overflow: hidden;">
						<div class="item">
						
						<!-- Thumb Image and Description -->
							<img src="img/asd/7.jpg" alt="imagen">
						</div>
						</li>
						<!-- End Item Project -->
						
						<!-- Item Project and Filter Name -->
						<li class="col-lg-3 overflow: hidden;">
						<div class="item">
						
						<!-- Thumb Image and Description -->
							<img src="img/asd/8.jpg" alt="imagen">
						</div>
						</li>
						<!-- End Item Project -->
						
					</ul>
					</section>
				</div>
				
					<div class="row">
					<section id="projects">
					<ul id="thumbs" class="portfolio">
						<!-- Item Project and Filter Name -->
						<li class="col-lg-3 overflow: hidden; ">
						<div class="item">
						
						<!-- Thumb Image and Description -->
							<img src="img/asd/9.jpg" alt="imagen">
						</div>
						</li>
						<!-- End Item Project -->
						
						<!-- Item Project and Filter Name -->
						<li class="col-lg-3 overflow: hidden;">
						<div class="item">
						
						<!-- Thumb Image and Description -->
							<img src="img/asd/10.jpg" alt="imagen">
						</div>
						</li>
						<!-- End Item Project -->
						
						<!-- Item Project and Filter Name -->
						<li class="col-lg-3 overflow: hidden;">
						<div class="item">
						
						<!-- Thumb Image and Description -->
							<img src="img/asd/11.jpg" alt="imagen">
						</div>
						</li>
						<!-- End Item Project -->
						
						<!-- Item Project and Filter Name -->
						<li class="col-lg-3 overflow: hidden;">
						<div class="item">
						
						<!-- Thumb Image and Description -->
							<img src="img/asd/12.jpg" alt="imagen">
						</div>
						</li>
						<!-- End Item Project -->
						
					</ul>
					</section>
				</div>	
					
			</div>
		</div>

	</div>
	</section>
	
	<!-- start footer -->
		<?php include("include/footer.php")?>
	<!-- end footer -->
	
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/jquery.fancybox-media.js"></script>
<script src="js/google-code-prettify/prettify.js"></script>
<script src="js/portfolio/jquery.quicksand.js"></script>
<script src="js/portfolio/setting.js"></script>
<script src="js/jquery.flexslider.js"></script>
<script src="js/animate.js"></script>
<script src="js/custom.js"></script>
</body>
</html>