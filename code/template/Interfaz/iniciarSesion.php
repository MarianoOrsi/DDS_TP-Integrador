﻿<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>TP Integrador - Grupo 81</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="http://bootstraptaste.com" />
<!-- css -->
<link href="../css/bootstrap.min.css" rel="stylesheet" />
<link href="../css/fancybox/jquery.fancybox.css" rel="stylesheet">
<link href="../css/jcarousel.css" rel="stylesheet" />
<link href="../css/flexslider.css" rel="stylesheet" />
<link href="../css/style.css" rel="stylesheet" />
<link href="../css/form.css" rel="stylesheet" />
<!-- Theme skin -->
<link href="../skins/default.css" rel="stylesheet" />

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body>
<div id="wrapper">
	<!-- start header -->
<!--	<header>
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
                        <li><a href="../index.php">Inicio</a></li>
                        <li class="active"><a href="iniciarSesion.html">Ingresar</a></li>
						<li><a href="registrarme.html">Registrarse</a></li>
                    </ul>
                </div>
            </div>
        </div>
	</header>-->

	<?php include("../include/header.php");?>
	<!-- end header -->

	<section class="callaction">
	<div class="container">
		<div class="box-blue aligncenter">
			
					<h2><span>Iniciar</span> Sesión</h2>
							<form class="contact_form" action="../Datos/login.php" method="post" name="iniciarSesion">

										<?php
										if(isset($_GET["first"]))
										{
											echo'   <div class="alert alert-danger" role="alert">
													  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
													  <span class="sr-only">Error:</span>
													  Usuario o Contraseña incorrectos!
													</div>';
										};
										?>
								
									    <label>Usuario: </label>
										<br>
									    <input type="text" name="user" />
									<br>
									    <label>Contraseña: </label>
										<br>
									    <input type="password" name="pass" />
									<br />
									<br />
									    <button type="submit" class="btn btn-theme" name="submit">Ingresar</button>
								
							</form>
						<br />
					</div>
				
			</div>
		</div>
	</div>
	</section>
	
	<footer>
	
<!--	<div class="container aligncenter">
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
			</div>
		</div>
	</div>-->
<?php include("../include/footer.php");?>
	</footer>

<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../js/jquery.js"></script>
<script src="../js/jquery.easing.1.3.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.fancybox.pack.js"></script>
<script src="../js/jquery.fancybox-media.js"></script>
<script src="../js/google-code-prettify/prettify.js"></script>
<script src="../js/portfolio/jquery.quicksand.js"></script>
<script src="../js/portfolio/setting.js"></script>
<script src="../js/jquery.flexslider.js"></script>
<script src="../js/animate.js"></script>
<script src="../js/custom.js"></script>
</body>
</html>