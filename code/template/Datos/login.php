<?php
include("../configuracion.php");
$con = mysql_connect($servidor,$user,$pass);
mysql_select_db($dbname,$con) or die(mysql_error());

if(isset($_POST["submit"])){ 

		$consulta="SELECT idUsuario FROM usuarios WHERE Usuario ='".$_POST["user"]."' AND Contrase ='".md5($_POST["pass"],TRUE)."';"; 
		echo $consulta;
		
		$Qid=mysql_query($consulta) or die (mysql_error());
		$id= mysql_fetch_array($Qid);


		if($id)
		{
			session_start();
			$_SESSION["idUsuario"]=$id['0'];
			header("location: http://localhost/index.php");
		}
	 	else
	 	{
			header("location: http://localhost/interfaz/IniciarSesion.php?first");
		}

		
	}
?>
