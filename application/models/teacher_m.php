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
			),
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
			);
			$this->session->set_userdata($data);
		}
	}
	
	public function check($data) {
		$query = "SELECT * FROM teacher where username = " . $data['username'] ;
		$q = $this->db->query($query);
		if($q->num_rows()>0){
			return FALSE;
		}
		return TRUE;
	}

	public function logout () {
		$this->session->sess_destroy();
	}

	public function loggedin () {
		return (bool) $this->session->userdata('loggedin');
	}

	public function hash ($string) {
		return hash('sha512', $string . config_item('encryption_key'));
	}
}

?>