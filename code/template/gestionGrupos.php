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
		<!-- Theme skin -->
		<link href="skins/default.css" rel="stylesheet" />

		<script type = "text/javascript">
			function readValuesGroup(x) {
				var content = x.children.length;
				for (var i = 0; i < content; i++) {
					document.getElementById("idGrupo").value = x.cells[0].innerHTML;
					document.getElementById("Nombre").value = x.cells[1].innerHTML;
				}
				changeColourGroup(x);
			}

			function changeColourGroup(x) {
				var t = document.getElementById("groupsTable").getElementsByTagName("tbody")[0];
				for (var i = 0; i < (t.children.length); i++) {
					t.rows[i].style.backgroundColor = "#C8D1C8";
					x.style.backgroundColor = "#E4FEDD";
				}
			}

			function createGroup() {
				var nombre = document.getElementById("Nombre").value;
				window.location.href = "abmGrupos.php?method=A&Id=" + nombre;
			}

			function deleteGroup() {
				var id = document.getElementById("idGrupo").value;
				window.location.href = "abmGrupos.php?method=B&Id=" + id;
			}

			function modifyGroup() {
				var id = document.getElementById("idGrupo").value;
				var name = document.getElementById("Nombre").value;

				window.location.href = "abmGrupos.php?method=M&Id=" + id + "&Name=" + name;
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
			<header>
				<div class="navbar navbar-default navbar-static-top">
					<div class="container">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="index.php"><span>Que</span> comemos?</a>
						</div>
						<div class="navbar-collapse collapse ">
							<ul class="nav navbar-nav">
								<li>
									<a href="index.php">Inicio</a>
								</li>
								<li>
									<a href="login.html">Mis Recetas</a>
								</li>
								<li>
									<a href="gestionGrupos.php">Mis Grupos</a>
								</li>
								<li>
									<a href="login.html">Estadisticas y Reportes</a>
								</li>
								<li>
									<a href="perfil.php">Perfil</a>
								</li>
								<li>
									<a href="index.php?logout=1">Salir</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</header>
			<!-- end header -->
			<section id="content">
				<div class="container">
					<div id="column1" style="float:left; margin:0; width:33%;">
						<table id="groupsTable" border="1">
							<tr>
								<TD><b>&nbsp;ID&nbsp;</b></TD>
								<TD><b>&nbsp;GRUPO&nbsp;</b></TD>
								<TD><b>&nbsp;FECHA CREACION&nbsp;</b></TD>
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
								echo "</TR>";
							}
							//liberamos memoria que ocupa la consulta...
							mysql_free_result($result);

							//cerramos la conexión con el motor de BD
							mysql_close($con);
							?>
						</table>
					</div>
					<div id="column2" style="float:left; margin:0; width:33%;">
						<input id="idGrupo" type="text" disabled/>
						<input id="Nombre" type="text" />
						<input type="button" name="Crear" onclick="createGroup()" value="Crear">
						<input type="button" name="Guardar" onclick="modifyGroup()" value="Guardar">
						<input type="button" name="Delete" onclick="deleteGroup()" value="Borrar">
					</div>
				</div>

			</section>

			<footer>
				<div class="container">
					<div class="row">
						<div class="col-lg-3">
							<div class="widget">
								<h5 class="widgetheading">Integrantes</h5>
								<ul class="link-list">
									<li>
										Jonatan Boianover
									</li>
									<li>
										Maximiliano Cantarell
									</li>
									<li>
										Santiago H. Garcia
									</li>
									<li>
										Lucas Mangano
									</li>
									<li>
										Mariano Orsi
									</li>
									<li>
										Leandro Wagner
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div id="sub-footer">
					<div class="container">
						<div class="row">
							<div class="col-lg-6">
								<div class="copyright">
									<p>
										<span>&copy; UTN FRBA - Diseño de Sistemas - Curso K3152</span>
									</p>
								</div>
							</div>
							<div class="col-lg-6">
								<ul class="social-network">
									<li>
										<a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
									</li>
									<li>
										<a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
									</li>
									<li>
										<a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin"></i></a>
									</li>
									<li>
										<a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a>
									</li>
									<li>
										<a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus"></i></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</footer>
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

