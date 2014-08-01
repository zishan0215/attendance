<?php
class Admin_Controller extends MY_Controller
{
	function __construct() {
		parent::__construct();
		$this->data['meta_title'] = 'Attendance Management System';
		$this->load->library('session');
		$this->load->model('admin_m');
		$this->load->helper('form');
		$this->load->library('form_validation');

		// Login check
		$exception_uris = array(
			'admin/login', 
			'admin/logout'
		);
		if (in_array(uri_string(), $exception_uris) == FALSE) {
			if ($this->admin_m->loggedin() == FALSE) {
				redirect('admin/login');
			}
		}
	}
}

?>