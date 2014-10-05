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
		/*if($this->input->post('total') < $this->input->post('num:0')) {
			redirect('/teacher/feed_attendance?subject_code='.$code.'&semester='.$sem);
		} else {*/
			for ($i=1;$i<=$values; $i++) {
				$val = $this->input->post('num:' . $i);
				$s_id = $this->input->post('student_id:' . $i);
				$array = array('student_id' => $s_id, 'subject_code' => $code, 'from_date' => $from_date, 'to_date' => $to_date, 'attendance' => $val, 'total_classes' => $total);
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
