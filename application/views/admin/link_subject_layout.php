<div class="container">
	<div class="row">
		<!-- Main column -->
		<div class="col-md-9">
			<section>
				<h2><?php echo 'Teacher Id: ' . $teacher_id; ?></h2>
			</section>
		</div>
	</div>
</div>
<div class="collapse navbar-collapse">
	<li class="dropdown">
	    <a href="#" data-toggle="dropdown" class="dropdown-toggle">Subjects</a>
    		<ul class="dropdown-menu">
		        <?php
		        if(isset($rows)) {
		        	foreach($rows->result() as $row) {
		                echo "<li>" . $row->subject_code . "</li>";
		       		}
		        }
		        ?>
    		</ul>
	</li>
</div>
<?php $this->load->view('admin/components/admin_footer'); ?>