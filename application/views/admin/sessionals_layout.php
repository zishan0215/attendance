    <div class="container">
        <div class="row">
            <!-- Main column -->
            <div class="col-md-8 col-md-offset-2"> 
				<form action="#" method="post" role="form" class="form-inline">
					<div class="col-md-8 col-md-offset-2">
						<fieldset>
							<legend>Total Marks</legend>
							<table class="table no_border_top">
								<tr>
									<td>
										Sessional: 
										<label class="radio-inline">
											<input type="radio" name="total_type" value="1"> 1
										</label>
										<label class="radio-inline">
											<input type="radio" name="total_type" value="2"> 2
										</label>
									</td>
									<td>
										Year: 
										<select class="form-control" name="total_year">
											<?php 
												foreach ($years as $y) {
													echo '<option value="' . $y->current_year .'">' . $y->current_year;
													echo '</option>';
												}
											?>
										</select>
									</td>
									<td>
										<input type="submit" class="btn btn-success" name="total_submit" value="Submit">
									</td>
								</tr>
							</table>
						</fieldset>
					</div>
				</form>
            </div>
        </div>
     </div>
            