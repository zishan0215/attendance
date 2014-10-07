    <div class="container">
        <div class="row">
            <!-- Main column -->
            <div class="col-md-8 col-md-offset-2"> 
				<form action="#" method="post" role="form" class="form-inline">
					Total Marks:
					<label class="radio-inline">
						<input type="radio" name="total_type" value="1"> 1
					</label>
					<label class="radio-inline">
						<input type="radio" name="total_type" value="2"> 2
					</label>
					<select class="form-control" name="total_year">
						<?php 
							foreach ($years as $y) {
								echo '<option value="' . $y->current_year .'">' . $y->current_year;
								echo '</option>';
							}
						?>
					</select>
				</form>
            </div>
        </div>
     </div>
            