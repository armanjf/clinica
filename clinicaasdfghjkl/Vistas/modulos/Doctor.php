<?php 

if ($_SESSION["rol"] != "Paciente") {
	
	echo '<script>

	window.location = "inicio";

	</script>';

	return;
}

?>


<div class="content-wrapper">

	<section class="content-header" >

		<?php 

			$columna = "id";
			$valor = substr($_GET["url"], 7);

			$resultado = DoctoresC::DoctorC($columna, $valor);

			if ($resultado["sexo"] == "Femenino") {
				
				echo '<h1>Doctora: '.$resultado["apellido"].' '.$resultado["nombre"].'</h1>';
			}else{

				echo '<h1>Doctor: '.$resultado["apellido"].' '.$resultado["nombre"].'</h1>';
			}


			$columna = "id";
			$valor = $resultado["id_consultorio"];

			$consultorio = ConsultoriosC::VerConsultoriosC($columna, $valor);

			echo '<br>
		<h1>Consultorio de: '.$consultorio["nombre"].'</h1>';

		 ?>

	
		
	</section>

	<section class="content">

		<div class="box">

				<div class="box-body">
                 
                 <div id="calendar"></div>

				</div>

		</div>
			
	</section>
	
</div>


<div class="modal fade" rol="dialog" id="CitaModal">

	<div class="modal-dialog">

		<div class="modal-content">

			<form method="post">

				<div class="modal-body">

					<div class="box-body">

						<?php 

						$columna = "id";
						$valor = substr($_GET["url"], 7);

						$resultado = DoctoresC::DoctorC($columna, $valor);

						echo '<div class="form-group">

							<h2>Nombre del Paciente:</h2>

							<input type="text" class="form-control input-lg" name="nyaC" value="'.$_SESSION["nombre"].' '.$_SESSION["apellido"].'" readonly>

							<input type="hidden" name="Did" value="'.$resultado["id"].'">
							<input type="hidden" name="Pid" value="'.$_SESSION["id"].'">
							

							
							</div>

							<div class="form-group">

								<h2>Documento:</h2>

								<input type="text" class="form-control input-lg" name="documentoC" value="'.$_SESSION["documento"].'" readonly>
								
							</div>';

							$columna = "id";
							$valor = $resultado["id_consultorio"];

							$consultorio = ConsultoriosC::VerConsultoriosC($columna, $valor);

							echo '<div class="form-group">

									<input type="hidden" name="Cid" value="'.$consultorio["id"].'">
										
                                  </div>';


						 ?>


						<div class="form-group">

							<h2>Fecha:</h2>

							<input type="text" class="form-control input-lg" id="fechaC" name="fechaC" value="" readonly>
							
						</div>

						<div class="form-group">

							<h2>Hora:</h2>

							<input type="text" class="form-control input-lg" id="horaC" name="horaC" value="" readonly>
							
					    </div>

					    <div class="form-group">

						<input type="hidden" class="form-control input-lg" name="fyhIC" id="fyhIC" value="" readonly>

						<input type="hidden" class="form-control input-lg" name="fyhFC" id="fyhFC" value="" readonly>
						
						</div>

			        </div>
					
				</div>

				

				<div class="modal-footer">
					
					<button type="submit" class="btn btn-primary">Pedir Cita</button>
					<button type="button" class="btn btn-danger">Cancelar Cita</button>

				</div>

				<?php 

				$enviarC = new CitasC();
				$enviarC -> EnviarCitasC();

				 ?>
				
			</form>
			
		</div>
		
	</div>
	
</div>