<?php

	include("../clases/Dificultad.php");
	include("../clases/RecetaConsultada.php");
	
	class accesoDatos{

		private $servidorDB;
		private $userDB;
		private $passDB;
		private $nameDB;
		private $connectionDB;

		public function __construct(){
			include("../configuracion.php");
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

		public function getDietas(){
			mysql_select_db($this->nameDB, $this->connectionDB);
			$consulta = "SELECT * FROM dietas";

			$result = mysql_query($consulta) or die (mysql_error());

			$arrayDietas = array();

			while ($row = mysql_fetch_array($result)){

				$dieta = new Dieta($row['IdDieta'],$row['Nombre']);

				array_push($arrayDietas, $dieta);
			}

			return $arrayDietas;
		}

		public function getRecetasCalificadas($sexo,$idContextura,$puntuacion){

			mysql_select_db($this->nameDB, $this->connectionDB);

			$consulta = "call sp_Recetacalificadasxsexocontexturacalificacion(".$sexo.",".$idContextura.",".$puntuacion.")";
			
			$result = mysql_query($consulta) or die (mysql_error());

			$arrayRecetas = array();

			while ($row = mysql_fetch_array($result)){

				$Receta = new Receta($row["IdReceta"],$row["Receta"]);

				array_push($arrayRecetas, $Receta);
			}

			return $arrayRecetas;
		}

		public function getRecetasxDieta($iddieta){

			mysql_select_db($this->nameDB, $this->connectionDB);

			$consulta = "call sp_recetasxdieta(".$idideta.")";
			
			$result = mysql_query($consulta) or die (mysql_error());

			$arrayRecetas = array();

			while ($row = mysql_fetch_array($result)){

				$Receta = new Receta($row["IdReceta"],$row["Receta"]);

				array_push($arrayRecetas, $Receta);
			}

			return $arrayRecetas;
		}

		public function getRecetasxPuntuacionyEstacion($idestacion,$puntuacion){

			mysql_select_db($this->nameDB, $this->connectionDB);

			$consulta = "call sp_Recetaxcalificacionyestacion(".$puntuacion.",".$idestacion.")";
			
			$result = mysql_query($consulta) or die (mysql_error());

			$arrayRecetas = array();

			while ($row = mysql_fetch_array($result)){

				$Receta = new Receta($row["IdReceta"],$row["Receta"]);

				array_push($arrayRecetas, $Receta);
			}

			return $arrayRecetas;
		}

		public function getRecetasxCondimento($idCondimento){

			mysql_select_db($this->nameDB, $this->connectionDB);

			$consulta = "call sp_recetaxcond(".$idcondimento.")";
			
			$result = mysql_query($consulta) or die (mysql_error());

			$arrayRecetas = array();

			while ($row = mysql_fetch_array($result)){

				$Receta = new Receta($row["IdReceta"],$row["Receta"]);

				array_push($arrayRecetas, $Receta);
			}

			return $arrayRecetas;
		}

		public function getRecetasxPiramide($idPiramide){

			mysql_select_db($this->nameDB, $this->connectionDB);

			$consulta = "call sp_RecetaxPiramide(".$idPiramide.")";
			
			$result = mysql_query($consulta) or die (mysql_error());

			$arrayRecetas = array();

			while ($row = mysql_fetch_array($result)){

				$Receta = new Receta($row["IdReceta"],$row["Receta"]);

				array_push($arrayRecetas, $Receta);
			}

			return $arrayRecetas;
		}

		public function getRecetasxPreferencias($idUsuario){

			mysql_select_db($this->nameDB, $this->connectionDB);

			$consulta = "call sp_recetaxpreferencias(".$idUsuario.")";
			
			$result = mysql_query($consulta) or die (mysql_error());

			$arrayRecetas = array();

			while ($row = mysql_fetch_array($result)){

				$Receta = new Receta($row["IdReceta"],$row["Receta"]);

				array_push($arrayRecetas, $Receta);
			}

			return $arrayRecetas;
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