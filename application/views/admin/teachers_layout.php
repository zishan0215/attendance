
	<div class="container">
		<div class="row">
			<!-- Main column -->
			<div class="col-md-9">
				<section>
					<br>
					<a href="http://localhost/jmiams/index.php/admin/add_teacher" class="btn btn-warning">Add Teacher</a>
				</section>
				<section>
					<br>
					<h2>List of Teachers</h2>
				</section>
				
				<section>
					<br>
					<table class="table table-striped">
						<thead><tr><th>S.No.</th><th>Name</th><th>Subject Name</th><th>Subject Code</th></tr></thead>
						<tbody>
							<?php 
								$counter=1;	
								foreach($rows as $r){
									foreach ($rows2 as $r2) {
										if($r->teacher_id == $r2->teacher_id)
											echo '<tr><td>' . $counter++ . '</td><td>' . $r->teacher_name . '</td><td>' . $r2->subject_name . '</td><td>' . $r2->subject_code . '</td></tr>';
									}
								}
							?>
						</tbody>
					</table>
				</section>
			</div>
		</div>
	</div>

<?php $this->load->view('admin/components/admin_footer'); ?>