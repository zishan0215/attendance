<div class="container">
	<div class="row">
		<!-- Main column -->
		<div class="col-md-9">
			<section>
				<h2>Edit student: Put student name here</h2>
				<h4>Student Id: <?php echo $student_id; //remove this when done with the editing ?></h4>
				<br>
				<?php
						if(isset($confirmation)) {
							if($confirmation === 1) {
								echo '
									<table class="table">
										<tr class="success"><td>Success! Subject name changed</td></tr>
									</table>
									';
							} elseif($confirmation === 2) {
								echo '
									<table class="table">
										<tr class="danger"><td>Failure! Could not change student name </td></tr>
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
				<!-- Put the form below this line -->
				<form method="post" action="/jmiams/index.php/admin/edit_student">
				<!-- For each entry, copy paste the code below and edit it -->
					<div class="form-group">
					    <label for="name" class="col-md-2 control-label bigger_text">Name</label>
					    <div class="col-sm-5">
					    	<input type="text" class="form-control" name="student_name" value="Put name here through PHP" required>
					    </div>
					</div>
					<!-- Insert other fields here -->



					<div class="form-group">
					    <div class="col-sm-offset-3 col-sm-7">
					    	<br>
					    	<input type="submit" class="btn btn-success" name="submit" value="Submit">&nbsp;&nbsp;
					    	<a href="/jmiams/index.php/admin/students" class="btn btn-danger">Cancel</a>
					    </div>
  					</div>
				</form>
			</section>
		</div>
	</div>
</div>

<?php $this->load->view('admin/components/admin_footer'); ?>
