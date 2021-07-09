<?php  

require 'fpdf/fpdf.php'; //Llamamos a la libreria FPDF

$pdf = new FPDF(); //Constructor Puede resibir 3 parametros (alineacion hoja,Tipo de medida de la hoja, tamaño de la hoja )

$pdf->AddPage(); //Agregamos una pagina nueva 

$pdf->SetFont('Arial','B',15); //Creamos el tipo de leta, estilo(negrita etc), y por ultimo el tamaño

$pdf->SetXY(50,80); //Posicionamineto de la celdas
$pdf->Cell(100, 10, 'Hola Mundo', 1, 1, 'C'); //Colocamos el  tamaño de la celda 

//$pdf->SetXY(50,90); //Posicionamineto de la celdas
//$pdf->Cell(100, 10, 'Hola Mundo2', 1, 1, 'C'); //Colocamos el  tamaño de la celda

$y = $pdf->GetY();
$pdf->SetY($y+10);//Posicionamiento personalizado
$pdf->Cell(100, 10, 'Hola mundo3 esaskddsj asdjkadkads jsdk', 1, 1, 'C'); //Colocamos el  tamaño de la celda



$pdf->MultiCell(100, 5, 'Hola mundo esaskddsj asdjkadkads jsdkasdkasdkj', 1, 'L', 0);//Largo, Alto, texto, borde, alineacion, Fondo

$pdf->Output(); //Mandamos a llamar el pdf

?>
