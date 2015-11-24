<?php
	include ("../Datos/DatosPlanificarRecetas.php");

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