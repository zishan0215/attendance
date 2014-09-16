<?php
	$date = DateTime::createFromFormat('Y-m-d', $this->data['per']->from_date);
	$from_date = htmlspecialchars($date->format('j M Y'), ENT_QUOTES, "UTF-8");
	$date = DateTime::createFromFormat('Y-m-d', $this->data['per']->to_date);
	$to_date = htmlspecialchars($date->format('j M Y'), ENT_QUOTES, "UTF-8");
?>

	<div class="container">
		<div class="row">
			<!-- Main column -->
			<div class="col-md-6 col-md-offset-3">
				<h3>Current Period : <?php echo $from_date . ' to ' . $to_date;  ?> </h3>
				<br>
			<form action="/jmiams/index.php/teacher/insert_attendance" method="post">
				<div class="form-group col-sm-offset-1">
					<label for="totalclasses" class="col-sm-4 control-label bigger_text">Total Classes</label>
					<div class="col-sm-5 form-group" id="div_total_classes">
						<input type="hidden" id="diff" name="total" value="<?php echo $to_date - $from_date ?>">
						<input type="text" id="total_classes" class="form-control" name="num:0" placeholder="Total Classes"  autofocus required>
					</div>
				</div><br><br>
				<table class="table">
					<thead><tr><th>Roll Number</th><th>Student Name</th><th>Attendance</th></tr></thead>
					<tbody>
				<?php
					$count = 1;
					foreach ($list as $n) {
						echo '<div';
						echo '<tr><td>' . $n->roll_number . '</td>';
						echo '<td>' . $n->student_name . '</td>';
						echo '<td><input type="hidden" name="student_id:' . $count . '" value="' . $n->student_id . '"/>';
						echo '<input autofocus type="text" name="num:' . $count . '" placeholder="Attendance" id="'.$count.'" class="form-control input-sm" >
						'; 
						echo '</td></tr>';
						echo '</div>';
						//echo '<br/>';
						$count++;
					}
					echo '<br/><br/>';
					$count--;
					echo '<input type="hidden" name="subject_code" value="' . $s_code . '"/>';
					echo '<input type="hidden" name="cur_sem" value="' . $sem . '"/>';
					echo '<input type="hidden" name="total_values" value="' . $count . '"/>';
					echo '<input type="hidden" name="from_date" value="' . $this->data['per']->from_date . '"/>';
					echo '<input type="hidden" name="to_date" value="' . $this->data['per']->to_date . '"/>';
				?>
					</tbody>
				</table>
				<div class="form-group">
					<button type="submit" name = "submit" class="col-md-offset-4 btn btn-success">Submit</button>
				</div>
			</form>
			</div>
		</div>
	</div>


<?php $this->load->view('teachers/components/teacher_footer'); ?>
