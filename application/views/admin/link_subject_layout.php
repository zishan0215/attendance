<div class="container">
	<div class="row">
		<!-- Main column -->
		<div class="col-md-9">
			<section>
				<h3><?php echo 'Teacher Id: ' . $teacher_id; ?></h3>
			</section>
		</div>
	</div>
</div>

<h4>Select Subject</h4>
					<form class="form-inline" role="form" action="http://localhost/jmiams/index.php/admin/link_subject" method="post">
						<div class="form-group">
							<select class="form-control" name="subject">
								<?php 
									foreach($rows->result() as $s) {
										echo '<option value="' . $s->subject_code . '">' . $s->subject_code . '</option>';
									}
								 ?>
							</select>&nbsp;&nbsp;
							<input type="submit" name="submit" value="Submit" class="btn btn-success" />&nbsp;&nbsp;
						</div>
					</form>

<?php $this->load->view('admin/components/admin_footer'); ?>