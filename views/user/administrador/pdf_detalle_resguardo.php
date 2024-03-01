<?php

// Include the main TCPDF library (search for installation path).
require_once('vendor/tcpdf/tcpdf.php');
require_once('models/model.resguardo.php');
require_once('models/model.resguardo_detalle.php');
require_once('models/model.articulo.php');

$id = $_GET['id'];
$idR = $_GET['idR'];
$detalle->getOne($id);
$resguardo->getOne($idR);

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
$pdf->SetFont('helvetica', 'B', 25);
$pdf->SetFont('helvetica', '', 11);


// add a page
$pdf->AddPage();
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Print a table



$html = '<h2 style="text-align:center"><br><br><br><br><br><br></h2>
<style>
                table, tr, td{
                    text-align: center;
                    font-size: 8.5vh;
                }
                th{
                    text-align: center;
                    font-size: 9vh;
                }    

            </style>

<table border="1" align="center">
	
	<thead>
	<tr style="background-color:#9D2449;color:#FFFFFF;">
		<th colspan="6"><h2><b>Articulos</b></h2></th>
	</tr>
	
	<tr style="background-color:#56242A;color:#FFFFFF;">
		<th><b>Articulo</b></th>
		<th><b>Marca</b></th>
		<th><b>Serie</b></th>
		<th><b>Modelo</b></th>
	    <th><b>Inv interno</b></th>
	    <th><b>Inv externo</b></th>
     </thead>
	</tr>';

//insertar registros//
 $detalle->getWhere("fk_resguardo=$idR");
    while ($row = $detalle->next()) {
	$html .= "<tr>";
	$html .= "<td>{$row->nombre_articulo}</td>";
	$html .= "<td>{$row->marca}</td>";
	$html .= "<td>{$row->num_serie}</td>";
	$html .= "<td>{$row->modelo}</td>";
	$html .= "<td>{$row->inv_interno}</td>";
	$html .= "<td>{$row->inv_externo}</td>";
	$html .= "</tr>";
}
//cerrar la tabla//
$html .='</table>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

$pdf->SetXY( 10,40); $pdf->Cell(10,10,"Usuario: ".$resguardo->data->otorgante);
$pdf->SetXY( 10,47); $pdf->Cell(10,10,"Resguardante: " . $resguardo->data->nombre_completo);
$pdf->SetXY( 149,40); $pdf->Cell(10,10,"Folio: ". $resguardo->data->num_resguardo);
$pdf->SetXY( 149,47); $pdf->Cell(10,10,"Fecha: ".$resguardo->data->created_at);

$pdf->SetXY( 40,220); $pdf->Cell(10,10);


$pdf->SetXY(15, 240);

$pdf->Cell(5, 0, '', 0, $ln=0, 'C', 0, '', 0, false, 'T', 'C');
$pdf->Cell(80, 0, 'Resguardante', 0, $ln=0, 'C', 0, '', 0, false, 'C', 'C');
$pdf->Cell(5, 0, '', 0, $ln=0, 'C', 0, '', 0, false, 'B', 'C');
$pdf->Cell(5, 0, '', 0, $ln=0, 'C', 0, '', 0, false, 'A', 'C');
$pdf->Cell(80, 0, 'Autorizó', 0, $ln=0, 'C', 0, '', 0, false, 'C', 'C');
$pdf->Cell(5, 0, '', 0, $ln=0, 'C', 0, '', 0, false, 'D', 'C');

$pdf->SetXY(15, 250);

$pdf->Cell(5, 0, '', 0, $ln=0, 'C', 0, '', 0, false, 'T', 'C');
$pdf->Cell(80, 0, '______________________', 0, $ln=0, 'C', 0, '', 0, false, 'C', 'C');
$pdf->Cell(5, 0, '', 0, $ln=0, 'C', 0, '', 0, false, 'B', 'C');
$pdf->Cell(5, 0, '', 0, $ln=0, 'C', 0, '', 0, false, 'A', 'C');
$pdf->Cell(80, 0, '______________________', 0, $ln=0, 'C', 0, '', 0, false, 'C', 'C');
$pdf->Cell(5, 0, '', 0, $ln=0, 'C', 0, '', 0, false, 'D', 'C');

$pdf->SetXY(15, 255);

$pdf->Cell(5, 0, '', 0, $ln=0, 'C', 0, '', 0, false, 'T', 'C');
$pdf->Cell(80, 0,$resguardo->data->nombre_completo, 0, $ln=0, 'C', 0, '', 0, false, 'C', 'C');
$pdf->Cell(5, 0, '', 0, $ln=0, 'C', 0, '', 0, false, 'B', 'C');
$pdf->Cell(5, 0, '', 0, $ln=0, 'C', 0, '', 0, false, 'A', 'C');
$pdf->Cell(80, 0,$resguardo->data->otorgante, 0, $ln=0, 'C', 0, '', 0, false, 'C', 'C');
$pdf->Cell(5, 0, '', 0, $ln=0, 'C', 0, '', 0, false, 'D', 'C');



//Close and output PDF document
$pdf->Output('Resguardo.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
