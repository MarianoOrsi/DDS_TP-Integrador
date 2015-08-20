<html>
<header>
<script type="text/javascript" src="jquery-1.7.2.min.js"></script>
<script> 
$(document).ready(inicializar);

function inicializar(){
	
	$("#pepe").keyup(function(){
			if($("#pepe").val()!=""){				  
			$.ajax({
			type:'POST',
			data: 'var='+$("#pepe").val(),			
			url:'respuesta.php',
				success: function(data){
				$("#contenido").html(data);
				$(".divs").click(function(){
					document.location= 'muro.php?nomusu=' + $(this).attr("id");					  
				})
				}	
			})
			}else
				$("#contenido").html("");
	});
}
</script>
</header>
<body>
<p><b>¡Bienvenido a miniFace <?php echo $_SESSION["nom"];?>! <a href="paginaPrincipal.php">Inicio</a> <a href="muro.php?nomusu=<?php echo $_SESSION["mail"];?>"> Mi Muro</a></b> <a href="miniFace.php?logout=1"> SALIR </a></p>
<b>Buscador de amigos</b><input type="text" id="pepe" />
<div id="contenido"></div>
</body>
</html>