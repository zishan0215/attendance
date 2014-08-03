<?php 

class Period_m extends MY_Model {
	
		protected $_table_name = 'period';
		protected $_primary_key = array('from_date', 'to_date');
		protected $_primary_filter = 'date';
		protected $_order_by = 'timstamp DESC';
		protected $_timestamps = FALSE;
		public $rules = array(
			'from_date' => array(
				'field' => 'from_date', 
				'label' => 'From Date', 
				'rules' => 'trim|required'
			), 
			'to_date' => array(
				'field' => 'to_date', 
				'label' => 'To Date', 
				'rules' => 'trim|required'
			)
		);

		public function insert($data) {
			$query = 'INSERT INTO period (from_date, to_date) VALUES (' . "'";
			$query .= $data['from_date'] . "', '" . $data['to_date'] . "');";
			$this->db->query($query);
			if($this->db->affected_rows()) {
				return TRUE;
			}
			return FALSE;
		}
}
?>