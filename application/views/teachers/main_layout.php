	<div class="container">
		<div class="row">
			<!-- Main column -->
			<div class="col-md-10 col-md-offset-1">
				<section>
					<h2>Welcome, <?php echo $name; ?></h2><br><br>
				</section>
				<table class="table table-striped">
					<thead><tr><th>S.no.</th><th>Subject Code</th><th>Subject Name</th><th>Semester</th><th>View</th><th>Attendance</th></tr></thead>
					<tbody>
						<?php
							$counter = 1;
							foreach($rows as $r){
								echo '<tr><td>' . $counter++ . '</td><td>' . $r->subject_code . '</td><td>' . $r->subject_name . '</td><td>';
								echo  $r->semester . '</td><td><form action="/jmiams/index.php/teacher/view_attendance" method="post">';
								echo '<input type="submit" name="View" class="btn btn-primary" value="View"/>';
								echo '<input type="hidden" name="subject_code" value="' . $r->subject_code .'" />';
								echo '</form></td><td><form action="/jmiams/index.php/teacher/feed_attendance" method="post">';
								echo '<input type="hidden" name="subject_code" value="' . $r->subject_code .'" />';
								echo '<input type="hidden" name="semester" value="' . $r->semester .'" />';
								echo '<input type="submit" name="Feed" class="btn btn-success" value="Feed" ';
									if(in_array($r->subject_code, $this->data['codes'])) echo 'disabled="disabled"';
								echo '/></form></td></tr>';
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

<?php $this->load->view('teachers/components/teacher_footer'); ?>
