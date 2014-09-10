<?php
	$date = DateTime::createFromFormat('Y-m-d', $this->data['from_date']);
	$from_date = htmlspecialchars($date->format('j M Y'), ENT_QUOTES, "UTF-8");
	$date = DateTime::createFromFormat('Y-m-d', $this->data['to_date']);
	$to_date = htmlspecialchars($date->format('j M Y'), ENT_QUOTES, "UTF-8");
?>
	<div class="container">
		<div class="row">
			<!-- Main column -->
			<div class="col-md-12">
				<section>
					<h1><small>Semester: <?php echo $this->data['sem']; ?></small></h1>
					<h1><small>Duration: <?php echo $from_date . " - " . $to_date; ?></small></h1>
					<br>
				</section>

				<section>
					<table class="table table-condensed">
						<thead><tr><th>S.No.</th><th>Roll Number</th><th>Student Id</th><th>Name</th>
						<th>
							<?php
								foreach ($subjects as $subj) {
									echo $subj["name"];
									echo '</th>';
									echo '<th>';
								}
								/*foreach ($indiv2 as $subj) {
									echo $subj["name"] . " " . $subj["count"];
									echo '</th>';
									echo '<th>';
								}*/
							?>
						</th>
						<th>Total Attendance</th><th>Total Classes</th><th>Percentage</th></tr></thead>
						<tbody>
							<!--<tr>
								<td></td><td></td><td></td><td></td>
								<th>
									<?php
										/*foreach ($subjects as $subj) {
											echo '<td>';
											echo $subj["name"] . "&nbsp;";
											echo '</td>';
										}*/
									?>
								</th>
							</tr>-->
							<!--<tr>
								<td></td><td></td><td></td><td></td>
								<th>
									<table class="table">
									<thead>
									<tr>
									<?php
										foreach ($subjects as $subj) {
											echo '<th>';
											echo $subj["name"] ;
											echo '</th>';
										}
									?>
									</tr>
									</thead>
									</table>
								</th>
							</tr>-->
						<?php
							$counter = 1;
							foreach($table as $d){
								echo '<tr><td>' . $counter++ .'</td><td>' . $d["roll_number"];
								echo '</td><td>' . $d["student_id"] . '</td><td>' . $d["name"];
								echo '</td><td>';
								//echo  $d["attendance"];
								foreach ($d["attendance"] as $key) {
									if($key["id"] == $d["student_id"]){
										echo '&nbsp;';
										echo $key["val_in"];
										echo '</td>';
										echo '<td>';
									}
								}
								echo '</td><td>' . $d["total_attendance"];
								echo '</td><td>' . $d["total_classes"];
								echo '</td><td>' . number_format($d["percentage"],2) . '%';
								echo '</td></tr>';
							}
						?>
						</tbody>
					</table>
				</section>
			</div>
		</div>
	</div>

<?php $this->load->view('admin/components/admin_footer'); ?>
