<?php 

class Studies_m extends MY_Model {
	
		protected $_table_name = 'studies';
		protected $_primary_key = array('student_id', 'subject_code');
		protected $_primary_filter = 'intval';
		protected $_order_by = 'student_id';
		protected $_timestamps = FALSE;
		public $rules = array();

}
?>