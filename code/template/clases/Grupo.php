<?php 

class Grupo{

		private $idGrupo;
		private $idUsuarioCreador;
		private $nombreGrupo;
		private $fecha;

		/*public function __construct($idUsuarioCreador_in, $nombreGrupo_in)
		{
			$this->idUsuarioCreador=$idUsuarioCreador_in;
			$this->nombreGrupo=$nombreGrupo_in;
		}*/

		public function __construct($idGrupo_in, $idUsuarioCreador_in, $nombreGrupo_in, $fecha_in)
		{
			$this->idGrupo=$idGrupo_in;
			$this->idUsuarioCreador=$idUsuarioCreador_in;
			$this->nombreGrupo=$nombreGrupo_in;
			$this->fecha=$fecha_in;
		}
		
		public function getNombreGrupo()
		{
			return $this->nombreGrupo;
		}

		public function getIdUsuarioCreador()
		{
			return $this->idUsuarioCreador;
		}

		public function getFecha()
		{
			return $this->fecha;
		}

		public function getIdGrupo()
		{
			return $this->idGrupo;
		}
	}
?>