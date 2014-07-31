<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teacher extends Teacher_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('teacher_m');
	}

	public function index() {
		$this->load->view('bootstrap/header_login', $this->data);
		$this->load->view('teachers/login');
		$this->load->view('bootstrap/footer_login');
	}

}