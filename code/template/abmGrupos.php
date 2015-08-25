<?php
    if(isset($_GET["method"]) && isset($_GET["Id"])){
     
         $method = $_GET["method"];
         $parameterId = $_GET["Id"];

         if(strcmp($method, "A") == 0){
            createGroup($parameterId);   
         }
         else if (strcmp($method, "B") == 0){
             deleteGroup($parameterId);
         }
         else if(strcmp($method, "M") == 0){
            $parameterName = $_GET["Name"];
            modifyGroup($parameterId,$parameterName);
         }

         header("Location: gestionGrupos.php");
    }




    function createGroup($name){
        $servidor = "localhost";    
        $user = "root";
        $pass = "";
        $dbname = "diseniosistemas";
        $con = mysql_connect($servidor,$user,$pass);
     
        mysql_select_db($dbname,$con);
        $return = mysql_query("INSERT INTO grupos(Nombre,IdUsuarioCreador,Fecha) VALUES ('".$name."', 1, now())",$con) or die (mysql_error());
    }

    function deleteGroup($id){
        $servidor = "localhost";    
        $user = "root";
        $pass = "";
        $dbname = "diseniosistemas";
        $con = mysql_connect($servidor,$user,$pass);
     
        mysql_select_db($dbname,$con);
        $return = mysql_query("DELETE FROM grupos WHERE IdGrupo = '".$id."' ",$con) or die (mysql_error());
    }

    function modifyGroup($id,$name){
        $servidor = "localhost";    
        $user = "root";
        $pass = "";
        $dbname = "diseniosistemas";
        $con = mysql_connect($servidor,$user,$pass);
     
        mysql_select_db($dbname,$con);
        $return = mysql_query("UPDATE grupos SET Nombre='".$name."' WHERE IdGrupo='".$id."'",$con) or die (mysql_error());
    }
?>