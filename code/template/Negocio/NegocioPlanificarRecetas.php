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

	}

?>