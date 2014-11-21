	<div class="container">
		<div class="row">
			<!-- Main column -->
			<div class="col-md-9 col-md-offset-3">
				<section>
					<?php
						if(isset($this->data['confirmation'])) {
							if($this->data['confirmation'] === 1) {
								echo '
									<table class="table">
										<tr class="danger"><td>Invalid Period and/or Semester</td></tr>
									</table>
									';
							} elseif($confirmation === 2) {
								echo '
									<table class="table">
										<tr class="danger"><td>Failure! Something wrong with the input. Please enter valid date </td></tr>
									</table>
									';
							}
						}
					?>
					<h2>Select Periods for total attendance</h2>
					<br>
				</section>
				<section>
					<div class="col-md-8">
						<form role="form" action="/jmiams/admin/total_attendance" method="post">
							<?php
								$counter=1;
								asort($period);
								foreach($period as $p) {
									$date = DateTime::createFromFormat('Y-m-d', $p->from_date);
									$from_date = htmlspecialchars($date->format('j M Y'), ENT_QUOTES, "UTF-8");
									$date = DateTime::createFromFormat('Y-m-d', $p->to_date);
									$to_date = htmlspecialchars($date->format('j M Y'), ENT_QUOTES, "UTF-8");
									echo '<div class="checkbox">
											<label >
												<input type="checkbox" name="' . $counter++ .'" value="' . $p->from_date . '#' . $p->to_date . '">' . $from_date . ' - ' . $to_date
											. '</label>
									  	  </div>';
								}
							?>
							<br>
							<div class="col-md-5">
								<!-- <input type="text" name="semester" class="form-control" placeholder="Semester" autofocus /> -->	
								
							 	     <select class="form-control" name="semester"> 
								<?php 
										    foreach($sem as $s){
										    	echo "<option>$s</option>";
									 	    }
								?>
								     </select>
								
							</div>
							<input type="submit" name="submit" value="Submit" class="btn btn-success" />
						</form>
					</div>
				</section>
			</div>
		</div>
	</div>

<?php $this->load->view('admin/components/admin_footer'); ?>
