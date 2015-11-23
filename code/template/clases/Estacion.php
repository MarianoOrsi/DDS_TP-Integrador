<?php 

class estacion{

		private $idestacion;
		private $estacion;

		/*public function __construct($idUsuarioCreador_in, $nombreGrupo_in)
		{
			$this->idUsuarioCreador=$idUsuarioCreador_in;
			$this->nombreGrupo=$nombreGrupo_in;
		}*/

		public function __construct($idestacion, $estacion)
		{
			$this->idestacion=$idestacion;
			$this->estacion=$estacion;
		}
		
		public function getId()
		{
			return $this->idestacion;
		}

		public function getestacion()
		{
			return $this->estacion;
		}

	}
?>