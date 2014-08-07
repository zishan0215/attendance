<?php 
if(isset($from_date)&& isset($to_date)) {
	$date = DateTime::createFromFormat('Y-m-d', $from_date);
	$from_date = htmlspecialchars($date->format('j M Y'), ENT_QUOTES, "UTF-8");
	$date = DateTime::createFromFormat('Y-m-d', $to_date);
	$to_date = htmlspecialchars($date->format('j M Y'), ENT_QUOTES, "UTF-8");
	echo $from_date . "\t" . $to_date;
}
?>
	<div class="container">
		<div class="row">
			<!-- Main column -->
			<div class="col-md-12">
				<section>
					<h2>Attendance</h2>
					<br />
				</section>
				<section>
					<h4>Select Period</h4>
					<form class="form-inline" role="form" action="http://localhost/jmiams/index.php/teacher/view_attendance" method="post">
						<div class="form-group">
							<select class="form-control" name="period">
								<?php 
									foreach($period as $p) {
										$date = DateTime::createFromFormat('Y-m-d', $p->from_date);
										$from_date = htmlspecialchars($date->format('j M Y'), ENT_QUOTES, "UTF-8");
										$date = DateTime::createFromFormat('Y-m-d', $p->to_date);
										$to_date = htmlspecialchars($date->format('j M Y'), ENT_QUOTES, "UTF-8");
										echo '<option value="' . $p->from_date . '#' . $p->to_date . '">' . $from_date . ' - ' . $to_date . '</option>';
									}
								 ?>
							</select>&nbsp;&nbsp;
							<input type="submit" name="submit" value="Submit" class="btn btn-success" />&nbsp;&nbsp;	
						</div>
					</form>
					<br>
				</section>
				<section>
					<?php 
						if(isset($from_date) && isset($to_date) && ($submit == 1)) {
							echo "hello";
						}
					?>
				</section>
			</div>
		</div>
	</div>

<?php $this->load->view('teachers/components/teacher_footer'); ?>