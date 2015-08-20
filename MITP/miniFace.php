<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>¡Bienvenido a miniFace! (re-original)</title>
<link href="css/estilos.css" rel="stylesheet" type="text/css" /> <!-- le digo donde esta el .css a adjuntar -->
<link rel="shortcut icon" href="css/images/favicon.ico">
</head>
<body id="fondoLogin">

<div style="margin-top:200px">
<table align="center" id="tablaLogin" >
  <form id="form1" name="form1" method="post" action="loginFace.php">
    <tr>
      <td valign="middle">Usuario: </td>
      <td><label>
        <input type="text" name="mail" id="mail" />
      </label></td>
    </tr>
    <tr>
      <td>Constrase&ntilde;a: </td>
      <td><label>
        <input type="password" name="pass" id="pass" />
      </label></td>
    </tr>
    <tr>
      <td></td>
      <td>
        
          <label>
            <input type="submit" name="enviar" id="enviar" value="Ingresar!" />
          </label>
          <a href="registrarme.php"> No tengo cuenta </a>
      </td>
    </tr>
  </form>
    <tr>
  	<td colspan="2">
<?php if(isset($_GET["error"])&&$_GET["error"]==1){ // SI esta setteado el valor, se activa ECHO
	echo "Usuario o contraseña incorrectos!";
	} 
	
	if(isset($_GET["logout"]) && $_GET["logout"]==1){
		unset($_SESSION["mail"]); 
		unset($_SESSION["nom"]); 
		unset($_SESSION["id"]); 
		
		}	?>
    </td>  
  </tr>
</table>
</div>
</body>
</html>