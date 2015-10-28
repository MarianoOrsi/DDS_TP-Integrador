<?php session_start();

						$servidor = "localhost";    // todos los strings con los valores para el conector SQL
						$user = "root";
						$pass = "";
						$dbname = "diseniosistemas";
						$con = mysql_connect($servidor,$user,$pass);
						mysql_select_db($dbname,$con) or die(mysql_error());
						
						$consulta= "SELECT * FROM usuarios WHERE idUsuario=".$_SESSION["idUsuario"].";";
						
						$Qid=mysql_query($consulta) or die (mysql_error());
  						$id= mysql_fetch_array($Qid);
						
function dameNombreComplexion($id)
{

	$consulta="SELECT Nombre FROM contexturas WHERE idContextura='".$id."'";
	$Qid=mysql_query($consulta) or die (mysql_error());
	$id= mysql_fetch_array($Qid);
	
	
    return $id['0'];
}

function dameNombreCondicionPreexistente($id)
{
	$consulta="SELECT Nombre FROM preexistentes WHERE idPreexistente='".$id."'";
	$Qid=mysql_query($consulta) or die (mysql_error());
	$id= mysql_fetch_array($Qid);
	
	
    return $id['0'];
}

function dameNombreDieta($id)
{
	$consulta="SELECT Nombre FROM dietas WHERE idDieta='".$id."'";
	$Qid=mysql_query($consulta) or die (mysql_error());
	$id= mysql_fetch_array($Qid);
	
	
    return $id['0'];
}

function dameNombreRutina($id)
{
	$consulta="SELECT Nombre FROM rutinas WHERE idRutina='".$id."'";
	$Qid=mysql_query($consulta) or die (mysql_error());
	$id= mysql_fetch_array($Qid);
	
	
    return $id['0'];
}

function damePreferencias($id)
{
	$consulta="call VerPreferencias('".$id."')";
	//print $consulta;
	$Qid=mysql_query($consulta) or die (mysql_error());
	$resultado='';
	while($row=mysql_fetch_row($Qid))
	{
		$resultado=$resultado . $row[3] . '. ';
	}
	
    return $resultado;
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
					<?php 

					echo '<h3>Perfil de '.$id['1'].'</h3>';
					echo '<ul class="list-group">';
				
				      echo '<li class="list-group-item">Mail: '.$id['12'].'</li>';
				      
					  if($id[5]=='m')
					  {
					  	echo '<li class="list-group-item">Sexo: Masculino</li>';
					  }else
					  {
					  	echo '<li class="list-group-item">Sexo: Femenino</li>';
					  }
					  echo '<li class="list-group-item">Edad: '.$id['8'].'</li>';
					  echo '<li class="list-group-item">Altura: '.$id['9'].' cm</li>';
					  echo '<li class="list-group-item">Complexion: '.dameNombreComplexion($id['4']).'</li>';
					  echo '<li class="list-group-item">Condiciones preexistentes: '.dameNombreCondicionPreexistente($id['10']).'</li>';
					  echo '<li class="list-group-item">Dieta: '.dameNombreDieta($id['11']).'</li>';
					  echo '<li class="list-group-item">Rutina: '.dameNombreRutina($id['7']).'</li>';
					  echo '<li class="list-group-item">Preferencia alimenticias: '.damePreferencias($id['0']).'</li>';
						
						
					 ?>
				</ul>
				
				<a href="../datos/actualizarPerfil.php" class="btn btn-theme aligncenter">Actualizar Perfil</a>
				<br/>
				
				</div>
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