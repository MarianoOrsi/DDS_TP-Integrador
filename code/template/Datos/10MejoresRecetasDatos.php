

<?php
    include("./clases/Usuario.php");
    include("./clases/Receta.php");
class accesoDatos{

		private $servidorDB;
		private $userDB;
		private $passDB;
		private $nameDB;
		private $connectionDB;

		public function __construct(){
			include("./configuracion.php");
			$this->servidorDB = $servidor;
			$this->userDB = $user;
			$this->passDB = $pass;
			$this->nameDB = $dbname;
			$this->connectionDB = mysql_connect($this->servidorDB,$this->userDB,$this->passDB);
		}


		public function GetRecetasXAccion($IdUsuario, $IdAccion){

			mysql_select_db($this->nameDB, $this->connectionDB);

			$consulta = "SELECT historiales.IdReceta, recetas.Receta 
						FROM `historiales`
						INNER JOIN recetas 
						ON historiales.IdReceta = recetas.IdReceta
						WHERE  historiales.IdAccion = " . $IdAccion . " AND
						       historiales.IdUsuario = " . $IdUsuario;
			
	     	$result = mysql_query($consulta) or die (mysql_error());

			$arrayRecetas = array();

			while ($row = mysql_fetch_array($result)){

				$receta  = new Receta($row["IdReceta"],$row["Receta"],"","","","","","","","","");

				array_push($arrayRecetas, $receta);
			}

			return $arrayRecetas;



	}
	}

?>