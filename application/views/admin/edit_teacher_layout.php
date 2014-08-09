<div class="container">
	<div class="row">
		<!-- Main column -->
		<div class="col-md-9">
			<h2>Edit teacher details of : <? php ?></h2>
			<h4>Teacher Id: <?php echo $teacher_id; //remove this when done with the editing ?></h4>
			<br>
			<section>
				
			</section>
			<section>
				<!-- Put the form below this line -->
				<form method="post" action="http://localhost/jmiams/index.php/admin/edit_teacher">
				<!-- For each entry, copy paste the code below and edit it -->
					<div class="form-group">
					    <label for="name" class="col-sm-3 control-label ">Name</label>
					    <div class="col-sm-7">
					    	<input type="text" class="form-control" name="teacher_name" value="Put name here through PHP" required>
					    </div>
					</div>
					<br/>	
					<br/>
					<!-- Insert other fields here -->
					<div class="form-group">
					    <label for="username" class="col-sm-3 control-label">Username</label>
					    <div class="col-sm-7">
					    	<input type="text" class="form-control" placeholder="Username for login" name="username" required>
					    </div>
					</div>
					<br/>
					<br/>
					<div class="form-group">
					    <label for="password" class="col-sm-3 control-label">Password</label>
					    <div class="col-sm-7">
					    	<input type="text" class="form-control" placeholder="Password for login" name="password" required>
					    </div>
					</div>
					<br/>
					<br/>
					<div class="form-group">
					    <label for="subjectname" class="col-sm-3 control-label">Subject Name</label>
					    <div class="col-sm-7">
					    	<input type="text" class="form-control" placeholder="Name of the subject" name="subject_name" required>
					    </div>
					</div>
					<br/>
					<br/>
					<div class="form-group">
					    <label for="subjectcode" class="col-sm-3 control-label">Subject Code</label>
					    <div class="col-sm-7">
					    	<input type="text" class="form-control" placeholder="Subject Code (Eg. CEN-501)" name="subject_code" required>
					    </div>
					</div>
					<br/>
					<br/>
					<div class="form-group">
					    <label for="semester" class="col-sm-3 control-label">Semester</label>
					    <div class="col-sm-7">
					    	<input type="text" class="form-control" placeholder="Subject semester" name="semester" required>
					    </div>
					</div>
					<br/>
					<div class="form-group">
					    <div class="col-sm-offset-3 col-sm-7">
					    	<br>
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