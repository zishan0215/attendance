
	<div class="container">
		<div class="row">
			<!-- Main column -->
			<div class="col-md-9">
				<section>
					<h2>Welcome, <?php echo $name; ?></h2><br><br>
				</section>
				<section>
					<h4>Select Period</h4>
					<form class="form-inline" role="form" action="http://localhost/jmiams/index.php/admin/" method="post">
						<div class="form-group">
							<select class="form-control" name="period">
								<?php 
									foreach($period as $p) {
										echo '<option value="' . $p->from_date . '#' . $p->to_date . '">' . $p->from_date . ' - ' . $p->to_date . '</option>';
									}
								 ?>
							</select>&nbsp;&nbsp;
							<input type="submit" name="submit" value="Submit" class="btn btn-success" />
						</div>
					</form>
				</section>
				<br><br>
				<table class="table table-striped">
					<thead><tr><th>Subject Code</th><th>From Date</th><th>To Date</th><th>Total Classes</th><th>View</th></tr></thead>
					<tbody>
						<?php 	
							if(isset($rows2)) {
								$use = $rows2;
							} else {
								$use = $rows;
							}
							foreach($use->result() as $r){
								echo '<tr><td>' . $r->subject_code . '</td><td>' . $r->from_date;
								echo '</td><td>' . $r->to_date . '</td><td>' . $r->total_classes;
								echo '</td><td><form action="http://localhost/jmiams/index.php/admin/view_attendance" method="post">';
								echo '<input type="submit" name="View" class="btn btn-primary" value="View"/>';
								echo '<input type="hidden" name="subject_code" value="' . $r->subject_code .'" />';
								echo '<input type="hidden" name="from_date" value="' . $r->from_date .'" />';
								echo '<input type="hidden" name="to_date" value="' . $r->to_date .'" /></form></td></tr>';
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

<?php $this->load->view('admin/components/admin_footer'); ?>