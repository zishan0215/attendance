<?php
if(isset($rows)) {
	$from_date_edit = $from_date;
	$to_date_edit = $to_date;
	$date = DateTime::createFromFormat('Y-m-d', $from_date);
	$from_date_submit = htmlspecialchars($date->format('j M Y'), ENT_QUOTES, "UTF-8");
	$date = DateTime::createFromFormat('Y-m-d', $to_date);
	$to_date_submit = htmlspecialchars($date->format('j M Y'), ENT_QUOTES, "UTF-8");
}
?>
	<div class="container">
		<div class="row">
			<!-- Main column -->
			<div class="col-md-12">
				<section>
					<h2>Attendance</h2>
					<br />
				</section>
				<section>
					<h4>Select Period</h4>
					<form class="form-inline" role="form" action="/jmiams/index.php/teacher/view_attendance" method="post">
						<div class="form-group">
							<select class="form-control" name="period">
								<?php
									foreach($period as $p) {
										$date = DateTime::createFromFormat('Y-m-d', $p->from_date);
										$from_date = htmlspecialchars($date->format('j M Y'), ENT_QUOTES, "UTF-8");
										$date = DateTime::createFromFormat('Y-m-d', $p->to_date);
										$to_date = htmlspecialchars($date->format('j M Y'), ENT_QUOTES, "UTF-8");
										echo '<option value="' . $p->from_date . '#' . $p->to_date . '">' . $from_date . ' - ' . $to_date . '</option>';
									}
								 ?>
							</select>&nbsp;&nbsp;
							<input type="hidden" name="subject_code" value=<?php echo '"'. $code .'"'?> />
							<input type="submit" name="submit" value="Submit" class="btn btn-success" />&nbsp;&nbsp;
						</div>
					</form>
					<br>
				</section>
				<section>
					<?php
						if(isset($rows)) {
							echo "
							<div class=\"col-md-5\">
								<table class=\"table\">
									<tr><td><b>Subject Code</b></td><td>$subject->subject_code</td></tr>
									<tr><td><b>Subject Name</b></td><td>$subject->subject_name</td></tr>
									<tr><td><b>From Date</b></td><td>$from_date_submit</td></tr>
									<tr><td><b>To Date</b></td><td>$to_date_submit</td></tr>
								</table>
							</div>
							<br>
							<table class=\"table table-striped\">
								<thead><tr><th>S.No.</th><th>Roll Number</th><th>Student Id</th><th>Name</th><th>Semester</th><th>Attendance</th><th>Total Classes</th><th>Edit</th></tr></thead>
								<tbody>
								";
								$counter = 1;
								foreach($rows->result() as $r){
									echo '<tr><td>' . $counter .'</td><td>' . $r->roll_number;
									echo '</td><td>' . $r->student_id . '</td><td>' . $r->student_name;
									echo '</td><td>' . $r->semester;
									echo '</td><td>' . $r->attendance . '</td><td>' . $r->total_classes;
									echo '</td><td>' .
									'<form action="/jmiams/index.php/teacher/edit_attendance" method="post">
									<input type="hidden" value="' . $r->student_name .'" name="student_name" />
									<input type="hidden" value="' . $r->student_id .'" name="student_id" />
									<input type="hidden" value="' . $subject->subject_code .'" name="subject_code" />
									<input type="hidden" value="' . $from_date_edit .'" name="from_date" />
									<input type="hidden" value="' . $to_date_edit .'" name="to_date" />
									<input type="hidden" value="' . $r->attendance .'" name="attendance" />
									<input type="hidden" value="' . $r->total_classes .'" name="total_classes" />
									<input type="submit" id="e'. $counter++.'" class="btn btn-primary Ebtn" value="Edit"'; if($final_submission === 1) echo ' disabled'; echo '/>
									</form>';
									echo '</td></tr>';
								}
							echo "
								</tbody>
							</table>
							";
							?>
							<div class="col-md-offset-5">
								<button class="btn btn-success" onclick="finalSubmit(<?php echo '\''. $subject->subject_code . '\',\'' . $from_date_edit . '\',\'' . $to_date_edit .'\''; ?>);">Final Submit</button><br/><br/><br/>
							</div>
							<div class="col-md-offset-4" id="success">
								
							</div>
							<?php
						}
					?>
				</section>
			</div>
		</div>
	</div>
	
	
<?php $this->load->view('teachers/components/teacher_footer'); ?>
