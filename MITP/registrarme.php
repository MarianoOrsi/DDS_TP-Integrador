<?php session_start();?>
<?php
$servidor = "localhost";    // todos los strings con los valores para el conector SQL
$user = "root";
$pass = "";
$dbname = "miniFacebook";
$con = mysql_connect($servidor,$user,$pass);
mysql_select_db($dbname,$con) or die(mysql_error());

if(isset($_POST["submit"])){
		$consulta="INSERT INTO usuarios(id,nombre,apellido,mail,pass) VALUES (NULL,'".$_POST["nombre"]."','".$_POST["apellido"]."','".$_POST["mail"]."','".$_POST["pass"]."')";          // hago la constulta como un string
		$resultado = mysql_query($consulta);
		
		$_SESSION["mail"]=$_POST["mail"];	// crea la sesion para el usuario
		$_SESSION["pass"]=$_POST["pass"]; // se agrega la contraseña a la sesion
		$_SESSION["nom"]=$_POST["nombre"]; //nombre
		
		 
	 $sacarID="SELECT id FROM usuarios WHERE mail='".$_SESSION["mail"]."';";
	 $Qid=mysql_query($sacarID) or die (mysql_error());
	 $id= mysql_fetch_array($Qid);
	 $_SESSION["id"]= $id['0']; // ya que me devuelve un array, elijo la primera posición
	 
		header("location: paginaPrincipal.php"); // para poner el header, no hay que tener NADA 
												//  de HTML o ningún ECHO en el código
}

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>¡Registrate en miniFace!</title>
<link href="css/estilos.css" rel="stylesheet" type="text/css" /> <!-- le digo donde esta el .css a adjuntar -->
<link rel="shortcut icon" href="css/images/favicon.ico">
</head>

<body id="fondoLogin">
<div style="margin-top:200px">

<table border="0" id="tablaLogin" align="center">
	<form id="registrarme" method="post" action="registrarme.php">
		<tr><td colspan="2"><b>Registrarme en miniFace (re-original!)</b></td></tr>
		<tr><td>Nombre</td><td> <label><input type="text" name="nombre" id="nombre"/> </label></td></tr>
		<tr><td>Apellido</td><td><label> <input type="text" name="apellido" id="apellido"/></label></td></tr>
		<tr><td>Mail</td><td><label> <input type="text" name="mail" id="mail"/></label></td></tr>
		<tr><td>Pass</td><td> <label><input type="password" name="pass" id="pass"/></label></td></tr>
		<tr><td></td><td><input type="submit" value="Registrarme!" name="submit" /></td></tr>
	</form>
</table>
</div>
</body>
</html>
