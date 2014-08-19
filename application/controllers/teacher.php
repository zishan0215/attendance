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
		$this->load->view('teachers/components/teacher_header', $teacher_data);
		$this->load->view('teachers/account_layout');
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
		}
		$this->load->view('teachers/components/teacher_header', $this->data);
		$this->load->view('teachers/view_attendance_layout');		
	}

	public function feed_attendance() {
		$sem = $this->input->post('semester');
		$code = $this->input->post('subject_code');
		$this->load->model('period_m');
		$this->load->model('student_m');
		$this->data['page'] = 0;
		$this->data['name'] = $this->session->userdata('name');
		$this->data['sem'] = $sem;
		$this->data['s_code'] = $code;
		$this->data['per'] = $this->period_m->get(NULL,TRUE);
		$array = array('semester' => $sem);
		$this->data['list'] = $this->student_m->get_by($array);
		$this->load->view('teachers/components/teacher_header',$this->data);
		$this->load->view('teachers/feed_attendance_layout',$this->data);
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
		$this->load->view('teachers/components/teacher_header', $this->data);
		$this->load->view('teachers/main_layout');
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
