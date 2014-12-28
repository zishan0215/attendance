<?php
class Teacher_Controller extends MY_Controller
{
	function __construct() {
		parent::__construct();
		$this->data['meta_title'] = 'Attendance Management System';
		$this->load->model('teacher_m');
		$this->load->model('student_m');
		$this->load->model('attendance_m');
		$this->load->model('subject_m');
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->library('form_validation');

		// Login check
		$exception_uris = array(
			'teacher/login',
			'teacher/logout',
			'teacher/forgot'
		);
		if (in_array(uri_string(), $exception_uris) == FALSE) {
			if ($this->teacher_m->loggedin() == FALSE) {
				redirect('teacher/login');
			}
		}

	}
}

?>
