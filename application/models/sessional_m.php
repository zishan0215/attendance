<?php

class Sessional_m extends MY_Model {
	protected $_table_name = 'sessionals';
	protected $_primary_key = array('subject code','student_id','batch','type');
	protected $_primary_filter = 'strval';
	protected $_order_by = 'subject_code';
	protected $_timestamps = FALSE;
	
	public function insert_marks($data) {
		$query  = 'INSERT INTO sessionals(subject_code, student_id, ';
		$query .= 'current_year, type, total_marks, marks) VALUES (';
		$query .= "'{$data['subject_code']}', {$data['student_id']}, ";
		$query .= "'{$data['current_year']}', {$data['type']}, ";
		$query .= "{$data['total_marks']}, {$data['marks']} );";
		if($this->db->query($query)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	public function get_year() {
		$query = 'SELECT DISTINCT current_year FROM sessionals';
		if($this->db->query($query)) {
			return $this->db->query($query)->result();
		} else {
			return false;
		}
	}
	
	public function get_values($data) {
		$query  = "SELECT s.student_id, d.student_name, s.total_marks, ";
		$query .= "s.marks FROM sessionals AS s, student AS d ";
		$query .= "WHERE s.student_id = d.student_id AND ";
		$query .= "subject_code = '{$data['subject_code']}' AND ";
		$query .= "type = {$data['sessional']} AND current_year = '{$data['year']}'";
		if($this->db->query($query)) {
			return $this->db->query($query)->result();
		} else {
			return FALSE;
		}
	}

	//TODO: Disabled feed button for marks feed. Too complicated. Batch will have to
	//      included as well
	public function done_marks($id) {
		$query = "SELECT subject_code from subject WHERE teacher_id = {$id}";
		if($this->db->query($query)) {
			$codes = $this->db->query($query)->result();
			print_r($codes);
			for ($i = 0; $i < count($codes); $i++) {
				//echo $codes[$i]->subject_code;
				$query = "SELECT DISTINCT type from sessionals WHERE subject_code = '{$codes[$i]->subject_code}'";
				//echo "<br>".$query;
				if($this->db->query($query)) {
					$types = $this->db->query($query)->result();
					echo "<br>";
					print_r($types);
					echo "<br>" . count($types);
					if(count($types) != 0) {
							
					}
				} else {
					return 0; //No marks feeded
				}
			}
		} else {
			return 1; //No subject corresponding to the teacher id
		}
	}
	
} 

?>