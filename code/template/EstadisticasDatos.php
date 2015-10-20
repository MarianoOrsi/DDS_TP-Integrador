<?php

	include("clases/Dificultad.php");
	include("clases/RecetaConsultada.php");
	
	class accesoDatos{

		private $servidorDB;
		private $userDB;
		private $passDB;
		private $nameDB;
		private $connectionDB;

		public function __construct(){
			include("configuracion.php");
			$this->servidorDB = $servidor;
			$this->userDB = $user;
			$this->passDB = $pass;
			$this->nameDB = $dbname;
			$this->connectionDB = mysql_connect($this->servidorDB,$this->userDB,$this->passDB);
		}

		public function getDificultades(){
			mysql_select_db($this->nameDB, $this->connectionDB);
			$consulta = "SELECT * FROM dificultades";

			$result = mysql_query($consulta) or die (mysql_error());

			$arrayDificultades = array();

			while ($row = mysql_fetch_array($result)){

				$dificultad = new Dificultad($row['IdDificultad'],$row['Dificultad']);

				array_push($arrayDificultades, $dificultad);
			}

			return $arrayDificultades;
		}

	    public function selectRecetas($dificultad,$sexo){
			mysql_select_db($this->nameDB, $this->connectionDB);
			$consulta = "SELECT COUNT(idAccion) AS CantConsultas,
                                recetas.Receta AS Receta
                            FROM diseniosistemas.historiales
						   	INNER JOIN usuarios
						   	ON usuarios.IdUsuario = historiales.IdUsuario
						   	INNER JOIN recetas 
						   	ON recetas.IdReceta = historiales.IdReceta
						   	WHERE historiales.IdAccion = '1'";

            if(strcmp($dificultad,""))
            {
            	$consulta = $consulta . " AND recetas.IdDificultad = '" . $dificultad . "'";
            }

			if(strcmp($sexo,""))
            {
            	$consulta = $consulta . " AND usuarios.Sexo = '" . $sexo . "'";
            }
           
          

            $consulta = $consulta . " GROUP BY recetas.idReceta";

			$result = mysql_query($consulta) or die (mysql_error());

			$arrayRecetas = array();

			while ($row = mysql_fetch_array($result)){

				$receta = new RecetaConsultada($row['CantConsultas'],$row['Receta']);

				array_push($arrayRecetas, $receta);
			}

			return $arrayRecetas;
		}

	}
?>