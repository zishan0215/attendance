<?php 

class Teacher_m extends MY_Model {
	
		protected $_table_name = 'teacher';
		protected $_primary_key = 'teacher_id';
		protected $_primary_filter = 'intval';
		protected $_order_by = 'teacher_id';
		public $_rules = array();
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

	function __construct () {
		parent::__construct();
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