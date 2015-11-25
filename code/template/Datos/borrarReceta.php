<?php
/**
 * Created by PhpStorm.
 * User: Leandro
 * Date: 24/11/2015
 * Time: 08:59 PM
 */
include("/capaDatos.php");
$datosObj = new accesoDatos();
$datosObj->BorrarReceta($_GET["id"]);
header("location: ../Interfaz/mostrarRecetas.php");










?>