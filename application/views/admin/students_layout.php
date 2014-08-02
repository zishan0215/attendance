
	<div class="container">
		<div class="row">
			<!-- Main column -->
			<div class="col-md-9">
				<section>
					<h2>List of students</h2>
					<br />
					<table class="table table-striped"> 	
						<thead><tr><th>Student Id</th><th>Roll Number</th><th>Name</th><th>Semester</th></tr></thead>
						<tbody>
						<?php
							foreach($rows as $r){
								echo '<tr><td>' . $r->student_id . '</td><td>' . $r->roll_number . '</td><td>' . $r->student_name . '</td><td>' . $r->semester.'</td>';
							}
						?>
						</tbody>
					</table>
				</section>
			</div>
		</div>
	</div>

<?php $this->load->view('admin/components/admin_footer'); ?>