<?php 

class Paso{

		private $paso;
		private $foto;


		public function __construct($paso_in, $foto_in)
		{
			$this->paso=$paso_in;
			$this->foto=$foto_in;
		}
		
		public function getPaso()
		{
			return $this->paso;
		}

		public function getFoto()
		{
			return $this->foto;
		}

	}
?>