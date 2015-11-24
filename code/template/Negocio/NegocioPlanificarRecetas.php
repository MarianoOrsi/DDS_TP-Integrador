<?php
	include ("../Datos/DatosPlanificarRecetas.php");

	if(isset($_GET["IdReceta"]) && isset($_GET["IdUsuario"]) && isset($_GET["IdHorario"])){

		$datos = new capaDatos();

		$datos->planificarReceta($_GET["IdReceta"],$_GET["IdUsuario"], $_GET["IdHorario"]);

	}

	class LogicaNegocio{

		private $capaDatos;

		public function __construct(){

			$this->capaDatos = new capaDatos();

		}

		public function getInfoReceta($idReceta){

			return $this->capaDatos->getInfoReceta($idReceta);

		}

		public function getPasosReceta($idReceta){

			return $this->capaDatos->getPasosReceta($idReceta);

		}

		public function getIngredientesReceta($idReceta){

			return $this->capaDatos->getIngredientesReceta($idReceta);

		}

		public function getCondimentosReceta($idReceta){

			return $this->capaDatos->getCondimentosReceta($idReceta);

		}

		public function getDificultadReceta($idReceta){

			return $this->capaDatos->getDificultadReceta($idReceta);

		}

		public function guardarRecetaConsultada($idUsuario, $idReceta){

			return $this->capaDatos->guardarRecetaConsultada($idUsuario, $idReceta);

		}

	}

?>