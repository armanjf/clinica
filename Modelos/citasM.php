<?php 

require_once "ConexionBD.php";

class CitasM extends ConexionBD {

	//Pedir Cita Clientes 
	static public function EnviarCitaM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (id_doctor, id_consultorio, id_paciente, nyaP, documento, inicio, fin) VALUES (:id_doctor, :id_consultorio, :id_paciente, :nyaP, :documento, :inicio, :fin)");

		$pdo -> bindParam("id_doctor", $datosC["Did"], PDO::PARAM_INT);
		$pdo -> bindParam("id_consultorio", $datosC["Cid"], PDO::PARAM_INT);
		$pdo -> bindParam("id_paciente", $datosC["Pid"], PDO::PARAM_INT);
		$pdo -> bindParam("nyaP", $datosC["nyaC"], PDO::PARAM_STR);
		$pdo -> bindParam("documento", $datosC["documentoC"], PDO::PARAM_STR);
		$pdo -> bindParam("inicio", $datosC["fyhIC"], PDO::PARAM_STR);
		$pdo -> bindParam("fin", $datosC["fyhFC"], PDO::PARAM_STR);

		if ($pdo->execute()){
			
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}

	//Ver Citas En Calendario 

	static public function VerCitasM($tablaBD){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");

		$pdo -> execute();

		return $pdo -> fetchAll();

		$pdo -> close();
		$pdo = null;
	}

	
	//Pedir cita como doctor
	static public function PedirCitaDoctorM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (id_doctor, id_consultorio, nyaP, documento, inicio, fin) VALUES (:id_doctor, :id_consultorio, :nyaP, :documento, :inicio, :fin)");

		$pdo -> bindParam(":id_doctor", $datosC["Did"], PDO::PARAM_INT);
		$pdo -> bindParam(":id_consultorio", $datosC["Cid"], PDO::PARAM_INT);
		$pdo -> bindParam(":nyaP", $datosC["nombreP"], PDO::PARAM_STR);
		$pdo -> bindParam(":documento", $datosC["documentoP"], PDO::PARAM_STR);
		$pdo -> bindParam(":inicio", $datosC["fyhIC"], PDO::PARAM_STR);
		$pdo -> bindParam(":fin", $datosC["fyhFC"], PDO::PARAM_STR);

		if($pdo->execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}
}