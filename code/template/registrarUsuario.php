<?php
$servidor = "localhost";    // todos los strings con los valores para el conector SQL
$user = "root";
$pass = "";
$dbname = "diseñosistemas";
$con = mysql_connect($servidor,$user,$pass);
mysql_select_db($dbname,$con) or die(mysql_error());

if(isset($_POST["submit"])){

		$consulta="INSERT INTO usuarios(idUsuario,Usuario,Contrase,fechaCreacion,idContextura,Sexo,Trabajo,IdRutina,Edad,Altura,IdPreexistente,IdDieta,Email) 
		VALUES (NULL,'".$_POST["usuario"]."','".$_POST["contrasenia"]."',NOW(),".sacoIdContextura().",'".$_POST["genero"]."',NULL,".sacoIdRutina().",'".$_POST["edad"]."','".$_POST["altura"]."',3,4,'".$_POST["email"]."')";          // hago la constulta como un string
		
		
		$resultado = mysql_query($consulta) or die (mysql_error());
		
				
		 
	 $sacarID="SELECT idUsuario FROM usuarios WHERE Usuario='".$_POST["usuario"]."';";
	 $Qid=mysql_query($sacarID) or die (mysql_error());
	 $id= mysql_fetch_array($Qid);
	 
	 session_start();
	 $_SESSION["idUsuario"]= $id['0']; // ya que me devuelve un array, elijo la primera posición
	 echo $_SESSION["idUsuario"];
		header("location: index.php"); // para poner el header, no hay que tener NADA 
												//  de HTML o ningún ECHO en el código
}

function sacoIdContextura()
{

	$consulta="SELECT idContextura FROM contexturas WHERE Nombre='".$_POST["complexion"]."'";
	$Qid=mysql_query($consulta) or die (mysql_error());
	$id= mysql_fetch_array($Qid);
	
	
    return $id['0'];
}

function sacoIdRutina()
{

	$consulta="SELECT idRutina FROM rutinas WHERE Nombre='".$_POST["rutina"]."'";
	$Qid=mysql_query($consulta) or die (mysql_error());
	$id= mysql_fetch_array($Qid);
	
	
    return $id['0'];
}


 ?>
