<?php

class Sessional_m extends MY_Model {
	protected $_table_name = 'sessionals';
	protected $_primary_key = array('subject code','student_id','batch','type');
	protected $_primary_filter = 'strval';
	protected $_order_by = 'subject_code';
	protected $_timestamps = FALSE;
	
	public function insert_marks($data) {
		$query  = 'INSERT INTO sessionals VALUES (';
		$query .= "'{$data['subject_code']}', {$data['student_id']}, ";
		$query .= "'{$data['batch']}', {$data['type']}, ";
		$query .= "{$data['total_marks']}, {$data['marks']} );";
		if($this->db->query($query)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
} 

?>