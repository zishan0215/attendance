
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
						<thead><tr><th>S.No.</th><th>Roll Number</th><th>Student Id</th><th>Name</th><th>Semester</th><th>Attendance</th><th>Total Classes</th></tr></thead>
						<tbody>
						<?php
							$counter = 1;
							foreach($rows as $r){
								foreach($rows2 as $r2) {
									if($r->student_id === $r2->student_id) {
										echo '<tr><td>' . $counter++ .'</td><td>' . $r->student_id;
										echo '</td><td>' . $r2->roll_number . '</td><td>' . $r2->student_name;
										echo '</td><td>' . $r2->semester;
										echo '</td><td>' . $r->attendance . '</td><td>' . $r->total_classes;
										echo '</td></tr>';
									}
								}								
							}
						?>
						</tbody>
					</table>
				</section>
			</div>
		</div>
	</div>

<?php $this->load->view('teachers/components/teacher_footer'); ?>