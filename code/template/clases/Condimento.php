<?php 

class condimento{

		private $idcondimento;
		private $condimento;

		/*public function __construct($idUsuarioCreador_in, $nombreGrupo_in)
		{
			$this->idUsuarioCreador=$idUsuarioCreador_in;
			$this->nombreGrupo=$nombreGrupo_in;
		}*/

		public function __construct($idcondimento, $condimento)
		{
			$this->idcondimento=$idcondimento;
			$this->condimento=$condimento;
		}
		
		public function getId()
		{
			return $this->idcondimento;
		}

		public function getcondimento()
		{
			return $this->condimento;
		}

	}
?>