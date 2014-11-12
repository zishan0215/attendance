<br/><br/><br/>
	<div class="container">
		<div class="row">
			<!-- Main column -->
			<div class="col-md-12">
				<h3>Select Subject Code and Year</h3>
				<section>
					<form class="form-inline" role="form" action="/jmiams/index.php/admin/archive" method="post">
						<div class="form-group">
							<select class="form-control" name="subject">
								<?php 
									foreach($sems as $s) {
										echo '<option value="' . $s->subject_code . '">' . $s->subject_code . '</option>';
									}
								 ?>
							</select>&nbsp;&nbsp;
							<select class="form-control" name="year">
								<?php
									foreach ($years->result() as $y) {
										echo '<option value="' . $y->year . '">' . $y->year . '</option';
									}
								?>
							</select>&nbsp;&nbsp;
							<input type="submit" name="submit" value="Submit" class="btn btn-success" />&nbsp;&nbsp;
							
						</div>
					</form>
					<br>
				</section>
			</div>
		</div>
	</div>