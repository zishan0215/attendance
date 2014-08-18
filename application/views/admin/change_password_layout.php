
	<div class="container">
		<div class="row">
			<!-- Main column -->
			<div class="col-md-8 col-md-offset-2">
				<section>
					<h2>Change Password</h2><br />
					<br>
					<?php
						if(isset($confirmation)) {
							if($confirmation === 1) {
								echo '
									<table class="table">
										<tr class="success"><td>Success! Password changed</td></tr>
									</table>
									';
							} elseif($confirmation === 2) {
								echo '
									<table class="table">
										<tr class="danger"><td>Failure! Wrong old password entered </td></tr>
									</table>
									';
							} elseif($confirmation === 3) {
								echo '
									<table class="table">
										<tr class="danger"><td>Failure! New password and confirm password do not match. Try again </td></tr>
									</table>
									';
							} elseif($confirmation === 4) {
								echo '
									<table class="table">
										<tr class="danger"><td>Failure! Something wrong with the input. Please enter valid password </td></tr>
									</table>
									';
							}
						}
					?>
				</section>
			    <div class="well">
				<form method="post" action="/jmiams/index.php/admin/change_password">
				<!-- For each entry, copy paste the code below and edit it -->
					<div class="form-group">
					    <label for="oldpassword" class="col-sm-3 control-label ">Old password</label>
					    <div class="col-sm-7">
					    	<input type="password" class="form-control" name="old_password" required>
					    </div>
					</div>
					<br/>
					<br/>
					<br/>
					<!-- Insert other fields here -->
					<div class="form-group">
					    <label for="newpassword" class="col-sm-3 control-label ">New password</label>
					    <div class="col-sm-7">
					    	<input type="password" class="form-control" name="new_password" required>
					    </div>
					</div>
					<br/><br/>
					<br/>
					<!-- Insert other fields here -->
					<div class="form-group">
					    <label for="confirmpassword" class="col-sm-3 control-label ">Confirm password</label>
					    <div class="col-sm-7">
					    	<input type="password" class="form-control" name="confirm_password" required>
					    </div>
					</div>
					<br>
					<div class="form-group">
					    <div class="col-sm-offset-3 col-sm-7">
					    	<br>
					    	<input type="submit" class="btn btn-success" name="submit" value="Submit">&nbsp;&nbsp;
					    	<a href="/jmiams/index.php/admin/account" class="btn btn-danger">Back</a>
					    </div>
  					</div>
				</form><br><br>
				</div>
			</div>
		</div>
	</div>

<?php $this->load->view('admin/components/admin_footer'); ?>
