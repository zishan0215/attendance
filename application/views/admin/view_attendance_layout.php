<?php
$from_date_edit = $from_date;
$to_date_edit = $to_date;
$date = DateTime::createFromFormat('Y-m-d', $from_date);
$from_date = htmlspecialchars($date->format('j M Y'), ENT_QUOTES, "UTF-8");
$date = DateTime::createFromFormat('Y-m-d', $to_date);
$to_date = htmlspecialchars($date->format('j M Y'), ENT_QUOTES, "UTF-8");

?>
	<div class="container">
		<div class="row">
			<!-- Main column -->
			<div class="col-md-12">
				<section>
					<h2>Attendance</h2>
					<br />
					<div class="col-md-5">
						<table class="table">
							<tr><td><b>Subject Code</b></td><td><?php echo $subject->subject_code; ?></td></tr>
							<tr><td><b>Subject Name</b></td><td><?php echo $subject->subject_name; ?></td></tr>
							<tr><td><b>From Date</b></td><td><?php echo $from_date; ?></td></tr>
							<tr><td><b>To Date</b></td><td><?php echo $to_date; ?></td></tr>
						</table>
					</div>
					<br>
					<table class="table table-striped">
						<thead><tr><th>S.No.</th><th>Roll Number</th><th>Student Id</th><th>Name</th><th>Semester</th><th>Attendance</th><th>Total Classes</th><th>Edit</th></tr></thead>
						<tbody>
						<?php
							$counter = 1;
							foreach($rows->result() as $r){
								echo '<tr><td>' . $counter++ .'</td><td>' . $r->roll_number;
								echo '</td><td>' . $r->student_id . '</td><td>' . $r->student_name;
								echo '</td><td>' . $r->semester;
								echo '</td><td>' . $r->attendance . '</td><td>' . $r->total_classes;
								echo '</td><td>'.
								'<form action="/jmiams/index.php/admin/edit_attendance" method="post">
								<input type="hidden" value="' . $r->student_name .'" name="student_name" />
								<input type="hidden" value="' . $r->student_id .'" name="student_id" />
								<input type="hidden" value="' . $subject->subject_code .'" name="subject_code" />
								<input type="hidden" value="' . $from_date_edit .'" name="from_date" />
								<input type="hidden" value="' . $to_date_edit .'" name="to_date" />
								<input type="hidden" value="' . $r->attendance .'" name="attendance" />
								<input type="hidden" value="' . $r->total_classes .'" name="total_classes" />
								<input type="submit" class="btn btn-primary Ebtn" value="Edit" name="Edit" ></form>';
								echo '</td></tr>';
							}
						?>
						</tbody>
					</table>
				</section>
			</div>
		</div>
	</div>

<?php $this->load->view('teachers/components/teacher_footer'); ?>
