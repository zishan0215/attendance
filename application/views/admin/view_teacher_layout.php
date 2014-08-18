<div class="container">
	<div class="row">
		<!-- Main column -->
		<div class="col-md-10 col-md-offset-1">
			<section>
				<h2><?php echo 'Teacher Name: '.$teacher1->teacher_name; ?></h2>
				<?php
					if(isset($confirmation)) {
						if($confirmation === 1) {
							echo '
								<table class="table">
									<tr class="success"><td>Success! Subject Removed</td></tr>
								</table>
								';
						} elseif($confirmation === 2) {
							echo '
								<table class="table">
									<tr class="danger"><td>Failure! Could not remove subject </td></tr>
								</table>
								';
						}
					}
				?>
				<br><br>
			</section>
			<section>
				<table class="table table-striped">
					<thead><tr><th>Subject Id</th><th>Subject Name</th><th>Semester</th><th>Remove Subject</th></tr></thead>
					<tbody>
						<?php
							foreach($teacher2 as $r){
								echo '<tr><td>' . $r->subject_code . '</td><td>' . $r->subject_name . '</td><td>' .  $r->semester .'</td> <td>'.'<form action = "/jmiams/admin/view_teacher/" method="post"><input type="hidden" value="' . $teacher_id .'" name="teacher_id"><input type="hidden" value="' . $r->subject_code .'" name="subject_code"><input type="submit" name="submit" value="Remove" class="btn btn-danger"></form>'.'</td></tr>';
							}
						?>
					</tbody>
				</table>
			</section>
		</div>
	</div>
</div>

<?php $this->load->view('admin/components/admin_footer'); ?>
