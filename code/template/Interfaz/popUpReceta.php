<?php session_start();?>

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

			function abrirReceta(idUsuario, IdReceta) {
				
				
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
							
								
									<h1>
										<?php
											include ("../Negocio/NegocioPlanificarRecetas.php");

											$negocio = new LogicaNegocio();

											$datosReceta = $negocio->getInfoReceta($_GET["IdReceta"]);

											echo $datosReceta->Receta;
										?>
									</h1>

									<h3> Pasos </h3>

   										<?php

											$array = $negocio->getPasosReceta($_GET["IdReceta"]);


											$index = 1;

											foreach($array as $pasoReceta) {
												echo "<br />";
												echo "<label>Paso".$index."</label>";
												echo "<br />";
												echo $pasoReceta->getPaso();											    
												$index++;
											}
										?>

									<!--<table class="table table-hover">
										<thead>
										<tr>													
											<th>Receta</th>
											<th>Horarios</th>
											<th>Dificultad</th>
											<th>Calor&iacute;as</th>
											<th></th>
											<th></th>
										</tr>
										</thead>
										<tbody>
										<tr>
											<td>John</td>
											<td>Doe</td>
											<td>john@example.com</td>
											<td>100</td>
											<td><input type="button" value="Ver" class="btn btn-lg"/></td>
											</tr>
										<tr>
											<td>Mary</td>
											<td>Moe</td>
											<td>mary@example.com</td>
											<td>100</td>
											<td><input type="button" value="Ver" class="btn btn-lg"/></td>
										</tr>
										<tr>
										<td>July</td>
										<td>Dooley</td>
										<td>july@example.com</td>
										<td>100</td>
										<td><input type="button" value="Ver" class="btn btn-lg"/></td>
										</tr>
										
										</tbody>
									</table>-->									
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