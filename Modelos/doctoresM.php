<?php

require_once "ConexionBD.php";

class DoctoresM extends ConexionBD{

//Crear Doctores
	static public function CrearDoctorM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD(apellido, nombre, sexo, id_consultorio, usuario, clave, rol) VALUES(:apellido, :nombre, :sexo, :id_consultorio, :usuario, :clave, :rol)");

		$pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam(":sexo", $datosC["sexo"], PDO::PARAM_STR);
		$pdo -> bindParam(":id_consultorio", $datosC["id_consultorio"], PDO::PARAM_INT);
		$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
		$pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
		$pdo -> bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}

	//Mostrar Doctores 

		static public function VerDoctoresM($tablaBD, $columna, $valor){

		if($columna != null){

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

			$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

			$pdo->execute();

			return $pdo -> fetchAll();

		}else{

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");

			$pdo->execute();

			return $pdo -> fetchAll();

		}

		$pdo -> close();
		$pdo = null;

	}


	//Editar Doctores 

		static public function DoctorM($tablaBD, $columna, $valor){

		if($columna != null){

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

			$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

			$pdo->execute();

			return $pdo -> fetch();

		}

		$pdo -> close();
		$pdo = null;

	}

	//Actualizar Doctores 

	static public function ActualizarDoctorM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET apellido = :apellido, nombre = :nombre, sexo = :sexo, usuario = :usuario, clave = :clave WHERE id = :id");

		$pdo -> BindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> BindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
		$pdo -> BindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> BindParam(":sexo", $datosC["sexo"], PDO::PARAM_STR);
		$pdo -> BindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
		$pdo -> BindParam(":clave", $datosC["clave"], PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;


	} 


		//Eliminar Doctor
	static public function BorrarDoctorM($tablaBD, $id){

		$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $id, pdo::PARAM_INT);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}

//Iniciar sesión doctor
	static public function IngresarDoctorM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("SELECT usuario, clave, apellido, nombre, sexo, foto, rol, id FROM $tablaBD WHERE usuario = :usuario");

		$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;

	}


	//Ver Perfil Doctor
	static public function VerPerfilDoctorM($tablaBD, $id){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_STR);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;

	}


//Actualizar Perfil Doctor
	static public function ActualizarPerfilDoctorM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET id_consultorio = :id_consultorio, apellido = :apellido, nombre = :nombre, foto = :foto, usuario = :usuario, clave = :clave, horarioE = :horarioE, horarioS = :horarioS WHERE id = :id");

		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":id_consultorio", $datosC["consultorio"], PDO::PARAM_INT);
		$pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
		$pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
		$pdo -> bindParam(":foto", $datosC["foto"], PDO::PARAM_STR);
		$pdo -> bindParam(":horarioE", $datosC["horarioE"], PDO::PARAM_STR);
		$pdo -> bindParam(":horarioS", $datosC["horarioS"], PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}


}