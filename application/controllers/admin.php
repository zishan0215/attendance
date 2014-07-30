<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index() {
		$this->load->view('bootstrap/header_login');
		$this->load->view('admin/login');
		$this->load->view('bootstrap/footer_login');
	}

}