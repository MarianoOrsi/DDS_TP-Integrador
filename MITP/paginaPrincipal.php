<?php session_start(); 
$servidor="localhost";
$username="root";
$pass=""; 
$dbname="minifacebook";
$conn = mysql_connect($servidor,$username,$pass);
mysql_select_db($dbname,$conn) or die(mysql_error());
 if(!isset ($_SESSION["mail"])){header("Location: miniFace.php");} // seguridad para no entrar sin un usuario
?>
<?php
if(isset($_POST['enviar'])){ //enviar post
	$consul="INSERT INTO post(nomusu, texto, hora, idusu) VALUES ('".$_SESSION["mail"]."','".$_POST["texto"]."','". date("H:i:s d-m-Y",time())."','".$_SESSION["id"]."');";
	mysql_query($consul) or die(mysql_error());
	header("location: paginaPrincipal.php");
	}
	
if(isset($_GET["eAmistad"]))//eliminar amigos
{
$eAmistad="DELETE FROM amistades WHERE userid1='".$_SESSION["id"]."' AND userid2='".$_GET["eAmistad"]."'";
mysql_query($eAmistad) or die (mysql_error());
header("location: paginaPrincipal.php");
}

if (isset($_GET["nAmigo"])) // agregar amigos
{
	$nAmigo= "INSERT INTO amistades (id, userid1, userid2) VALUES (NULL,'".$_SESSION["id"]."','".$_GET["nAmigo"]."');";
	mysql_query($nAmigo) or die (mysql_error());
	header("location: paginaPrincipal.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inicio - miniFace</title>
<link rel="shortcut icon" href="css/images/favicon.ico">
<link href="css/estilos.css" rel="stylesheet" type="text/css" /> <!-- le digo donde esta el .css a adjuntar --> 

</head>
<body onload="initialize()">
<div align="center" id="contenedor">	
    <div id="encabezado">
 	   <?php include("include/header.php")?>
    </div>
    <div id="izquierdo"><?php include("include/izquierdo.php")?> </div>

    <div id="principal">  
      <div id="comentarios">
  		<center>
        <b>¿Qué le querés decir al mundo?</b>
        <form method="post" name="form1" action="paginaPrincipal.php">
		<textarea  id="texto" name="texto" cols="50%" rows="9"></textarea></br>
		<input type="submit" name="enviar" id="enviar" value="Enviar!"/>
		</form>
        </center>
    </div>
  		<?php
			$consulta="SELECT * FROM post WHERE idusu in(SELECT userid1 FROM amistades WHERE userid2='".$_SESSION["id"]."') 
			or idusu in (SELECT userid2 from amistades WHERE userid1='".$_SESSION["id"]."') or idusu='".$_SESSION["id"]."';"; // mostrar comentarios
			$result=mysql_query($consulta) or die (mysql_error());
			while ($row=mysql_fetch_array($result))
			{
				if(empty($row)){echo ":(";}
				echo '<table>';
				echo '<tr><td><b><a href="muro.php?nomusu='.$row["nomusu"].'">'.$row["nomusu"].':</a></b></td>';
				echo '<td>'.$row["texto"].'</td>';
				echo '<td>  -- Escrito a las '.$row["hora"].'</td></tr>';
				echo '</table>';
			}
			
		?>
	</div>
	<div id="derecho"><?php include("include/derecho.php")?></div>
	<div id="pie">
		<?php include("include/footer.php")?>
	</div>
</div>
</body>
</html>