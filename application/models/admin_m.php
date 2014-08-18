<?php

class Admin_m extends MY_Model {

	protected $_table_name = 'admin';
	protected $_primary_key = 'admin_id';
	protected $_primary_filter = 'intval';
	protected $_order_by = 'admin_id';
	protected $_timestamps = FALSE;
	public $rules = array(
		'username' => array(
			'field' => 'username',
			'label' => 'Username',
			'rules' => 'trim|required'
		),
		'password' => array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'trim|required'
		)
	);
	public $rules1 = array(
		'oldpassword' => array(
			'field' => 'old_password',
			'label' => 'Old password',
			'rules' => 'trim|required'
		),
		'newpassword' => array(
			'field' => 'new_password',
			'label' => 'New password',
			'rules' => 'trim|required'
		),
		'confirmpassword' => array(
			'field' => 'confirm_password',
			'label' => 'Confirm password',
			'rules' => 'trim|required'
		)
	);

	function __construct () {
		parent::__construct();
	}

	public function get_view_attendance($data) {
		$query = 'SELECT * FROM attendance a, student s WHERE (a.student_id = s.student_id) AND (a.subject_code = ';
		$query .= "'" . $data['subject_code'] . "'" . ') AND (a.from_date = ' . "'" . $data['from_date'] . "'";
		$query .= ') AND (a.to_date = '. "'" . $data['to_date'] . "'" . ') ORDER BY s.roll_number';
		//echo $query;
		$q = $this->db->query($query);
		return $q;
	}

	public function login() {
		$user = $this->get_by(array(
			'username' => $this->input->post('username'),
			'password' => $this->hash($this->input->post('password')),
		), TRUE);

		if (count($user)) {
			// Log in user
			$data = array(
				'name' => $user->admin_name,
				'username' => $user->username,
				'id' => $user->admin_id,
				'loggedin' => TRUE,
				'loggedin_type' => 0
			);
			$this->session->set_userdata($data);
		}
	}

	public function get_password($data) {
		$row = $this->get_by($data);
		return $row[0]->password;
	}

	public function check_old_password($id) {
		$data = array('admin_id' => $id);
		if($this->admin_m->hash($this->input->post('old_password')) === $this->admin_m->get_password($data)) {
			return TRUE;
		}
		return FALSE;
	}

	public function check_new_password() {
		if($this->admin_m->hash($this->input->post('new_password')) === $this->admin_m->hash($this->input->post('confirm_password'))) {
			return TRUE;
		}
		return FALSE;
	}

	public function logout () {
		$this->session->sess_destroy();
	}

	public function loggedin () {
		return (bool) $this->session->userdata('loggedin');
	}

	public function loggedin_type () {
		return $this->session->userdata('loggedin_type');
	}

	public function hash ($string) {
		return hash('sha512', $string . config_item('encryption_key'));
	}
}

?>
