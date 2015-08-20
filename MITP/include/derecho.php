<?php
$servidor= "localhost";
$username= "root";
$pass= "";
$dbname= "minifacebook";
$con = mysql_connect($servidor, $username, $pass);
mysql_select_db($dbname, $con) or die (mysql_error());


$consulta="SELECT * FROM usuarios WHERE id IN 
(SELECT userid2 FROM amistades WHERE userid1=".$_SESSION["id"].")
 OR id IN(SELECT userid1 FROM amistades WHERE  userid2=".$_SESSION["id"].");";
$resultado = mysql_query($consulta) or die (mysql_error());

echo '<b>Lista de tus amigos en miniFacebook: </b>';
while ($fila=mysql_fetch_array($resultado))
{
	echo '<li>';
	echo '<ul><a href=muro.php?nomusu='.$fila["mail"].'>'.$fila["nombre"].'</a>';
	if($_SESSION["id"]!=$fila["id"])
	{echo' --<a href=paginaPrincipal.php?eAmistad='.$fila["id"].'>Eliminar amigo</a></ul>';}
	echo '</li>';	
}
//echo $_SERVER['PHP_SELF'];
?>

