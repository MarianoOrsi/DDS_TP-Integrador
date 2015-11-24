<?php
	include ("../clases/Paso.php");

	class capaDatos{

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



		public function getInfoReceta($idReceta){

			$db = new mysqli('127.0.0.1','root','','diseniosistemas');

			if(mysqli_connect_errno()){
				echo mysqli_connect_error();
			}

			$result = $db->query("SELECT * FROM recetas where IdReceta = ".$idReceta."");

			$datosReceta = null;

			if($result){
				$row = $result->fetch_object();

				$datosReceta = $row;

				$result->close();
				$db->next_result();
			}
			return $datosReceta;
		}

		public function getPasosReceta($idReceta){

			$db = new mysqli('127.0.0.1','root','','diseniosistemas');

			if(mysqli_connect_errno()){
				echo mysqli_connect_error();
			}

			$result = $db->query("call sp_buscarPasosDeReceta(".$idReceta.")");

			$pasosReceta = array();

			if($result){

			while ($row = $result->fetch_object()){
					
					$pasoReceta = new Paso($row->Descripcion,$row->Foto);
					
					array_push($pasosReceta, $pasoReceta);
				}

				$result->close();
				$db->next_result();
			}
			return $pasosReceta;
		}




































/*
		public function TodasLasRecetas($idGrupo){

			$db = new mysqli($servidorDB,$userDB,$passDB,$nameDB);

			if(mysqli_connect_errno()){
			 echo mysqli_connect_error();
			}

			$Recetas = array();

			$resultReceta = $db->query("SELECT * FROM Recetas");
			if($resultReceta){
				while ($rowReceta = $resultReceta->fetch_object()){

					$dificultad = DificultadDeReceta($rowReceta->IdDificultad);

					$estaciones = EstacionesDeReceta($rowReceta->IdReceta);


					$receta = new Receta();
					array_push($Recetas, $receta);

				}
				$result->close();
				$db->next_result();
			}
			return $Usuarios;
		}

		public function DificultadDeReceta($idDificultad){

			$db = new mysqli($servidorDB,$userDB,$passDB,$nameDB);

			if(mysqli_connect_errno()){
				echo mysqli_connect_error();
			}

			$result = $db->query("SELECT * FROM dificultades where IdDificultad = ".$rowReceta->IdDificultad."");

			$dificultad = null;

			if($result){
				$row = $result->fetch_object())

				//creo el objeto dificultad con el idDificultad de la receta
				$dificultad = new Dificultad($row->IdDificultad, $row->Dificultad);

				$result->close();
				$db->next_result();
			}
			return $dificultad;
		}

		public function EstacionDeReceta($idReceta){

			$db = new mysqli($servidorDB,$userDB,$passDB,$nameDB);

			if(mysqli_connect_errno()){
				echo mysqli_connect_error();
			}

			$result = $db->query("SELECT * FROM estaciones where IdEstacion in (SELECT IdEstacion from `receta-estaciones` where IdReceta = ".$idReceta.")");

			if($result){

				$row = $result->fetch_object())

				$estacion = new Estacion($row->IdEstacion,$row->Estacion);
			}
			return $estaciones;
		}

		public function IngredientesDeReceta($idReceta){

			$db = new mysqli($servidorDB,$userDB,$passDB,$nameDB);

			if(mysqli_connect_errno()){
				echo mysqli_connect_error();
			}

			$result = $db->query("SELECT * FROM ingredientes where IdIngrediente in (SELECT IdIngrediente from `receta-ingredientes` where IdReceta = ".$idReceta.")");

			$ingredientes = array();

			if($result){
				while ($row = $result->fetch_object()){

					$ingrediente = new Ingrediente($row->IdIngrediente,$row->Ingrediente,$row->Porcion,$row->Calorias,$row->imagen);

					array_push($ingredientes, $ingrediente);
				}
			}
			return $ingredientes;
		}*/
	}
?>