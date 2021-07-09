<?php 

require_once "ConexionBD.php";

class AdminM extends ConexionBD {

//Ingresar Admin
	static public function IngresarAdminM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("SELECT id, usuario, clave, nombre, apellido, foto, rol FROM $tablaBD WHERE usuario = :usuario");

		$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);

		$pdo->execute();

		return $pdo -> fetch();

		$pdo->close();
		$pdo = null;

	}

	//Ver Perfil ADMIN 

	static public function VerPerfilAdminM($tablaBD, $id){


		$pdo = ConexionBD::cBD()->prepare("SELECT id, usuario, clave, nombre, apellido, foto, rol FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);

		$pdo->execute();

		return $pdo -> fetch();

		$pdo->close();
		$pdo = null;
	}


//Actualizar Perfil
	static public function ActualizarPerfilAdminM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET usuario = :usuario, clave = :clave, nombre = :nombre, apellido = :apellido, foto = :foto WHERE id = :id");

		$pdo ->bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo ->bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
		$pdo ->bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
		$pdo ->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo ->bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
		$pdo ->bindParam(":foto", $datosC["foto"], PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}

		$pdo->close();
		$pdo = null;

	}


}
