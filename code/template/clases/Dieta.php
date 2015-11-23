<?php 

class Dieta{

		private $idDieta;
		private $Nombre;

		/*public function __construct($idUsuarioCreador_in, $nombreGrupo_in)
		{
			$this->idUsuarioCreador=$idUsuarioCreador_in;
			$this->nombreGrupo=$nombreGrupo_in;
		}*/

		public function __construct($idDieta, $Nombre)
		{
			$this->idDieta=$idDieta;
			$this->Nombre=$Nombre;
		}
		
		public function getId()
		{
			return $this->idDieta;
		}

		public function getNombre()
		{
			return $this->Nombre;
		}

	}
?>