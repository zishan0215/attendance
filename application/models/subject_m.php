<?php 

class Subject_m extends MY_Model {	
	protected $_table_name = 'subject';
	protected $_primary_key = 'subject_code';
	protected $_primary_filter = 'strval';
	protected $_order_by = 'subject_code';
	public $_rules = array();
	protected $_timestamps = FALSE;
	
	public function get_s($id){
		$sql = "SELECT subject_name, semester, teacher_id FROM subject WHERE subject_code = ? "; 
		$q=$this->db->query($sql, array(1, $id));
		return $q;		
	} 

	public function get_id($id) {
		$query = "SELECT subject_code FROM subject WHERE teacher_id = " . $id;
		$q = $this->db->query($query);
		if($q->num_rows()>0){
			foreach($q->result() as $rows){
				$data[]=$rows;
			}
			return $data;
		}	
	}
}

?>