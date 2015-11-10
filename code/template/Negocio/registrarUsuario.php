<?php

//include("clases/Usuario.php");
include("../datos/capaDatos.php");

if(isset($_POST["submit"])){

		
		$userObj = new Usuario(0,$_POST["usuario"], $_POST["contrasenia"], $_POST["genero"], $_POST["altura"], $_POST["dieta"],1, $_POST["rutina"], $_POST["complexion"], $_POST["condPre"], $_POST["email"], $_POST["edad"]);
		$datosObj = new accesoDatos();

		//ACA SERIA LA CAPA LOGICA O DE NEGOCIO, QUE LE PASA LOS DATOS A LA CAPA DE DATOS Y ESTA PERSISTE AL USUARIO.
		$datosObj->RegistrarUsario($userObj);


		/*$consulta="INSERT INTO usuarios(idUsuario,Usuario,Contrase,fechaCreacion,idContextura,Sexo,Trabajo,IdRutina,Edad,Altura,IdPreexistente,IdDieta,Email) 
		VALUES (NULL,'".$_POST["usuario"]."','".$_POST["contrasenia"]."',NOW(),".sacoIdContextura().",'".$_POST["genero"]."',NULL,".sacoIdRutina().",'".$_POST["edad"]."','".$_POST["altura"]."',3,4,'".$_POST["email"]."')";          // hago la constulta como un string
		
		
		$resultado = mysql_query($consulta) or die (mysql_error());
		
				
		 
	 $sacarID="SELECT idUsuario FROM usuarios WHERE Usuario='".$_POST["usuario"]."';";
	 $Qid=mysql_query($sacarID) or die (mysql_error());
	 $id= mysql_fetch_array($Qid);*/
	 
	 //session_start();
	 //$_SESSION["idUsuario"]= $id['0']; // ya que me devuelve un array, elijo la primera posición
	
		header("location: ../index.php"); // para poner el header, no hay que tener NADA 
												//  de HTML o ningún ECHO en el código
}

/*
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
	
	
    return $id['0'];*/
 ?>
