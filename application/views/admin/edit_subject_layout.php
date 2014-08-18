
<div class="container">
	<div class="row">
		<!-- Main column -->
		<div class="col-md-8 col-md-offset-2">
			<section>
				<br>
				<h1>Edit Subject: <?php echo $subject_code; ?></h1>
			</section>
			<section>
				<br>
				<?php
					if(isset($confirmation)) {
						if($confirmation === 1) {
							echo '
								<table class="table">
									<tr class="success"><td>Success! Subject Details Updated</td></tr>
								</table>
								';
						} elseif($confirmation === 2) {
							echo '
								<table class="table">
									<tr class="danger"><td>Failure! Could not edit the details </td></tr>
								</table>
								';
						}
					}
				?>
				<br>
			</section>
			<section>
				<form action="/jmiams/admin/edit_subject/" method="post">
					<div class="form-group">
					    <label for="subjectname" class="col-sm-3 control-label">Subject Name</label>
					    <div class="col-sm-7">
					    	<input type="text" class="form-control" name="subject_name" value="<?php echo $subject[0]->subject_name; ?>" required>
					    </div><br><br>
					</div>
					<div class="form-group">
						    <label for="subjectname" class="col-sm-3 control-label">Subject Abbreviation</label>
						    <div class="col-sm-7">
						    	<input type="text" class="form-control" placeholder="Subject Abbreviation (Eg CA)" name="subject_abbr" value="<?php echo $subject[0]->subject_abbr; ?>" required>
						    </div><br><br>
					</div>

					<div class="form-group">
					    <label for="semester" class="col-sm-3 control-label">Semester</label>
					    <div class="col-sm-7">
					    	<input type="text" class="form-control" name="semester" value="<?php echo $subject[0]->semester; ?>" required>
					    </div>
					</div>
					<div class="form-group">
					    <div class="col-sm-offset-3 col-sm-7">
					    	<br>
					    	<input type="hidden" name="subject_code" value="<?php echo $subject_code; ?>">
					    	<input type="submit" class="btn btn-success" name="submit" value="Submit">&nbsp;&nbsp;
					    	<a href="/jmiams/index.php/admin/subjects" class="btn btn-danger">Back</a>
					    </div>
  					</div>
				</form>
			</section>
		</div>
	</div>
</div>
<?php $this->load->view('admin/components/admin_footer'); ?>
