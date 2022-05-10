<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo1
    $this->Image(ASSETS.'images/cle.jpeg',20,8,33);
	// Logo2
	$this->Image(ASSETS.'images/cle.jpeg',80,8,33);
	// Logo3
	$this->Image(ASSETS.'images/cle.jpeg',140,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,55,utf8_decode('Boleta Coordinación de Lenguas Extranjeras'),0,0,'C');
    // Salto de línea
    $this->Ln(50);
}

// Pie de página
function Footer()
{
	    // Logo1
		$this->Image(ASSETS.'images/cle.jpeg',20,250,33);
		// Logo2
		$this->Image(ASSETS.'images/cle.jpeg',80,250,33);
		// Logo3
		$this->Image(ASSETS.'images/cle.jpeg',140,250,33);
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
   $pdf->Cell(125,10,utf8_decode('El estudiante '.$d->a->nombre_completo.' con matricula '.$d->a->numero),0,1,0);
   $pdf->Cell(120,11,utf8_decode('Quien aprobo el nivel Intermedio 2 con una calificación de ' .$d->a->intermedio2),0,0,0);

$pdf->Output();
?>