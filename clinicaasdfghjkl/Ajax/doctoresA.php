<?php

require_once "../Controladores/doctoresC.php";
require_once "../Modelos/doctoresM.php";

class DoctoresA{

	public $Did;

	public function EDoctorA(){

		$columna = "id";
		$valor = $this->Did;

		$resultado = DoctoresC::DoctorC($columna, $valor);

		echo json_encode($resultado);
	}
}

if (isset($_POST["Did"])) {

	$eD = new DoctoresA();
	$eD -> Did = $_POST["Did"];
	$eD -> EDoctorA();
}