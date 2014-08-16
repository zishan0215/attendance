
	<div class="contain">
		<div class="row">
			<!-- Main column -->
			<div class="col-md-12">
				<h3>Current Period : <?php echo $this->data['per']->from_date . ' to ' . $this->data['per']->to_date;  ?> </h3>
				<br/>
			</div>
			<br/><br/><br/><br/>
			<div id="middle">
			<form action="http://localhost/jmiams/index.php/teacher/insert_attendance" method="post">
				<?php
					$count = 0;
					echo '<div class="form-group">';
					echo '<input autofocus type="text" name="num:0" placeholder="Total Classes">';
					echo '</div>';
					echo '<br/>';
					$count++;
					foreach ($list as $n) {
						//echo $n->student_name;
						echo '<div class="form-group">';
						echo '<input style="background-color: #ffffff" type="text" value="' . $n->student_id . '" disabled="disabled">';
						echo '<input style="background-color: #ffffff" type="text" value="' . $n->student_name . '" disabled="disabled">';
						echo '<input type="hidden" name="student_id:' . $count . '" value="' . $n->student_id . '"/>';
						echo '<input autofocus type="text" name="num:' . $count . '" placeholder="Attendance"';
						echo '</div>';
						
						echo '<br/>';
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
				<div class="form-group">
					<button type="submit" class="btn btn-success">Submit</button>
				</div>
			</form>
			</div>
		</div>
	</div>


<?php $this->load->view('teachers/components/teacher_footer'); ?>