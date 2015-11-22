<?php

$servidor = "localhost";
// todos los strings con los valores para el conector SQL
$user = "root";
$pass = "";
$dbname = "diseniosistemas";
$con = mysql_connect($servidor, $user, $pass);
mysql_select_db($dbname, $con) or die(mysql_error());

$consulta="SELECT * FROM ingredientes;";
$QIngredientes=mysql_query($consulta) or die (mysql_error());

$consulta="SELECT * FROM condimentos;";
$QCondimentos=mysql_query($consulta) or die (mysql_error());

$consulta="SELECT * FROM dificultades;";
$QDificultades=mysql_query($consulta) or die (mysql_error());


$consulta="SELECT * FROM estaciones;";
$QEstacion=mysql_query($consulta) or die (mysql_error());

$consulta="SELECT * FROM piramides;";
$QPiramide=mysql_query($consulta) or die (mysql_error());

$consulta="SELECT * FROM dietas;";
$QDieta=mysql_query($consulta) or die (mysql_error());


function MostrarIngredientes($id)
{
    while ($ingrediente = mysql_fetch_array($id, MYSQL_NUM))
    {
        echo '
		<div class="checkbox-inline">
			<label><input type="checkbox" name="ingredientesSeleccionados[]" value="'.$ingrediente['0'].'">'.$ingrediente['1'].'</label>
		</div>';
    }
}

function MostrarCondimentos($id)
{
    while ($Condimento = mysql_fetch_array($id, MYSQL_NUM))
    {
        echo '
		<div class="checkbox-inline">
			<label><input type="checkbox" name="condimentosSeleccionados[]" value="'.$Condimento['0'].'">'.$Condimento['1'].'</label>
		</div>';
    }
}

function MostrarDificultades($id)
{
    while ($Dificultad = mysql_fetch_array($id, MYSQL_NUM))
    {
        echo '<option value="'.$Dificultad['0'].'">'.$Dificultad['1'].'</option>';
    }
}


function MostrarEstacion($id)
{
    while ($Estacion = mysql_fetch_array($id, MYSQL_NUM))
    {
        echo '<option value="'.$Estacion['0'].'">'.$Estacion['1'].'</option>';
    }
}
function MostrarPiramide($id)
{
    while ($Piramide = mysql_fetch_array($id, MYSQL_NUM))
    {
        echo '<option value="'.$Piramide['0'].'">'.$Piramide['1'].'</option>';
    }
}
function MostrarDieta($id)
{
    while ($Dieta = mysql_fetch_array($id, MYSQL_NUM))
    {
        echo '<option value="'.$Dieta['0'].'">'.$Dieta['1'].'</option>';
    }
}

?>