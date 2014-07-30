<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Admin_Controller {

	public function index() {
		print_r($this->data);
		$this->load->view('bootstrap/header_login', $this->data);
		$this->load->view('admin/login');
		$this->load->view('bootstrap/footer_login');
	}

}

?>