
<div class="container">
	<div class="row">
		<!-- Main column -->
		<div class="col-md-9">
			<h2>Edit details of : <?php echo $teacher[0]->teacher_name; ?></h2>
			<br>
			<section>
				<br>
				<?php 
					if(isset($confirmation)) {
						if($confirmation === 1) {
							echo '
								<table class="table">
									<tr class="success"><td>Success! Teacher Details Updated</td></tr>
								</table>
								';
						} elseif($confirmation === 2) {
							echo '
								<table class="table">
									<tr class="danger"><td>Failure! Could not edit the details </td></tr>
								</table>
								';
						} elseif($confirmation === 3) {
							echo '
								<table class="table">
									<tr class="danger"><td>Failure! Something wrong with the input. Please enter valid data </td></tr>
								</table>
								';
						} elseif($confirmation === 4) {
							echo '
								<table class="table">
									<tr class="danger"><td>Failure! Username already exists. Please enter a different username </td></tr>
								</table>
								';
						}
					}
				?>	
			</section>
			<section>
				<!-- Put the form below this line -->
				<form method="post" action="http://localhost/jmiams/index.php/admin/edit_teacher">
				<!-- For each entry, copy paste the code below and edit it -->
					<div class="form-group">
					    <label for="name" class="col-sm-3 control-label ">Name</label>
					    <div class="col-sm-7">
					    	<input type="text" class="form-control" name="teacher_name" value="<?php echo $teacher[0]->teacher_name; ?>" required>
					    </div>
					</div>
					<br/>
					<br/>	
					<br/>
					<!-- Insert other fields here -->
					<div class="form-group">
					    <label for="username" class="col-sm-3 control-label">Username</label>
					    <div class="col-sm-7">
					    	<input type="text" class="form-control" value="<?php echo $teacher[0]->username; ?>" name="username" required>
					    </div>
					</div>
					<!--br/>
					<br/>
					<div class="form-group">
					    <label for="password" class="col-sm-3 control-label">Password</label>
					    <div class="col-sm-7">
					    	<input type="text" class="form-control" placeholder="Password for login" name="password" required>
					    </div>
					</div-->
					<br/>
					<br/>
					<div class="form-group">
					    <label for="subjectname" class="col-sm-3 control-label">Subject Name</label>
					    <div class="col-sm-7">
					    	<input type="text" class="form-control" value="<?php echo $subject[0]->subject_name; ?>" name="subject_name" required>
					    </div>
					</div>
					<br/>
					<br/>
					<div class="form-group">
					    <label for="subjectcode" class="col-sm-3 control-label">Subject Code</label>
					    <div class="col-sm-7">
					    	<input type="text" class="form-control" value="<?php echo $subject[0]->subject_code; ?>" name="subject_code" required>
					    </div>
					</div>
					<br/>
					<br/>
					<div class="form-group">
					    <label for="semester" class="col-sm-3 control-label">Semester</label>
					    <div class="col-sm-7">
					    	<input type="text" class="form-control" value="<?php echo $subject[0]->semester; ?>" name="semester" required>
					    </div>
					</div>
					<br/>
					<div class="form-group">
					    <div class="col-sm-offset-3 col-sm-7">
					    	<br>
					    	<input type="hidden" name="teacher_id" value="<?php echo $teacher_id; ?>">
					    	<input type="submit" class="btn btn-success" name="submit" value="Submit">&nbsp;&nbsp;
					    	<a href="http://localhost/jmiams/index.php/admin/teachers" class="btn btn-danger">Cancel</a>
					    </div>
  					</div>
				</form>
			</section>
		</div>
	</div>
</div>

<?php $this->load->view('admin/components/admin_footer'); ?>