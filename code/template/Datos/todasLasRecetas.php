<?php

$servidor = "localhost";
$user = "root";
$pass = "";
$dbname = "diseniosistemas";
$con = mysql_connect($servidor, $user, $pass);
mysql_select_db($dbname, $con) or die(mysql_error());



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




?>