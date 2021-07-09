 <?php

if($_SESSION["rol"] != "Administrador"){

	echo '<script>

	window.location = "inicio";
	</script>';

	return;

}

?>

 <div class="content-wrapper">

 	<section class="content">

 		<div class="box">

 			<div class="box-body">

 				<?php 

 				$editarPerfil = new AdminC();

 				$editarPerfil -> EditarPerfilAdminC();

 				$editarPerfil -> ActualizarPerfilAdminC();

 				 ?>

 				  				
 			</div>
 			
 		</div>
 		
 	</section>
 	
 </div>