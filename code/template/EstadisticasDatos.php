<?php

	include("clases/Dificultad.php");
	
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
			$consulta = "SELECT SUM FROM dificultades";

			$result = mysql_query($consulta) or die (mysql_error());

			$arrayDificultades = array();

			while ($row = mysql_fetch_array($result)){

				$dificultad = new Dificultad($row['IdDificultad'],$row['Dificultad']);

				array_push($arrayDificultades, $dificultad);
			}

			return $arrayDificultades;
		}

	}
?>