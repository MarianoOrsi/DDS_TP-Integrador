<?php
        
    $servidor = "localhost";    
    $user = "root";
    $pass = "";
    $dbname = "diseniosistemas";
    $con = mysql_connect($servidor,$user,$pass);

    include("capaNegocio.php");

    if(isset($_GET['Usuario'])){
        $result = mysql_query("call sp_BuscarUsuario_PorNombre('%".$_GET['Usuario']."%'");  
        $data = array();
        while ($row = mysql_fetch_array($result)) {
            array_push($data, $row['Usuario']);    
        }   
        echo json_encode($data);
    }

//TODO PARA ABM DE GRUPOS
    if(isset($_GET["method"]) && isset($_GET["IdUser"]) && isset($_GET["Name"]) && isset($_GET["IdGroup"])){
     
         $method = $_GET["method"];
         $parameterIdUser = $_GET["IdUser"];
         $parameterName = $_GET["Name"];
         $parameterIdGrupo = $_GET["IdGroup"];

         if(strcmp($method, "A") == 0){
            createGroup($parameterIdUser,$parameterName);   
         }
         else if (strcmp($method, "B") == 0){
             deleteGroup($parameterIdGrupo);
         }
         else if(strcmp($method, "M") == 0){
            modifyGroup($parameterIdGrupo,$parameterName);
         }

         header("Location: gestionGrupos.php");
    }

//TODO PARA ALTA Y BAJA DE INVITADOS AL GRUPO
    if(isset($_GET["method"]) && isset($_GET["IdGrupo"]) && isset($_GET["User"])){

        $method = $_GET["method"];
        $parameterIdGroup = $_GET["IdGrupo"];
        $parameterIdUser = $_GET["User"];

         if(strcmp($method, "ADD") == 0){
            addToGroup($parameterIdGroup, $parameterIdUser);   
         }
         else if (strcmp($method, "DEL") == 0){
             deleteFromGroup($parameterIdGroup, $parameterIdUser);
         }

         header("Location: gestionGrupos.php?IdGrupo=".$parameterIdGroup."");
    }

    function createGroup($idUsuario, $name){
        $servidor = "localhost";    
        $user = "root";
        $pass = "";
        $dbname = "diseniosistemas";
        $con = mysql_connect($servidor,$user,$pass);
     
        mysql_select_db($dbname,$con);
        $return = mysql_query("INSERT INTO grupos(Nombre,IdUsuarioCreador,Fecha) VALUES ('".$name."',".$idUsuario.", now())",$con) or die (mysql_error());
        $return2 = mysql_query("INSERT INTO  `usuario-grupos` (IdGrupo,IdUsuario) VALUES ((SELECT IdGrupo from grupos order by IdGrupo desc LIMIT 1),".$idUsuario.")",$con) or die (mysql_error());
    }

    function deleteGroup($idGrupo){
        $servidor = "localhost";    
        $user = "root";
        $pass = "";
        $dbname = "diseniosistemas";
        $con = mysql_connect($servidor,$user,$pass);
     
        mysql_select_db($dbname,$con);
        $return = mysql_query("DELETE FROM grupos WHERE IdGrupo = ".$idGrupo."",$con) or die (mysql_error());
    }

    function modifyGroup($idGroup,$newName){
        $servidor = "localhost";    
        $user = "root";
        $pass = "";
        $dbname = "diseniosistemas";
        $con = mysql_connect($servidor,$user,$pass);
     
        mysql_select_db($dbname,$con);
        $return = mysql_query("UPDATE grupos SET Nombre='".$newName."' WHERE IdGrupo='".$idGroup."'",$con) or die (mysql_error());
    }

    function addToGroup($idGroup, $idUser){

        $servidor = "localhost";    
        $user = "root";
        $pass = "";
        $dbname = "diseniosistemas";
        $con = mysql_connect($servidor,$user,$pass);
     
        mysql_select_db($dbname,$con);
        $return = mysql_query("INSERT INTO `usuario-grupos` (IdGrupo,IdUsuario) VALUES (" .$idGroup.",(SELECT IdUsuario from usuarios where Usuario = '".$idUser."'))",$con) or die (mysql_error());
    }

    function deleteFromGroup($idGroup, $idUser){
        $servidor = "localhost";    
        $user = "root";
        $pass = "";
        $dbname = "diseniosistemas";
        $con = mysql_connect($servidor,$user,$pass);
     
        mysql_select_db($dbname,$con);
        $return = mysql_query("DELETE FROM `usuario-grupos` WHERE IdUsuario = ".$idUser." AND IdGrupo =".$idGroup."",$con) or die (mysql_error());
    }
?>