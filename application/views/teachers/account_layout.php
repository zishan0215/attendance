
	<div class="container">
		<div class="row">
			<!-- Main column -->
			<div class="col-md-8 col-md-offset-2">
				<section>
					<h2>My account</h2><br />
					<?php
						if(isset($confirmation)) {
							if($confirmation === 1) {
								echo '
									<table class="table">
										<tr class="success"><td>Success! Password changed</td></tr>
									</table>
									';
							}
						}
					?>
				</section>
				<div class="well">
					<div class="col-md-offset-1" style="font-size: 18px;">
						<form class="form-horizontal" role="form">
						  	<div class="form-group">
						    	<label class="col-md-2 control-label">Name: &nbsp;</label>
						    	<div class="col-md-10">
						      		<p class="form-control-static"><?php echo $teacher_name ?></p>
						    	</div>
						  	</div>
						  	<div class="form-group">
						    	<label class="col-md-2 control-label">Username: </label>
						    	<div class="col-md-10">
						      		<p class="form-control-static"><?php echo $username ?></p>
						    	</div>
						  	</div>
						</form>
					</div><br>
				    <div class="col-md-offset-1">
				    	<form action="/jmiams/teacher/change_password" method="post">
				    		<input type="submit" class="btn btn-danger" name="password" value="Change Password">
				    	</form>
				    </div>
				</div>
			</div>
		</div>
	</div>

<?php $this->load->view('teachers/components/teacher_footer'); ?>
