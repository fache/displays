<?php
	require("pdf/fpdf.php");
	
	$pdfdoc=simplexml_load_file("proizvodi.xml")  or die("Error: Cannot create object");

	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial', 'B', '14');
	
	$pdf->Cell(190, 10, 'Nazivi i indeksi artikala' , 0, 1, 'C');
	foreach($pdfdoc->artikal as $artikalxml){
		$pdf->Cell(95, 10, $artikalxml->Naziv , 1, 0,'C');
		$pdf->Cell(95, 10, $artikalxml->ID , 1, 1, 'C');
	}	
	
	$pdf->Output();

?>