
	<div class="container">
		<div class="row">
			<!-- Main column -->
			<div class="col-md-9">
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
						<div class="form-group">
    						<label for="fromdate">From Date</label>
    						<input type="text" class="form-control datepicker" name="from_date" placeholder="Enter from date (yyyy-mm-dd)" required>
  						</div>
  						<div class="form-group">
    						<label for="todate">To Date</label>
    						<input type="text" class="form-control datepicker" name="to_date" placeholder="Enter to date (yyyy-mm-dd)" required>
  						</div>
  						<br>
  						<input type="submit" name="submit" value="Submit" class="btn btn-primary">&nbsp;&nbsp;
  						<a href="http://localhost/jmiams/index.php/admin" class="btn btn-danger">Cancel</a>
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