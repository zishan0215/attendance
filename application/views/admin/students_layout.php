
	<div class="container">
		<div class="row">
			<!-- Main column -->
			<div class="col-md-10 col-md-offset-1">
				<section>
					<h2>List of students</h2>
				</section>
				<section>
					<?php
						//$confirmation =1;
						if(isset($confirmation)) {
							if($confirmation === 1) {
								echo '
								<table class="table">
								<tr class="success"><td>Success! Semester incremented</td></tr>
								</table>
								';
							} elseif($confirmation === 2) {
								echo '
								<table class="table">
								<tr class="danger"><td>Failure! Could not increment semester </td></tr>
								</table>
								';
							} elseif($confirmation === 3) {
								echo '
								<table class="table">
								<tr class="success"><td>Success! Student added successfully </td></tr>
								</table>
								';
							}
						}
					?>
					<br>
				</section>
				<section>
					<!--<form action="/jmiams/admin/students" method="post">-->
						<a href="/jmiams/index.php/admin/incrSem" class="btn btn-warning">Increment Semester</a>
						<!--<button class="btn btn-warning" onclick="confirmIncrement();">Increment semester</button>
						<input type="submit" id="increment_it" name="increment" value="Increment Semester" class="btn btn-warning" style="display: none;">-->&nbsp;&nbsp;
						<a href="/jmiams/index.php/admin/add_student" class="btn btn-info">Add Student</a>
					<!--</form>-->
				</section>
				<section>

					<br>
				</section>
				<section>
					<h4>Select Semester</h4>
					<form class="form-inline" role="form" action="/jmiams/index.php/admin/students" method="post">
						<div class="form-group">
							<select class="form-control" name="semester">
								<?php
									foreach($semesters->result() as $s) {
										echo '<option value="' . $s->semester . '" ';
										if($semester && $semester == $s->semester) echo 'selected';
										echo '>' . $s->semester . '</option>';
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
						<thead><tr><th>Student Id</th><th>Roll Number</th><th>Name</th><th>Semester</th><th>Edit</th><th>View</th></tr></thead>
						<tbody>
						<?php
							foreach($rows as $r){
								echo '<tr><td>' . $r->student_id . '</td><td>' . $r->roll_number . '</td><td>' . $r->student_name . '</td><td>' . $r->semester.'</td><td><form method="post" action="/jmiams/index.php/admin/edit_student"><input type="hidden" value="' . $r->student_id .'" name="student_id"><input type="submit" value="Edit" class="btn btn-primary"></form></td><td><form method="post" action="/jmiams/index.php/admin/view_student"><input type="hidden" value="' . $r->student_id .'" name="student_id"><input type="hidden" value="' . $r->student_name .'" name="student_name"><input type="hidden" value="' . $r->semester .'" name="semester"><input type="submit" value="View" class="btn btn-primary"></form></td></tr>';
							}
						?>
						</tbody>
					</table>
				</section>
			</div>
		</div>
	</div>

<?php $this->load->view('admin/components/admin_footer'); ?>
