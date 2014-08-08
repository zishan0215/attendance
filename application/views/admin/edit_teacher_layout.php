<div class="container">
	<div class="row">
		<!-- Main column -->
		<div class="col-md-9">
			<h2>Edit teacher: Put teacher name here</h2>
			<h4>Teacher Id: <?php echo $teacher_id; //remove this when done with the editing ?></h4>
			<br>
			<section>
				<!-- Put the form below this line -->
				<form method="post" action="http://localhost/jmiams/index.php/admin/edit_teacher">
				<!-- For each entry, copy paste the code below and edit it -->
					<div class="form-group">
					    <label for="name" class="col-md-2 control-label bigger_text">Name</label>
					    <div class="col-sm-5">
					    	<input type="text" class="form-control" name="teacher_name" value="Put name here through PHP" required>
					    </div>
					</div>
					<!-- Insert other fields here -->



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