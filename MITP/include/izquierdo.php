<?php session_start();?>
<?php
$servidor= "localhost";
$username= "root";
$pass= "";
$dbname= "minifacebook";
$con = mysql_connect($servidor, $username, $pass);
mysql_select_db($dbname, $con) or die (mysql_error());

$consulta= "SELECT * FROM usuarios"; 
$resultado = mysql_query($consulta) or die (mysql_error());

//echo $lotengo="SELECT id FROM amistades WHERE userid1='".$_SESSION["id"]."' AND userid2='".$fila["id"]."';";
	//$res=mysql_query($lotengo) or die(mysql_error());
	//$a= mysql_fetch_array($res);
	//echo $a['0'];
	
echo '<b>Lista de todos los amigos en miniFacebook: </b>';
echo '<ul>'."\n";
while ($fila=mysql_fetch_array($resultado))
{
	
	echo '<li>'."\n".$fila["nombre"];
	$lotengo="SELECT id FROM amistades WHERE userid1='".$_SESSION["id"]."' AND userid2='".$fila["id"]."';";
	$res=mysql_query($lotengo) or die(mysql_error());
	$a= mysql_fetch_array($res);
	echo "\n";
		if($_SESSION["id"]!=$fila["id"] && $a['0']== "")
	{echo '--<a href="paginaPrincipal.php?nAmigo='.$fila["id"].'">Agregar amigo</a>';}
	echo '</li>'."\n";	
}
echo '</ul>'."\n";
?>