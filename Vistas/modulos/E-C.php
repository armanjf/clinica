<?php 

if ($_SESSION["rol"] != "Secretaria") {
	
	echo '<script>

	window.location = "inicio";

	</script>';

	return;
}

?>

<div class="content-wrapper">

	<section>
		<h1>Editar Consultorio</h1>
	</section>

	<section class="content">

		<div class="box">

			<div class="box-body">

				<form method="post">

					<?php 

					$editarC = new ConsultoriosC();
					$editarC -> EditarConsultoriosC();
					$editarC -> ActualizarConsultoriosC();

					 ?>
					
					
					
				</form>
				
			</div>
			
		</div>
		
	</section>

	
</div>