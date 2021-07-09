<?php 

require_once "ConexionBD.php";

class ConsultoriosM extends ConexionBD{

	//Crear Consultorios

	static public function CrearConsultoriosM($tablaBD, $consultorio){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD(nombre) VALUES (:nombre)");

		$pdo -> bindParam(":nombre", $consultorio["nombre"], PDO::PARAM_STR);

		if ($pdo -> execute()){
			
			return true;

		}else{

			return false;
		}


		$pdo -> close();
		$pdo = null;
	}


	//Ver consultorios 


		static public function VerConsultoriosM($tablaBD, $columna, $valor){

			if ($columna == null) {
				
				$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");

				$pdo -> execute();

				return $pdo -> fetchAll();
			}else{

				$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna ");
				
				$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);
				
				$pdo -> execute();

				return $pdo -> fetch();

			}
		}


		//Borrar Consultorio 

		static public function BorrarConsultoriosM($tablaBD, $id){

			$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");

			$pdo -> bindParam(":id", $id, PDO::PARAM_INT);

			if ($pdo -> execute()){
			
					return true;

				}else{

					return false;
				}


				$pdo -> close();
				$pdo = null;

		}


		// Editar Consultorio 

		static public function EditarConsultoriosM($tablaBD, $id){

			$pdo = ConexionBD::cBD()->prepare("SELECT id, nombre FROM $tablaBD WHERE id = :id");

			$pdo -> bindParam(":id", $id, PDO::PARAM_INT);

			$pdo -> execute();

			return $pdo -> fetch();

			$pdo -> close();
			$pdo = null;
		}


		//Actualizar 

		static public function ActualizarConsultoriosM($tablaBD, $datosC){

			$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET nombre = :nombre WHERE id = :id");

			$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);

			$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);

			if ($pdo -> execute()){
			
					return true;

				}else{

					return false;
				}


				$pdo -> close();
				$pdo = null;

		}


}