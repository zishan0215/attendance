	<div class="container">
		<div class="row">
			<!-- Main column -->
			<div class="col-md-10 col-md-offset-1">
				<section style="text-align:center;">
					<h3>Feed Marks</h3><br><br>
                    <?php
                        if(isset($confirmation)) {
                            if($confirmation === 1) {
                                echo '
                                    <table class="table">
                                        <tr class="danger"><td>Failure! Could not feed marks </td></tr>
                                    </table>
                                    ';
                            }
                        }
                    ?>
				</section>
				<form role="form" method="post" action="<?php echo site_url('/teacher/feed_marks'); ?>">
					<div class="row col-md-5">
						<table class="table">
							<tr><td>Subject Code</td><td><?php echo $subject_code;?></td></tr>
							<tr><td>Semester</td><td><?php echo $semester;?></td></tr>
							<tr><td>Total Marks</td><td><div class="col-md-6"><input type="text" name="total_marks" class="form-control" value="40" autofocus="autofocus"></div></td></tr>
						</table>
						<br>
					</div>				
					<br>
					<table class="table table-striped">
						<thead><tr><th>S.no.</th><th>Roll Number</th><th>Student Name</th><th>Marks</th></tr></thead>
						<tbody>
							<?php 	
								for($i = 0, $counter = 1; $i < count($students); $i++, $counter++) {
									echo "<tr><td>{$counter}</td>";
									echo "<td>{$students[$i]->roll_number}</td>";
									echo "<td>{$students[$i]->student_name}</td>";
									echo '<td class="col-md-2">';
										echo '<input class="form-control in_marks" type="text" name="m' . $i . '" value="0">';
										echo '<input type="hidden" name="semester" value="' . $semester . '">';
										echo '<input type="hidden" name="subject_code" value="' . $subject_code . '">';
									echo '</td></tr>';
								}
							?>
						</tbody>
					</table>
					<div class="col-md-offset-5 feed_space">
						<input type="submit" name="submit_marks" class="btn btn-success" value="Submit">
						<button class="btn btn-warning" style="margin-left: 15px" onclick="reset();">Reset</button>
					</div>
				</form>	
			</div>
		</div>
	</div>
	<script>
		function reset() {
			$(".in_marks").value = 0;
	</script>