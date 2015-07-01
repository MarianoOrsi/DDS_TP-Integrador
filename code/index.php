<?php 


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

		public function Cargarfecha($Dia, $Mes, $Año)
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

		public  function CargarReceta($clasificacion_in, $temporada_in, $dificultad_in)
		{

			$this->clasificacion=$clasificacion_in;
			$this->temporada=$temporada_in;
			$this->dificultad=$dificultad_in;
			
			
			
		}
public function CargarPaso($Paso)
			{
			# va a cambiar nuestra lógica cuando implementemos bases de d
			}
	}

	class Paso{
		private $descripcion;
		private $foto;

		public function CargarDescripcion($descripcion_in)
		{

			$this->descripcion=$descripcion_in;
						
		}

		public function CargarFoto($foto_in)
		{

			$this->foto=$foto_in;
		}
	}


	class Ingrediente{
		private $nombre;
		private $tipo;
		private $CaloriaPorPorcion;

		public function __construct($nombre_in, $tipo_in, $caloriaPorPorcion_in)
		{

			$this->nombre=$nombre_in;
			$this->tipo=$tipo_in;
			$this->caloriaPorPorcion=$caloriaPorPorcion_in;
		}
	}

	class Condimento{
		private $nombre;
		private $tipo;

		public function __construct($nombre_in, $tipo_in)
		{

			$this->nombre=$nombre_in;
			$this->tipo=$tipo_in;
		}
	}
	
	
	$medidas = new Complexion('234','423','45','76','455','343','54');
	$usuario1 = new Usuario('LeanWag','Leandro','Masculino','Omnívoro','gadf','PC',$medidas,'30/06/2015','extremadamente copado');
	
	echo '<br>';
	$usuario1->getNombre();
	
?>