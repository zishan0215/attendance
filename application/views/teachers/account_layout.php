
	<div class="container">
		<div class="row">
			<!-- Main column -->
			<div class="col-md-9">
				<section>
					<h2>My account</h2><br />	
				</section>
				<div class="well">
					<form class="form-horizontal" role="form">
					  	<div class="form-group">
					    	<label class="col-md-2 control-label">Name: </label>
					    	<div class="col-md-10">
					      		<p class="form-control-static"><?php echo $teacher_name ?></p>
					    	</div>
					  	</div>
					  	<div class="form-group">
					    	<label class="col-md-2 control-label">Username: </label>
					    	<div class="col-md-10">
					      		<p class="form-control-static"><?php echo $username ?></p>
					    	</div>
					  	</div>
					</form>
				</div>
			</div>
		</div>
	</div>

<?php $this->load->view('teachers/components/teacher_footer'); ?>