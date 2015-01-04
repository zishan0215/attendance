<?php
	$date = DateTime::createFromFormat('Y-m-d', $this->data['from_date']);
	$from_date = htmlspecialchars($date->format('j M Y'), ENT_QUOTES, "UTF-8");
	$date = DateTime::createFromFormat('Y-m-d', $this->data['to_date']);
	$to_date = htmlspecialchars($date->format('j M Y'), ENT_QUOTES, "UTF-8");
	
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
	$obj_pdf->SetFont('helvetica', '', 7);
	$obj_pdf->setFontSubsetting(false);
	$obj_pdf->AddPage();
	ob_start();
?>
<style>
	table, th, td {
	    border: 1px solid black;
	    padding: 0.5px;
	}
	td {
		padding-left: 2px;
	}
	table {
	    border-spacing: 1.5px;
	}
</style>

	<div style="text-align: center;">
		<h1>BTECH COMPUTER ENGGINEERING</h1>
		<h2>SEMESTER: <?php echo $this->data['sem']; ?></h2>
		<h2>ATTENDANCE FROM: <?php echo $from_date . " - " . $to_date; ?></h2>
	</div>
	<table>
		<thead><tr><th>S.No.</th><th>Roll Number</th><th>Student Id</th><th colspan="2">Name</th>
			<?php
				foreach ($subjects as $subj) {
					echo '<th>';
					echo $subj["name"];
					echo '</th>';
				}
				/*foreach ($indiv2 as $subj) {
					echo $subj["name"] . " " . $subj["count"];
					echo '</th>';
					echo '<th>';
				}*/
			?>
		<th>Total</th>
		<?php
			if(($this->data['sem'] == 7) || ($this->data['sem'] == 8)){
				echo '<th>';
				echo 'Max';
				echo '</th>';
			}
		?>
		<th>Percentage</th></tr></thead>
		<thead>
			<tr>
				<th></th><th></th><th></th><th colspan="2"></th>
				<th>
					<?php
						foreach ($head_class as $head) {
							echo ' '.$head["total"];
							echo '</th><th>';
						}
					?>
				
				<?php
					if(($this->data['sem'] != 7) && ($this->data['sem'] != 8))
						echo ' '.$this->data['head_total'];
				?></th>
				<th></th>
				<?php
					if(($this->data['sem'] == 7) || ($this->data['sem'] == 8))
						echo '<th></th>';
				?>

			</tr>
		</thead>
		<tbody>
			
		<?php
			$counter = 1;
			foreach($table as $d){
				if($d["percentage"] <= $filter) {
					echo '<tr><td>' . $counter++ .'</td><td>' . $d["roll_number"];
					echo '</td><td> ' . $d["student_id"] . '</td><td colspan="2"> ' . $d["name"];
					echo '</td>';
					//echo  $d["attendance"];
					foreach ($d["attendance"] as $key) {
						if($key["id"] == $d["student_id"]){
							echo '<td>';
							echo '&nbsp;';
							if(($this->data['sem']!=7) && ($this->data['sem']!=8)) {
								if($key["val_in"])
								echo $key["val_in"];
								else
									echo ' 0';
								echo '</td>';	
							} else {
								if($key["val_in"])
									echo $key["val_in"];
								else
									echo ' -';
								echo '</td>';
							}
						}
					}
					echo '<td> ' . $d["total_attendance"];
					if(($this->data['sem'] == 7) || ($this->data['sem'] == 8))
						echo '</td><td> ' . $d["total_classes"];
					echo '</td><td> ' . number_format($d["percentage"],2) . '%';
					echo '</td></tr>'."\n";
				}
			}
		?>
		</tbody>
	</table>
<?php 
$content = ob_get_contents();
ob_end_clean();
$obj_pdf->writeHTML($content, true, false, true, false, '');
$obj_pdf->Output('output.pdf', 'I');
?>

