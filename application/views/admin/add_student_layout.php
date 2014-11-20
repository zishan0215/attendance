
    <div class="container">
        <div class="row">
            <!-- Main column -->
            <div class="col-md-8 col-md-offset-2" style="text-align:center;">
                <section>
                    <h2>Add Student</h2>
                    <br>
                    <?php
                        if(isset($confirmation)) {
                            if($confirmation === 1) {
                                echo '
                                    <table class="table">
                                        <tr class="success"><td>Success! New Student Added</td></tr>
                                    </table>
                                    ';
                            } elseif($confirmation === 2) {
                                echo '
                                    <table class="table">
                                        <tr class="danger"><td>Failure! Could not new student </td></tr>
                                    </table>
                                    ';
                            } elseif($confirmation === 3) {
                                echo '
                                    <table class="table">
                                        <tr class="danger"><td>Failure! Something wrong with the input. Please enter valid data </td></tr>
                                    </table>
                                    ';
                            }
                        }
                    ?>
                </section>
                <section>
                    <br>
                    <form class="form-horizontal" role="form" method="post" action="/jmiams/index.php/admin/add_student">
                        <div class="form-group">
                            <label for="studentid" class="col-sm-3 control-label">Student id</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" placeholder="Student id" name="student_id" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="studentname" class="col-sm-3 control-label">Full Name</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" placeholder="Name of the student" name="student_name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="rollnumber" class="col-sm-3 control-label">Roll number</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" placeholder="Roll Number" name="roll_number" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="semester" class="col-sm-3 control-label">Semester</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" placeholder="Subject semester" name="semester" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="batch" class="col-sm-3 control-label">Batch</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" placeholder="Year of joining (Eg: 2014)" name="batch" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-7">
                                <br>
                                <input type="submit" class="btn btn-success" name="submit" value="Submit">&nbsp;&nbsp;
                                <a href="/jmiams/index.php/admin/students" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>

<?php $this->load->view('admin/components/admin_footer'); ?>
