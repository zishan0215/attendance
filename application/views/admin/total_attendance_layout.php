
	<div class="container">
		<div class="row">
			<!-- Main column -->
			<div class="col-md-9">
				<section>
					<h2>Total Attendance Here</h2>
					<br>
				</section>
				<section>
					<table class="table table-striped"> 	
						<thead><tr><th>S.No.</th><th>Roll Number</th><th>Student Id</th><th>Name</th><th>Semester</th><th>Attendance</th><th>Total Classes</th></tr></thead>
						<tbody>
						<?php
						/*	$counter = 1;
							foreach($rows->result() as $r){
								echo '<tr><td>' . $counter++ .'</td><td>' . $r->roll_number;
								echo '</td><td>' . $r->student_id . '</td><td>' . $r->student_name;
								echo '</td><td>' . $r->semester;
								echo '</td><td>' . $r->attendance . '</td><td>' . $r->total_classes;
								echo '</td></tr>';		
							}
						*/?>
						</tbody>
					</table>
				</section>
			</div>
		</div>
	</div>

<?php $this->load->view('admin/components/admin_footer'); ?>