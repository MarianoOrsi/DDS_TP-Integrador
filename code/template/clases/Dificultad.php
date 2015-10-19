<?php 

class Dificultad{

		private $idDificultad;
		private $Descripcion;

		/*public function __construct($idUsuarioCreador_in, $nombreGrupo_in)
		{
			$this->idUsuarioCreador=$idUsuarioCreador_in;
			$this->nombreGrupo=$nombreGrupo_in;
		}*/

		public function __construct($idDificultad, $Descripcion)
		{
			$this->idDificultad=$idDificultad;
			$this->Descripcion=$Descripcion;
		}
		
		public function getId()
		{
			return $this->idDificultad;
		}

		public function getDescripcion()
		{
			return $this->Descripcion;
		}

	}
?>