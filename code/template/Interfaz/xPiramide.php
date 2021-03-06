﻿<?php session_start();

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
		<link href="../css/bootstrap.min.css" rel="stylesheet" />
		<link href="../css/fancybox/jquery.fancybox.css" rel="stylesheet">
		<link href="../css/jcarousel.css" rel="stylesheet" />
		<link href="../css/flexslider.css" rel="stylesheet" />
		<link href="../css/style.css" rel="stylesheet" />
		<link href="../css/form.css" rel="stylesheet" />
		<link href="../css/error.css" rel="stylesheet" />
		<!-- Theme skin -->
		<link href="../skins/default.css" rel="stylesheet" />

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
		<script type = "text/javascript">

					function getUrlVars() {
						var vars = {};
						var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
						vars[key] = value;
						});
				      	return vars;
					}
					function selectRecetas() {

						var piramides = document.getElementById("piramide");
						var ruta = "xPiramide.php?&piramide="
						            + piramides.options[piramides.selectedIndex].value;
						
		                window.location.href = ruta;
					}
					 function preloadFunc()
					    {  
					       var piramides = document.getElementById("piramide");
					       var pir = getUrlVars()["piramide"];
					       piramides.value=pir;
						     
					    }

		</script>

	</head>
	<body onload="preloadFunc()">
		<div id="wrapper">
				<!-- start header -->
		<?php include("../include/header.php")?>
			<!-- end header -->


				<section class="callaction">

                  
					<div class="container">
					
					  <h1>Busqueda por Piramide</h1>

                      <select class="combo" id="piramide" onChange="selectRecetas()">
                   		<option value="0">piramide</option>
                   		  <?php
							include("../negocio/EstadisticasNegocio.php");
							$logica = new logicaDeNegocio();
							$arraypiramides = $logica->getpiramides();
							foreach($arraypiramides as $piramide) {
								echo "<option value=" . $piramide->getId() . ">" . $piramide->getsector() . "</option>";
							}

							?>
                      </select>

						<div class="row">
							
									<table class="table table-hover">
									<thead>
									<tr>	
										<th>Receta</th>
									</tr>
									</thead>
									<tbody>
						             <?php
                                        $piramide='';
								        
								        if(isset($_GET["piramide"]))
								        {
 										  $piramide = $_GET["piramide"];
								        }

										$logica = new logicaDeNegocio();
										if($piramide==null)
								        	{
 										  $arrayRecetas = $logica->selectRecetaspiramide(0);
								        	}
										else
										{
										$arrayRecetas = $logica->selectRecetaspiramide($piramide);
										}

										foreach($arrayRecetas as $receta) {
										    echo "<TR>";
											echo "<TD>" . $receta->getReceta() . "</TD>";
											echo "</TR>";
									}
								?>
									
									</tbody>
									</table>
									<div class="container aligncenter">
									
								</div>
								</div>
							</div>
						
					

			</section>

			<!-- start footer -->
				<?php include("../include/footer.php")?>
			<!-- end footer -->
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