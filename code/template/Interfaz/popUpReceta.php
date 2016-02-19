<?php session_start();?>

<?php
	include ("../Negocio/NegocioPlanificarRecetas.php");

	$negocio = new LogicaNegocio();

	$datosReceta = $negocio->getInfoReceta($_GET["IdReceta"]);

	$negocio->guardarRecetaConsultada($_SESSION["idUsuario"], $_GET["IdReceta"]);
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
		<link href="../css/error.css" rel="stylesheet" />
		<!-- Theme skin -->
		<link href="../skins/default.css" rel="stylesheet" />


		<script type = "text/javascript">

			function planificarReceta(idUsuario, IdReceta, IdHorario) {
				window.location.href = "../Negocio/NegocioPlanificarRecetas.php?IdReceta="+IdReceta+"&IdUsuario=" + idUsuario + "&IdHorario=" + IdHorario;
				alert("Su receta se ha planificado con exito!");
				window.close();
			}
		</script>

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

	</head>
	<body>
		<div id="wrapper">

				<section class="callaction">

					<div class="container">

						<div class="row">
							
								<div style="background-color:#d64131; padding-top:2%;">

									<h1 style="margin:0px; text-align:center;">
										<?php
											echo $datosReceta->Receta;
										?>
									</h1>

									<h3 style="margin:15px 0px 0px 0px; text-align:center;">
										
										<?php
											
											$dificultad = $negocio->getDificultadReceta($_GET["IdReceta"]);

											echo "Dificultad: ".$dificultad;
										?>

									</h3>

									<h3 style="margin:15px 0px 0px 0px; text-align:center;">
										
										<?php
											echo "Calorías Totales: ".$datosReceta->Calorias;
										?>

									</h3>

									<br />
								</div>
								
								<div id="ingredientes" style="width:35%; float:left; margin-top:2%;">
									<?php

										$array = $negocio->getIngredientesReceta($_GET["IdReceta"]);

										$index = 1;

										echo "<h4 style=\"margin:0px; float:left;\">Ingredientes</h4>";
										echo "<br />"; 
										
										foreach($array as $ingredienteReceta) {
											
											echo $ingredienteReceta->getIngrediente();
											echo "<br />"; 
											echo "Porcion:  ".$ingredienteReceta->getPorcion();
											echo "<br />";
											echo "Calorias:  ".$ingredienteReceta->getCalorias();
											echo "<br />";
											echo "<br />";						

											$index++;
										}

									?>

								</div>
								<div id="condimentos" style="float:left; width:30%; margin-top:2%;">
									<?php

										echo "<h4 style=\"margin:0px; float:left;\">Condimentos</h4>";
										echo "<br />";

										$array = $negocio->getCondimentosReceta($_GET["IdReceta"]);

										$index = 1;

										foreach($array as $condimentoReceta) {
											echo $condimentoReceta->getcondimento();
											echo "<br />";										    
											$index++;
										}

									?>
								</div>
								<div id="pasos" style="float:left; width:35%; margin-top:2%;">
									<?php
										echo "<h4 style=\"margin:0px; float:left;\">Preparación</h4>";
										echo "<br />";
										echo "<br />";

										$array = $negocio->getPasosReceta($_GET["IdReceta"]);

										$index = 1;

										foreach($array as $pasoReceta) {
											echo "<h4 style=\"margin:0px;\">Paso".$index."</h4>";
											echo $pasoReceta->getPaso();
											echo "<br />";
											echo "<br />";										    
											$index++;
										}

									?>
								</div>
								<div style="float:left; width:100%; margin-top:2%;">
									<?php
										echo "<input style=\"margin-right:3%\" type=\"button\" name=\"Ver\" onclick=\"planificarReceta(".$_SESSION["idUsuario"].",".$_GET["IdReceta"].",1)\" value=\"Planificar Desayuno\" class=\"btn btn-theme aligncenter\">";
										echo "<input style=\"margin-right:3%\" type=\"button\" name=\"Ver\" onclick=\"planificarReceta(".$_SESSION["idUsuario"].",".$_GET["IdReceta"].",2)\" value=\"Planificar Almuerzo\" class=\"btn btn-theme aligncenter\">";
										echo "<input style=\"margin-right:3%\" type=\"button\" name=\"Ver\" onclick=\"planificarReceta(".$_SESSION["idUsuario"].",".$_GET["IdReceta"].",3)\" value=\"Planificar Merienda\" class=\"btn btn-theme aligncenter\">";
										echo "<input style=\"margin-right:3%\" type=\"button\" name=\"Ver\" onclick=\"planificarReceta(".$_SESSION["idUsuario"].",".$_GET["IdReceta"].",4)\" value=\"Planificar Cena\" class=\"btn btn-theme aligncenter\">";
									?>
								</div>
							
						</div>
					</div>
		</div>
						
					

			</section>
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