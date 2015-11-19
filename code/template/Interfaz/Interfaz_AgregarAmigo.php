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
		<link rel="stylesheet" href="../css/jquery-ui-1.10.3.custom.min.css" />
		<script src="../js/jquery-1.10.2.min.js"></script>	
		<script src="../js/jquery-ui-1.10.3.custom.min.js"></script>
		
		<script type = "text/javascript">

			function readValuesGroup(x) {
				var content = x.children.length;
				for (var i = 0; i < content; i++) {
					document.getElementById("idGrupo").value = x.cells[0].innerHTML;
					document.getElementById("Nombre").value = x.cells[1].innerHTML;
					document.getElementById("idGrupoInvitado").value = x.cells[0].innerHTML;
				}
				changeColourGroup(x);
			}

			function changeColourGroup(x) {
				var t = document.getElementById("groupsTable").getElementsByTagName("tbody")[0];
				for (var i = 0; i < (t.children.length); i++) {
					t.rows[i].style.backgroundColor = "#FFFFFF";
					t.rows[i].style.fontWeight = "normal";
					x.style.backgroundColor = "#EFB1AB";
					x.style.fontWeight="bold";
				}
			}

			
			function agregarAmigo(idGrupo){
				
				var usuario = document.getElementById("nombreAmigo").value;

				if(usuario != ""){
					window.location.href = "../datos/abmGrupos.php?method=ADD&User=" + usuario + "&IdGrupo=" + idGrupo;
				}
				else{
					alert("Debe seleccionar un amigo");
				}	
			}

			function eliminarAmigo(idGrupo, idUsuario){

				if(idUsuario != "" && idGrupo != ""){
					window.location.href = "../datos/abmGrupos.php?method=DEL&User=" + idUsuario + "&IdGrupo=" + idGrupo;
				}
				else{
					alert("Debe seleccionar un amigo");
				}	
			}

		</script>

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

	</head>
	<body>
		<div id="wrapper">
				<!-- start header -->
					<?php include("../include/header.php");?>
			<!-- end header -->

			<section id="content">
				<div class="container">
					<h3>Invitar Amigos a "<?php echo $_GET['NombreGrupo'] ?>"</h3>

						<table border="1" cellspacing="3" style="width:30%">
								<tr>
									<TD><b>&nbsp;ID Usuario&nbsp;</b></TD>
									<TD><b>&nbsp;Nombre&nbsp;</b></TD>
									<TD></TD>
								</tr>

								<?php

									include("../Negocio/capaNegocio.php");

									if(isset($_GET["IdGrupo"])){

										$logica = new logicaDeNegocio();

										$arrayUsuariosDeGrupo = $logica->getUsuariosDeGrupo($_GET["IdGrupo"]);

										foreach($arrayUsuariosDeGrupo as $usuario) {
										    echo "<TR>";
											echo "<TD>" . $usuario->getIdUsuario() . "</TD>";
											echo "<TD>" . $usuario->getUsuario() . "</TD>";
											echo "<TD>";
												if($logica->esCreadorDeGrupo($_GET["IdGrupo"],$usuario->getIdUsuario()) != $usuario->getIdUsuario())
													echo "<input type=\"button\" name=\"Invitar\" onclick=\"eliminarAmigo(".$_GET["IdGrupo"].",".$usuario->getIdUsuario().")\" value=\"Eliminar\" class=\"btn btn-lg\">";
											echo "</TD>";
											echo "</TR>";
										}
									}
								?>
							</table>
					
					<input id="nombreAmigo" type="text" placeholder="Ingresar usuario a agregar..." style="width:25%;"/>

					<br />
					<br />

					<?php echo "<input id=\"user\" type=\"button\" name=\"Agregar\" onclick=\"agregarAmigo(".$_GET['IdGrupo'].")\" value=\"Agregar\" class=\"btn btn-lg\" />"; ?>

				</div>
			</section>
		</div>




		<!-- start footer -->
			<?php include("../include/footer.php");?>
		<!-- end footer -->




		<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
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