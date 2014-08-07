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
		$this->data['rows'] = $this->subject_m->get_by($array);
		$this->load->view('teachers/components/teacher_header', $this->data);
		$this->load->view('teachers/main_layout');
	}

	
	public function students() {
		$this->data['page'] = 2;
		$this->data['name'] = $this->session->userdata('name');
		$this->load->view('teachers/components/teacher_header', $this->data);
		$this->load->model('student_m');
		$data['rows']=$this->student_m->get();
		$this->load->view('teachers/students_layout',$data);
	}

	public function teachers() {
		$this->load->model('subject_m');
		$this->data['page'] = 1;
		$this->data['name'] = $this->session->userdata('name');
		$this->load->view('teachers/components/teacher_header', $this->data);
		$data['rows'] = $this->teacher_m->get();
		$data['rows2'] = $this->subject_m->get();
		$this->load->view('teachers/teachers_layout',$data);
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