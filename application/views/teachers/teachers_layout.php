
	<div class="container">
		<div class="row">
			<!-- Main column -->
			<div class="col-md-9">
				<section>
					<h2>List of Teachers</h2>
					<br />
					<table class="table table-striped">
						<thead><tr><th>Teacher Id</th><th>Name</th><th>Username</th></tr></thead>
						<tbody>
							<?php 	
								foreach($rows as $r){
									echo '<tr><td>' . $r->teacher_id . '</td><td>' . $r->teacher_name . '</td><td>' . $r->username . '</td></tr>';
								}
							?>
						</tbody>
					</table>
				</section>
			</div>
		</div>
	</div>

<?php $this->load->view('teachers/components/teacher_footer'); ?>