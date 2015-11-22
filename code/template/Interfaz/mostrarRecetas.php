<?php session_start();

$servidor = "localhost";
// todos los strings con los valores para el conector SQL
$user = "root";
$pass = "";
$dbname = "diseniosistemas";
$con = mysql_connect($servidor, $user, $pass);
mysql_select_db($dbname, $con) or die(mysql_error());

$consulta="SELECT Receta,IdDificultad,Calorias FROM recetas WHERE idUsuario=".$_SESSION["idUsuario"].";";
$Qid=mysql_query($consulta) or die (mysql_error());
$id= mysql_fetch_array($Qid);

function DemeNombreDificultad($id)
{

	$consulta="SELECT Dificultad FROM dificultades WHERE IdDificultad='".$id."'";
	$Qid=mysql_query($consulta) or die (mysql_error());
	$id= mysql_fetch_array($Qid);
	
	
    return $id['0'];
}

function DameRecetasResumida($recetaSql	)
{
	$recetaHtml='
	<tr>
		<td>'.$recetaSql['0'].'</td>
		<td>'.DemeNombreDificultad($recetaSql['1']).'</td>
		<td>'.$recetaSql['2'].'</td>
		<td><input type="button" value="Editar" class="btn btn-lg"/></td>
		<td><a href="../index.php" style="text-decoration: none !important" class="fa fa-trash-o fa-3x"></a></td>
	</tr>';
	
    return $recetaHtml;
}

function MostarRecetasResumidas($id)
{
		echo count($id);
		
	for ($i = 0; $i < (count($id)/3) ; $i++) 
	{
		$pos=$i*3;
		$receta['0']=$id[$pos];
		$pos=$i*3+1;
		$receta['1']=$id[$pos];
		$pos=$i*3+2;
		$receta['2']=$id[$pos];

    	echo DameRecetasResumida($receta);
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

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

	</head>
	<body>
		<div id="wrapper">
				<!-- start header -->
		<?php include("../include/header.php")?>
			<!-- end header -->


				<section class="callaction">

					<div class="container">
						<div class="row">
							
								
									<h1>Mis Recetas</h1>
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
														MostarRecetasResumidas($id);
													?>
													
													</tbody>
													</table>
													<div class="container aligncenter">
													<a href="gestionRecetas.php" class="btn btn-theme" align="center">Puntuar</a>
									
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