<?php
class Teacher_Controller extends MY_Controller
{
	function __construct() {
		parent::__construct();
		$this->data['meta_title'] = 'Attendance Management System';
		$this->load->helper('form');
		$this->load->library('form_validation');

	}
}

?>