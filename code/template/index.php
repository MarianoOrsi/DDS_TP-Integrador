<?php session_start();

if(isset($_GET["logout"]) && $_GET["logout"]==1){
		unset($_SESSION["idUsuario"]); 
		session_destroy();
		
		}	?>



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
	<header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand"><span>Que</span> comemos?</a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Inicio</a></li>
						
						<?php if(isset($_SESSION["idUsuario"])){ // SI no esta seteado, muestra lo primero
								echo '<li><a href="login.html">Mis Recetas</a></li>';
                                echo '<li><a href="login.html">Mis Grupos</a></li>';
                                echo '<li><a href="login.html">Estadisticas y Reportes</a></li>';
                                echo '<li><a href="login.html">Actualizar Perfil</a></li>';
								echo '<li><a href="index.php?logout=1">Salir</a></li>';
								}
								else {
								echo '<li><a href="iniciarSesion.html">Ingresar</a></li>';
                                echo '<li><a href="registrarme.html">Registrarse</a></li>';
										
								}
								?>
								
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
	</header>
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
                    
					<?php if(!isset($_SESSION["idUsuario"])){ echo'<a href="registrarme.html" class="btn btn-theme">Registrate ya!</a>';} ?>
                </div>
              </li>
              <li>
                <img src="img/slides/5.jpg" alt="imagen" />
                <div class="flex-caption">
                    <h3>Conservas</h3> 
					<p>Huevos en salmuiera?<br>
						Si Moe puede porque vos no?</p> 
					<?php if(!isset($_SESSION["idUsuario"])){ echo'<a href="registrarme.html" class="btn btn-theme">Registrate ya!</a>';} ?>
                </div>
              </li>
              <li>
                <img src="img/slides/6.jpg" alt="imagen" />
                <div class="flex-caption">
                    <h3>No sabemos que es esto</h3> 
					<p>Pero si te salió bien subí la receta y ponele el nombre que quieras!</p> 
					<?php if(!isset($_SESSION["idUsuario"])){ echo'<a href="iniciarSesion.html" class="btn btn-theme">Iniciar Sesión</a>';} ?>
                </div>
              </li>
            </ul>
        </div>
	<!-- end slider -->
			</div>
		</div>
	</div>	
	
	
	<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="row">
				
					<div class="col-lg-3">
						<div>
							<div class="box-gray aligncenter">
								<h4>Receta 1</h4>
								<div class="icon">
								<i class="fa fa-desktop fa-3x" style= ></i>
								</div>
								<p>
								 Elegí el menú que más te guste y sorprendé a tus amigos!
								</p>
									<br>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div>
							<div class="box-gray aligncenter">
								<h4>Receta 2</h4>
								<div class="icon">
								<i class="fa fa-pagelines fa-3x"></i>
								</div>
								<p>
								 Voluptatem accusantium doloremque laudantium sprea totam rem aperiam.
								</p>
									
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div>
							<div class="box-gray aligncenter">
								<h4>Receta 3</h4>
								<div class="icon">
								<i class="fa fa-edit fa-3x"></i>
								</div>
								<p>
								 Voluptatem accusantium doloremque laudantium sprea totam rem aperiam.
								</p>
									
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div>
							<div class="box-gray aligncenter">
								<h4>Receta 5</h4>
								<div class="icon">
								<i class="fa fa-code fa-3x"></i>
								</div>
								<p>
								 Voluptatem accusantium doloremque laudantium sprea totam rem aperiam.
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
						<li class="col-lg-3 design" data-id="id-0" data-type="web">
						<div class="item">
						
						<!-- Thumb Image and Description -->
							<img src="img/asd/1.jpg" alt="imagen">
						</div>
						</li>
						<!-- End Item Project -->
						<!-- Item Project and Filter Name -->
						<li class="item-thumbs col-lg-3 design" data-id="id-1" data-type="icon">
						
						<!-- Thumb Image and Description -->
						<img src="img/asd/2.jpg" alt="imagen">
						</li>
						<!-- End Item Project -->
						
						<!-- Item Project and Filter Name -->
						<li class="item-thumbs col-lg-3 photography" data-id="id-2" data-type="illustrator">
						
						<!-- Thumb Image and Description -->
						<img src="img/asd/3.jpg"alt="imagen">
						</li>
						<!-- End Item Project -->
						
						<!-- Item Project and Filter Name -->
						<li class="item-thumbs col-lg-3 photography" data-id="id-2" data-type="illustrator">
						
						<!-- Thumb Image and Description -->
						<img src="img/asd/4.jpg" alt="imagen">
						</li>
						<!-- End Item Project -->
						
					</ul>
					</section>
				</div>
					
					<div class="row">
					<section id="projects">
					<ul id="thumbs" class="portfolio">
						<!-- Item Project and Filter Name -->
						<li class="col-lg-3 design" data-id="id-0" data-type="web">
						<div class="item-thumbs">
					
						<!-- Thumb Image and Description -->
						<img src="img/asd/5.jpg" alt="imagen">
						</div>
						</li>
						<!-- End Item Project -->
						
						<!-- Item Project and Filter Name -->
						<li class="item-thumbs col-lg-3 design" data-id="id-1" data-type="icon">
						
						<!-- Thumb Image and Description -->
						<img src="img/asd/6.jpg"alt="imagen">
						</li>
						<!-- End Item Project -->
						<!-- Item Project and Filter Name -->
						<li class="item-thumbs col-lg-3 photography" data-id="id-2" data-type="illustrator">
						
						<!-- Thumb Image and Description -->
						<img src="img/asd/7.jpg"alt="imagen">
						</li>
						<!-- End Item Project -->
						<!-- Item Project and Filter Name -->
						<li class="item-thumbs col-lg-3 photography" data-id="id-2" data-type="illustrator">
						
						<!-- Thumb Image and Description -->
						<img src="img/asd/8.jpg" alt="imagen">
						</li>
						<!-- End Item Project -->
					</ul>
					</section>
				</div>
					
					<div class="row">
					<section id="projects">
					<ul id="thumbs" class="portfolio">
						<!-- Item Project and Filter Name -->
						<li class="col-lg-3 design" data-id="id-0" data-type="web">
						<div class="item-thumbs">
						<!-- Thumb Image and Description -->
						<img src="img/asd/9.jpg" alt="imagen">
						</div>
						</li>
						<!-- End Item Project -->
						<!-- Item Project and Filter Name -->
						<li class="item-thumbs col-lg-3 design" data-id="id-1" data-type="icon">
						
						<!-- Thumb Image and Description -->
						<img src="img/asd/10.jpg" alt="imagen">
						</li>
						<!-- End Item Project -->
						<!-- Item Project and Filter Name -->
						<li class="item-thumbs col-lg-3 photography" data-id="id-2" data-type="illustrator">
					
						<!-- Thumb Image and Description -->
						<img src="img/asd/11.jpg" alt="imagen">
						</li>
						<!-- End Item Project -->
						<!-- Item Project and Filter Name -->
						<li class="item-thumbs col-lg-3 photography" data-id="id-2" data-type="illustrator">
						
						<!-- Thumb Image and Description -->
						<img src="img/asd/12.jpg" alt="imagen">
						</li>
						<!-- End Item Project -->
					</ul>
					</section>
				</div>
			</div>
		</div>

	</div>
	</section>
	<footer>
	
	<div class="container aligncenter">
		<div class="row">
			<div class="col-lg-">
				<div class="widget">
					<h5 class="widgetheading">Integrantes</h5>
					<ul class="link-list">
						<li>Jonatan Boianover</li>
						<li>Maximiliano Cantarell</li>
						<li>Santiago H. Garcia</li>
						<li>Lucas Mangano</li>
						<li>Mariano Orsi</li>
						<li>Leandro Wagner</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div id="sub-footer" class="aligncenter">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="copyright aligncenter">
						<p>
							<span>&copy; UTN FRBA - Diseño de Sistemas - Curso K3152 - Grupo 81</span>
						</p>
					</div>
				</div>
				<!-- <div class="col-lg-6">
					<ul class="social-network">
						<li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
						<li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus"></i></a></li>
					</ul>
				</div> -->
			</div>
		</div>
	</div>

	</footer>
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