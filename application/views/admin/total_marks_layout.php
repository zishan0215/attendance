    <div class="container">
        <div class="row">
            <!-- Main column -->
            <div class="col-md-12">
                <section>
                    <h2>Total Marks</h2>
                    <br />
                    <div class="col-md-5">
                        <table class="table">
                            <tr><td><b>Semester</b></td><td><?php echo $semester; ?></td></tr>
                            <tr><td><b>Marks</b></td><td>40</td></tr>
                        </table>
                    </div>
                    <br>
                </section>
                <section>
                    <table class="table table-striped">
                        <thead><tr><th>S.No.</th><th>Roll Number</th><th>Student Id</th><th>Name</th>
                        <?php
                            foreach($sub_codes->result() as $s) {
                                echo '<th>';
                                echo $s->subject_code;
                                echo '</th>';
                            }
                        ?>    
                        </tr></thead>
                        <tbody>
                        <tr><td></td><td></td><td></td><td></td>
                        <?php
                            foreach ($sub_abbr->result() as $a) {
                                echo '<th>';
                                echo $a->subject_abbr;
                                echo '</th>';
                            }     
                        ?>
                        <?php
                            $counter = 1;
                            foreach ($firstid->result() as $key);
                            $id=$key->student_id;
                            foreach($rows->result() as $r){
                                if($counter===1 || $id != $r->student_id){
                                    echo '<tr><td>' . $counter++ .'</td><td>' . $r->roll_number;
                                    echo '</td><td>' . $r->student_id . '</td><td>' . $r->student_name;
                                    
                                }
                                $id=$r->student_id;
                                echo '</td><td>' . $r->marks;
                            }
                        ?>
                        </tbody>
                    </table>
                </section>
            </div>
        </div>
    </div>

<?php $this->load->view('teachers/components/teacher_footer'); ?>
