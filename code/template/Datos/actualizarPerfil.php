<?php session_start();

$servidor = "localhost";
// todos los strings con los valores para el conector SQL
$user = "root";
$pass = "";
$dbname = "diseniosistemas";
$con = mysql_connect($servidor, $user, $pass);
mysql_select_db($dbname, $con) or die(mysql_error());

$consulta = "SELECT * FROM usuarios WHERE idUsuario=" . $_SESSION["idUsuario"] . ";";

$Qid = mysql_query($consulta) or die(mysql_error());
$id = mysql_fetch_array($Qid);

function dameNombreComplexion($id) {

	$consulta = "SELECT Nombre FROM contexturas WHERE idContextura='" . $id . "'";
	$Qid = mysql_query($consulta) or die(mysql_error());
	$id = mysql_fetch_array($Qid);

	return $id['0'];
}

function dameNombreCondicionPreexistente($id) {
	$consulta = "SELECT Nombre FROM preexistentes WHERE idPreexistente='" . $id . "'";
	$Qid = mysql_query($consulta) or die(mysql_error());
	$id = mysql_fetch_array($Qid);

	return $id['0'];
}

function dameNombreDieta($id) {
	$consulta = "SELECT Nombre FROM dietas WHERE idDieta='" . $id . "'";
	$Qid = mysql_query($consulta) or die(mysql_error());
	$id = mysql_fetch_array($Qid);

	return $id['0'];
}

function dameNombreRutina($id) {
	$consulta = "SELECT Nombre FROM rutinas WHERE idRutina='" . $id . "'";
	$Qid = mysql_query($consulta) or die(mysql_error());
	$id = mysql_fetch_array($Qid);

	return $id['0'];
}

function dameSexo($idSexo)//Jajajajaa recien medi cuenta del nombre que le puse jajaj
{
	if ($idSexo == 'm') {
		return 'Masculino';
	} else {
		return 'Femenino';
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
				<div class="row mar-bot40">
					
					
				</div>
				<div class="row">
				
					<div class="col-md-8 col-md-offset-2">
						<div class="section-header">
							<h3>Editar Perfil</h3>
						</div>
					
						<div class="cform" id="contact-form">
							<form action="../datos/actualizarPerfilPrivado.php" method="post" role="form" class="contactForm">
							<?php
								echo '<div class="form-group">
								<label>Email</label>
								<input type="email" class="form-control" name="email" placeholder="' . $id['12'] . '" data-rule="email" data-msg="Please enter a valid email" />
								<div class="validation"></div>
								</div>';

								echo '<div class="form-group">
								<label>Sexo</label>
								<select  class="form-control"  name="genero">
								<option value="">' . dameSexo($id['5']) . '</option>
								<option value="masculino">Masculino</option>
								<option value="femenino">Femenino</option>
								</select>
								</div>';

								echo '<div class="form-group">
								<label>Edad</label>
								<input type="text" class="form-control"  name="edad" placeholder="' . $id['8'] . '" />
								</div>';

								echo '<div class="form-group">
								<label>Altura</label>
								<input type="text"  class="form-control" name="altura" placeholder="' . $id['9'] . '" />
								</div>';

								echo '<div class="form-group">
								<label>Complexion</label>
								<select  class="form-control"  name="complexion">
								<option value="">' . dameNombreComplexion($id['4']) . '</option>
								<option value="Peque">Pequeña</option>
								<option value="Mediana">Media</option>
								<option value="Grande">Grande</option>
								</select>
								</div>';

								echo '<div class="form-group">
								<label>Condiciones Preexistentes</label>
								<select  class="form-control"  name="condPre">
								<option value="">' . dameNombreCondicionPreexistente($id['10']) . '</option>
								<option value="diabetes">Diabetes</option>
								<option value="hipertension">Hipertension</option>
								<option value="celiasis">Celiasis</option>
								<option value="ninguna">Ninguna</option>
								</select>
								</div>';

								echo '<div class="form-group">
								<label>Dieta</label>
								<select  class="form-control"  name="dieta">
								<option value="">' . dameNombreDieta($id['11']) . '</option>
								<option value="normal">Normal</option>
								<option value="ovolacto">Ovolactovegetariano</option>
								<option value="vegetariano">Vegetariano</option>
								<option value="vegano">Vegano</option>
								</select>
								</div>';

								echo '<div class="form-group">
								<label>Rutina</label>
								<select c class="form-control"  name="rutina">
								<option value="">' . dameNombreRutina($id['7']) . '</option>
								<option value="Nada">Sedentaria con nada de ejercicio</option>
								<option value="Leve">Sedentaria con algo de ejercicio (-30 min.)</option>
								<option value="Mediano">Sedentaria con ejercicio (+30 min.)</option>
								<option value="Fuerte">Activa sin ejercicio adicional</option>
								<option value="Intensivo">Activa con ejercicio adicional (+30 min.)</option>
								</select>
								</div>';

								echo '<div class="form-group">
								<label>Preferencias</label>
								<input type="text" class="form-control"  name="preferencias" placeholder="Preferencias alimenticias" />
								</div>';
							?>
								<input type="submit" value="Actualizar" name="submit" class="btn btn-theme aligncenter" />
							</form>

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