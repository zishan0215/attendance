<?php 

class Student_m extends MY_Model {
	
		protected $_table_name = 'student';
		protected $_primary_key = 'student_id';
		protected $_primary_filter = 'intval';
		protected $_order_by = 'roll_number';
		public $_rules = array();
		protected $_timestamps = FALSE;

		public function get_distinct_semester() {
			$query = 'SELECT DISTINCT semester FROM student';
			$q = $this->db->query($query);
			return $q;
		}
}

?>