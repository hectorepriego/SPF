<?php
// Include the main TCPDF library (search for installation path).
require_once('vendor/tcpdf/tcpdf.php');

class MYPDF extends TCPDF {

	//Page header
	public function Header(){
		// get the current page break margin
		$bMargin = $this->getBreakMargin();
		// get current auto-page-break mode
		$auto_page_break = $this->AutoPageBreak;
		// disable auto-page-break
		$this->SetAutoPageBreak(false, 0);
		// set bacground image
		$img_file = ("resources/img/Hoja-MembretadaOficial2.jpg");
		$this->Image($img_file, 0, 0, 210, 295, '', '', '', false, 300, '', false, false, 0);
		$img_file = ("resources/img/logo.png");
		$this->Image($img_file, 8, 9, 70, 30, '', '', '', false, 300, '', false, false, 0);
		// restore auto-page-break status
		$this->SetAutoPageBreak($auto_page_break, $bMargin);
		// set the starting point for the page content
		$this->setPageMark();
	}
	public function Footer() {

	// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('helvetica', 'I', 8);
		// Page number
		$this->Cell(370, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');

		$img_file = ("resources/img/Gobierno.png");
		$this->Image($img_file, 23, 273, 12, 17, '', '', '', false, 0, '', false, false, 0);
	}	
}

// create new PDF document
$pdf = new MYPDF("portrait", PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set header and footer fonts
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
// set margins
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
// set font
$pdf->SetFont('helvetica', '', 12);
$pdf->SetFont('helvetica', '', 12);


$id=$_GET["id"];
$incidencia=$db->record("select * from vw_incidencias where id_incidencias=?", array($id));

// ---------------------------------------------------------


// add a page
$pdf->AddPage();


// ---------------------------------------------------------

// create some HTML content


// output the HTML content
$pdf->writeHTML($html, true, 0, true, 0);

$pdf->SetXY( 140,20); $pdf->Cell(10,10,"Incidencia: ". $incidencia->id_incidencias);
$pdf->SetXY( 140,27); $pdf->Cell(10,10,"Fecha: ". $incidencia->fecha_hora);

$pdf->SetXY( 40,220); $pdf->Cell(10,10);

$pdf->SetXY(15, 70);
$pdf->Cell(180, 0, 'Asunto:', 1, $ln=0, 'L', 0, '', 0, false, 'T', 'C');

$pdf->SetXY(15, 78);
$pdf->Cell(180, 0,$incidencia->asunto, 1, $ln=0, 'L', 0, '', 0, false, 'T', 'C');

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------


// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');



$pdf->SetXY( 22,124); $pdf->Cell(10,10,$incidencia->descripcion);
$pdf->SetXY( 22,172); $pdf->Cell(10,10,$incidencia->solucion);
$pdf->SetXY( 80,242); $pdf->Cell(10,10,$incidencia->nombre_completo);
$pdf->SetXY( 77,248); $pdf->Cell(10,10,$incidencia->departamento);
$pdf->SetXY(128,94); $pdf->Cell(10,10,$incidencia->carrera);
$pdf->SetXY(126,112); $pdf->Cell(10,10,$incidencia->tecnologico_destino);
$pdf->SetXY(24,223); $pdf->Cell(10,10,$incidencia->tecnologico_origen);
$pdf->SetXY(126,223); $pdf->Cell(10,10,$incidencia->tecnologico_destino);
$pdf->SetXY(29,230); $pdf->Cell(10,10,$incidencia->jefe_departamento_origen);
$pdf->SetXY(126,230); $pdf->Cell(10,10,$incidencia->jefe_departamento_destino);



//Close and output PDF document
$pdf->Output('Incidencia.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
