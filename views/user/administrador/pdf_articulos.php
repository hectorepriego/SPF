<?php

session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=login');
}


// Include the main TCPDF library (search for installation path).
require_once('vendor/tcpdf/tcpdf.php');
require_once('models/model.articulo.php');

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
		$img_file = ("resources/img/Hoja-Membretada.jpg");
		$this->Image($img_file, 0, 0, 220, 305, '', '', '', false, 300, '', false, false, 0);
		// restore auto-page-break status
		$this->SetAutoPageBreak($auto_page_break, $bMargin);
		// set the starting point for the page content
		$this->setPageMark();
	}
	public function Footer() {

	
		if ($this->tocpage) {
			// *** replace the following parent::Footer() with your code for TOC page
			parent::Footer();
		} else {
			// *** replace the following parent::Footer() with your code for normal pages
			parent::Footer();
		}
		$img_file = ("resources/img/Gobierno.png");
		$this->Image($img_file, 10, 270, 10, 15, '', '', '', false, 0, '', false, false, 0);


		$img_file = ("resources/img/info.png");
		$this->Image($img_file,30, 274, 150, 10, '', '', '', false, 0, '', false, false, 0);
	}	
}


// create new PDF document
$pdf = new MYPDF("portrait", PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set header and footer fonts
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
// set margins
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
// set font
$pdf->SetFont('helvetica', 'B', 20);
$pdf->SetFont('helvetica', '', 7);


// add a page
$pdf->AddPage();

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Print a table



$html = '<h2 style="text-align:center"><br><br><br><br><br><br><br><br></h2>

<table border="1" align="center">
	<thead>
	<tr style="background-color:#9D2449;color:#FFFFFF;">
		<th colspan="11"><h2><b>Listado de Articulos</b></h2></th>
	</tr>
	<tr  style="background-color:#56242A;color:#FFFFFF;">
		<td><b>Nombre Articulo</b></td>
		<td><b>Inv. Interno</b></td>
		<th><b>Inv. Externo</b></th>
		<th><b>No. Serie</b></th>
		<th><b>Modelo</b></th>
		<th><b>Ip Address</b></th>
		<th><b>Mac Address</b></th>
		<th><b>Ubicacion</b></th>
        <th><b>Marca</b></th>
        <th><b>Estatus</b></th>
        <th><b>Categoria</b></th>
     </thead>
	</tr>';

	if($articu){
        $articulo->getWhere("nombre_articulo LIKE '%{$articu}%' OR inv_interno LIKE '%{$articu}%' OR inv_externo LIKE '%{$articu}%' OR num_serie LIKE '%{$articu}%' OR marca LIKE '%{$articu}%' OR estatus LIKE '%{$articu}%' OR categoria LIKE '%{$articu}%' OR nombre_completo LIKE '%{$articu}%'"); 
    //echo "filtro"        
    }
    else{
        $articulo->getArticulo();
    }
	while($row=$articulo->next()){
		$html .= "<tr>";
		$html .= "<td>{$row->nombre_articulo}</td>";
		$html .= "<td>{$row->inv_interno}</td>";
		$html .= "<td>{$row->inv_externo}</td>";
		$html .= "<td>{$row->num_serie}</td>";
		$html .= "<td>{$row->modelo}</td>";
		$html .= "<td>{$row->ip_address}</td>";
		$html .= "<td>{$row->mac_address}</td>";
		$html .= "<td>{$row->ubicacion}</td>";
		$html .= "<td>{$row->marca}</td>";
		$html .= "<td>{$row->estatus}</td>";
		$html .= "<td>{$row->categoria}</td>";
		$html .= "</tr>";
	}
//cerrar la tabla//
$html .='</table>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

//Close and output PDF document
$pdf->Output('example_006.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
