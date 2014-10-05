
	<div class="container">
	<div class="row">
		<!-- Main column -->
		<div class="col-md-8 col-md-offset-2">
			<section>
				<h2>Edit student: <?php echo $student[0]->student_name; ?></h2>
				<br>
				<?php
						if(isset($confirmation)) {
							if($confirmation === 1) {
								echo '
									<table class="table">
										<tr class="success"><td>Success! Subject details updated</td></tr>
									</table>
									';
							} elseif($confirmation === 2) {
								echo '
									<table class="table">
										<tr class="danger"><td>Failure! Could not change student details </td></tr>
									</table>
									';
							} elseif($confirmation === 3) {
								echo '
									<table class="table">
										<tr class="danger"><td>Failure! Something wrong with the input. Please enter valid student name </td></tr>
									</table>
									';
							}
						}
					?>
			</section>
			<section>
				<br>
				<!-- Put the form below this line -->
				<form method="post" action="/jmiams/index.php/admin/edit_student">
				<!-- For each entry, copy paste the code below and edit it -->
					<div class="form-group">
						<label for="rollnumber" class="col-sm-3 control-label bigger_text">Roll number</label>
							<div class="col-sm-7">
							<input class="form-control" type="text" value="<?php echo $student[0]->roll_number; ?>" disabled>
							</div>
							<br><br>
					</div>
					<div class="form-group">
					    <label for="name" class="col-md-3 control-label bigger_text">Name</label>
					    <div class="col-sm-7">
					    	<input type="text" class="form-control" name="student_name" value="<?php echo $student[0]->student_name; ?>" required>
					    </div>
					</div>
					<br/><br/><br/>
					<div class="form-group">
					    <label for="semester" class="col-md-3 control-label bigger_text">Semester</label>
					    <div class="col-sm-7">
					    	<input type="text" class="form-control" name="semester" value="<?php echo $student[0]->semester; ?>" required>
					    </div>
					</div>
					<br/><br/>
					<div class="form-group">
					    <label for="batch" class="col-md-3 control-label bigger_text">Batch</label>
					    <div class="col-sm-7">
					    	<input type="text" class="form-control" name="batch" value="<?php echo $student[0]->batch; ?>" required>
					    </div>
					</div>
					<div class="form-group">
					    <div class="col-sm-offset-4 col-sm-7">
					    	<br>
					    	<input type="hidden" name="student_id" value="<?php echo $student_id; ?>">
					    	<br>
					    	<input type="submit" class="btn btn-success" name="submit" value="Submit">&nbsp;&nbsp;
					    	<a href="/jmiams/index.php/admin/students" class="btn btn-danger">Back</a>
					    </div>
  					</div>
				</form>
			</section>
		</div>
	</div>
</div>

<?php $this->load->view('admin/components/admin_footer'); ?>
