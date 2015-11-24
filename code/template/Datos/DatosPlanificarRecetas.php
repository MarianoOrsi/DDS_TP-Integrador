<?php
	include ("../clases/Paso.php");
	include ("../clases/Ingrediente.php");
	include ("../clases/Condimento.php");

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

			$result = $db->query("call sp_buscarPasosDeReceta(".$idReceta.")"); //SELECT Descripcion, Foto FROM pasos WHERE IdReceta = ".$idReceta." ORDER BY Paso");

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

		public function getIngredientesReceta($idReceta){

			$db = new mysqli('127.0.0.1','root','','diseniosistemas');

			if(mysqli_connect_errno()){
				echo mysqli_connect_error();
			}

			$result = $db->query("call sp_BuscarIngredientesDeReceta(".$idReceta.")");

			$ingredientesReceta = array();

			if($result){

			while ($row = $result->fetch_object()){
					
					$ingredienteReceta = new Ingrediente($row->Ingrediente,$row->Porcion,$row->Calorias);
					
					array_push($ingredientesReceta, $ingredienteReceta);
				}

				$result->close();
				$db->next_result();
			}
			return $ingredientesReceta;
		}

		public function getCondimentosReceta($idReceta){

			$db = new mysqli('127.0.0.1','root','','diseniosistemas');

			if(mysqli_connect_errno()){
				echo mysqli_connect_error();
			}

			$result = $db->query("call sp_BuscarCondimentosDeReceta(".$idReceta.")");

			$condimentosReceta = array();

			if($result){

			while ($row = $result->fetch_object()){
					
					$condimentoReceta = new Condimento(0,$row->Condimento);
					
					array_push($condimentosReceta, $condimentoReceta);
				}

				$result->close();
				$db->next_result();
			}
			return $condimentosReceta;
		}

		public function getDificultadReceta($idReceta){

			$db = new mysqli('127.0.0.1','root','','diseniosistemas');

			if(mysqli_connect_errno()){
				echo mysqli_connect_error();
			}

			$result = $db->query("call sp_BuscarDificultadDeReceta(".$idReceta.")");

			$dificultadReceta = null;

			if($result){

				$row = $result->fetch_object();
					
				$dificultadReceta = $row->Dificultad;
					
				$result->close();
			}
			return $dificultadReceta;
		}

		public function guardarRecetaConsultada($idUsuario, $idReceta){

			$db = new mysqli('127.0.0.1','root','','diseniosistemas');

			if(mysqli_connect_errno()){
				echo mysqli_connect_error();
			}

			$result = $db->query("call sp_GuardarRecetaVista(".$idUsuario.",".$idReceta.")");
		}

		public function planificarReceta($idReceta,$idUsuario, $idHorario){

			$db = new mysqli('127.0.0.1','root','','diseniosistemas');

			if(mysqli_connect_errno()){
				echo mysqli_connect_error();
			}

			$result = $db->query("call sp_planificarReceta(".$idHorario.",".$idReceta.",".$idUsuario.")");

			header("Location: ../interfaz/RecomendacionesRecetasInterfaz.php");
		}

	}
?>