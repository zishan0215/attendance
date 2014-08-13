<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Admin_Controller {

	public $admin_data = array();

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->data['page'] = 0;
		$this->data['name'] = $this->session->userdata('name');
		$this->data['rows'] = $this->attendance_m->get_distinct();
		$this->load->model('period_m');
		$this->data['period'] = $this->period_m->get();
		$period = $this->input->post('period');
		if($period) {
			$temp = explode('#', $period);
			$array = array('from_date' => $temp[0], 'to_date' => $temp[1]);
			$this->data['rows2'] = $this->attendance_m->get_distinct_select($array);
		}
		$this->load->view('admin/components/admin_header', $this->data);
		$this->load->view('admin/main_layout');	
	}

	public function subjects() {
		$this->data['page'] = 3;
		$this->data['name'] = $this->session->userdata('name');
		$this->data['rows'] = array();
		$this->data['semesters'] = $this->subject_m->get_distinct_semester_all();
		$semester = $this->input->post('semester');
		if($semester) {
			$array = array('semester' => $semester);
			$this->data['rows'] = $this->subject_m->get_by($array);
		}
		$this->load->view('admin/components/admin_header', $this->data);
		$this->load->view('admin/subjects_layout');
	}

	public function students() {
		$this->data['page'] = 2;
		$this->data['name'] = $this->session->userdata('name');
		$this->data['rows'] = array();
		$this->data['semesters'] = $this->student_m->get_distinct_semester();
		$semester = $this->input->post('semester');
		if($semester) {
			$array = array('semester' => $semester);
			$this->data['rows'] = $this->student_m->get_by($array);
		}
		$this->load->view('admin/components/admin_header', $this->data);
		$this->load->view('admin/students_layout');
	}

	public function edit_student() {
		$this->data['page'] = 2;
		$this->data['name'] = $this->session->userdata('name');
		$this->data['student_id'] = $this->input->post('student_id');
		$this->load->view('admin/components/admin_header', $this->data);
		$this->load->view('admin/edit_student_layout');	
	}

	public function new_period() {
		$this->data['confirmation'] = "";
		$this->data['page'] = 0;
		$this->data['name'] = $this->session->userdata('name');
		if($this->input->post('submit')) {
			$this->load->model('period_m');
			$rules = $this->period_m->rules;
	    	$this->form_validation->set_rules($rules);
	    	if ($this->form_validation->run() == TRUE) {
				$array = array('from_date' => $this->input->post('from_date'), 'to_date' => $this->input->post('to_date'));
				if($this->period_m->insert($array)) {
					$this->data['confirmation'] = 1;
				} else {
					$this->data['confirmation'] = 2;
				}	
	    	} else {
				$this->data['confirmation'] = 3;
			}
		}
		$this->load->view('admin/components/admin_header', $this->data);
		$this->load->view('admin/new_period_layout');
	}

	public function total_attendance() {
		$this->data['page'] = 0;
		$this->data['name'] = $this->session->userdata('name');
		$this->load->view('admin/components/admin_header', $this->data);
		$this->load->view('admin/total_attendance_layout');
	}

	public function view_attendance() {
		$code = $this->input->post('subject_code'); 
		$array = array('subject_code' => $code);
		$this->data['subject'] = $this->subject_m->get_by($array, TRUE);
		$this->data['page'] = 0;
		$this->data['name'] = $this->session->userdata('name');
		$this->data['from_date'] = $this->input->post('from_date');
		$this->data['to_date'] = $this->input->post('to_date');
		$this->data['subject_code'] = $code;
		$this->data['rows'] = $this->admin_m->get_view_attendance($this->data);
		$this->load->view('admin/components/admin_header', $this->data);
		$this->load->view('admin/view_attendance_layout');
	}

	public function teachers() {
		$this->data['page'] = 1;
		$this->data['name'] = $this->session->userdata('name');
		$this->load->model('teacher_m');
		$this->data['rows'] = $this->teacher_m->get();
		$this->load->view('admin/components/admin_header', $this->data);
		$this->load->view('admin/teachers_layout');
	}

	public function edit_teacher() {
		$this->data['confirmation'] = "";
		$this->data['page'] = 1;
		$this->data['name'] = $this->session->userdata('name');
		$this->load->model('teacher_m');
		$this->data['teacher_id'] = $this->input->post('teacher_id');
		$array = array('teacher_id' => $this->data['teacher_id']);
		$username = $this->teacher_m->get_username($array);
		if($this->input->post('submit')) {
			$rules = $this->teacher_m->rules3;
	    	$this->form_validation->set_rules($rules);
	    	if ($this->form_validation->run() == TRUE) {
				$array = array('teacher_name' => $this->input->post('teacher_name'), 'username' => $this->input->post('username'));
				if($username != $array['username']) {
					if($this->teacher_m->check_username($array)) {
						$this->data['confirmation'] = 4;
					}
				} else {
					if($this->teacher_m->save($array,$this->data['teacher_id'])) {
						$this->data['confirmation'] = 1;
					} else {
						$this->data['confirmation'] = 2;
					}	
				}	
	    	} else {
				$this->data['confirmation'] = 3;
			}
		}
		$this->data['teacher'] = $this->teacher_m->get_by($array);
		$this->load->view('admin/components/admin_header', $this->data);
		$this->load->view('admin/edit_teacher_layout');	
	}

	public function add_teacher() {
		$this->data['confirmation'] = "";
		$this->data['page'] = 1;
		$this->data['name'] = $this->session->userdata('name');		
		if($this->input->post('submit')) {
			$this->load->model('teacher_m');
			$rules = $this->teacher_m->rules2;
	    	$this->form_validation->set_rules($rules);
	    	if ($this->form_validation->run() == TRUE) {
				$array = array('teacher_name' => $this->input->post('teacher_name'), 'username' => $this->input->post('username'), 'password' => $this->teacher_m->hash($this->input->post('password')));	
				if($this->teacher_m->check_username($array)) {
					$id = $this->teacher_m->save($array);
					unset($array);
					$array = array('subject_code' => $this->input->post('subject_code'), 'subject_name' => $this->input->post('subject_name'), 'semester' => $this->input->post('semester'), 'teacher_id' => $id);
					if($this->subject_m->insert($array)) {
						$this->data['confirmation'] = 1;
					} else {
						$this->data['confirmation'] = 2;
					}
				} else {
					$this->data['confirmation'] = 4;	
				}	
	    	} else {
				$this->data['confirmation'] = 3;
			}
		}
		$this->load->view('admin/components/admin_header', $this->data);
		$this->load->view('admin/add_teacher_layout');
	}

	public function view_teacher() {
		$this->data['page'] = 1;
		$this->data['name'] = $this->session->userdata('name');
		$this->data['teacher_id'] = $this->input->post('teacher_id');
		$this->load->view('admin/components/admin_header', $this->data);
		$this->load->view('admin/view_teacher_layout');
	}

	public function link_subject() {
		$this->data['page'] = 1;
		$this->data['name'] = $this->session->userdata('name');
		$this->data['teacher_id'] = $this->input->post('teacher_id');
		
		$this->data['rows'] = $this->subject_m->get_code();
		$this->load->view('admin/components/admin_header', $this->data);
		$this->load->view('admin/link_subject_layout');
	}

	public function add_subject() {
		$this->data['page'] = 3;
		$this->data['name'] = $this->session->userdata('name');
		$this->load->view('admin/components/admin_header', $this->data);
		$this->load->view('admin/add_subject_layout');
	}

	public function account() {
		$id = $this->session->userdata('id');
		$admin_data = $this->admin_m->get($id);
		$admin_data->site_name = config_item('site_name');
		$admin_data->meta_title = 'Attendance Management System';
		$admin_data->page = -1; // No highlights in the navigation bar
		$admin_data->name = $admin_data->admin_name;
		$this->load->view('admin/components/admin_header', $admin_data);
		$this->load->view('admin/account_layout');
	}

	public function login() {
		$this->admin_m->loggedin() == FALSE || redirect('admin/');
		$rules = $this->admin_m->rules;
    	$this->form_validation->set_rules($rules);
    	if ($this->form_validation->run() == TRUE) {
    		if($this->admin_m->login() == TRUE) {
    			redirect('admin/');
    		} else {
    			$this->session->set_flashdata('error', 'That email/password combination does not exist');
    			redirect('admin/login', 'refresh');
    		}
    	}
		$this->load->view('bootstrap/header_login', $this->data);
		$this->load->view('admin/login');
		$this->load->view('bootstrap/footer_login');
	}

	public function logout() {
		$this->admin_m->logout();
		redirect('welcome');
	}

	public function show() {
		$this->load->model('teacher_m');
		$students = $this->student_m->get();
		$teachers = $this->teacher_m->get(2);
		var_dump($students);
		var_dump($teachers);
	}

	public function save() {
		$data = array(
			'admin_name' => 'Admin'
		);
		$admins = $this->admin_m->save($data, 1); // will update instead of insert because of the second argument
		var_dump($admins);
	}

	public function delete() {
    	$this->teacher_m->delete(3); // deletes an entry in the teacher table with the id 3 
    }

}

?>