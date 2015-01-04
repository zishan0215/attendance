<?php

	$user_string = 'class="form-control" placeholder="Username" required autofocus';

?>
<div class="container" align="center">
	<div class="row">
	    <!-- Main column -->
	    <div class="col-md-8 col-md-offset-2">
	        <section>
	            <br>
	            <?php
	            	if(isset($confirmation)) {
	                    if($confirmation === 1) {
	                        echo '
	                            <table class="table">
	                                <tr class="success"><td>Success! Mail delivered</td></tr>
	                            </table>
	                            ';
	                    } elseif($confirmation === 2) {
	                        echo '
	                            <table class="table">
	                                <tr class="danger"><td>Failure! No such Username exists </td></tr>
	                            </table>
	                            ';
	                    } elseif($confirmation === 3) {
	                        echo '
	                            <table class="table">
	                                <tr class="danger"><td>Failure! Mail sending Failed! </td></tr>
	                            </table>
	                            ';
	                    }
	                }
	            ?>
	        </section>
		</div>
	</div>
	<div class="row col-md-4 col-md-offset-4">
		<form action="/jmiams/teacher/forgot" method="post">
	    <h2 class="form-signin-heading">Enter Username:</h2><br>
	    <?php echo form_input('username', '', $user_string); ?>
	    <br><br>
		<input type="submit" class="btn btn-success" name="submit" value="Send Mail">&nbsp;&nbsp;
	  	<a href="/jmiams/index.php/teacher" class="btn btn-danger">Cancel</a>
	    </form>
	</div>
</div>
<?php $this->load->view('teachers/components/teacher_footer'); ?>
