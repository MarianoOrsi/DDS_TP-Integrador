<?php session_start();

include("../datos/agregarReceta.php");

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
		<?php include("../include/header.php");?>
			<!-- end header -->

			<section class="callaction">
				<div class="row">
				
					<div class="col-md-8 col-md-offset-2">
						<div class="section-header">
							<h3>Crear Receta</h3>
						</div>
					
						<div class="cform" id="contact-form">
							<form action="../datos/crearReceta.php" method="post" role="form" class="contactForm">
							
							<div class="form-group">
								<label>Nombre de la Receta</label>
								<input type="text" class="form-control" name="nombreReceta"/>
								<div class="validation"></div>
							
							</div><div class="form-group">
								<label>Dificultad</label> 
								<select  class="form-control"  name="dificultad">

								<?php
									MostrarDificultades($QDificultades);
								?>
								

								</select>
							
							</div>
                                <div class="form-group">
                                    <label>Estacion</label>
                                    <select  class="form-control"  name="estacion">

                                        <?php
                                        MostrarEstacion($QEstacion);
                                        ?>


                                    </select>

                                </div>

                                <div class="form-group">
                                    <label>Pirámide</label>
                                    <select  class="form-control"  name="piramide">

                                        <?php
                                        MostrarEstacion($QPiramide);
                                        ?>


                                    </select>

                                </div>
                                <div class="form-group">
                                    <label>Tipo de Dieta</label>
                                    <select  class="form-control"  name="dieta">

                                        <?php
                                        MostrarEstacion($QDieta);
                                        ?>


                                    </select>

                                </div>
								<div class="form-group">
								<label>Ingredientes</label><br /><br />

								<?php
									MostrarIngredientes($QIngredientes);
								?>

								
								</div>
								<div class="form-group">
								<label>Condimentos</label><br /><br />

								<?php
									MostrarCondimentos($QCondimentos);
								?>

								
								</div>
								<div class="form-group">
								<h3>Pasos</h3>
								</div>
								<div class="form-group">
								<div class="row">
								<div class="col-lg-12">
								<label>Paso 1</label>
								
								<input type="textarea" name="paso1" rows="4" class="form-control" />
								   <br /><br />
								
								<label>Paso 2</label>
								
								<input type="textarea" name="paso2"rows="4" class="form-control"  />
								<br /><br />

                                <label>Paso 3</label>
								
								<input type="textarea" name="paso3" rows="4" class="form-control"/>
								  <br /><br />

                                <label>Paso 4</label>
								
								<input type="textarea" name="paso4" rows="4" class="form-control"  />
								  <br /><br />

                                <label>Paso 5</label>
								
								<input type="textarea" name="paso5" rows="4" class="form-control"  />
								   <br /><br />
								</div>
								</div>
								</div>
                                
                                <div class="text-center">
									<button type="submit" name="submit"  class="btn btn-theme aligncenter">Crear Receta</button>
                                </div>

                            </form> <!-- cambiar el type a submit, el cambio es para mostrar el alert -->

						</div>
					</div>
					<!-- ./span12 -->
				</div>

			</section>

			<!-- start footer -->
				<?php include("../include/footer.php")?>
			<!-- end footer -->
		</div>
		<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
		<!-- stop footer-->
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