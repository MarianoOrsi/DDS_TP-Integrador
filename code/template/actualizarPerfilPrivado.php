<?php session_start();

$servidor = "localhost";    // todos los strings con los valores para el conector SQL
$user = "root";
$pass = "";
$dbname = "diseniosistemas";
$con = mysql_connect($servidor,$user,$pass);
mysql_select_db($dbname,$con) or die(mysql_error());

if(isset($_POST["submit"])){
	
		$consulta = "SELECT * FROM usuarios WHERE idUsuario=" . $_SESSION["idUsuario"] . ";";

		$Qid = mysql_query($consulta) or die(mysql_error());
		$id = mysql_fetch_array($Qid);
		
		$complexion=$id[4];
		if($_POST["complexion"]!='')
		{
			$complexion=sacoIdContextura();
		}
		
		$genero=$id['5'];
		if($_POST["genero"]!='')
		{
			$genero=$_POST["genero"];
		}
		
		$rutina=$id['7'];
		if($_POST["rutina"]!='')
		{
			$rutina=sacoIdRutina();
		}
		
		$edad=$id['8'];
		if($_POST["edad"]!='')
		{
			$edad=$_POST["edad"];
		}
		
		$altura=$id['9'];
		if($_POST["altura"]!='')
		{
			$altura=$_POST["altura"];
		}
		
		$email=$id['12'];
		if($_POST["email"]!='')
		{
			$email=$_POST["email"];
		}
		
		$preexistente=$id['10'];
		if($_POST["condPre"]!='')
		{
			$preexistente=sacoIdPreexistente();
		}
		
		$dieta=$id['11'];
		if($_POST["dieta"]!='')
		{
			$dieta=sacoIdDieta();
		}
		
		$idUser=$id['0'];
		$usuario=$id['1'];
		$contrasenia=$id['2'];
		

		
		
		$consultaParaMandar="UPDATE usuarios SET idContextura='".$complexion."',Sexo='".$genero."',IdRutina='".$rutina."',Edad='".$edad."',Altura='".$altura."',Email='".$email."',idPreexistente='".$preexistente."',idDieta='".$dieta."' WHERE idUsuario='".$idUser."';";
		
		$resultado = mysql_query($consultaParaMandar) or die (mysql_error());
		
				
		 
		header("location: index.php"); // para poner el header, no hay que tener NADA 
												//  de HTML o ning�n ECHO en el c�digo
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

function sacoIdPreexistente()
{

	$consulta="SELECT idPreexistente FROM preexistentes WHERE Nombre='".$_POST["condPre"]."'";
	$Qid=mysql_query($consulta) or die (mysql_error());
	$id= mysql_fetch_array($Qid);
	
	
    return $id['0'];
}

function sacoIdDieta()
{

	$consulta="SELECT idDieta FROM dietas WHERE Nombre='".$_POST["dieta"]."'";
	$Qid=mysql_query($consulta) or die (mysql_error());
	$id= mysql_fetch_array($Qid);
	
	
    return $id['0'];
}

 ?>
