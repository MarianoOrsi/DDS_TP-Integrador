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
		<!-- Theme skin -->
		<link href="../skins/default.css" rel="stylesheet" />

		<script type = "text/javascript">
			function readValuesGroup(x) {
				var content = x.children.length;
				for (var i = 0; i < content; i++) {
					document.getElementById("idReceta").value = x.cells[0].innerHTML;
					document.getElementById("Receta").value = x.cells[1].innerHTML;
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

			function puntuarReceta() {
				var id = document.getElementById("idReceta").value;
				var puntos = document.getElementById("puntos").value;

				window.location.href = "../datos/abmRecetas.php?method=P&Id=" + id + "&Puntos=" + puntos;
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
					<?php include("../include/header.php")?>
			<!-- end header -->

			<section id="content">
				<div class="container">
					<div id="column1" style="float:left; margin:0; width:33%;">
						<table id="groupsTable" border="1">
							<tr>
								<TD><b>&nbsp;ID&nbsp;</b></TD>
								<TD><b>&nbsp;RECETA&nbsp;</b></TD>
								<TD><b>&nbsp;PUNTUACION&nbsp;</b></TD>
							</tr>

							<?php
							$servidor = "localhost";
							$user = "root";
							$pass = "";
							$dbname = "diseniosistemas";
							$con = mysql_connect($servidor, $user, $pass);

							mysql_select_db($dbname, $con);
							$result = mysql_query("SELECT recetas.IdReceta, recetas.Receta, SUM(puntuaciones.Puntuacion) as Puntuacion FROM recetas LEFT OUTER JOIN puntuaciones ON puntuaciones.IdReceta = recetas.IdReceta AND puntuaciones.IdUsuario = '".$_SESSION["idUsuario"]."' GROUP BY recetas.IdReceta", $con);

							while ($row = mysql_fetch_array($result)) {
								echo "<TR onclick= \"readValuesGroup(this)\">";
								echo "<TD>" . $row['IdReceta'] . "</TD>";
								echo "<TD>" . $row['Receta'] . "</TD>";
                                echo "<TD>" . $row['Puntuacion'] . "</TD>";
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
						<input id="idReceta" type="text" disabled/>
						<input id="Receta" type="text"  disabled/>
						<select class="combo" id="puntos" name="genero">
                    		<option value="0">0</option>
                    		<option value="1">1</option>
                    		<option value="2">2</option>
                    		<option value="3">3</option>
                    		<option value="4">4</option>
                    		<option value="5">5</option>
                     	</select>
						<input type="button" name="Puntuar" onclick="puntuarReceta()" value="Puntuar">
				
					</div>
				</div>

			</section>

			<!-- start footer -->
				<?php include("../include/footer.php")?>
			<!-- end footer -->
		</div>
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

