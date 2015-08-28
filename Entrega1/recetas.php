<?php 

	class Receta{
		private $UsuarioCreador;
		private $idReceta;
		private $Dificultad;
		private $Temporada;
		private $Clasificacion;
		private $Ingrediente = array();
		private $Condimento = array();
		private $Paso = array();

		public CargarIngrediente($ingrediente)
		{
			array_push(this->Ingrediente, $ingrediente);
		}

		public CargarCondimento($condimento)
		{

			array_push(this->Condimento, $condimento);
		}

		public CargarReceta($Clasificacion, $Temporada, $Dificultad)
		{

			this->Clasificacion=$Clasificacion;
			this->Temporada=$Temporada;
			this->Dificultad=$Dificultad;
		}

		public CargarPaso($paso)
		{
			array_push(this->Paso, $paso);
		}

	}

	class Paso{
		private $Descripcion;
		private $Foto;

		public CargarDescripcion($Descripcion)
		{

			this->Descripcion=$Descripcion;
		}

		public CargarFoto($Foto)
		{

			this->Foto=$Foto;
		}
	}


	class Ingrediente{
		private $Nombre;
		private $Tipo;
		private $CaloriaPorPorcion;

		public CargarIngrediente($Nombre, $Tipo, $CaloriaPorPorcion)
		{

			this->Nombre=$Nombre;
			this->Tipo=$Tipo;
			this->CaloriaPorPorcion=$CaloriaPorPorcion;
		}
	}

	class Condimento{
		private $Nombre;
		private $Tipo;

		public CargarCondimento($Nombre, $Tipo)
		{

			this->Nombre=$Nombre;
			this->Tipo=$Tipo;
		}
	}
?>