<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>TP Integrador - Grupo 81</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- css -->
		<link href="css/bootstrap.min.css" rel="stylesheet" />
		<link href="css/fancybox/jquery.fancybox.css" rel="stylesheet">
		<link href="css/jcarousel.css" rel="stylesheet" />
		<link href="css/flexslider.css" rel="stylesheet" />
		<link href="css/style.css" rel="stylesheet" />
		<link href="css/grupos.css" rel="stylesheet" />
		<!-- Theme skin -->
		<link href="skins/default.css" rel="stylesheet" />

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

			function createGroup() {
				var nombre = document.getElementById("Nombre").value;

				if(nombre == ""){
					alert("Debe Ingresar un Nombre para el grupo a crear");
				}
				else{
					window.location.href = "abmGrupos.php?method=A&Id=" + nombre;
				}
			}

			function deleteGroup() {
				var id = document.getElementById("idGrupo").value;

				if(id == ""){
					alert("Debe seleccionar un grupo para poder borrarlo");
				}
				else{
					window.location.href = "abmGrupos.php?method=B&Id=" + id;	
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
						window.location.href = "abmGrupos.php?method=M&Id=" + id + "&Name=" + name;
					}
				}
			}

			function habilitarInvitaciones(){
				
				var hiddenValue = document.getElementById("idGrupoInvitado").value;
				
				if(hiddenValue != ""){
					//var usuarioInvitado = document.getElementById("usuarioAmigo");
					//usuarioInvitado.disabled = false;

					window.location.href = "gestionGrupos.php?idGrupo=" + hiddenValue;
				}
				else{
					alert("Debe seleccionar el grupo para gestionar amigos");
				}					
			}

			function invitarAmigo(){
				usuarioInvitado.disabled = true;
				var usuarioInvitado = document.getElementById("usuarioAmigo").value;
				window.location.href = "abmGrupos.php?method=Add&idGrupo=" + hiddenValue + "&IdUser=" + usuarioInvitado;
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
					<?php include("include/header.php");?>
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
							$servidor = "localhost";
							$user = "root";
							$pass = "";
							$dbname = "diseniosistemas";
							$con = mysql_connect($servidor, $user, $pass);

							mysql_select_db($dbname, $con);
							$result = mysql_query("SELECT * FROM grupos", $con);

							while ($row = mysql_fetch_array($result)) {
								echo "<TR onclick= \"readValuesGroup(this)\">";
								echo "<TD>" . $row['IdGrupo'] . "</TD>";
								echo "<TD>" . $row['Nombre'] . "</TD>";
								echo "<TD>" . $row['Fecha'] . "</TD>";
								echo "<TD><input type=\"button\" name=\"Invitar\" onclick=\"habilitarInvitaciones()\" value=\"Invitar Amigos\" class=\"btn btn-lg\"> </TD>";
								echo "</TR>";
							}
							//liberamos memoria que ocupa la consulta...
							mysql_free_result($result);

							//cerramos la conexión con el motor de BD
							mysql_close($con);
							?>
						</table>

						<div id="invitarAmigos">
							<h4>Integrantes del grupo</h4>

								<?php
								
									if(isset($_GET["idGrupo"])){

										$servidor = "localhost";
										$user = "root";
										$pass = "";
										$dbname = "diseniosistemas";
										$con = mysql_connect($servidor, $user, $pass);

										mysql_select_db($dbname, $con);

										$consulta="call UsuariosDeGrupo(".$_GET["idGrupo"].")";
										//$consulta="call UsuariosDeGrupo(7)";
										//print $consulta;
										$Qid=mysql_query($consulta) or die (mysql_error());

										echo "<select name=\"dos\">";
										while($row=mysql_fetch_row($Qid)){
										    echo "<option value=\"".$row[0]."\">".$row[0]."</option>";
										}
										echo '</select>';
									}

									//$result = mysql_query("select distinct usu.Usuario from usuarios usu inner join `usuario-grupos` ug on usu.IdUsuario = ug.IdUsuario where ug.IdGrupo =" .$_GET["idgrupo"]. , $con);

							    ?>
							<h5>Invita a tus Amigos!</h5>
							<input type="hidden" id="idGrupoInvitado" value="" />
							Ingresa el usuario de tu amigo:
							
							<?php
								//if(isset($_GET["idGrupo"])){
								//	echo "<input id=\"usuarioAmigo\" type=\"text\" />";
								//}
								//else{
								//	echo "<input id=\"usuarioAmigo\" type=\"text\" disabled />";
								//}
							?>

							<input id="usuarioAmigo" type="text" />
							<br />
							<br />
							<input type="button" name="Invitar" onclick="invitarAmigo()" value="Invitar" class="btn btn-lg" />
						</div>
					<!--</div>-->
						</div>
	
						
					<div class="container">
						<div  id="botones">
							Id Grupo  
							<input id="idGrupo" type="text" disabled/>
							<br />
							<br />
							Nombre Grupo  
							<input id="Nombre" type="text" />
							<br />
							<br />
							<input type="button" name="Crear" onclick="createGroup()" value="Crear" class="btn btn-lg" />
							<input type="button" name="Guardar" onclick="modifyGroup()" value="Guardar" class="btn btn-lg" />
							<input type="button" name="Delete" onclick="deleteGroup()" value="Borrar" class="btn btn-lg" />
						</div>
					</div>
			

			</section>

			<!-- start footer -->
				<?php include("include/footer.php");?>
			<!-- end footer -->
		</div>
		<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
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

