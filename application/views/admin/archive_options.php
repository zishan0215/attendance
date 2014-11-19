<br/><br>
	<div class="container">
		<div class="row">
			<!-- Main column -->
			<div class="col-md-8 col-md-offset-2">
				<h3 class="center-text">Select Subject Code and Year</h3>
				<br>
				<section class="col-md-7 col-md-offset-3">
					<form class="form-inline" role="form" action="/jmiams/index.php/admin/archive" method="post">
						<table class="table no_border_top">
							<tr>
								<td><select class="form-control" name="subject">
										<?php 
											foreach($sems as $s) {
												echo '<option value="' . $s->subject_code . '">' . $s->subject_code . '</option>';
											}
										 ?>
									</select>
								</td>
								<td>
									<select class="form-control" name="year">
										<?php
											foreach ($years->result() as $y) {
												echo '<option value="' . $y->year . '">' . $y->year . '</option';
											}
										?>
									</select>	
								</td>
								<td>
									<input type="submit" name="submit" value="Submit" class="btn btn-success" />	
								</td>
							</tr>
						</table>	
					</form>
					<br>
				</section>
			</div>
		</div>
	</div>