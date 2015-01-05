<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teacher extends Teacher_Controller {

	public $teacher_data = array();

	public function __construct() {
		parent::__construct();
	}


	public function index() {
		$this->data['page'] = 0;
		$this->data['name'] = $this->session->userdata('name');
		$id = $this->session->userdata('id');
		$array = array('teacher_id' => $id);
		$this->load->model('subject_m');
		$this->load->model('period_m');
		$this->data['codes'] = $this->period_m->done_attendance();
		$this->data['rows'] = $this->subject_m->get_by($array);
		$this->load->view('teachers/components/teacher_header', $this->data);
		$this->load->view('teachers/main_layout');
	}

	public function forgot() {
		$this->load->helper('mailer_helper');
		$this->data['confirmation'] = "";
		$this->data['meta_title'] = 'Attendance Management System';
		if($this->input->post('submit')) {
			if($this->input->post('username')) {
				$username = $this->input->post('username');
				if($this->teacher_m->username_exists($username)){
					$this->data['confirmation'] = 1;
					$array =array('username' => $username);
					$key = rand(1111, 2222);
					$new_password = $this->input->post('username').$key;
					
					/* CONFIGURATION */
					$crendentials = array(
							'email'     => 'jmi.attendance@gmail.com',    //Your GMail adress
							'password'  => 'Attendance@#Jamia'               //Your GMail password
					);
					
					/* SPECIFIC TO GMAIL SMTP */
					$smtp = array(
							'host' => 'smtp.gmail.com',
							'port' => 587,
							'username' => $crendentials['email'],
							'password' => $crendentials['password'],
							'secure' => 'tls' //SSL or TLS
								
					);
					
					
					/* TO, SUBJECT, CONTENT */
					$to         = 'zishanrbp@gmail.com'; //The 'To' field
					$subject    = '[JMIAMS] Your new password';
					$content    = 'Your new password is: ' . $new_password;
					
					
					//$email_to = $this->teacher_m->email_id($array);
					if($this->teacher_m->reset_pass($this->teacher_m->hash($new_password),$this->input->post('username'))){
						$mailer = new PHPMailer();
						
						//SMTP Configuration
						$mailer->isSMTP();
						$mailer->SMTPAuth   = true; //We need to authenticate
						$mailer->Host       = $smtp['host'];
						$mailer->Port       = $smtp['port'];
						$mailer->Username   = $smtp['username'];
						$mailer->Password   = $smtp['password'];
						$mailer->SMTPSecure = $smtp['secure'];
						
						//Now, send mail :
						//From - To :
						$mailer->From       = $crendentials['email'];
						$mailer->FromName   = 'Your Name'; //Optional
						$mailer->addAddress($to);  // Add a recipient
						
						//Subject - Body :
						$mailer->Subject        = $subject;
						$mailer->Body           = $content;
						$mailer->isHTML(true); //Mail body contains HTML tags
						
						//Check if mail is sent :
						if($mailer->send()) {
							//echo 'Error sending mail : ' . $mailer->ErrorInfo;
							$this->data['confirmation'] = 1;
						}
						else
							$this->data['confirmation'] = 3;
					}
					else
						$this->data['confirmation'] = 2;
				}
			}
		}
		$this->load->view('bootstrap/header_login',$this->data);
		$this->load->view('teachers/forgot_layout',$this->data);
	}

	public function students() {
		$this->data['page'] = 2;
		$this->data['name'] = $this->session->userdata('name');
		$this->data['rows'] = array();
		$this->data['semesters'] = $this->subject_m->get_distinct_semester($this->session->userdata('id'));
		$semester = $this->input->post('semester');
		if($semester) {
			$array = array('semester' => $semester);
			$this->data['rows'] = $this->student_m->get_by($array);
		}
		$this->load->view('teachers/components/teacher_header', $this->data);
		$this->load->view('teachers/students_layout');
	}

	public function sessionals() {
		$this->data['page'] = 3;
		$this->data['name'] = $this->session->userdata('name');
		$id = $this->session->userdata('id');
		$array = array('teacher_id' => $id);
		$this->load->model('subject_m');
		$this->data['rows'] = $this->subject_m->get_by($array);
		if($this->input->get('conf')) {
			$this->data['confirmation'] = 1;
		}
		$this->load->view('teachers/components/teacher_header', $this->data);
		$this->load->view('teachers/sessions_layout');
	}

	public function feed_marks() {
		$this->data['page'] = 3;
		$this->data['name'] = $this->session->userdata('name');
		$id = $this->session->userdata('id');
		if($this->input->post('semester')) {
			$this->data['semester'] = $this->input->post('semester');
			$this->data['subject_code'] = $this->input->post('subject_code');
		} else {
			redirect(site_url('/teacher/sessionals'));
		}
		$this->data['students'] = $this->student_m->get_by(array('semester'=>$this->data['semester']));
		if($this->input->post('submit_marks')) {
			$good = 1;
			$total_marks = $this->input->post('total_marks');
			for ($i = 0; $i < count($this->data['students']); $i++) {
				$marks = explode('m', $this->input->post('m'.$i))[0];
				$student_id =  $this->data['students'][$i]->student_id;
				//$batch =  $this->data['students'][$i]->batch;
				$current_year = date('Y');
				$subject_code = $this->input->post('subject_code');
				$array = array('subject_code'=>$subject_code, 'student_id' => $student_id,
							'current_year' => $current_year, 'marks' => $marks,
							'total_marks' => $total_marks );
				$this->load->model('sessional_m');
				if(!$this->sessional_m->insert_marks($array)) {
					$good = 0;
					$this->data['confirmation'] = 1;
					break;
				}
			}
			if($good === 1) {
				redirect(site_url('/teacher/sessionals?conf=1'));
			}
		}
		$this->load->view('teachers/components/teacher_header', $this->data);
		$this->load->view('teachers/feed_marks_layout');
	}

	public function view_marks() {
		$this->data['page'] = 3;
		$this->data['name'] = $this->session->userdata('name');
		$id = $this->session->userdata('id');
		$this->data['show'] = 0;
		$this->data['code'] = $this->input->post('subject_code');
		$this->load->model('sessional_m');
		$this->data['years'] = $this->sessional_m->get_year();
		if($this->input->post('view_submit')) {
			$this->data['show'] = 1;
			$this->data['subject_code'] = $this->input->post('subject_code');
			$this->data['subject_name'] = $this->subject_m->get_subject_name($this->data['subject_code']);
			$this->data['sessional'] = $this->input->post('view_type');
			$this->data['year'] = $this->input->post('view_year');
			$array = array(
					'subject_code' => $this->data['subject_code'],
					'sessional' => $this->data['sessional'],
					'year' => $this->data['year']
				);
			$this->data['values'] = $this->sessional_m->get_values($array);
		}
    	$this->load->view('teachers/components/teacher_header', $this->data);
		$this->load->view('teachers/view_marks_layout');
	}

	public function account() {
		$id = $this->session->userdata('id');
		$teacher_data = $this->teacher_m->get($id);
		$teacher_data->site_name = config_item('site_name');
		$teacher_data->meta_title = 'Attendance Management System';
		$teacher_data->page = -1; // No highlights in the navigation bar
		$teacher_data->name = $teacher_data->teacher_name;
		$teacher_data->confirmation = "";
		if($this->input->get('confirmation')) {
			$teacher_data->confirmation = 1;
		}
		$this->load->view('teachers/components/teacher_header', $teacher_data);
		$this->load->view('teachers/account_layout');
	}

	public function final_submit() {
		if ($this->input->get('subject_code') && $this->input->get('from_date') && $this->input->get('to_date')){
			$subject_code = $this->input->get('subject_code');
			$from_date = $this->input->get('from_date');
			$to_date = $this->input->get('to_date');
			if($this->attendance_m->final_submit_update(array('subject_code'=>$subject_code,"from_date"=>$from_date, "to_date"=>$to_date))) {
				echo "Final Submit Sucessful.";
			} else {
				echo "Final Submit Unsuccussful";
			}

		}
	}

	public function edit_attendance() {
		$id = $this->session->userdata('id');
		$this->data['name'] = $this->session->userdata('name');
		$this->data['page'] = -1; // No highlights in the navigation bar
		$this->data['confirmation'] = "";
		if($this->input->post('submit')) {
			$student_id = $this->input->post('student_id');
			$from_date = $this->input->post('from_date');
			$to_date = $this->input->post('to_date');
			$subject_code = $this->input->post('subject_code');
			$total_classes = $this->input->post('total_classes');
			$array= array('student_id'=>$student_id,'subject_code' => $subject_code,'from_date' =>$from_date,'to_date' =>$to_date ,'total_classes' =>$total_classes, 'attendance' => $this->input->post('attendance'));
			if($this->attendance_m->update_attendance($array)) {
				$this->data['confirmation'] = 1;
			} else {
				$this->data['confirmation'] = 2;
			}
		}
		$this->load->view('teachers/components/teacher_header', $this->data);
		$this->load->view('teachers/edit_attendance_layout');
	}

	public function edit_marks() {
		$id = $this->session->userdata('id');
		$this->data['name'] = $this->session->userdata('name');
		$this->data['page'] = -1; // No highlights in the navigation bar
		$this->load->model('sessional_m');
		$this->data['confirmation'] = "";
		if($this->input->post('submit')) {
			$student_id = $this->input->post('student_id');
			$subject_code = $this->input->post('subject_code');
			$total_marks = $this->input->post('total_marks');
			$current_year = $this->input->post('current_year');
			$type = $this->input->post('sessional');
			$array= array('student_id'=>$student_id,'subject_code' => $subject_code,'current_year' =>$current_year,'type'=>$type,'total_marks' =>$total_marks, 'marks' => $this->input->post('marks'));
			if($this->sessional_m->update_marks($array)) {
				$this->data['confirmation'] = 1;
			} else {
				$this->data['confirmation'] = 2;
			}
		}
		$this->load->view('teachers/components/teacher_header', $this->data);
		$this->load->view('teachers/edit_marks_layout');
	}
	public function change_password() {
		$id = $this->session->userdata('id');
		$teacher_data = $this->teacher_m->get($id);
		$teacher_data->site_name = config_item('site_name');
		$teacher_data->meta_title = 'Attendance Management System';
		$teacher_data->page = -1; // No highlights in the navigation bar
		$teacher_data->name = $teacher_data->teacher_name;
		$teacher_data->confirmation = "";
		if($this->input->post('submit')) {
			$rules = $this->teacher_m->rules1;
	    	$this->form_validation->set_rules($rules);
	    	if ($this->form_validation->run() == TRUE) {
	    		$array = array('password' => $this->teacher_m->hash($this->input->post('new_password')));
	    		if($this->teacher_m->check_old_password($teacher_data->teacher_id)) {
					if($this->teacher_m->check_new_password()) {
						if($this->teacher_m->save($array,$teacher_data->teacher_id)) {
							$teacher_data->confirmation = 1;
							redirect('/teacher/account?confirmation=1');
						}
					} else {
						$teacher_data->confirmation = 3;
					}
	    		} else {
	    			$teacher_data->confirmation = 2;
	    		}
	    	} else {
	    		$teacher_data->confirmation = 4;
	    	}
		}
		$this->load->view('teachers/components/teacher_header', $teacher_data);
		$this->load->view('teachers/change_password_layout');
	}

	public function view_attendance() {
		$code = $this->input->post('subject_code');
		$this->data['page'] = 0;
		$this->data['name'] = $this->session->userdata('name');
		$array = array('subject_code' => $code);
		$this->data['subject'] = $this->subject_m->get_by($array, TRUE);
		$this->data['code'] = $code;
		$this->load->model('period_m');
		$this->data['period'] = $this->period_m->get();
		$period = $this->input->post('period');
		if($period) {
			$temp = explode('#', $period);
			unset($array);
			$array = array('from_date' => $temp[0], 'to_date' => $temp[1], 'subject_code' => $code);
			$this->data['rows'] = $this->attendance_m->get_list($array);
			$this->data['from_date'] = $temp[0];
			$this->data['to_date'] = $temp[1];
			$this->data['final_submission'] = $this->attendance_m->check_final_submission($array);
		}
		$this->load->view('teachers/components/teacher_header', $this->data);
		$this->load->view('teachers/view_attendance_layout');
	}

	public function feed_attendance() {
		$this->data['confirmation'] = "";
		if($this->input->post('semester')) {
			$sem = $this->input->post('semester');
		} else {
			$sem = $this->input->get('semester');
		}
		if($this->input->post('subject_code')) {
			$code = $this->input->post('subject_code');
		} else {
			$code = $this->input->get('subject_code');
		}
		$this->load->model('period_m');
		$this->load->model('student_m');
		$this->data['page'] = 0;
		$this->data['name'] = $this->session->userdata('name');
		$this->data['sem'] = $sem;
		$this->data['s_code'] = $code;
		$this->data['per'] = $this->period_m->get(NULL,TRUE);
		$this->data['subject_name'] = $this->subject_m->get_subject_name($code);
		$this->data['prev'] = 0;
		$data = array(
				'from_date' => $this->data['per']->from_date,
				'to_date' => $this->data['per']->to_date,
				'subject_code' => $code
			);
		$prev = $this->attendance_m->check_saved($data);
		if($prev) {
			$this->data['prev'] = $this->attendance_m->prev_get_list($data); ;
		}
		$array = array('semester' => $sem);
		$this->data['list'] = $this->student_m->get_by($array);

		if($this->input->post('submit')) {
			 if($this->input->post('num:0') > $this->input->post('total')) {
			 	$this->data['confirmation'] = 1;
			 }
		}
		$this->load->view('teachers/components/teacher_header',$this->data);
		$this->load->view('teachers/feed_attendance_layout');
	}

	public function insert_attendance() {
		$code = $this->input->post('subject_code');
		$code = trim($code);
		$from_date = $this->input->post('from_date');
		$to_date = $this->input->post('to_date');
		$sem = $this->input->post('cur_sem');
		$total = $this->input->post('num:0');
		$values = $this->input->post('total_values');
		$this->load->model('attendance_m');
		$pdata = array(
				'from_date' => $from_date,
				'to_date' => $to_date,
				'subject_code' => $code
		);
		/*if($this->input->post('total') < $this->input->post('num:0')) {
			redirect('/teacher/feed_attendance?subject_code='.$code.'&semester='.$sem);
		} else {*/
		$prev = $this->attendance_m->check_saved($pdata);
		if($prev) {
			//delete previous data
			$this->attendance_m->delete_previous_data($pdata);
		}
			for ($i=1;$i<=$values; $i++) {
				$val = $this->input->post('num:' . $i);
				$s_id = $this->input->post('student_id:' . $i);

				if($this->input->post('submit')) {
					$array = array('student_id' => $s_id, 'subject_code' => $code, 'from_date' => $from_date, 'to_date' => $to_date, 'attendance' => $val, 'total_classes' => $total, 'submit' => 1, 'saved' => 0);
				} elseif ($this->input->post('save')) {
					$array = array('student_id' => $s_id, 'subject_code' => $code, 'from_date' => $from_date, 'to_date' => $to_date, 'attendance' => $val, 'total_classes' => $total, 'submit' => 0, 'saved' => 1);
				} else {
					$array = array('student_id' => $s_id, 'subject_code' => $code, 'from_date' => $from_date, 'to_date' => $to_date, 'attendance' => $val, 'total_classes' => $total, 'submit' => 0, 'saved' => 0);
				}
				//print_r($array);
				$this->attendance_m->insert($array);
			}
			$id = $this->session->userdata('id');
			$this->data['page'] = 0;
			$this->data['name'] = $this->session->userdata('name');
			$array = array('teacher_id' => $id);
			$this->load->model('subject_m');
			$this->data['rows'] = $this->subject_m->get_by($array);
			$this->load->model('period_m');
			$this->data['codes'] = $this->period_m->done_attendance();
			$this->load->view('teachers/components/teacher_header', $this->data);
			$this->load->view('teachers/main_layout');
		//}
	}
	public function login() {
		$this->teacher_m->loggedin() == FALSE || redirect('teacher/');
		$rules = $this->teacher_m->rules;
    	$this->form_validation->set_rules($rules);
    	if ($this->form_validation->run() == TRUE) {
    		if($this->teacher_m->login() == TRUE) {
    			redirect('teacher/');
    		} else {
    			$this->session->set_flashdata('error', 'That email/password combination does not exist');
    			redirect('teacher/login', 'refresh');
    		}
    	}
		$this->load->view('bootstrap/header_login', $this->data);
		$this->load->view('teachers/login');
		$this->load->view('bootstrap/footer_login');
	}

	public function logout() {
		$this->teacher_m->logout();
		redirect('welcome');
	}

	public function show() {
		$this->load->model('student_m');
		$students = $this->student_m->get();
		var_dump($students);

	}
}
