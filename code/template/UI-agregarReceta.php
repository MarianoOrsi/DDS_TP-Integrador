

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
                        <li class="active" ><a href="index.php">Inicio</a></li>
						
						<li><a href="mostrarRecetas.php">Mis Recetas</a></li><li><a href="gestionGrupos.php">Mis Grupos</a></li><li><a href="PantallaDeError.php">Estadisticas y Reportes</a></li><li><a href="perfil.php">Perfil</a></li><li class="active"><a href="index.php?logout=1">Salir</a></li>								
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
	</header>			<!-- end header -->

			<section class="callaction">
				<div class="row">
				
					<div class="col-md-8 col-md-offset-2">
						<div class="section-header">
							<h3>Crear Receta</h3>
						</div>
					
						<div class="cform" id="contact-form">
							<form action="actualizarPerfilPrivado.php" method="post" role="form" class="contactForm">
							<div class="form-group">
								<label>Nombre de la Receta</label>
								<input type="text" class="form-control" name="nombreReceta"/>
								<div class="validation"></div>
								</div><div class="form-group">
								<label>Dificultad</label> <!-- vamos a llenarlo con el resultado de una query-->
								<select  class="form-control"  name="dificultad">
								<option value="Facil">Facil</option>
								<option value="Media">Media</option>
								<option value="Dificil">Dificil</option>
								<option value="Muy Dificil">Muy Dificil</option>								
								</select>
								</div><div class="form-group">
								<label>Tipo de dieta</label>
								<select  class="form-control"  name="dieta">
								<option value="Normal">Normal</option>
								<option value="Vegetariano">Vegetariano</option>
								<option value="Ovolactovegetariano">Ovolactovegetariano</option>
								<option value="Vegano">Vegano</option>
								</select>
								</div>
								<div class="form-group">
								<label>Ingredientes</label><br /><br />
								<div class="checkbox-inline">
									<label><input type="checkbox" value="">Pollo</label>
								</div>
								<div class="checkbox-inline">
									<label><input type="checkbox" value="">Tomate</label>
								</div>
								<div class="checkbox-inline">
									<label><input type="checkbox" value="" >Lechuga</label>
								</div>
								<div class="checkbox-inline">
									<label><input type="checkbox" value="">Pollo</label>
								</div>
								<div class="checkbox-inline">
									<label><input type="checkbox" value="">Tomate</label>
								</div>
								<div class="checkbox-inline">
									<label><input type="checkbox" value="" >Lechuga</label>
								</div>
								<div class="checkbox-inline">
									<label><input type="checkbox" value="">Pollo</label>
								</div>
								<div class="checkbox-inline">
									<label><input type="checkbox" value="">Tomate</label>
								</div>
								<div class="checkbox-inline">
									<label><input type="checkbox" value="" >Lechuga</label>
								</div>
								<div class="checkbox-inline">
									<label><input type="checkbox" value="">Pollo</label>
								</div>
								<div class="checkbox-inline">
									<label><input type="checkbox" value="">Tomate</label>
								</div>
								<div class="checkbox-inline">
									<label><input type="checkbox" value="" >Lechuga</label>
								</div>
								<div class="checkbox-inline">
									<label><input type="checkbox" value="">Pollo</label>
								</div>
								<div class="checkbox-inline">
									<label><input type="checkbox" value="">Tomate</label>
								</div>
								<div class="checkbox-inline">
									<label><input type="checkbox" value="" >Lechuga</label>
								</div>
								<div class="checkbox-inline">
									<label><input type="checkbox" value="">Pollo</label>
								</div>
								<div class="checkbox-inline">
									<label><input type="checkbox" value="">Tomate</label>
								</div>
								<div class="checkbox-inline">
									<label><input type="checkbox" value="" >Lechuga</label>
								</div>
								
								</div>
								<div class="form-group">
								<label>Condimentos</label>
								<div class="checkbox">
									<label><input type="checkbox" value="">Sal</label>
								</div>
								<div class="checkbox">
									<label><input type="checkbox" value="">Pimienta</label>
								</div>
								<div class="checkbox ">
									<label><input type="checkbox" value="" >Aceite de Oliva</label>
								</div>
								
								</div>
								<div class="form-group">
								<h3>Pasos</h3>
								</div>
								<div class="form-group">
								<div class="row">
								<div class="col-lg-12">
								<label>Paso 1</label>
								
								<input type="textarea" name="paso1" rows="4" class="form-control"  name="preferencias" />
							<input type="button" value="Agregar imagen" onClick="alert('Seleccionar imagen');" class="btn btn-lg"/><br /><br />
								
								<label>Paso 2</label>
								
								<input type="textarea" name="paso2"rows="4" class="form-control"  name="preferencias" />
								<input type="button" value="Agregar imagen" onClick="alert('Seleccionar imagen');" class="btn btn-lg"/><br /><br />
								<label>Paso 3</label>
								
								<input type="textarea" name="paso3" rows="4" class="form-control"  name="preferencias" />
								<input type="button" value="Agregar imagen" onClick="alert('Seleccionar imagen');" class="btn btn-lg"/><br /><br />
								<label>Paso 4</label>
								
								<input type="textarea" name="paso4" rows="4" class="form-control"  name="preferencias" />
								<input type="button" value="Agregar imagen" onClick="alert('Seleccionar imagen');" class="btn btn-lg"/> <br /><br />
								<label>Paso 5</label>
								
								<input type="textarea" name="paso5" rows="4" class="form-control"  name="preferencias" />
								<input type="button" value="Agregar imagen" onClick="alert('Seleccionar imagen');" class="btn btn-lg"/><br /><br />
								</div>
								</div>
								</div>
								
								<div class="form-group">
								<label>Calorias totales: </label>
								<label class="btn"><b>666</b></label>
								</div>								<input type="button" value="Crear Receta" name="submit" onClick="alert('Se crea la receta');"  class="btn btn-theme aligncenter" />
							</form> <!-- cambiar el type a submit, el cambio es para mostrar el alert -->

						</div>
					</div>
					<!-- ./span12 -->
				</div>

			</section>

			<!-- start footer -->
		<footer>
	<meta charset="utf-8" />
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
							<span>&copy; UTN FRBA - Dise&ntilde;o de Sistemas - Curso K3152 - Grupo 81</span>
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

	</footer>	<!-- end footer -->
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