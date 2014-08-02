
	<div class="container">
		<div class="row">
			<!-- Main column -->
			<div class="col-md-9">
				<section>
					<h2>Welcome, <?php echo $name; ?></h2><br><br>
				</section>
				<table class="table table-striped">
					<thead><tr><th>S.no.</th><th>Subject Code</th><th>Subject Name</th><th>Semester</th><th>View</th><th>Attendance</th></tr></thead>
					<tbody>
						<?php 	
							$counter = 1;
							foreach($rows as $r){
								echo '<tr><td>' . $counter++ . '</td><td>' . $r->subject_code . '</td><td>' . $r->subject_name . '</td><td>' . $r->semester . '</td><td><a href="#" class="btn btn-primary">View</a></td><td><a href="#" class="btn btn-primary">Feed</a></td></tr>';
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

<?php $this->load->view('teachers/components/teacher_footer'); ?>