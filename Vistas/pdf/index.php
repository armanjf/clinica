<?php
	include 'plantilla.php';
	require 'conexion.php';
	
	$query = "SELECT id, nombre, apellido, documento FROM pacientes ";
	$resultado = $mysqli->query($query);

	$query = "SELECT id_consultorio, nombre, apellido FROM pacientes ";
	$resultado1 = $mysqli->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(10,6,'ID',1,0,'C',1);
	$pdf->Cell(30,6,'NOMBRE',1,0,'C',1);
	$pdf->Cell(30,6,'APELLIDO',1,0,'C',1);
	$pdf->Cell(30,6,'DOCUMENTO',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(10,6,utf8_decode($row['id']),1,0,'C');
		$pdf->Cell(30,6,$row['nombre'],1,0,'C');
		$pdf->Cell(30,6,$row['apellido'],1,0,'C');
		$pdf->Cell(30,6,utf8_decode($row['documento']),1,1,'C');
	}

	$pdf->SetFont('Arial','',100);
	
	while($row = $resultado1->fetch_assoc())
	{
		$pdf->Cell(10,6,utf8_decode($row['id_consultorio']),1,0,'C');
		$pdf->Cell(30,6,$row['nombre'],1,10,'C');
		$pdf->Cell(30,6,$row['apellido'],1,0,'C');
		//$pdf->Cell(30,6,utf8_decode($row['documento']),1,1,'C');
	}
	
	$pdf->Output();
?>