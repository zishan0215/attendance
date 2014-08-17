
	<div class="container">
		<div class="row">
			<!-- Main column -->
			<div class="col-md-9">
				<section>
					<h2>List of students</h2>
					<br />
				</section>
				<section>
					<h4>Select Semester</h4>
					<form class="form-inline" role="form" action="/jmiams/index.php/admin/students" method="post">
						<div class="form-group">
							<select class="form-control" name="semester">
								<?php
									foreach($semesters->result() as $s) {
										echo '<option value="' . $s->semester . '">' . $s->semester . '</option>';
									}
								 ?>
							</select>&nbsp;&nbsp;
							<input type="submit" name="submit" value="Submit" class="btn btn-success" />&nbsp;&nbsp;
						</div>
					</form>
					<br>
				</section>
				<br><br>
				<section>
					<table class="table table-striped">
						<thead><tr><th>Student Id</th><th>Roll Number</th><th>Name</th><th>Semester</th></tr></thead>
						<tbody>
						<?php
							foreach($rows as $r){
								echo '<tr><td>' . $r->student_id . '</td><td>' . $r->roll_number . '</td><td>' . $r->student_name . '</td><td>' . $r->semester.'</td><td><form method="post" action="/jmiams/index.php/admin/edit_student"><input type="hidden" value="' . $r->student_id .'" name="student_id"><input type="submit" value="Edit" class="btn btn-primary"></form></td></tr>';
							}
						?>
						</tbody>
					</table>
				</section>
			</div>
		</div>
	</div>

<?php $this->load->view('admin/components/admin_footer'); ?>
