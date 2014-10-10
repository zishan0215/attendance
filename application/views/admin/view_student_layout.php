<div class="container">
    <div class="row">
        <!-- Main column -->
        <div class="col-md-10 col-md-offset-1">
            <section>
                <h3>View Details of:</h3>
                <h4>Student Name: <?php echo $_POST['student_name']; ?></h2>
                <br><br>
            </section>
            <section>
            <div class="col-md-8">
                        <form role="form" action="/jmiams/admin/view_student" method="post">

                        <?php
                        $counter=1;
                            foreach($subject as $r){
                                echo '<div class="checkbox">
                                            <label >
                                            <input type="checkbox" name="' . $counter++ .'" value="' . $r->subject_code . '">' . $r->subject_code . ' - ' . $r->subject_name
                                            . '</label>
                                          </div>';
                            }
                        ?>
                        <br>
                        <input type="hidden" value="<?php echo $_POST['semester']; ?>" name="semester">
                        <input type="hidden" value="<?php echo $_POST['student_name']; ?>" name="student_name">
                        <input type="hidden" value="<?php echo $_POST['student_id']; ?>" name="student_id">
                        <input type="submit" name="submit" value="Submit" class="btn btn-success" />&nbsp;&nbsp;
                        <a href="/jmiams/index.php/admin/students" class="btn btn-danger">Cancel</a>
                        </form>
            </section>
        </div>
    </div>
</div>

<?php $this->load->view('admin/components/admin_footer'); ?>
