<?php

class Total_attendance_m extends MY_Model {

		protected $_table_name = 'total_attendance';
		protected $_primary_key = array('student_id','subject_code','semester','batch','year');
		protected $_primary_filter = '';
		protected $_order_by = 'subject_code';
		protected $_timestamps = FALSE;

		public function insert($data){
			$query = 'INSERT INTO total_attendance VALUES(';
			$query .= $data['student_id'] . ", '" . $data['subject_code'] . "'," ;
			$query .= $data['attendance'] . ", " . $data['semester'] . ", " . $data['batch'] . ", " . $data['total_classes'] . ", " . $data['year'] . ");";
			$this->db->query($query);
			if($this->db->affected_rows()) {
				return TRUE;
			}
			return FALSE;
		}

		public function get_distinct_year(){
			$query = 'SELECT DISTINCT year from total_attendance';
			$q = $this->db->query($query);
			return $q;
		}
}

?>