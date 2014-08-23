
	<div class="container">
		<div class="row">
			<!-- Main column -->
			<div class="col-md-10 col-md-offset-1">
				<section>
					<h2>&nbsp;&nbsp;Add Subjects</h2>
					<div class="col-md-5">
						<table class="table bigger_text">
							<tr><th>Name: </th><th><?php echo $student_name; ?></th></tr>
						</table>
					</div>
				</section>
				<section>
					<div class="col-md-8">
						<form role="form" action="/jmiams/admin/add_student_final?id=<?php echo $student_id; ?>" method="post">
							<?php
								$counter = 1; 
								foreach($subjects as $s) {
									echo '<div class="checkbox">
											<label >
												<input type="checkbox" name="' . $counter++ .'" value="' . $s->subject_code . '"> ' .$s->subject_name 
									  	  . '</label>
									  	  </div>';
								}
							?>
							<br>
							<input type="submit" name="submit" value="Submit" class="btn btn-success" />
						</form>
					</div>
				</section>
			</div>
		</div>
	</div>

<?php $this->load->view('admin/components/admin_footer'); ?>
