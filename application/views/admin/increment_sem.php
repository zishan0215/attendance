
	<div class="container">
		<div class="row">
			<!-- Main column -->
			<div class="col-md-8 col-md-offset-2">
				<section>
					<h2>Up For a New Semester</h2>
					<br/>
					<h2>Please enter the start and end date for previous semester</h2>
					<br>
					<?php
						/*if(isset($confirmation)) {
							if($confirmation === 1) {
								echo '
									<table class="table">
										<tr class="success"><td>Success! New Period Created</td></tr>
									</table>
									';
							} elseif($confirmation === 2) {
								echo '
									<table class="table">
										<tr class="danger"><td>Failure! Could not create new period </td></tr>
									</table>
									';
							} elseif($confirmation === 3) {
								echo '
									<table class="table">
										<tr class="danger"><td>Failure! Something wrong with the input. Please enter valid date </td></tr>
									</table>
									';
							}
						}*/
					?>
				</section>
				<section class="col-md-5">
					<form role="form" method="post" action="/jmiams/index.php/admin/add_attendance">
						<div class="form-group" id="div_dates">
						<label for="startdate">Start Date</label>
						<input type="text" id="fromdate" class="form-control datepicker" name="start_date" placeholder="Enter start date (yyyy-mm-dd)" required>
                        <br>
                        <label for="enddate">End Date</label>
						<input type="text" id="todate" class="form-control datepicker" name="end_date" placeholder="Enter end date (yyyy-mm-dd)" required>
  						</div>
  						<br>
  						<!--button class="btn btn-primary" onclick="check_dates();">Submit</button-->
						<button class="btn btn-warning" onclick="confirmIncrement();">Increment semester</button>
						<input type="submit" id="increment_it" name="increment" value="Increment Semester" class="btn btn-warning" style="display: none;">
					</form>
				</section>
			</div>
		</div>
	</div>
<script>
	$(function() {
		$( ".datepicker" ).datepicker({ format: 'yyyy-mm-dd'});
	});
</script>

<?php $this->load->view('admin/components/admin_footer'); ?>
