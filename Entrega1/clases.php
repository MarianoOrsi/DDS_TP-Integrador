<?php 


	class Usuario
	{
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

		public modificarPerfil($Nombre,$Sexo,$Dieta,$PreferenciaAlimentarias,$Rutina,$Complexion,$Fecha,$Condiciones)
		{
			this->Nombre=$Nombre;
			this->Sexo=$Sexo;
			this->Dieta=$Dieta;
			this->PreferenciaAlimentarias=$PreferenciaAlimentarias;
			this->Rutina=$Rutina;
			this->Complexion=$Complexion;
			this->Fecha=$Fecha;
			this->Condiciones=$Condiciones;
		}

	}

	class Complexion
	{
		private $Altura;
		private $MedidaTorax;
		private $MedidaCintura;
		private $MedidaCadera;
		private $Peso;
		private $PesoMin;
		private $PesoMax;

		public CargarComplexion($Altura, $MedidaTorax, $MedidaCintura, $MedidaCadera, $Peso, $PesoMin, $PesoMax)
		{
			this->Altura=$Altura;
			this->MedidaTorax=$MedidaTorax;
			this->MedidaCintura=$MedidaCintura;
			this->MedidaCadera=$MedidaCadera;
			this->Peso=$Peso;
			this->PesoMin=$PesoMin;
			this->PesoMax=$PesoMax;			
		}
	}

	class Fecha{
		private $Dia;
		private $Mes;
		private $Anio;

		public CargarFecha($Dia, $Mes, $Anio)
		{
			this->Dia=$Dia;
			this->Mes=$Mes;
			this->Anio=$Anio;
		}

		public GetDia()
		{
			return this->Dia;
		}

		public GetMes()
		{
			return this->Mes;
		}

		public GetAnio()
		{
			return this->Anio;
		}
	}

	class Condiciones{

		public filtrar($ListaDeRecetas){
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