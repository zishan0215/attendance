<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index() {
		$this->load->view('bootstrap/header_login');
		$this->load->view('login');
		$this->load->view('bootstrap/footer_login');
	}

}