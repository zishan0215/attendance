
<div class="container">
    <div class="row">
        <!-- Main column -->
        <div class="col-md-8 col-md-offset-2">
            <h2>Edit details of : <?php echo $_POST['student_id']; ?></h2>
            <br>
            <section>
                <br>
                <?php
                    if(isset($confirmation)) {
                        if($confirmation === 1) {
                            echo '
                                <table class="table">
                                    <tr class="success"><td>Success! Teacher Details Updated</td></tr>
                                </table>
                                ';
                        } elseif($confirmation === 2) {
                            echo '
                                <table class="table">
                                    <tr class="danger"><td>Failure! Could not edit the details </td></tr>
                                </table>
                                ';
                        } elseif($confirmation === 3) {
                            echo '
                                <table class="table">
                                    <tr class="danger"><td>Failure! Something wrong with the input. Please enter valid data </td></tr>
                                </table>
                                ';
                        } elseif($confirmation === 4) {
                            echo '
                                <table class="table">
                                    <tr class="danger"><td>Failure! Username already exists. Please enter a different username </td></tr>
                                </table>
                                ';
                        }
                    }
                ?>
            </section>
            <section>
            <form method="post" action="/jmiams/index.php/teacher/edit_attendance">
            <div class="form-group">
                <label for="total_classes" class="col-sm-3 control-label bigger_text">Total Classes</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="total_classes" value="<?php echo $_POST['total_classes']; ?>" disabled>
                </div>
                </div>
                <br/>
                <br/>
                <br/>
            <div class="form-group">
                <label for="attendance" class="col-sm-3 control-label bigger_text">Attendance</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" value="<?php echo $_POST['attendance']; ?>" name="attendance" required>
                </div>
            </div>
            <br/><br/>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-7">
                    <br>
                    <input type="hidden" value="<?php echo $_POST['student_id']; ?>" name="student_id" />
                    <input type="hidden" value="<?php echo $_POST['total_classes']; ?>" name="total_classes" />
                    <input type="submit" class="btn btn-success" name="submit" value="Submit">&nbsp;&nbsp;
                    <a href="/jmiams/index.php/teacher" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('teachers/components/teacher_footer'); ?>
