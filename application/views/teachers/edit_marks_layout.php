
<div class="container">
    <div class="row">
        <!-- Main column -->
        <div class="col-md-8 col-md-offset-2">
            <div style="text-align:center;">
                <h3>Edit details of : <?php echo $_POST['student_name']; ?></h3>
                <h3>Student id : <?php echo $_POST['student_id']; ?></h3>
            </div>
            <br>
            <section>
                <br>
                <?php
                    if(isset($confirmation)) {
                        if($confirmation === 1) {
                            echo '
                                <table class="table">
                                    <tr class="success"><td>Success! Student Marks Updated</td></tr>
                                </table>
                                ';
                        } elseif($confirmation === 2) {
                            echo '
                                <table class="table">
                                    <tr class="danger"><td>Failure! Could not edit the details </td></tr>
                                </table>
                                ';
                        }
                    }
                ?>
            </section>
            <section>
                <form method="post" action="/jmiams/index.php/teacher/edit_marks">
                    <div class="form-group">
                        <label for="total_marks" class="col-sm-3 control-label bigger_text">Total Marks</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="total_marks" value="<?php echo $_POST['total_marks']; ?>" disabled>
                        </div>
                    </div>
                    <br/><br/><br/>
                    <div class="form-group">
                        <label for="marks" class="col-sm-3 control-label bigger_text">Marks</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" value="<?php echo $_POST['marks']; ?>" name="marks" required>
                        </div>
                    </div>
                    <br/><br/>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-7">
                            <br>
                            <input type="hidden" value="<?php echo $_POST['student_name']; ?>" name="student_name" />
                            <input type="hidden" value="<?php echo $_POST['student_id']; ?>" name="student_id" />
                            <input type="hidden" value="<?php echo $_POST['total_marks']; ?>" name="total_marks" />
                            <input type="hidden" value="<?php echo $_POST['sessional']; ?>" name="sessional" />
                            <input type="hidden" value="<?php echo $_POST['current_year']; ?>" name="current_year" />
                            <input type="hidden" value="<?php echo $_POST['subject_code']; ?>" name="subject_code" />
                            <input type="submit" class="btn btn-success" name="submit" value="Submit">&nbsp;&nbsp;
                            <a href="/jmiams/index.php/teacher" class="btn btn-danger">Back</a>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>

<?php $this->load->view('teachers/components/teacher_footer'); ?>
