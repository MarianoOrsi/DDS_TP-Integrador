<?php session_start();

include("../datos/capaDatos.php");
include("../datos/todasLasRecetas.php");

$servidor = "localhost";
// todos los strings con los valores para el conector SQL
$user = "root";
$pass = "";
$dbname = "diseniosistemas";
$con = mysql_connect($servidor, $user, $pass);
mysql_select_db($dbname, $con) or die(mysql_error());

$consulta="SELECT R.Receta, D.Dificultad, R.Calorias, R.IdReceta FROM dificultades D, recetas R WHERE D.IdDificultad=R.IdDificultad;";
$Qid=mysql_query($consulta) or die (mysql_error());


function DameRecetasResumida($recetaSql)
{

	$recetaHtml='
	<tr>
		<td>'.$recetaSql['0'].'</td>
		<td>'.$recetaSql['1'].'</td>
		<td>'.$recetaSql['2'].'</td>
		<TD><input type="button" name="Ver" onclick="abrirReceta('.$recetaSql['3'].')" value="VER" class="btn btn-theme aligncenter"></TD>
	</tr>';
	
    return $recetaHtml;
}

function MostarRecetasResumidas($id)
{
    while ($arrayDeResultados = mysql_fetch_array($id, MYSQL_NUM)) 
    {
		echo DameRecetasResumida($arrayDeResultados);
	}

}


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

			function abrirReceta(IdReceta) {
				
				var posicion_x; 
				var posicion_y; 
				posicion_x=(screen.width/2)-(800/2); 
				posicion_y=(screen.height/2)-(600/2); 
				window.open("popUpReceta.php?IdReceta="+IdReceta, "popUpReceta", "width=800,height=600,menubar=0,toolbar=0,directories=0,scrollbars=no,resizable=no,left="+posicion_x+",top="+posicion_y+"");
			}

		</script>

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

	</head>
	<body onload="preloadFunc()">
		<div id="wrapper">
				<!-- start header -->
		<?php include("../include/header.php")?>
			<!-- end header -->


				<section class="callaction">

					<div class="container">
						<div class="row">
								
									<h1>Todas Las Recetas</h1>

			<!-- Elementos de Busqueda -->

									<select class="combo" id="Dificultad">
				                   	    <option value="">Dificultad</option>
				                   	    <?php
				                   	    	MostrarDificultades();
				                   	    ?>
				                    </select>

				                    <select class="combo" id="Estacion">
				                   	    <option value="">Estacion</option>
				                   	    <?php
				                   	    	MostrarEstacion();
				                   	    ?>
				                    </select>
				                    
				                    <select class="combo" id="Piramide">
				                   	    <option value="">Piramide</option>
				                   	    <?php
				                   	    	MostrarPiramide();
				                   	    ?>
				                    </select>

				                    <select class="combo" id="TipoDeDieta">
				                   	    <option value="">Tipo de dieta</option>
				                   	    <?php
				                   	    	MostrarTipoDeDieta();
				                   	    ?>
				                    </select>

			<!-- Fin de elementos de Busqueda -->

									<button type="submit" name="submit"  class="btn btn-theme ">Filtrar Recetas</button>



									<!--Seguir con esto:    http://www.forosdelweb.com/f18/busqueda-con-filtros-php-mysql-1042912/-->



									<table class="table table-hover">
										<thead>
											<tr>													
												<th>Nombre</th>
												<th>Dificultad</th>
												<th>Calor&iacute;as</th>
												<th></th>
												<th></th>
											</tr>
										</thead>
										<tbody>

											<?php
												MostarRecetasResumidas($Qid);
											?>
													
										</tbody>
									</table>

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
            <script type="text/javascript">
                function myFunction(id) {
                    var x;
                    if (confirm("¿Está seguro de borrar la receta seleccionada?") == true) {
                        window.location.assign("../datos/borrarReceta.php?id="+id+"");
                    } else {
                       
                    }

                }
            </script>
	</body>
</html>