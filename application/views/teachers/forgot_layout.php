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

<?php $this->load->view('teachers/components/teacher_footer'); ?>
