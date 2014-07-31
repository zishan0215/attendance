<?php 

class Admin_m extends MY_Model {
	
		protected $_table_name = 'admin';
		protected $_primary_key = 'admin_id';
		protected $_primary_filter = 'intval';
		protected $_order_by = 'admin_id';
		public $_rules = array();
		protected $_timestamps = FALSE;
}

?>