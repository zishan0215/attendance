<div class="container">
	<div class="row">
		<!-- Main column -->
		<div class="col-md-9">
			<section>
				<h2><?php echo 'Teacher Name: '.$teacher1->teacher_name; ?></h2>	
				<br><br>
			</section>
			<section>
				<table class="table table-striped"> 	
					<thead><tr><th>Subject Id</th><th>Subject Name</th><th>Semester</th><th>Remove Subject</th></tr></thead>
					<tbody>
						<?php
							foreach($teacher2 as $r){
								echo '<tr><td>' . $r->subject_code . '</td><td>' . $r->subject_name . '</td><td>' .  $r->semester .'</td> <td>'.'<form action = "/jmiams/admin/view_teacher/" method="post"><input type="hidden" value="' . $teacher_id .'" name="teacher_id"><input type="submit" value="Remove" class="btn btn-danger"></form>'.'</td></tr>'; 
							}
						?>
					</tbody>
				</table>
			</section>
		</div>
	</div>
</div>

<?php $this->load->view('admin/components/admin_footer'); ?>