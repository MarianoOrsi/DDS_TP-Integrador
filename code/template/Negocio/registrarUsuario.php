<?php session_start();


include("../datos/capaDatos.php");

if(isset($_POST["submit"])){

	$condicion=yaExiste();

	if ($condicion)
	{
		header("location: ../interfaz/registrarme.html"); 
	}
	else
	{
		$id= idUsuarioAnterior();
		
		$userObj = new Usuario(0,$_POST["usuario"], $_POST["contrasenia"], $_POST["genero"][0], $_POST["altura"], $_POST["dieta"],1, $_POST["rutina"], $_POST["complexion"], $_POST["condPre"], $_POST["email"], $_POST["edad"]);
		
	
		$datosObj = new accesoDatos();
		$datosObj->RegistrarUsuario($userObj);
		//ACA SERIA LA CAPA LOGICA O DE NEGOCIO, QUE LE PASA LOS DATOS A LA CAPA DE DATOS Y ESTA PERSISTE AL USUARIO.
	
		$_SESSION["idUsuario"]=($id +1); // ya que me devuelve un array, elijo la primera posición
		header("location: ../index.php"); // para poner el header, no hay que tener NADA 					
		   	  							//  de HTML o ningún ECHO en el código
	}
		
}


function idUsuarioAnterior(){
 
	$conexion = mysql_connect("localhost","root","");
	mysql_select_db("diseniosistemas", $conexion);
 
 
    $QultimaReceta="SELECT  idUsuario FROM usuarios ORDER BY idUsuario DESC LIMIT 1";
    $pepe=mysql_query($QultimaReceta) or die (mysql_error());
    $p=mysql_fetch_row($pepe);
	return $p['0'];
}

function yaExiste(){
 
	$conexion = mysql_connect("localhost","root","");
	mysql_select_db("diseniosistemas", $conexion);
 
    $QultimaReceta="SELECT Usuario FROM usuarios WHERE Usuario=\"".$_POST["usuario"]."\";";

    $pepe=mysql_query($QultimaReceta) or die (mysql_error());
    $p=mysql_fetch_row($pepe);


    if ($pepe)
    {
    	return TRUE;
    }


	return FALSE;
}


 ?>
