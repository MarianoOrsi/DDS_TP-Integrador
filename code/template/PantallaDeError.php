<?php session_start();

$servidor = "localhost";
// todos los strings con los valores para el conector SQL
$user = "root";
$pass = "";
$dbname = "diseniosistemas";
$con = mysql_connect($servidor, $user, $pass);
mysql_select_db($dbname, $con) or die(mysql_error());
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>TP Integrador - Grupo 81</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="description" content="" />
		<meta name="author" content="http://bootstraptaste.com" />
		<!-- css -->
		<link href="css/bootstrap.min.css" rel="stylesheet" />
		<link href="css/fancybox/jquery.fancybox.css" rel="stylesheet">
		<link href="css/jcarousel.css" rel="stylesheet" />
		<link href="css/flexslider.css" rel="stylesheet" />
		<link href="css/style.css" rel="stylesheet" />
		<link href="css/form.css" rel="stylesheet" />
		<link href="css/error.css" rel="stylesheet" />
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
							<a class="navbar-brand" href="index.php"><span>Que</span> comemos?</a>
						</div>
						<div class="navbar-collapse collapse ">
							<ul class="nav navbar-nav">
								<li>
									<a href="index.php">Inicio</a>
								</li>
								<li>
									<a href="PantallaDeError.php">Mis Recetas</a>
								</li>
								<li>
									<a href="gestionGrupos.php">Mis Grupos</a>
								</li>
								<li>
									<a href="PantallaDeError.php">Estadisticas y Reportes</a>
								</li>
								<li>
									<a href="perfil.php">Perfil</a>
								</li>
								<li>
									<a href="index.php?logout=1">Salir</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</header>
			<!-- end header -->

			<section class="callaction">

				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="error-template">
								<h1> Oops!</h1>
								<h2> 404 Not Found</h2>
								<div class="error-details">
									Huy, creo que todavia no llegamos a esto.. Pero quedate tranquilo<br/>
									Estamos trabajando para solucionarlo ;)
								</div>
								
								<img src="img/EstamosTrabajandoPAraUsted.jpg" alt="Tecnicos Trabajando" />
																
								<div class="error-actions">
									<a href="index.php" class="btn btn-primary btn-lg"> Llevame al Inicio </a>
								</div>
							</div>
						</div>
					</div>
				</div>

			</section>

			<!-- start footer-->

			<footer>
				<div class="container aligncenter">
					<div class="row">
						<div class="col-lg-3">
							<div class="widget">
								<h5 class="widgetheading">Integrantes</h5>
								<ul class="link-list">
									<li>
										Jonatan Boianover
									</li>
									<li>
										Maximiliano Cantarell
									</li>
									<li>
										Santiago H. Garcia
									</li>
									<li>
										Lucas Mangano
									</li>
									<li>
										Mariano Orsi
									</li>
									<li>
										Leandro Wagner
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div id="sub-footer">
					<div class="container">
						<div class="row">
							<div class="col-lg-6">
								<div class="copyright">
									<p>
										<span>&copy; UTN FRBA - Diseño de Sistemas - Curso K3152 - Grupo 81</span>
									</p>
								</div>
							</div>
							<div class="col-lg-6">
								<ul class="social-network">
									<li>
										<a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
									</li>
									<li>
										<a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
									</li>
									<li>
										<a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin"></i></a>
									</li>
									<li>
										<a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a>
									</li>
									<li>
										<a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus"></i></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>
		<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
		<!-- stop footer-->
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