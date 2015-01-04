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
					<form action="/jmiams/admin/total_attendance_pdf" method="post" class="pull-right">
						<input type="hidden" name="semester" value="<?php echo $fsemester;?>">
						<?php 
							for($fcounter=1; $fcounter <= $fcount; $fcounter++) {
								$next='a'.$fcounter;
								?>
								<input type="hidden" name="<?php echo $fcounter ?>" value="<?php echo $$next; ?>">
								<?php  
							}
						?>
						<input type="submit" name="pdf_generate" class="btn btn-success" value="Generate PDF" target="_blank">
					</form>
					<h1><small>Semester: <?php echo $this->data['sem']; ?></small></h1>
					<h1><small>Duration: <?php echo $from_date . " - " . $to_date; ?></small></h1>
					<!-- form role="form" class="form-inline" method="post" action="/jmiams/index.php/admin/total_attendance">
						<input type="text" name="filter" placeholder="Apply filter" <?php if($filter !=101) echo "value=\"{$filter}\""; ?> class="form-control">
						<input type="hidden" name="semester" value="<?php echo $fsemester; ?>">
						<?php //$i=1; $next='a'.$i; echo "<p>".$$next."</p>"; ?>
						<?php 
							for($fcounter=1; $fcounter <= $fcount; $fcounter++) {
								$next='a'.$fcounter;
								?>
								<input type="hidden" name="<?php echo $fcounter ?>" value="<?php echo $$next; ?>">
								<?php  
							}
						?>
						<div class="form-group">
							<input type="submit" name="submit_filter" class="btn btn-default" value="Go">
						</div>
					</form -->
					<br>
				</section>

				<section>
					<table class="table table-bordered">
						<thead><tr><th>S.No.</th><th>Roll Number</th><th>Student Id</th><th>Name</th>
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
								<th></th><th></th><th></th><th></th>
								<th>
									<?php
										foreach ($head_class as $head) {
											echo $head["total"];
											echo '</th><th>';
										}
									?>
								
								<?php
									if(($this->data['sem'] != 7) && ($this->data['sem'] != 8))
										echo $this->data['head_total'];
								?></th>
								<th></th>
								<?php
									if(($this->data['sem'] == 7) || ($this->data['sem'] == 8))
										echo '<th></th>';
								?>

							</tr>
						</thead>
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
								if($d["percentage"] <= $filter) {
									echo '<tr><td>' . $counter++ .'</td><td>' . $d["roll_number"];
									echo '</td><td>' . $d["student_id"] . '</td><td>' . $d["name"];
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
									echo '<td>' . $d["total_attendance"];
									if(($this->data['sem'] == 7) || ($this->data['sem'] == 8))
										echo '</td><td>' . $d["total_classes"];
									echo '</td><td>' . number_format($d["percentage"],2) . '%';
									echo '</td></tr>'."\n";
								}
							}
						?>
						</tbody>
					</table>
				</section>
			</div>
		</div>
	</div>

<?php $this->load->view('admin/components/admin_footer'); ?>
