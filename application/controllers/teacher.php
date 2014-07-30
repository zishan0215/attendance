<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teacher extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

	public function index() {
		$this->load->view('bootstrap/header_login');
		$this->load->view('teachers/login');
		$this->load->view('bootstrap/footer_login');
	}

}