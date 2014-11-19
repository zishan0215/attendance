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

		public function get_latest_period() {
			$query = "SELECT from_date, to_date FROM period ORDER BY timstamp desc LIMIT 1";
			$r = $this->db->query($query);
			return $r->result()[0];
		}

		public function done_attendance() {
			$period = $this->get_latest_period();
			$query = "SELECT DISTINCT subject_code from attendance WHERE ";
			$query .= "from_date='{$period->from_date}' and to_date='{$period->to_date}' ";
			$query .= "and submit = 1";
			$q = $this->db->query($query);
			$codes = array();
			foreach($q->result() as $code) {
				$codes[] = $code->subject_code;
			}
			return $codes;
		}
}
?>