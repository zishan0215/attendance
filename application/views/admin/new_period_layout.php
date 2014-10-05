
	<div class="container">
		<div class="row">
			<!-- Main column -->
			<div class="col-md-8 col-md-offset-2">
				<section>
					<h2>New Period Here</h2>
					<br>
					<?php
						if(isset($confirmation)) {
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
						}
					?>
				</section>
				<section class="col-md-5">
					<form role="form" method="post" action="#">
						<div class="form-group" id="div_dates">
						<label for="fromdate">From Date</label>
						<input type="text" id="fromdate" class="form-control datepicker" name="from_date" placeholder="Enter from date (yyyy-mm-dd)" required>
                        <br>
                        <label for="todate">To Date</label>
						<input type="text" id="todate" class="form-control datepicker" name="to_date" placeholder="Enter to date (yyyy-mm-dd)" required>
  						</div>
  						<br>
  						<!--button class="btn btn-primary" onclick="check_dates();">Submit</button-->
  						<input type="submit" name="submit" id="submit_dates" class="btn btn-primary" >&nbsp;&nbsp;
  						<a href="/jmiams/index.php/admin" class="btn btn-danger">Cancel</a>
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
