    <div class="container">
        <div class="row">
            <!-- Main column -->
            <div class="col-md-10 col-md-offset-1">
				<div class="center-text">
					<h4>View Marks</h4>
				</div>
				<?php if($show === 0) {?>
				<form action="#" method="post" role="form" class="form-inline">
					<div class="col-md-4 col-md-offset-4 room-above-7">
						<fieldset>
							<legend>View Marks</legend>
							<table class="table no_border_top">
								<tr>
									<td>
										Year:
										<select class="form-control" name="view_year">
											<?php
												foreach ($years as $y) {
													echo '<option value="' . $y->current_year .'">' . $y->current_year;
													echo '</option>';
												}
											?>
										</select>
									</td>
									<td>
										<?php echo '<input type="hidden" name="subject_code" value="' . $code .'">';?>
										<input type="submit" class="btn btn-success" name="view_submit" value="Submit">
									</td>
								</tr>
							</table>
						</fieldset>
					</div>
				</form>
				<?php }?>
				<?php if($show === 1) {?>
				<br>
				<div class="col-md-6">
					<table class="table">
						<tr><td>Subject Name:</td><td><?php echo $subject_name?></td></tr>
						<tr><td>Subject Code:</td><td><?php echo $subject_code?></td></tr>
						<tr><td>Total Marks:</td><td><?php echo $values[0]->total_marks?></td></tr>
						<tr><td>Year:</td><td><?php echo $year?></td></tr>
					</table>
				</div>
				<table class="table">
					<thead>
						<tr><th>S.No.</th><th>Student Id</th><th>Student Name</th><th>Marks</th><th>Edit</th></tr>
					</thead>
					<?php
						$count = 1;
						foreach ($values as $v) {
							echo "<tr>";
								echo "<td>$count</td>";
								echo "<td>$v->student_id</td>";
								echo "<td>$v->student_name</td>";
								echo "<td>$v->marks</td>";
								echo "<td>".
								'<form action="/jmiams/index.php/teacher/edit_marks" method="post">
								<input type="hidden" value="' . $v->student_name .'" name="student_name" />
								<input type="hidden" value="' . $v->student_id .'" name="student_id" />
								<input type="hidden" value="' . $v->total_marks .'" name="total_marks" />
								<input type="hidden" value="' . $v->marks .'" name="marks" />
								<input type="hidden" value="' . $sessional .'" name="sessional" />
								<input type="hidden" value="' . $subject_code .'" name="subject_code" />
								<input type="hidden" value="' . $year .'" name="current_year" />
								<input type="submit" class="btn btn-primary Ebtn" value="Edit"/>
								</form>'.
								"</td>";
							echo "</tr>";
							$count++;
						}
					?>
				</table>
				<?php }?>
            </div>
 		</div>
	 </div>