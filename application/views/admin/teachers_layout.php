
	<div class="container">
		<div class="row">
			<!-- Main column -->
			<div class="col-md-9">
				<section>
					<h2>List of Teachers</h2>
					<table class="table table-striped">
					<?php 	
					echo '<h3>'.'<tr>'."<td><b>Id</b></td><td><b>Name</b></td><td><b>UserName</b></td> </br>".'</tr>'.'</h3>';  
						foreach($rows as $r){
							echo '<h4>'.'<tr>'.'<td>'.$r->teacher_id.'</td>'.'<td>'.$r->teacher_name.'</td>'.'<td>'.$r->username.'</td>'.'</tr>'.'</h4>';
							echo '</br>';
						}
					?>
					</table>
				</section>
			</div>
		</div>
	</div>

<?php $this->load->view('admin/components/admin_footer'); ?>