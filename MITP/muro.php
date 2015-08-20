<?php session_start() ?>

<?php 
$servidor="localhost";
$username="root";
$pass=""; 
$dbname="minifacebook";
$conn = mysql_connect($servidor,$username,$pass);
mysql_select_db($dbname,$conn) or die(mysql_error());
if(isset($_GET["eliminar"]))
{eliminar($_GET["eliminar"]);}
function eliminar($id){
	$eliminar = 'DELETE FROM post WHERE id='.$id.';';
	$resultado= mysql_query($eliminar) or die (mysql_error());
	header("location: muro.php?nomusu=".$_GET["nomusu"]);
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Muro de <?php echo $_GET["nomusu"]?></title>
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
      <?php if ($_GET["nomusu"] == $_SESSION["mail"])
	  {echo "Bienvenido a tu muro, éstos son tus últimos comentarios:";}
	  else { echo "Bienvenido al muro de ".$_GET["nomusu"].", éstos son sus últimos comentarios:"; }
	  ?>
     </div>
  		<?php
			$consulta="SELECT * FROM post WHERE nomusu ='".$_GET["nomusu"]."';";
			$result= mysql_query($consulta) or die (mysql_error());
				while ($row=mysql_fetch_array($result))
				{
					if(empty($row))
						{	
							if($_GET["nomusu"]== $_SESSION["mail"])
								{echo "Tu muro está vacío, compartí algo!";}
							else{echo "El muro de".$_GET["nomusu"]." está vacío, no subio nada :(";}
						}
				echo '<table>';
				echo '<tr><td>';
					if($_GET["nomusu"]== $_SESSION["mail"])
						{echo 'YO';}
					else {echo $_GET["nomusu"];}
				echo ':</td>';
				echo '<td>'.$row["texto"].'</td>';
				echo '<td>  -- Escrito a las '.$row["hora"].'</td>';
				if($_GET["nomusu"]== $_SESSION["mail"]){
					echo'<td><a href=muro.php?nomusu='.$_GET["nomusu"].'&eliminar='.$row["id"].'>Eliminar</a></td>';
				}
				echo '</tr></table>';
				}	
			//}
		?>
	</div>
	<div id="derecho"><?php include("include/derecho.php")?></div>
	<div id="pie">
		<?php include("include/footer.php")?>
	</div>
</div>
<body>
</body>
</html>