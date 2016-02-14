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

						var dificultades = document.getElementById("dificultad");
						var sexos       = document.getElementById("sexo");
						var ruta = "EstadisticasInterfaz.php?&Dificultad="
						            + dificultades.options[dificultades.selectedIndex].value 
						            + "&Sexo=" 
						            + sexos.options[sexos.selectedIndex].value;
						
		                window.location.href = ruta;
					}
					 function preloadFunc()
					    {  
					       var dificultades = document.getElementById("dificultad");
						   var sexos       = document.getElementById("sexo");
					       var dif = getUrlVars()["Dificultad"];
						   var sex = getUrlVars()["Sexo"];

						   if(typeof dif != "undefined")
						   {
						   	dificultades.value = dif;
						   }else
						   {
						   	dificultades.value = "";
						   }

						 if(typeof sex != "undefined")
						   {
						   	sexos.value = sex;
						   }else
						   {
						   	sexos.value = "";
						   }

						     
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
					
					  <a href="../interfaz/recetasconsultadas.php"><h1>Recetas Consultadas</h1></a>
					  <a href="../interfaz/xDieta.php"><h1>Recetas por dieta</h1></a>
					  <a href="../interfaz/xPreferencias.php"><h1>Recetas por preferencias</h1></a>
					  <a href="../interfaz/xCondimentos.php"><h1>Recetas por condimentos</h1></a>
					  <a href="../interfaz/xPiramide.php"><h1>Recetas por pirámide</h1></a>
					  <a href="../interfaz/xCalificadasyEstacion.php"><h1>Recetas por Calificación y Estación</h1></a>
					  <!-- <a href="../interfaz/xSexoyContexturayCalificacion.php"><h1>Recetas por Sexo, Contextura y Calificación</h1></a>  -->            		  
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