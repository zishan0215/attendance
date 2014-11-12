<div class="container">
		<div class="row">
			<!-- Main column -->
			<div class="col-md-12">
				
				<section>
					<h2>Subject Code : <?php echo $this->data['subject_code']; ?></h2>
					<h2>Year : <?php echo $this->data['year']; ?></h2>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>#</th>
								<th>Student ID</th>
								<th>Roll Number</th>
								<th>Name</th>
								<!--<th>Subject Code</th>-->
								<th>Attendance</th>
								<th>Total Classes</th>
								<!--<th>Year</th>-->
							</tr>
						</thead>
						<tbody>
							<?php
								$count = 1;
								foreach ($this->data['table'] as $tab) {
									echo '<tr>';
										echo '<td>'. $count++ . '</td>';
										echo '<td>'. $tab["student_id"].'</td>';
										echo '<td>'. $tab["roll_number"].'</td>';
										echo '<td>'. $tab["name"].'</td>';
										//echo '<td>'. $att->subject_code . '</td>';
										echo '<td>'. $tab["attendance"] . '</td>';
										echo '<td>'. $tab["total_classes"] . '</td>';
										//echo '<td>'. $att->year . '</td>';
									echo '</tr>';
								}
							?>
						</tbody>
					</table>
				</section>
			</div>
		</div>
	</div>