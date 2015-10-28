<?php
include("../configuracion.php");
$con = mysql_connect($servidor,$user,$pass);
mysql_select_db($dbname,$con) or die(mysql_error());

if(isset($_POST["submit"])){ 

$consulta="SELECT idUsuario FROM usuarios WHERE Usuario ='".$_POST["user"]."' AND Contrase ='".$_POST["pass"]."';"; 
echo $consulta;
 $Qid=mysql_query($consulta) or die (mysql_error());
	 $id= mysql_fetch_array($Qid);
	 
		session_start();
		$_SESSION["idUsuario"]=$id['0'];
		header("location: http://localhost/index.php");
	}
?>
