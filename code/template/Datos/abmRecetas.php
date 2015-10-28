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
        $servidor = "localhost";    
        $user = "root";
        $pass = "";
        $dbname = "diseniosistemas";
        $con = mysql_connect($servidor,$user,$pass);
        mysql_select_db($dbname,$con);
        $return = mysql_query("INSERT INTO puntuaciones(IdReceta,IdUsuario,Fecha,Puntuacion) VALUES ('".$id."', 1, now(),".$puntos.")",$con) or die (mysql_error());
   }

?>