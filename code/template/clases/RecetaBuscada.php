<?php 

class RecetaBuscada{

		private $Receta;

		/*public function __construct($idUsuarioCreador_in, $nombreGrupo_in)
		{
			$this->idUsuarioCreador=$idUsuarioCreador_in;
			$this->nombreGrupo=$nombreGrupo_in;
		}*/

		public function __construct($Receta)
		{
			$this->Receta=$Receta;
		}

		public function getReceta()
		{
			return $this->Receta;
		}

	}
?>