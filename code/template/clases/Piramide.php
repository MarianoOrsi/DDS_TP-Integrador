<?php 

class piramide{

		private $idpiramide;
		private $sector;

		/*public function __construct($idUsuarioCreador_in, $nombreGrupo_in)
		{
			$this->idUsuarioCreador=$idUsuarioCreador_in;
			$this->nombreGrupo=$nombreGrupo_in;
		}*/

		public function __construct($idpiramide, $sector)
		{
			$this->idpiramide=$idpiramide;
			$this->sector=$sector;
		}
		
		public function getId()
		{
			return $this->idpiramide;
		}

		public function getsector()
		{
			return $this->sector;
		}

	}
?>