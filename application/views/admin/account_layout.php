
	<div class="container">
		<div class="row">
			<!-- Main column -->
			<div class="col-md-8 col-md-offset-2">
				<section>
					<h2>My account</h2><br />
				</section>
				<div class="well">
					  	<div class="form-group">
					    	<label class="col-md-2 control-label">Name: </label>
					    	<div class="col-md-10">
					      		<p class="form-control-static"><?php echo $admin_name ?></p>
					    	</div>
					  	</div>
					  	<div class="form-group">
					    	<label class="col-md-2 control-label">Username: </label>
					    	<div class="col-md-10">
					      		<p class="form-control-static"><?php echo $username ?></p>
					    	</div>
					  	</div>

				<br>
				<div class="form-group">
						    <div class="col-md-offset-1">
						    	<br>
						    	<form action="/jmiams/admin/change_password" method="post">
						    		<input type="submit" class="btn btn-danger" name="password" value="Change Password">
						    	</form>
						    </div>
  				</div>
  			</div>
			</div>

		</div>
	</div>

<?php $this->load->view('admin/components/admin_footer'); ?>
