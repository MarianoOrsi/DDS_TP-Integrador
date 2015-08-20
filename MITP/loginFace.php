<?php session_start();?>
<?php
$servidor = "localhost";
$user = "root";
$pass = "";
$dbname = "miniFacebook";
$con = mysql_connect($servidor,$user,$pass);
mysql_select_db($dbname,$con) or die(mysql_error());
 
$consulta="SELECT * FROM usuarios where mail ='".$_POST["mail"]."' AND pass ='".$_POST["pass"]."'"; 

$resultado = mysql_query($consulta);
$fila=mysql_fetch_array($resultado);
if(empty($fila))  // Seria lo mismo poner: count($fila)>0;
{	
	header("location: miniFace.php?error=1");
}
else{
		$_SESSION["mail"]=$fila["mail"];	// crea la sesion para el usuario
		$_SESSION["pass"]=$fila["pass"]; // se agrega la contraseña a la sesion
		$_SESSION["nom"]= $fila["nombre"]; // agrego el nombre para que este mas lindo visualmente que ver solo el mail
		$_SESSION["id"]= $fila["id"]; // id para busquedas
		header("location: paginaPrincipal.php"); // para poner el header, no hay que tener NADA 
												//  de HTML o ningún ECHO en el código
	}
 
 
?>
