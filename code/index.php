<?php 

echo 'hola';
	class Usuario{
		private $cuenta;
		private $nombre;
		private $sexo;
		private $dieta;
		private $preferenciaAlimentarias;
		private $rutina;
		private $recetasPropias;
		private $complexion;
		private $fecha;
		private $condiciones;

		public function __construct($cuenta_in,$nombre_in,$sexo_in,$dieta_in,$preferenciaAlimentarias_in,$rutina_in,$complexion_in,$fecha_in,$condiciones_in)
		{
			$this->cuenta=$cuenta_in;
			$this->nombre=$nombre_in;
			$this->sexo=$sexo_in;
			$this->dieta=$dieta_in;
			$this->preferenciaAlimentarias=$preferenciaAlimentarias_in;
			$this->rutina=$rutina_in;
			$this->complexion=$complexion_in;
			$this->fecha=$fecha_in;
			$this->condiciones=$condiciones_in;
		}
public function getNombre()
{echo $this->nombre;}
	}

	class complexion{
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

	class fecha{
		private $Dia;
		private $Mes;
		private $Año;

		public function Cargarfecha($Dia, $Mes, $Año)
		{
			$this->Dia=$Dia;
			$this->Mes=$Mes;
			$this->Año=$Año;
		}
	}

	class condiciones{

		public function filtrar($ListaDeRecetas){
			return $ListaDeRecetas;
		}
	}

		class Diabetes extends condiciones{
		}

		class Hipertension extends condiciones{
		}

		class Celiasis extends condiciones{
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
		private $nombre;
		private $Tipo;
		private $CaloriaPorPorcion;

		public function __construct($nombre, $Tipo, $CaloriaPorPorcion)
		{

			$this->nombre=$nombre;
			$this->Tipo=$Tipo;
			$this->CaloriaPorPorcion=$CaloriaPorPorcion;
		}
	}

	class Condimento{
		private $nombre;
		private $Tipo;

		public function __construct($nombre, $Tipo)
		{

			$this->nombre=$nombre;
			$this->Tipo=$Tipo;
		}
	}
	
	
	$medidas = new complexion('234','423','45','76','455','343','54');
	$usuario1 = new Usuario('LeanWag','Leandro','Masculino','Omnívoro','gadf','PC',$medidas,'30/06/2015','extremadamente copado');
	
	echo '<br>';
	$usuario1->getNombre();
	
?>