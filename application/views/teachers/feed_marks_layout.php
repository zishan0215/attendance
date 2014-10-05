	<div class="container">
		<div class="row">
			<!-- Main column -->
			<div class="col-md-10 col-md-offset-1">
				<section style="text-align:center;">
					<h3>Feed Marks</h3><br><br>
				</section>
				<form role="form">
					<table class="table table-striped">
						<thead><tr><th>S.no.</th><th>Roll Number</th><th>Student Name</th><th>Marks</th></tr></thead>
						<tbody>
							<?php 	
								for($i = 0, $counter = 1; $i < count($students); $i++, $counter++) {
									echo "<tr><td>{$counter}</td>";
									echo "<td>{$students[$i]->roll_number}</td>";
									echo "<td>{$students[$i]->student_name}</td>";
									echo '<td class="col-md-2">';
										echo '<input class="form-control" type="text" name="m'.$i.'" value="0">';
									echo '</td></tr>';
								}
							?>
						</tbody>
					</table>
				</form>	
			</div>
		</div>
	</div>