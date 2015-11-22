<?php session_start();

include("../datos/capaDatos.php");

$servidor = "localhost";
// todos los strings con los valores para el conector SQL
$user = "root";
$pass = "";
$dbname = "diseniosistemas";
$con = mysql_connect($servidor, $user, $pass);
mysql_select_db($dbname, $con) or die(mysql_error());

function sacoCaloriasIngrediente($id){
    $consulta="SELECT I.Calorias FROM ingredientes I WHERE I.IdIngrediente=".$id."";
    $pepe = mysql_query($consulta) or die (mysql_error());
    while ($sacadoTabla = mysql_fetch_row($pepe)){return $sacadoTabla['0'];}
}

function calcularCalorias($ingredientes)
{
    $total=0;
    for ($i = 0; $i < count($ingredientes); $i++) {
            $total=$total+ sacoCaloriasIngrediente($ingredientes[$i]);
    }
    return $total;
}

if(isset($_POST["submit"])) {

$pasosReceta=[$_POST["paso1"],$_POST["paso2"],$_POST["paso3"],$_POST["paso4"],$_POST["paso5"]];


 $recetaObj = new Receta($_POST["nombreReceta"],$_POST["dificultad"],$_SESSION["idUsuario"],$_POST["estacion"],$_POST["ingredientesSeleccionados"],$_POST["condimentosSeleccionados"],$pasosReceta,calcularCalorias($_POST["ingredientesSeleccionados"]),$_POST["piramide"],$_POST["dieta"]);
   $datosObj = new accesoDatos();
   $datosObj->GuardarReceta($recetaObj);

    $datosObj->GuardarPasos($recetaObj->getPasos());

    $datosObj->GuardarIngredientes($recetaObj->getIngredientes());
    $datosObj->GuardarCondimentos($recetaObj->getCondimentos());

    header("location: ../Interfaz/mostrarRecetas.php");
}

?>