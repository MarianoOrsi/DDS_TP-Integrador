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
		<script type = "text/javascript">

					function selectRecetas() {
						$dificultad = document.getElementById("dificultad").value;
						$sexo       = document.getElementById("sexo").value;
		                window.location.href = "EstadisticasNegocio.php?method=SEL&Dificultad=" + dificultad + "&Sexo=" + sexo;
					}
		</script>

	</head>
	<body>
		<div id="wrapper">
				<!-- start header -->
		<?php include("include/header.php")?>
			<!-- end header -->


				<section class="callaction">

                  
					<div class="container">
					
					  <h1>Recetas Consultadas</h1>

              		  <select class="combo" name="sexo">
                   		 <option value="">Sexo</option>
                	     <option value="masculino">Masculino</option>
                         <option value="femenino">Femenino</option>
                      </select>


                      <select class="combo" name="dificultad" onselect="selectRecetas()">
                   		 <option value="">Dificultades</option>
                   		  <?php
							include("EstadisticasNegocio.php");
							$logica = new logicaDeNegocio();
							$arrayDificultades = $logica->getDificultades();
							foreach($arrayDificultades as $dificultad) {
								echo "<option value=" . $dificultad->getId() . ">" . $dificultad->getDescripcion() . "</option>";
							}

							?>
                      </select>

						<div class="row">
							
									<table class="table table-hover">
									<thead>
									<tr>													
										<th>N° Consultas</th>
										<th>Receta</th>
									</tr>
									</thead>
									<tbody>
									<tr>
										<td>NConsulta</td>
										<td>Receta</td>
									</tr>
									
									</tbody>
									</table>
									<div class="container aligncenter">
									
								</div>
								</div>
							</div>
						
					

			</section>

			<!-- start footer -->
				<?php include("include/footer.php")?>
			<!-- end footer -->
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