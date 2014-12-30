    <div class="container">
        <div class="row">
            <!-- Main column -->
            <div class="col-md-8 col-md-offset-2">
<!-- 				<form action="#" method="post" role="form" class="form-inline"> -->
<!-- 					<div class="col-md-5 col-md-offset-3"> -->
<!-- 						<fieldset> -->
<!-- 							<legend>Total Marks</legend> -->
<!-- 							<table class="table no_border_top"> -->
<!-- 								<tr> -->
<!-- 									<td> -->
<!-- 										Year:  -->
<!-- 										<select class="form-control" name="total_year"> -->
											<?php
// 												foreach ($years as $y) {
// 													echo '<option value="' . $y->current_year .'">' . $y->current_year;
// 													echo '</option>';
// 												}
// 											?>
<!-- 										</select> -->
<!-- 									</td> -->
<!-- 									<td> -->
<!-- 										<input type="submit" class="btn btn-success" name="total_submit" value="Submit"> -->
<!-- 									</td> -->
<!-- 								</tr> -->
<!-- 							</table> -->
<!-- 						</fieldset> -->
<!-- 					</div> -->
<!-- 				</form> -->
				<section>
                    <h4>Select Semester</h4>
                    <form class="form-inline" role="form" action="/jmiams/index.php/admin/total_marks" method="post">
                        <div class="form-group">
                            <select class="form-control" name="semester">
                                <?php
                                    foreach($semesters->result() as $s) {
                                        echo '<option value="' . $s->semester . '" '.'>' . $s->semester . '</option>';
                                    }
                                 ?>
                            </select>&nbsp;&nbsp;
                            <input type="submit" name="submit" value="Total Marks" class="btn btn-success" />&nbsp;&nbsp;

                        </div>
                    </form>
                </section>

                <section class="room-above-7">
                    <table class="table table-striped">
						<thead><tr><th>S.no.</th><th>Subject Code</th><th>Subject Name</th><th>View</th></tr></thead>
						<tbody>
							<?php
								$counter = 1;
								foreach($rows as $r){
									echo '<tr><td>' . $counter++ . '</td><td>' . $r->subject_code . '</td><td>';
									echo $r->subject_name . '</td><td>';
									echo '</td><td><form method="post" action="'. site_url('/admin/view_marks') .'">';
										echo '<input type="hidden" name="subject_code" value="' . $r->subject_code .'">';
										echo '<input type="submit" name="view_marks" class="btn btn-primary" value="View">';
									echo'</form></td>';
								}
							?>
						</tbody>
					</table>
				</section>
                <section>

                </section>
            </div>
        </div>
     </div>

