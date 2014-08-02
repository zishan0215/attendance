<?php 

class Subject_m extends MY_Model {
	
		protected $_table_name = 'subject';
		protected $_primary_key = 'subject_code';
		protected $_primary_filter = 'strval';
		protected $_order_by = 'subject_code';
		public $_rules = array();
		protected $_timestamps = FALSE;
}

?>