<?php

class Attendance_m extends MY_Model {

		protected $_table_name = 'attendance';
		protected $_primary_key = array('subject_code', 'from_date', 'to_date', 'teacher_id');
		protected $_primary_filter = '';
		protected $_order_by = 'subject_code';
		public $_rules = array();
		protected $_timestamps = FALSE;

		public function get_distinct(){
			$q=$this->db->query("SELECT DISTINCT subject_code, from_date, to_date, total_classes FROM attendance LIMIT 20");
			return $q;
		}

		public function update_attendance($data) {
			$query = 'UPDATE attendance SET attendance = '. $data['attendance'];
			$query .= ' WHERE subject_code = '."'" . $data['subject_code'] . "'" .' AND  student_id = '. $data['student_id'] . ' AND from_date = '."'".$data['from_date']."'".' AND to_date = '."'".$data['to_date']."'".' AND total_classes = ' . $data['total_classes'];
			$q = $this->db->query($query);
			/*if($this->db->affected_rows()) {
				return TRUE;
			}
			return FALSE;*/
			return $q;
		}

		public function final_submit_update($data) {
			$query = 'UPDATE attendance SET final_submit = 1';
			$query .= ' WHERE subject_code = '."'" . $data['subject_code'] . "'" .' AND from_date = '."'".$data['from_date']."'".' AND to_date = '."'".$data['to_date']."'";
// 			echo $query;
			$q = $this->db->query($query);
			return $q;
		}
		
		public function submit_update($data) {
			$query = 'UPDATE attendance SET submit = 1';
			$query .= ' WHERE subject_code = '."'" . $data['subject_code'] . "'" .' AND from_date = '."'".$data['from_date']."'".' AND to_date = '."'".$data['to_date']."'";
			// 			echo $query;
			$q = $this->db->query($query);
			return $q;
		}
		
		public function check_final_submission($data) {
			$query = 'SELECT final_submit FROM attendance';
			$query .= ' WHERE subject_code = '."'" . $data['subject_code'] . "'" .' AND from_date = '."'".$data['from_date']."'".' AND to_date = '."'".$data['to_date']."' LIMIT 1";
			$q = $this->db->query($query);
			if($q->result()[0]->final_submit) {
				return 1;
			} else {
				return 0;
			}
		}
		
		public function check_submission($data) {
			$query = 'SELECT submit FROM attendance';
			$query .= ' WHERE subject_code = '."'" . $data['subject_code'] . "'" .' AND from_date = '."'".$data['from_date']."'".' AND to_date = '."'".$data['to_date']."' LIMIT 1";
			$q = $this->db->query($query);
			if($q->result()[0]->submit) {
				return 1;
			} else {
				return 0;
			}
		}
		
		public function check_saved($data) {
			$query = "SELECT * FROM attendance WHERE from_date = '".$data['from_date']."' ";
			$query .= "and to_date = '" . $data['to_date'] . "' and saved = 1 ";
			$query .= "and subject_code = '" . $data['subject_code'] . "'";
// 			if($this->db->query($query)) {
// 				return true;
// 			}
			$q = $this->db->query($query);
			return $q->result();
		}
		
		public function delete_previous_data($data) {
			$query = "DELETE FROM attendance WHERE from_date = '".$data['from_date']."' ";
			$query .= "and to_date = '" . $data['to_date'] . "' and saved = 1 ";
			$query .= "and subject_code = '" . $data['subject_code'] . "'";
			return $this->db->query($query);
		}

		public function get_distinct_select($data){
			$query = 'SELECT DISTINCT subject_code, from_date, to_date, total_classes FROM attendance ';
			$query .= 'WHERE (from_date = ' . "'" . $data['from_date'] . "'" . ') AND (to_date = ';
			$query .= "'" . $data['to_date'] . "'" . ')';
			$q=$this->db->query($query);
			return $q;
		}

		public function get_list($data){
			$query = 'SELECT * FROM attendance a, student s ';
			$query .= 'WHERE (a.from_date = ' . "'" . $data['from_date'] . "'" . ') AND (a.to_date = ';
			$query .= "'" . $data['to_date'] . "'" . ') AND (a.subject_code = ';
			$query .= "'" . $data['subject_code'] . "'" . ') AND (s.student_id = a.student_id) ORDER BY s.roll_number';
			//$query .= "'" . $data['subject_code'] . "'" . ')';
			$q=$this->db->query($query);
			return $q;
		}
		
		public function prev_get_list($data){
			$query = 'SELECT * FROM attendance a, student s ';
			$query .= 'WHERE (a.from_date = ' . "'" . $data['from_date'] . "'" . ') AND (a.to_date = ';
			$query .= "'" . $data['to_date'] . "'" . ') AND (a.subject_code = ';
			$query .= "'" . $data['subject_code'] . "'" . ') AND (s.student_id = a.student_id)';
			$query .= ' AND a.saved=1 ORDER BY s.roll_number';
			//$query .= "'" . $data['subject_code'] . "'" . ')';
			$q=$this->db->query($query);
			return $q->result();
		}

		public function get_distinct_period(){
			$q=$this->db->query("SELECT DISTINCT from_date, to_date FROM attendance");
			if($q->num_rows>0){
				foreach($q->result() as $rows){
					$data[]=$rows;
				}
				return $data;
			}
		}

		public function insert($data){
			$query = 'INSERT INTO attendance VALUES(';
			$query .= $data['student_id'] . ", '" . $data['subject_code'] . "', '" . $data['from_date'] . "', '";
			$query .= $data['to_date'] . "', " . $data['attendance'] . ", " . $data['total_classes'] . ", 0, " . $data['submit'] . ", " . $data['saved'] .")";
			//echo $query;
			$this->db->query($query);
			if($this->db->affected_rows()) {
				return TRUE;
			}
			return FALSE;
		}

		public function get_total_classes($data){
			$query = 'SELECT total_classes FROM attendance WHERE student_id=';
			$query .= $data['student_id'] . " AND subject_code=" . "'" . $data['subject_code'] . "'" . " AND from_date=" . "'" . $data['from_date'] . "'" . " AND to_date=" . "'" . $data['to_date'] . "'" ;
			$q = $this->db->query($query);
			return $q;
		}
}

?>
