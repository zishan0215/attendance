<?php 

class Studies_m extends MY_Model {
	
		protected $_table_name = 'studies';
		protected $_primary_key = array('student_id', 'subject_code');
		protected $_primary_filter = 'intval';
		protected $_order_by = 'student_id';
		protected $_timestamps = FALSE;
		public $rules = array();

		public function add_student($data) {
			$query = 'SELECT subject_code FROM subject WHERE semester = ' . $data['semester'];
			$codes = $this->db->query($query);
			foreach($codes->result() as $code) {
				$array = array('student_id' => $data['student_id']);
				$array['subject_code'] = $code->subject_code;
				$this->db->query('INSERT INTO studies VALUES ( '. $data['student_id'] .', ' . "'" . $code->subject_code . "'" .')');
				unset($array);
			}
			if($this->db->affected_rows()) {
				return TRUE;
			}
			return FALSE;
		}

		public function get_id($data){
			$query = 'SELECT student_id from studies WHERE subject_code=' . "'" . $data['subject_code'] . "'" ;
			$q = $this->db->query($query);
			return $q;
		}

}
?>