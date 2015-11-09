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
                    <h3>Variedad en Platos</h3> 
					<p>Las mejores entradas para quedar con todo un chef</p>
					<p><font size="1">Aunque no sepas ni hervir agua</font></p>
                    
					<?php if(!isset($_SESSION["idUsuario"])){ echo'<a href="interfaz/registrarme.html" class="btn btn-theme">Registrate ya!</a>';} ?>
                </div>
              </li>
              <li>
                <img src="img/slides/5.jpg" alt="imagen" />
                <div class="flex-caption">
                    <h3>Conservas</h3> 
					<p>Huevos en salmuiera?<br>
						Si Moe puede porque vos no?</p> 
					<?php if(!isset($_SESSION["idUsuario"])){ echo'<a href="interfaz/registrarme.html" class="btn btn-theme">Registrate ya!</a>';} ?>
                </div>
              </li>
              <li>
                <img src="img/slides/6.jpg" alt="imagen" />
                <div class="flex-caption">
                    <h3>No sabemos que es esto</h3> 
					<p>Pero si te salió bien subí la receta y ponele el nombre que quieras!</p> 
					<?php if(!isset($_SESSION["idUsuario"])){ echo'<a href="interfaz/iniciarSesion.html" class="btn btn-theme">Iniciar Sesión</a>';} ?>
                </div>
              </li>
            </ul>
        </div>
	<!-- end slider -->
			</div>
		</div>
	</div>	
	</section>
	
	<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="row">
				
					<div class="col-lg-3">
						<div>
							<div class="box-gray aligncenter">
								<h4>Tip 1</h4>
								<div class="icon">
								<i class="fa fa-desktop fa-3x" style= ></i>
								</div>
								<p>
								 ¡Elegí el menú que más te guste y sorprendé a tus amigos!
								</p>
									
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div>
							<div class="box-gray aligncenter">
								<h4>Tip 2</h4>								
								<div class="icon">
								<i class="fa fa-star fa-3x"></i>
								</div>
								<p>
								¡Lucite como chef!<br><br>
								</p>
								
									
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div>
							<div class="box-gray aligncenter">
								<h4>Tip 3</h4>
								<div class="icon">
								<i class="fa fa-thumbs-up fa-3x"></i>
								</div>
								<p>
								¿Necesitás bajar de peso? ¡Nosotros te ayudamos!<br>
								</p>
									
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