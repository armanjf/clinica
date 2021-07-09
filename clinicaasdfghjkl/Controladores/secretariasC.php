<?php 

class SecretariasC{
	//Ingreso Secretarias
	public function IngresarSecretariaC(){

		if (isset($_POST["usuario-Ing"])) {
			
			if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuario-Ing"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["clave-Ing"])){
				
				$tablaBD = "secretaria";

				$datosC = array("usuario"=>$_POST["usuario-Ing"], "clave"=>$_POST["clave-Ing"]);

				$resultado = SecretariasM::IngresarSecretariaM($tablaBD, $datosC);

				if ($resultado["usuario"] == $_POST["usuario-Ing"] && $resultado["clave"] == $_POST["clave-Ing"]){

					$_SESSION["Ingresar"] = true;

					$_SESSION["id"] = $resultado["id"];
					$_SESSION["usuario"] = $resultado["usuario"];
					$_SESSION["clave"] = $resultado["clave"];
					$_SESSION["nombre"] = $resultado["nombre"];
					$_SESSION["apellido"] = $resultado["apellido"];
					$_SESSION["foto"] = $resultado["foto"];
					$_SESSION["rol"] = $resultado["rol"];

					echo '<script> 

					window.location = "inicio";

					       </script>';


				}//$ IF resultado 
				 else { 

				 	echo '<div class="alert alert-danger">Error al Ingreasar</div>';

				 }// FIN de echo

			}// IF preg_match

		}//IF usuario-Ing

	}//Funcion IngresarSecretariaC

						//Ver Perfil Secretarias
						public function VerPerfilSecretariaC(){

							$tablaBD = "secretaria";

							$id = $_SESSION["id"];

							$resultado = SecretariasM::VerPerfilSecretariaM($tablaBD, $id);


						echo '<tr>

							<td>'.$resultado["usuario"].'</td>

							<td>'.$resultado["clave"].'</td>

							<td>'.$resultado["nombre"].'</td>

							<td>'.$resultado["apellido"].'</td>';
							

							if ($resultado["foto"] != ""){
								
								echo '<td><img src="http://localhost/clinica/'.$resultado["foto"].'" class="img-responsive" width="40px"> </td>';
							}else{

								echo '<td><img src="http://localhost/clinica/Vistas/img/defecto.png" class="img-responsive" width="40px"> </td>';
								
							}

						 echo '<td>
								
								<a href="http://localhost/clinica/perfil-S/'.$resultado["id"].'">
									
									<button class="btn btn-success"><i class="fa fa-pencil"></i></button>
								</a>

							</td>

						</tr>';

						}

			//Editar Perfil
			public function EditarPerfilSecretariaC(){

				$tablaBD = "secretaria";

					$id = $_SESSION["id"];

					$resultado = SecretariasM::VerPerfilSecretariaM($tablaBD, $id);

				echo '<form method="post" enctype="multipart/form-data">

 					<div class="row">

 						<div class="col-md-6 col-xs-12">

 							<h2>Nombre:</h2>
 						<input type="text" class="input-lg" name="nombreP" value="'.$resultado["nombre"].'">
 						<input type="hidden" class="input-lg" name="idP" value="'.$resultado["id"].'">
 							
 						<h2>Apellido:</h2>
 						<input type="text" class="input-lg" name="apellidoP" value="'.$resultado["apellido"].'">

 						<h2>Usuario:</h2>
 						<input type="text" class="input-lg" name="usuarioP" value="'.$resultado["usuario"].'">

 						<h2>Contraseña:</h2>
 						<input type="text" class="input-lg" name="claveP" value="'.$resultado["clave"].'">

 						</div>

 						<div class="col-md-6 col-xs-12">

 							<br><br>

 							<input type="file" name="imgP">
 							<br>';

 							if ($resultado["foto"] == "") {
 								
 							echo '<img src="http://localhost/clinica/Vistas/img/defecto.png" width="200px">';
 							
 							}else{

 							echo '<img src="http://localhost/clinica/'.$resultado["foto"].'" width="200px">';

 							}

 							

 						echo '<input type="hidden" name="imgActual" value="'.$resultado["foto"].'">

 							<br><br>

 							<button type="submit" class="btn btn-success" >Guardar Cambios</button>
 							
 						</div>
 						
 					</div>
 					
 				</form>';

			}


	// Actualizar Perfil 

			public function ActualizarPerfilSecretariaC(){

				if (isset($_POST["idP"])) {

					$rutaImg = $_POST["imgActual"];

					if (isset($_FILES["imgP"]["tmp_name"]) && !empty($_FILES["imgP"]["tmp_name"])){

						if (!empty($_POST["imgActual"])) {
							
							unlink($_POST["imgActual"]);
						}

						if ($_FILES["imgP"]["type"] == "image/jpeg") {
							
							$nombre = mt_rand(10,99);

							$rutaImg = "Vistas/img/Secretarias/S-"."$nombre".".jpg";

							$foto = imagecreatefromjpeg($_FILES["imgP"]["tmp_name"]);

							imagejpeg($foto, $rutaImg);
						}

						if ($_FILES["imgP"]["type"] == "image/png") {
							
							$nombre = mt_rand(10,99);

							$rutaImg = "Vistas/img/Secretarias/S-"."$nombre".".png";

							$foto = imagecreatefrompng($_FILES["imgP"]["tmp_name"]);

							imagepng($foto, $rutaImg);
						}

						
					}
		

				$tablaBD = "secretaria";

				$datosC = array("id"=>$_POST["idP"], "usuario"=>$_POST["usuarioP"], "apellido"=>$_POST["apellidoP"], "nombre"=>$_POST["nombreP"], "clave"=>$_POST["claveP"], "foto"=>$rutaImg);


					$resultado = SecretariasM::ActualizarPerfilSecretariaM($tablaBD, $datosC);

					if ($resultado == true){
						
						echo '<script> 

							window.location = "http://localhost/clinica/perfil-S/'.$_SESSION["id"].'";

						</script>';
					}


				}
			}


//Mostrar Secretarias 

			public function VerSecretariasC(){

				$tablaBD = "secretaria";

				$resultado = SecretariasM::VerSecretariasM($tablaBD); 

			   return $resultado;
			}


			 	//Crear Secretarias
			public function CrearSecretariaC(){

				if(isset($_POST["rolS"])){

					$tablaBD = "secretaria";

					$datosC = array("nombre"=>$_POST["nombre"], "apellido"=>$_POST["apellido"], "usuario"=>$_POST["usuario"], "clave"=>$_POST["clave"], "rol"=>$_POST["rolS"]);

					$resultado = SecretariasM::CrearSecretariaM($tablaBD, $datosC);

					if($resultado == true){

						echo '<script>

						window.location = "secretarias";
						</script>';

			}

		}

	}

	//Borrar Secretarias
	public function BorrarSecretariaC(){

		if(isset($_GET["Sid"])){

			$tablaBD = "secretaria";

			$id = $_GET["Sid"];

			if($_GET["imgS"] != ""){

				unlink($_GET["imgS"]);

			}

			$resultado = SecretariasM::BorrarSecretariaM($tablaBD, $id);

			if($resultado == true){

				echo '<script>

				window.location = "secretarias";
				</script>';

			}

		}

	}

}