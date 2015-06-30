<?php 

echo 'hola';
	class Usuario{
		private $Cuenta;
		private $Nombre;
		private $Sexo;
		private $Dieta;
		private $PreferenciaAlimentarias;
		private $Rutina;
		private $RecetasPropias;
		private $Complexion;
		private $Fecha;
		private $Condiciones;

		public function __construct($Nombre_in,$Sexo,$Dieta,$PreferenciaAlimentarias,$Rutina,$Complexion,$Fecha,$Condiciones)
		{
			$this->Nombre=$Nombre;
			$this->Sexo=$Sexo;
			$this->Dieta=$Dieta;
			$this->PreferenciaAlimentarias=$PreferenciaAlimentarias;
			$this->Rutina=$Rutina;
			$this->Complexion=$Complexion;
			$this->Fecha=$Fecha;
			$this->Condiciones=$Condiciones;
		}

	}

	class Complexion{
		private $Altura;
		private $MedidaTorax;
		private $MedidaCintura;
		private $MedidaCadera;
		private $Peso;
		private $PesoMin;
		private $PesoMax;

		public function __construct($Altura, $MedidaTorax, $MedidaCintura, $MedidaCadera, $Peso, $PesoMin, $PesoMax)
		{
			$this->Altura=$Altura;
			$this->MedidaTorax=$MedidaTorax;
			$this->MedidaCintura=$MedidaCintura;
			$this->MedidaCadera=$MedidaCadera;
			$this->Peso=$Peso;
			$this->PesoMin=$PesoMin;
			$this->PesoMax=$PesoMax;			
		}
	}

	class Fecha{
		private $Dia;
		private $Mes;
		private $Año;

		public function CargarFecha($Dia, $Mes, $Año)
		{
			$this->Dia=$Dia;
			$this->Mes=$Mes;
			$this->Año=$Año;
		}
	}

	class Condiciones{

		public function filtrar($ListaDeRecetas){
			return $ListaDeRecetas;
		}
	}

		class Diabetes extends Condiciones{
		}

		class Hipertension extends Condiciones{
		}

		class Celiasis extends Condiciones{
		}

	class Receta{
		private $UsuarioCreador;
		private $idReceta;
		private $Dificultad;
		private $Temporada;
		private $Clasificacion;
		private $Ingrediente;
		private $Condimento;
		private $Paso = array();

		public function CargarIngrediente($Ingrediente)
		{

			$this->Ingrediente=$Ingrediente;
		}

		public function CargarCondimento($Condimento)
		{

			$this->Condimento=$Condimento;
		}

		public  function CargarReceta($Clasificacion, $Temporada, $Dificultad)
		{

			$this->Clasificacion=$Clasificacion;
			$this->Temporada=$Temporada;
			$this->Dificultad=$Dificultad;
		}

		public function CargarPaso($Paso)
		{
			#No tengo idea que hacer :D
		}

	}

	class Paso{
		private $Descripcion;
		private $Foto;

		public function CargarDescripcion($Descripcion)
		{

			$this->Descripcion=$Descripcion;
		}

		public function CargarFoto($Foto)
		{

			$this->Foto=$Foto;
		}
	}


	class Ingrediente{
		private $Nombre;
		private $Tipo;
		private $CaloriaPorPorcion;

		public function __construct($Nombre, $Tipo, $CaloriaPorPorcion)
		{

			$this->Nombre=$Nombre;
			$this->Tipo=$Tipo;
			$this->CaloriaPorPorcion=$CaloriaPorPorcion;
		}
	}

	class Condimento{
		private $Nombre;
		private $Tipo;

		public function __construct($Nombre, $Tipo)
		{

			$this->Nombre=$Nombre;
			$this->Tipo=$Tipo;
		}
	}

	
	
?>