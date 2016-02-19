	<script type = "text/javascript">

			function abrirReceta(IdReceta) {
				
				var posicion_x; 
				var posicion_y; 
				posicion_x=(screen.width/2)-(800/2); 
				posicion_y=(screen.height/2)-(600/2); 
				window.open("interfaz/popUpReceta.php?IdReceta="+IdReceta, "popUpReceta", "width=800,height=600,menubar=0,toolbar=0,directories=0,scrollbars=no,resizable=no,left="+posicion_x+",top="+posicion_y+"");
			}

		</script>


				<section class="callaction">

                  
				<div class="container">
			    <h1> RECETAS RECOMENDADAS POR CONDICION PREEXISTENTE</h1>
				<table class="table table-hover">
				<thead>
				<tr>													
					<th>Receta</th>
				</tr>
				</thead>
				<tbody>

	             <?php
	                $file = substr(getcwd(), -8);
	          
	                if($file == "template")
	                { 
                        include("/negocio/RecomendacionesRecetasNegocio.php");	     
	                }else{
                      	include("../negocio/RecomendacionesRecetasNegocio.php");	                	
	                }

					$logica = new logicaDeNegocioRecomendaciones();

					$arrayRecetasRecomendadas = $logica->selectRecetasXPreferencia();

					foreach($arrayRecetasRecomendadas as $receta) {
					    echo "<TR>";
						echo "<TD>" . $receta->getDesc() . "</TD>";
						echo "<TD><input type=\"button\" name=\"Ver\" onclick=\"abrirReceta(".$receta->getId().")\" value=\"VER\" class=\"btn btn-theme aligncenter\"></TD>";
						echo "</TR>";
				}
			    ?>
		  				
				</tbody>
				</table>
				<div class="container aligncenter">
						
					

			</section>
