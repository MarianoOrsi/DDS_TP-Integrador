<?php session_start();

//include("../datos/capaDatos.php");
//include("../datos/todasLasRecetas.php");

$servidor = "localhost";
// todos los strings con los valores para el conector SQL
$user = "root";
$pass = "";
$dbname = "diseniosistemas";
$con = mysql_connect($servidor, $user, $pass);
mysql_select_db($dbname, $con) or die(mysql_error());

$filtro="SELECT R.Receta, D.Dificultad, R.Calorias, R.IdReceta FROM dificultades D, recetas R WHERE D.IdDificultad=R.IdDificultad";
$Qid=mysql_query($filtro) or die (mysql_error());

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

function MostrarDificultades()
{
	$consulta="SELECT * FROM dificultades;";
	$QDificultades=mysql_query($consulta) or die (mysql_error());

    while ($Dificultad = mysql_fetch_array($QDificultades, MYSQL_NUM))
    {
        echo '<option value="'.$Dificultad['0'].'">'.$Dificultad['1'].'</option>';
    }
}

function MostrarEstacion()
{
	$consulta="SELECT * FROM estaciones;";
	$QEstacioness=mysql_query($consulta) or die (mysql_error());

    while ($Estacion = mysql_fetch_array($QEstacioness, MYSQL_NUM))
    {
        echo '<option value="'.$Estacion['0'].'">'.$Estacion['1'].'</option>';
    }
}

function MostrarPiramide()
{
	
	$consulta="SELECT IdPiramide, Sector FROM piramides;";
	$QPiramide=mysql_query($consulta) or die (mysql_error());

    while ($Piramide = mysql_fetch_array($QPiramide, MYSQL_NUM))
    {
        echo '<option value="'.$Piramide['0'].'">'.$Piramide['1'].'</option>';
    }
}

function MostrarTipoDeDieta()
{
	$consulta="SELECT * FROM dietas;";
	$QDietas=mysql_query($consulta) or die (mysql_error());

    while ($Dieta = mysql_fetch_array($QDietas, MYSQL_NUM))
    {
        echo '<option value="'.$Dieta['0'].'">'.$Dieta['1'].'</option>';
    }
}

function MostrarFiltrado()
{

	$filtro="SELECT R.Receta, D.Dificultad, R.Calorias, R.IdReceta, E.IdReceta FROM dificultades D, recetas R, `receta-estaciones` E WHERE E.IdReceta=R.IdReceta AND D.IdDificultad=R.IdDificultad";

    if(isset($_POST["submit"])) 
    {
        if($_POST["Dificultad"] != "")
        {
            $filtro=$filtro." AND R.IdDificultad='".$_POST["Dificultad"]."'";
        }

        if($_POST["Estacion"] != "")
        {
            $filtro=$filtro." AND E.IdReceta=R.IdReceta AND E.IdEstacion='".$_POST["Estacion"]."'";
            
        }

        if($_POST["Piramide"] != "")
        {
            $filtro=$filtro." AND R.IdPiramide='".$_POST["Piramide"]."'";
        }

        if($_POST["TipoDeDieta"] != "")
        {
           $filtro=$filtro." AND R.IdDieta='".$_POST["TipoDeDieta"]."'";
        }

        if($_POST["Buscador"] != "")
        {
           $filtro=$filtro." AND R.Receta LIKE '%".$_POST["Buscador"]."%'";
        }

        $filtro=$filtro.';';

        $Qid=mysql_query($filtro) or die (mysql_error());

        MostarRecetasResumidas($Qid);
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
		<?php include("../include/header.php");?>
			<!-- end header -->


				<section class="callaction">

					<div class="container">
						<div class="row">
								
									<h1>Todas Las Recetas</h1>

			<!-- Elementos de Busqueda -->

							<form action="todasLasRecetas.php" method="post" role="form" class="contactForm">

									<select class="form-group" id="Dificultad" name="Dificultad">
				                   	    <option value="">Dificultad</option>
				                   	    <?php
				                   	    	MostrarDificultades();
				                   	    ?>
				                    </select>

				                    <select class="form-group" id="Estacion" name="Estacion">
				                   	    <option value="">Estacion</option>
				                   	    <?php
				                   	    	MostrarEstacion();
				                   	    ?>
				                    </select>
				                    
				                    <select class="form-group" id="Piramide" name="Piramide">
				                   	    <option value="">Piramide</option>
				                   	    <?php
				                   	    	MostrarPiramide();
				                   	    ?>
				                    </select>

				                    <select class="form-group" id="TipoDeDieta" name="TipoDeDieta">
				                   	    <option value="">Tipo de dieta</option>
				                   	    <?php
				                   	    	MostrarTipoDeDieta();
				                   	    ?>
				                    </select>

								    <input type="text" class="form-group" placeholder="Nombre de la receta" name="Buscador" id="Buscador">


			<!-- Fin de elementos de Busqueda -->

									<button type="submit" name="submit"  class="btn btn-theme ">Filtrar Recetas</button>

							</form>

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
											//	MostarRecetasResumidas($Qid);

												MostrarFiltrado($Qid);
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