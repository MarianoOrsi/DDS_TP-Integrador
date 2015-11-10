<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>TP Integrador - Grupo 81</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- css -->
		<link href="../css/bootstrap.min.css" rel="stylesheet" />
		<link href="../css/fancybox/jquery.fancybox.css" rel="stylesheet">
		<link href="../css/jcarousel.css" rel="stylesheet" />
		<link href="../css/flexslider.css" rel="stylesheet" />
		<link href="../css/style.css" rel="stylesheet" />
		<link href="../css/grupos.css" rel="stylesheet" />
		<!-- Theme skin -->
		<link href="../skins/default.css" rel="stylesheet" />
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.min.css" />
		<script src="../js/jquery-1.10.2.min.js"></script>	
		<script src="../js/jquery-ui-1.10.3.custom.min.js"></script>

	</head>
	<body>

		<section id="content">
			<div class="container">
				Ingresa el usuario de tu amigo: 
				<input id="amigo" type="text" />
				<br />
				<br />
				<input type="button" name="Invitar" onclick="createGroup(".$_SESSION["idUsuario"].")" value="Crear" class="btn btn-lg" />
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