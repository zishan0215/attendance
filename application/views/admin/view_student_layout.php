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
                            if($_POST['semester'] < 7){
                                foreach($subject as $r){
                                    echo '<div class="checkbox">
                                                <label >
                                                <input type="checkbox" name="' . $counter++ .'" value="' . $r->subject_code . '" checked="checked">' . $r->subject_code . ' - ' . $r->subject_name
                                                . '</label>
                                              </div>';
                                }
                            }
                            else {
                                foreach($subject as $r){
                                    $is_der=0;
                                    foreach ($s_subject as $y) {
                                        if ($r->subject_code == $y->subject_code) {
                                            $is_der=1;
                                            break;
                                        }
                                    }
                                    if($is_der==1){
                                        echo '<div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="' . $counter++ .'" value="' . $r->subject_code . '" checked="checked">' . $r->subject_code . ' - ' . $r->subject_name
                                                    . '</label>
                                                  </div>';
                                    }
                                    else {
                                        echo '<div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="' . $counter++ .'" value="' . $r->subject_code . '">' . $r->subject_code . ' - ' . $r->subject_name
                                                    . '</label>
                                                    </div>';
                                    }
                                }
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
