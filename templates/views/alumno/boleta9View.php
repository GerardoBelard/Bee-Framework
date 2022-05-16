<?php
require('fpdf/fpdf.php');
$estadoc="";
if($d->a->intermedio4 > 80){
    $estadoc="APROBADO";
}
else{
    $estadoc="REPROBADO";
}
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo1
    //$this->Image(ASSETS.'images/cle.jpeg',20,8,33);
	// Logo2
	$this->Image(ASSETS.'images/headerboleta.jpeg',10,8,200);
	// Logo3
	//$this->Image(ASSETS.'images/cle.jpeg',140,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,80,utf8_decode('COORDINACION DE LENGUAS EXTRANJERAS'),0,0,'C');
    $this->Cell(-40,90,utf8_decode('TecNM-SEV-DVIA-PCLE-01/27-ITGAM-09'),0,0,'C');
    // Salto de línea
    $this->Ln(70);
}

// Pie de página
function Footer()
{
	    // Logo1
		//$this->Image(ASSETS.'images/cle.jpeg',20,250,33);
		// Logo2
	    $this->Image(ASSETS.'images/footerboleta.jpeg',10,250,200);
		//$this->Image(ASSETS.'images/cle.jpeg',80,250,33);
		// Logo3
		//$this->Image(ASSETS.'images/cle.jpeg',140,250,33);
		// Arial bold 15
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
//for($i=1;$i<=40;$i++)
// $pdf->Cell(30,10,utf8_decode('Imprimiendo línea'.$d->a->id).$i,0,1);
$pdf->Cell(40,10,utf8_decode(' No. Control: '.$d->a->numero),0,1,0);
$pdf->setXY(13,90);
$pdf->Cell(15,10,utf8_decode(' Nombre : '),0,1,0);
$pdf->Cell(20,3,utf8_decode($d->a->nombre_completo),0,1,'L',0);


$pdf->SetXY(10,110);
$pdf->Cell(190,10,utf8_decode('BOLETA DE MUDULO DE INGLES'),1,1,'C',0);
$pdf->Cell(40,10,utf8_decode('MODULO'),1,0,'C',0);
$pdf->Cell(50,10,utf8_decode('CALIFICACIÓN'),1,0,'C',0);
$pdf->Cell(50,10,utf8_decode('RESULTADO'),1,0,'C',0);
$pdf->Cell(50,10,utf8_decode('PERIODO'),1,1,'C',0);
$pdf->Cell(40,10,utf8_decode('INTERMEDIO 4'),1,0,'C',0);
$pdf->Cell(50,10,utf8_decode($d->a->intermedio4),1,0,'C',0);
$pdf->Cell(50,10,utf8_decode($estadoc),1,0,'C',0);
$pdf->Cell(50,10,utf8_decode('ENERO-AGOSTO 2022'),1,0,'C',0);

$pdf->SetXY(10,150);
$pdf->Cell(190,10,utf8_decode('C.L.E'),0,1,'C',0);
$pdf->Cell(190,5,utf8_decode('Coordinacion de Lenguas Exranjeras'),0,0,'C',0);


$pdf->Output();

?>