

<?php
   $file = substr(getcwd(), -8);
	if($file == "template")
		{
		     //include("./clases/Usuario.php");
			 //include("./clases/Receta.php");
			 include("./configuracion.php");      
		}else{
		     include("../clases/Usuario.php");
			 include("../clases/Receta.php");
         	
		}


class accesoDatosRecomendaciones{

		private $servidorDB;
		private $userDB;
		private $passDB;
		private $nameDB;
		private $connectionDB;

		public function __construct(){
		      $file = substr(getcwd(), -8);
	         if($file == "template")
		     { include("./configuracion.php"); }
		     else
		     {include("../configuracion.php"); }
			$this->servidorDB = $servidor;
			$this->userDB = $user;
			$this->passDB = $pass;
			$this->nameDB = $dbname;
			$this->connectionDB = mysql_connect($this->servidorDB,$this->userDB,$this->passDB);
		}

     	public function getUsuario($IdUsuario){

			mysql_select_db($this->nameDB, $this->connectionDB);

			$consulta = "SELECT IdPreexistente
			                FROM usuarios
			                WHERE IdUsuario = " . $IdUsuario;

	     	$result = mysql_query($consulta) or die (mysql_error());

			while ($row = mysql_fetch_array($result)){

				$usuario= new Usuario("","","","","","","","","",
					                  $row["IdPreexistente"],"","");

				return $usuario;
			}

			
		}

		public function GetRecomendacionesXPreferencia($IdPreferencia){

			mysql_select_db($this->nameDB, $this->connectionDB);

			$consulta = "SELECT Descripcion
			                FROM recomendaciones 
			                WHERE IdPreferencia = " . $IdPreferencia;
			
	     	$result = mysql_query($consulta) or die (mysql_error());

			$arrayRecomendaciones = array();

			while ($row = mysql_fetch_array($result)){

				$recomendacion = $row["Descripcion"];

				array_push($recomendacion, $arrayRecomendaciones);
			}

			return $arrayRecomendaciones;
		}

		public function GetRecetasXPreferencia($IdPreferencia){

	        mysql_select_db($this->nameDB, $this->connectionDB);

			$consulta = "SELECT recetas.IdReceta, recetas.Receta FROM recetas
						WHERE recetas.IdReceta NOT IN (
						    
						SELECT recetas.IdReceta
						FROM recetas
						INNER JOIN `receta-ingredientes`
						ON recetas.IdReceta = `receta-ingredientes`.IdReceta
						INNER JOIN `ingrediente-preexistentes`
						ON `receta-ingredientes`.IdIngrediente = `ingrediente-preexistentes`.IdIngrediente
						WHERE `ingrediente-preexistentes`.IdPreexistente = " . $IdPreferencia . " )" ;
     
			$result = mysql_query($consulta) or die (mysql_error());

			$arrayRecetas = array();

			while ($row = mysql_fetch_array($result)){
            
				$Receta = new Receta($row["IdReceta"],$row["Receta"],"","","","","","","","","");

				array_push($arrayRecetas, $Receta);
			}

			return $arrayRecetas;
		}

	}
?>