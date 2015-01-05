<?php

class Teacher_m extends MY_Model {

		protected $_table_name = 'teacher';
		protected $_primary_key = 'teacher_id';
		protected $_primary_filter = 'intval';
		protected $_order_by = 'teacher_id';
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

		public $rules2 = array(
			'teachername' => array(
				'field' => 'teacher_name',
				'label' => 'Full Name',
				'rules' => 'trim|required'
			),
			'username' => array(
				'field' => 'username',
				'label' => 'Username',
				'rules' => 'trim|required'
			),
			'password' => array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'trim|required'
			)/*,
			'subject_name' => array(
				'field' => 'subject_name',
				'label' => 'Subject Name',
				'rules' => 'trim|required'
			),
			'subject_code' => array(
				'field' => 'subject_code',
				'label' => 'Subject Code',
				'rules' => 'trim|required'
			),
			'semester' => array(
				'field' => 'semester',
				'label' => 'Semester',
				'rules' => 'trim|required'
			)*/
		);

		public $rules3 = array(
			'teachername' => array(
				'field' => 'teacher_name',
				'label' => 'Full Name',
				'rules' => 'trim|required'
			),
			'username' => array(
				'field' => 'username',
				'label' => 'Username',
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
				'name' => $user->teacher_name,
				'username' => $user->username,
				'id' => $user->teacher_id,
				'loggedin' => TRUE,
				'loggedin_type' => 1
			);
			$this->session->set_userdata($data);
		}
	}

	public function get_password($data) {
		$row = $this->get_by($data);
		return $row[0]->password;
	}

	public function check_old_password($id) {
		$data = array('teacher_id' => $id);
		if($this->teacher_m->hash($this->input->post('old_password')) === $this->teacher_m->get_password($data)) {
			return TRUE;
		}
		return FALSE;
	}

	public function check_new_password() {
		if($this->teacher_m->hash($this->input->post('new_password')) === $this->teacher_m->hash($this->input->post('confirm_password'))) {
			return TRUE;
		}
		return FALSE;
	}

	public function username_exists($data) {
		$query = 'SELECT username FROM teacher WHERE username = ' . "'" . $data['teacher_name'] . "'" ;
		$q = $this->db->query($query);
		if($q->num_rows()>0) {
			return TRUE;
		}
		return FALSE;
	}

	public function reset_pass($data,$user){
		$query = "UPDATE teacher SET password = " . "'" .$data."'" .' where username = ' . "'". $user . "'";
		$q = $this->db->query($query);
		return $q;
	}

	public function email_id($data){
		$row = $this->get_by($data);
		return $row[0]->email;
	}
	public function get_username($data) {
		$row = $this->get_by($data);
		return $row[0]->username;
	}

	public function get_name($data) {
		$row = $this->get_by($data);
		return $row[0]->teacher_name;
	}

	public function get_s($id){
		$sql = "SELECT teacher_name, teacher_id FROM teacher WHERE teacher_id = ? ";
		$q=$this->db->query($sql, array(1, $id));
		return $q;
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
