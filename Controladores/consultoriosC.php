<?php 

class ConsultoriosC{

	//Crear Consultorio

	public function CrearConsultoriosC(){

		if (isset($_POST["consultorioN"])) {
			
			$tablaBD = "consultorios";

			$consultorio = array("nombre"=>$_POST["consultorioN"]);

			$resultado = ConsultoriosM::CrearConsultoriosM($tablaBD, $consultorio);

			if ($resultado == true) {
				
				echo '<script>

					window.location ="http://localhost/clinica/consultorios";

				</script>';
			}
		}
	}

	//Ver Consultorios

	static public function VerConsultoriosC($columna, $valor){

		$tablaBD = "consultorios";

		$resultado = ConsultoriosM::VerConsultoriosM($tablaBD, $columna, $valor);

		return $resultado;


	}



//Borrar Consultorio 
		public function BorrarConsultoriosC(){

			if (substr($_GET["url"], 13)) {
				
				$tablaBD = "consultorios";

				$id = substr($_GET["url"], 13);

				$resultado = ConsultoriosM::BorrarConsultoriosM($tablaBD, $id);

				if ($resultado == true) {
				
						echo '<script>

							window.location ="http://localhost/clinica/consultorios";

						</script>';
					}

			}

		}


		// Editar Consultorio 

		public function EditarConsultoriosC(){

			$tablaBD = "consultorios";

			$id = substr($_GET["url"], 4);

			$resultado = ConsultoriosM::EditarConsultoriosM($tablaBD, $id);

			echo '<div class="form-group">

						<h2>Nombre:</h2>

						<input type="text" class="form-control imput-lg" name="consultorioE" value="'.$resultado["nombre"].'">

						<input type="hidden" class="form-control imput-lg" name="Cid" value="'.$resultado["id"].'">

						<br>

						<button class="btn btn-success" type="submit"> Guardar Cambios</button>
						
					</div>';


		}


		//Actualizar Consultorio

		public function ActualizarConsultoriosC(){

			if (isset($_POST["consultorioE"])) {

				$tablaBD = "consultorios";

				$datosC = array("id"=>$_POST["Cid"], "nombre"=>$_POST["consultorioE"]);

				$resultado = ConsultoriosM::ActualizarConsultoriosM($tablaBD, $datosC);
				
				if ($resultado == true) {
				
						echo '<script>

							window.location ="http://localhost/clinica/consultorios";

						</script>';
					}
			}
		}



}