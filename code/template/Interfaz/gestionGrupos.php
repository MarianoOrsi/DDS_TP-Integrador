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

			function createGroup(idUsuario) {
				var nombre = document.getElementById("Nombre").value;

				if(nombre == ""){
					alert("Debe Ingresar un Nombre para el grupo a crear");
				}
				else{
					window.location.href = "../datos/abmGrupos.php?method=A&IdUser=" + idUsuario + "&IdGroup=0&Name=" + nombre;
				}
			}

			function deleteGroup() {
				var id = document.getElementById("idGrupo").value;

				if(id == ""){
					alert("Debe seleccionar un grupo para poder borrarlo");
				}
				else{
					window.location.href = "../datos/abmGrupos.php?method=B&IdGroup=" + id + "&IdUser=0&Name=_";	
				}
			}

			function modifyGroup() {
				var id = document.getElementById("idGrupo").value;
				var name = document.getElementById("Nombre").value;

				if(id == ""){
					alert("Debe seleccionar un grupo para modificarlo");
				}
				else{
					if(name == ""){
						alert("El nombre del grupo no puede estar vacio");	
					}
					else{
						window.location.href = "../datos/abmGrupos.php?method=M&IdGroup=" + id + "&Name=" + name + "&IdUser=0";
					}
				}
			}

			function habilitarInvitaciones(){
				
				var idGrupo = document.getElementById("idGrupo").value;
				var nombreGrupo = document.getElementById("Nombre").value;

				if(idGrupo != ""){
					window.location.href = "Interfaz_AgregarAmigo.php?IdGrupo=" + idGrupo + "&NombreGrupo=" + nombreGrupo;
				}
				else{
					alert("Debe seleccionar el grupo para agregar amigos");
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
					<!--<div id="column1" style="float:left; margin:0; width:33%;">-->
					<h3>Mis Grupos</h3>
						<table id="groupsTable" border="1" cellspacing="3">
							<tr>
								<TD><b>&nbsp;ID&nbsp;</b></TD>
								<TD><b>&nbsp;GRUPO&nbsp;</b></TD>
								<TD><b>&nbsp;FECHA CREACION&nbsp;</b></TD>
								<TD></TD
							</tr>

							<?php
							include("../Negocio/capaNegocio.php");
							/*include("clases/Grupo.php");*/

							$logica = new logicaDeNegocio();

							$arrayGrupos = $logica->getGruposDeUsuario($_SESSION["idUsuario"]);

							foreach($arrayGrupos as $grupo) {
							    echo "<TR onclick= \"readValuesGroup(this)\">";
								echo "<TD>" . $grupo->getIdGrupo() . "</TD>";
								echo "<TD>" . $grupo->getNombreGrupo() . "</TD>";
								echo "<TD>" . $grupo->getFecha() . "</TD>";
								if($logica->esCreadorDeGrupo($grupo->getIdGrupo(),$_SESSION["idUsuario"]) == $_SESSION["idUsuario"])
									echo "<TD><input type=\"button\" name=\"Invitar\" onclick=\"habilitarInvitaciones()\" value=\"Invitar Amigos\" class=\"btn btn-lg\"> </TD>";
								else
									echo "<TD></TD>";
								echo "</TR>";
							}

							?>
						</table>

						<!--<div class="container">-->
						<div  id="botones">
							Id Grupo  
							<input id="idGrupo" type="text" disabled/>
							<br />
							<br />
							Nombre Grupo  
							<input id="Nombre" type="text" />
							<br />
							<br />
							<?php
								echo "<input type=\"button\" name=\"Crear\" onclick=\"createGroup(".$_SESSION["idUsuario"].")\" value=\"Crear\" class=\"btn btn-lg\" />";
							?>
							<input type="button" name="Guardar" onclick="modifyGroup()" value="Guardar" class="btn btn-lg" />
							<input type="button" name="Delete" onclick="deleteGroup()" value="Borrar" class="btn btn-lg" />
						</div>
						<br />

				</div>
		</div>
	

			</section>

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

