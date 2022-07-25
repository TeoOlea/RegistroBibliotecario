<?php

	session_start();
	//require_once __DIR__ . '/../vendor/autoload.php';
	require_once('vendor/autoload.php');
	require_once('plantillaTabla2.php');
	
	$mpdf = new \Mpdf\Mpdf(['margin_left' => 8, 'margin_right' => 8, 'margin_top' => 37, 'margin_bottom' => 30,
	'orientation' => 'L', 'format' => 'letter']);
	
	$mpdf->SetDisplayMode('fullpage');
	
	$stylesheet = file_get_contents('css/estiloPDF2.css');
	$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	
	$mpdf->SetHTMLHeader('<div class="header">
		<img src="images/encabezado2.png"/>
	</div>'
	);
	
	$mes_elegido = $_SESSION['mes_anyo'];
	
	$plantilla = getPlantilla($mes_elegido);
	
	$mpdf->SetHTMLFooter('<div class="footer">
		<img src="images/pie_pagina.png"/>
		<table width="100%" style="vertical-align: bottom; font-family: serif; 
			font-size: 8pt; color: #000000; font-weight: bold; font-style: italic;">
			<tr>
				<td width="33%"></td>
				<td width="33%" align="center">Página {PAGENO} de {nbpg}</td>
				<td width="33%" style="text-align: right;"></td>
			</tr>
		</table>
	</div>');
	
	//$mpdf->writeHtml("Hola Mundo", \Mpdf\HTMLParserMode::HTML_BODY);
	$mpdf->writeHtml($plantilla, \Mpdf\HTMLParserMode::HTML_BODY);

	//$mpdf->AddPage('L'); // Adds a new page in Landscape orientation
	//$mpdf->WriteHTML('Hello World');

	$mpdf->Output('FB-02 '.$mes_elegido.'.pdf', 'I');