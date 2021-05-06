<?php
include "../koneksi.php";
require ('fpdf182/fpdf.php');


$pdf = new FPDF('P', 'mm',array(210,297)); 
$pdf->AddPage();

$pdf->SetFont('Arial','B',18);
$pdf->Cell(60);
$pdf->Cell(66,10,'Laporan Data Alat Tulis Kantor',0,1,'C');


$pdf->SetFont('Arial','B',14);
$pdf->Cell(60);
$pdf->Cell(66,10,'Lab Psikologi',0,1,'C');
$pdf->Cell(66,10,'______________________________________________________________________________________________________________________________________',0,1,'C');
$pdf->Ln(10);

$pdf->SetFont('Arial','B',11);
$pdf->Cell(2);
$pdf->Cell(90,7,'Alat Tulis Kantor',1,0,'C');
$pdf->Cell(90,7,'Jumlah',1,0,'C');

$pdf->SetFont('Arial','',11);

$report= mysqli_query($sambung,"SELECT * FROM tbpdatk order by atk ASC") or die (mysqli_error());

while ($data = mysqli_fetch_array($report)) {
	$pdf->Ln(7);
	$pdf->Cell(2);
	$pdf->Cell(90,7,$data['atk'],1,0,'C');
	$pdf->Cell(90,7,$data['jumlah'],1,0,'C');

}


$report= mysqli_query($sambung,"SELECT * FROM tbpmatk order by pmatk ASC") or die (mysqli_error());

while ($data = mysqli_fetch_array($report)) {
	$pdf->Ln(7);
	$pdf->Cell(2);
	$pdf->Cell(90,7,$data['pmatk'],1,0,'C');
	$pdf->Cell(90,7,$data['pmjumlah'],1,0,'C');

}

$report= mysqli_query($sambung,"SELECT * FROM tbplatk order by platk ASC") or die (mysqli_error());

while ($data = mysqli_fetch_array($report)) {
	$pdf->Ln(7);
	$pdf->Cell(2);
	$pdf->Cell(90,7,$data['platk'],1,0,'C');
	$pdf->Cell(90,7,$data['pljumlah'],1,0,'C');

}



$pdf->Output();


?>