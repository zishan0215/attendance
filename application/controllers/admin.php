<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Admin_Controller {

	public $admin_data = array();

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->data['page'] = 0;
		$this->data['name'] = $this->session->userdata('name');
		$this->load->view('admin/components/admin_header', $this->data);
		$this->load->view('admin/main_layout');
	}

	public function teachers() {
		$this->data['page'] = 1;
		$this->data['name'] = $this->session->userdata('name');
		$this->load->view('admin/components/admin_header', $this->data);
		//$this->load->view('admin/teachers_layout');
		$this->load->model('teacher_m');
		$data['rows']=$this->teacher_m->getAll();
		$this->load->view('admin/teachers_layout',$data);
	}

	public function students() {
		$this->data['page'] = 2;
		$this->data['name'] = $this->session->userdata('name');
		$this->load->view('admin/components/admin_header', $this->data);
		$this->load->view('admin/students_layout');
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
		redirect('admin/login');
	}

	public function show() {
		$this->load->model('student_m');
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