<div class="container">
	<div class="row">
		<!-- Main column -->
		<div class="col-md-9">
			<section>
				<h2>Add Subject</h2>
				<br>
				<?php 
						if(isset($confirmation)) {
							if($confirmation === 1) {
								echo '
									<table class="table">
										<tr class="success"><td>Success! New Subject Added</td></tr>
									</table>
									';
							} elseif($confirmation === 2) {
								echo '
									<table class="table">
										<tr class="danger"><td>Failure! Could not add new Subject </td></tr>
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
										<tr class="danger"><td>Failure! Subjectname already exists. Please enter a different Subjectname </td></tr>
									</table>
									';
							}
						}
					?>
				</section>
				<section>
					<br>
					<form class="form-horizontal" role="form" method="post" action="/jmiams/index.php/admin/add_subject">
						<div class="form-group">
						    <label for="subjectname" class="col-sm-3 control-label">Subject Name</label>
						    <div class="col-sm-7">
						    	<input type="text" class="form-control" placeholder="Name of the subject" name="subject_name" required>
						    </div>
						</div>
						<div class="form-group">
						    <label for="subjectcode" class="col-sm-3 control-label">Subject Code</label>
						    <div class="col-sm-7">
						    	<input type="text" class="form-control" placeholder="Subject Code (Eg. CEN-501)" name="subject_code" required>
						    </div>
						</div>
						<div class="form-group">
						    <label for="semester" class="col-sm-3 control-label">Semester</label>
						    <div class="col-sm-7">
						    	<input type="text" class="form-control" placeholder="Semester in which subject is taught" name="semester" required>
						    </div>
						</div>
						<div class="form-group">
						    <label for="semester" class="col-sm-3 control-label">Teacher ID</label>
						    <div class="col-sm-7">
						    	<input type="text" class="form-control" placeholder="ID of Teacher teaching subject" name="semester" required>
						    </div>
						</div>
						<div class="form-group">
						    <div class="col-sm-offset-3 col-sm-7">
						    	<br>
						    	<input type="submit" class="btn btn-success" name="submit" value="Submit">&nbsp;&nbsp;
						    	<a href="http://localhost/jmiams/index.php/admin/subjects" class="btn btn-danger">Cancel</a>
						    </div>
  						</div>
					</form>
				</section>
			</div>
		</div>
	</div>
<?php $this->load->view('admin/components/admin_footer'); ?>
