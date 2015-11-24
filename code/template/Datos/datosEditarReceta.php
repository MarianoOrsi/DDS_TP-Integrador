<?php

$servidor = "localhost";
// todos los strings con los valores para el conector SQL
$user = "root";
$pass = "";
$dbname = "diseniosistemas";
$con = mysql_connect($servidor, $user, $pass);
mysql_select_db($dbname, $con) or die(mysql_error());

$consulta="SELECT * FROM ingredientes;";
$QIngredientes=mysql_query($consulta) or die (mysql_error());

$consulta="SELECT * FROM condimentos;";
$QCondimentos=mysql_query($consulta) or die (mysql_error());

$consulta="SELECT * FROM dificultades;";
$QDificultades=mysql_query($consulta) or die (mysql_error());


$consulta="SELECT * FROM estaciones;";
$QEstacion=mysql_query($consulta) or die (mysql_error());

$consulta="SELECT * FROM piramides;";
$QPiramide=mysql_query($consulta) or die (mysql_error());

$consulta="SELECT * FROM dietas;";
$QDieta=mysql_query($consulta) or die (mysql_error());



/* busco los datos de la receta principal*/

$consultaReceta="SELECT * FROM recetas WHERE IdReceta=".$_GET["id"].";";
$dale=mysql_query($consultaReceta) or die (mysql_error());
$resultadoBusqueda = mysql_fetch_array($dale);

/* busco los condimentos de la receta principal*/

$consultasReceta="SELECT IdCondimento FROM `receta-condimentos` WHERE IdReceta=".$_GET["id"].";";
$gale=mysql_query($consultasReceta) or die (mysql_error());


/* busco los ingredientes de la receta principal*/

$consultaReceta="SELECT IdIngrediente FROM `receta-ingredientes` WHERE IdReceta=".$_GET["id"].";";
$dale=mysql_query($consultaReceta) or die (mysql_error());

/* busco los pasos de una receta */
$consultaReceta="SELECT Descripcion FROM `pasos` WHERE IdReceta=".$_GET["id"].";";
$fale=mysql_query($consultaReceta) or die (mysql_error());

/* busco la estacion de la receta */
$consultaReceta="SELECT IdEstacion FROM `receta-estaciones` WHERE IdReceta=".$_GET["id"].";";
$tale=mysql_query($consultaReceta) or die (mysql_error());








function MostrarIngredientes($id)
{
   global $dale;
    $total=array();
   while($resultadoIngredientes= mysql_fetch_array($dale)){array_push($total,$resultadoIngredientes['0']);}

    $j=0;

   while ($ingrediente = mysql_fetch_array($id, MYSQL_NUM))
    {
        if($j<count($total)){
         if($total[$j]==$ingrediente['0'])
         {
            echo '<div class="checkbox-inline">
			<label><input type="checkbox" name="ingredientesSeleccionados[]" value="' . $ingrediente['0'] . '" checked>' . $ingrediente['1'] . '</label>
		    </div>';

             $j++;


         }
         else{
            echo '<div class="checkbox-inline">
			<label><input type="checkbox" name="ingredientesSeleccionados[]" value="' . $ingrediente['0'] . '">' . $ingrediente['1'] . '</label>
		    </div>';
         }

        } else{
            echo '<div class="checkbox-inline">
			<label><input type="checkbox" name="ingredientesSeleccionados[]" value="' . $ingrediente['0'] . '">' . $ingrediente['1'] . '</label>
		    </div>';
        }
    }



}

function MostrarCondimentos($id)
{
    global $gale;
    $tatal=array();
    while($resultadoIngredientes= mysql_fetch_array($gale)){array_push($tatal,$resultadoIngredientes['0']);}

    $t=0;


        while ($condimento = mysql_fetch_array($id, MYSQL_NUM)) {

            if($t<count($tatal)){
            if ($tatal[$t] == $condimento['0']) {
                echo ' <div class="checkbox-inline">
           <label><input type="checkbox" name="condimentosSeleccionados[]" value="' . $condimento['0'] . '" checked>' . $condimento['1'] . '</label>
           </div>';
               $t++;

            } else {
                echo '<div class="checkbox-inline">
            <label><input type="checkbox" name="condimentosSeleccionados[]" value="' . $condimento['0'] . '">' . $condimento['1'] . '</label>
            </div>';
            }
        } else {
    echo '<div class="checkbox-inline">
            <label><input type="checkbox" name="condimentosSeleccionados[]" value="' . $condimento['0'] . '">' . $condimento['1'] . '</label>
            </div>';
}
}


}

function MostrarDificultades($id)
{
    global $resultadoBusqueda;

    while ($Dificultad = mysql_fetch_array($id, MYSQL_NUM))
    {
        if($resultadoBusqueda['2']==$Dificultad['0']){
        echo '<option value="'.$Dificultad['0'].'" selected>'.$Dificultad['1'].'</option>';
        }
        else{
            echo '<option value="'.$Dificultad['0'].'">'.$Dificultad['1'].'</option>';
        }
    }
}


function MostrarEstacion($id)
{
    global $tale;
   $sacado=mysql_fetch_array($tale, MYSQL_NUM);

    while ($Estacion = mysql_fetch_array($id, MYSQL_NUM))
    {
        if($sacado['0']==$Estacion['0']){
            echo '<option value="'.$Estacion['0'].'">'.$Estacion['1'].'</option>';
        }
        else{
            echo '<option value="'.$Estacion['0'].'">'.$Estacion['1'].'</option>';
        }

    }
}

function MostrarPiramide($id)
{
    global $resultadoBusqueda;
    while ($Piramide = mysql_fetch_array($id, MYSQL_NUM))
    {
        if($resultadoBusqueda['4']==$Piramide['0']){
        echo '<option value="'.$Piramide['0'].'" selected>'.$Piramide['1'].'</option>';
        }
        else{
            echo '<option value="'.$Piramide['0'].'">'.$Piramide['1'].'</option>';
        }
    }
}
function MostrarDieta($id)
{
    global $resultadoBusqueda;
    while ($Dieta = mysql_fetch_array($id, MYSQL_NUM))
    {
        if($resultadoBusqueda['5']==$Dieta['0']) {
            echo '<option value="' . $Dieta['0'] . '" selected>' . $Dieta['1'] . '</option>';
        }
        else{
            echo '<option value="' . $Dieta['0'] . '">' . $Dieta['1'] . '</option>';
        }
    }
}

function MostrarPasos()
{
    global $fale;
    $i = 1;
    while ($resultadoPasos = mysql_fetch_array($fale)) {
        echo '<label > Paso ' . $i . ' </label >

								<input type = "textarea" name = "paso' . $i . '" value="'.$resultadoPasos['0'].'"rows = "4" class="form-control" />
								<br /><br />';
        $i++;
    }
}


function MostrarNombre(){
global $resultadoBusqueda;
    echo $resultadoBusqueda['1'];
}




?>