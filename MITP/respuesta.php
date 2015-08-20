<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>


<?php
$servidor = "localhost";
$user = "root";
$pass = "";
$dbname = "minifacebook";
$con = mysql_connect($servidor,$user,$pass);
mysql_select_db($dbname,$con) or die(mysql_error());
 
$consulta="SELECT * FROM usuarios WHERE nombre LIKE'%".$_POST["var"]."%'"; 
$resultado = mysql_query($consulta);
while($fila=mysql_fetch_array($resultado))
{
	
	echo "<div class='divs' id='".$fila["mail"]."' >".$fila["nombre"]."</div>";
	
}

?>

</body>
</html>