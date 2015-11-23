<?php 

class RecetaBuscada{

		private $Receta;
		private $idReceta;

		/*public function __construct($idUsuarioCreador_in, $nombreGrupo_in)
		{
			$this->idUsuarioCreador=$idUsuarioCreador_in;
			$this->nombreGrupo=$nombreGrupo_in;
		}*/

		public function __construct($idReceta, $Receta)
		{
			$this->Receta=$Receta;
			$this->idReceta=$idReceta;
		}

		public function getReceta()
		{
			return $this->Receta;
		}

		public function getIdReceta()
		{
			return $this->idReceta;
		}

	}
?>