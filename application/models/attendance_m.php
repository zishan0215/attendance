<?php 

class Attendance_m extends MY_Model {
	
		protected $_table_name = 'attendance';
		protected $_primary_key = array('subject_code', 'from_date', 'to_date', 'teacher_id');
		protected $_primary_filter = '';
		protected $_order_by = 'subject_code';
		public $_rules = array();
		protected $_timestamps = FALSE;

		public function get_distinct(){
			$q=$this->db->query("SELECT DISTINCT subject_code, from_date, to_date, total_classes FROM attendance");
			if($q->num_rows>0){
				foreach($q->result() as $rows){
					$data[]=$rows;
				}
				return $data;
			}
		}
}

?>