
	<div class="container">
		<div class="row">
			<!-- Main column -->
			<div class="col-md-10 col-md-offset-1">
				<section>
					<h2>List of Teachers</h2>
					<br>
				</section>
				<section>
					<a href="/jmiams/index.php/admin/add_teacher" class="btn btn-warning">Add Teacher</a>
					<br><br>
				</section>
				<section>
					<br>
					<table class="table table-striped">
						<thead><tr><th>S.No.</th><th>Name</th><th>View</th><th>Edit</th><th>Add Subject</th></tr></thead>
						<tbody>
							<?php 
								$counter=1;	
								foreach($rows as $r){
									if($r->teacher_id == 0) continue;
									echo '<tr><td>' . $counter++ . '</td><td>' . $r->teacher_name . '</td><td><form method="post" action="/jmiams/index.php/admin/view_teacher"><input type="hidden" value="' . $r->teacher_id .'" name="teacher_id"><input type="submit" value="View" class="btn btn-success"></form></td><td><form method="post" action="/jmiams/index.php/admin/edit_teacher"><input type="hidden" value="' . $r->teacher_id .'" name="teacher_id"><input type="submit" value="Edit" class="btn btn-danger"></form></td><td><form method="post" action="/jmiams/index.php/admin/link_subject"><input type="hidden" value="' . $r->teacher_id .'" name="teacher_id"><input type="submit" value="Add Subject" class="btn btn-primary"></form></td></tr>';
								}
							?>
						</tbody>
					</table>
				</section>
			</div>
		</div>
	</div>

<?php $this->load->view('admin/components/admin_footer'); ?>