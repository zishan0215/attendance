<?php


$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$title = "PDF Report";
$obj_pdf->SetTitle($title);
//$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING);
//$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->SetDefaultMonospacedFont('helvetica');
//$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$obj_pdf->setPrintHeader(false);
$obj_pdf->setPrintFooter(false);


$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$obj_pdf->SetFont('helvetica', '', 9);
$obj_pdf->setFontSubsetting(false);
$obj_pdf->AddPage();
ob_start();
$sem = 3;
$from_date = date('d');
$to_date = date('y');
// we can have any view part here like HTML, PHP etc
?>
 <div>
		<div>
			<!-- Main column -->
			<div>
				<section>
					<h1><small>Semester: <?php echo $sem; ?></small></h1>
					<h1><small>Duration: <?php echo $from_date . " - " . $to_date; ?></small></h1>
					<br>
					<div>
						<?php for($i=0;$i<5;$i++) echo '<p>Testing</p>';?>
					</div>
				</section> 


			</div>
		</div>
	</div>
<?php 
 //for ($i=0;$i<100;$i++) echo '<div>Hello</div>'; 
$content = ob_get_contents();
ob_end_clean();
$obj_pdf->writeHTML($content, true, false, true, false, '');
$obj_pdf->Output('output.pdf', 'I');