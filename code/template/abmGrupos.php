<?php

        $servidor = "localhost";    
        $user = "root";
        $pass = "";
        $dbname = "diseniosistemas";
        $con = mysql_connect($servidor,$user,$pass);

//TODO PARA ABM DE GRUPOS
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

//TODO PARA ALTA Y BAJA DE INVITADOS AL GRUPO
    if(isset($_GET["method"]) && isset($_GET["IdGrupo"]) && isset($_GET["IdUser"])){

        $method = $_GET["method"];
        $parameterIdGroup = $_GET["IdGrupo"];
        $parameterIdUser = $_GET["IdUser"];

         if(strcmp($method, "Add") == 0){
            addToGroup($parameterIdGroup, $parameterIdUser);   
         }
         else if (strcmp($method, "Delete") == 0){
             deleteFromGroup($parameterIdGroup, $parameterIdUser);
         }

         header("Location: gestionGrupos.php?IdGrupo=".$parameterIdGroup."");
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

    function addToGroup($idGroup, $idUser){
        mysql_select_db($dbname,$con);
        
        $return = mysql_query("INSERT INTO `usuario-grupos` (IdGrupo,IdUsuario) VALUES (" .$idGroup.",(SELECT IdUsuario from usuarios where Usuario = '".$idUser."'))",$con) or die (mysql_error());
    }
?>