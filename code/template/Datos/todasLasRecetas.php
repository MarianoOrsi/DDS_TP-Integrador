<?php

$servidor = "localhost";
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