<?php 

class RecetaConsultada{

		private $CantConsultas;
		private $Receta;

		/*public function __construct($idUsuarioCreador_in, $nombreGrupo_in)
		{
			$this->idUsuarioCreador=$idUsuarioCreador_in;
			$this->nombreGrupo=$nombreGrupo_in;
		}*/

		public function __construct($CantConsultas, $Receta)
		{
			$this->CantConsultas=$CantConsultas;
			$this->Receta=$Receta;
		}
		
		public function getCantConsultas()
		{	
			return $this->CantConsultas;
		}

		public function getReceta()
		{
			return $this->Receta;
		}

	}
?>