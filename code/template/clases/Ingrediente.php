<?php
	class Ingrediente{

		private $Ingrediente;
		private $Porcion;
		private $Calorias;

		public function __construct($ingrediente_in, $porcion_in, $calorias_in)
		{
			$this->Ingrediente=$ingrediente_in;
			$this->Porcion=$porcion_in;
			$this->Calorias=$calorias_in;
		}
		
		public function getIngrediente()
		{
			return $this->Ingrediente;
		}

		public function getPorcion()
		{
			return $this->Porcion;
		}

		public function getCalorias()
		{
			return $this->Calorias;
		}
	}
?>