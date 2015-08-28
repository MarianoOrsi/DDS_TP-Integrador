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
?>