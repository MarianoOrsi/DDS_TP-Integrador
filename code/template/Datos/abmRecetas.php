<?php
    if(isset($_GET["method"]) && isset($_GET["Id"])){
     
         $method = $_GET["method"];
         $parameterId = $_GET["Id"];

         if(strcmp($method, "P") == 0){
            $parameterPuntos = $_GET["Puntos"];
            puntuarReceta($parameterId,$parameterPuntos);   
         }

         header("Location: ../interfaz/gestionRecetas.php");
    }

   function puntuarReceta($id,$puntos)
   {
        session_start();
        $servidor = "localhost";    
        $user = "root";
        $pass = "";
        $dbname = "diseniosistemas";
        $con = mysql_connect($servidor,$user,$pass);
        mysql_select_db($dbname,$con);
        $return = mysql_query("INSERT INTO puntuaciones(IdReceta,IdUsuario,Fecha,Puntuacion) VALUES ('".$id."', '".$_SESSION["idUsuario"]."', now(),".$puntos.")",$con) or die (mysql_error());
		$return2 = mysql_query("INSERT INTO `historiales` (`IdHistoria`, `IdAccion`, `IdUsuario`, `IdReceta`, `Fecha de Accion`, `Fecha de Utilizacion`) VALUES (NULL, '2', ".$_SESSION["idUsuario"].", ".$id.", now(), now())",$con) or die (mysql_error());
        //LUCAS - PUNTUACIONES DUPLICADAS, 1 HARCODEADO
   }

?>