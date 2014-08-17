<?php

class Subject_m extends MY_Model {
	protected $_table_name = 'subject';
	protected $_primary_key = 'subject_code';
	protected $_primary_filter = 'strval';
	protected $_order_by = 'subject_code';
	protected $_timestamps = FALSE;
	public function get_s($id){
		$sql = "SELECT subject_name, semester, teacher_id FROM subject WHERE subject_code = ? ";
		$q=$this->db->query($sql, array(1, $id));
		return $q;
	}
	public $rules = array(
			'subject_name' => array(
				'field' => 'subject_name', 
				'label' => 'Subjectname', 
				'rules' => 'trim|required'
			)
			);
			
	public $rules2 = array(
			'subject_name' => array(
				'field' => 'subject_name', 
				'label' => 'Subject Name', 
				'rules' => 'trim|required'
			),
			'subject_code' => array(
				'field' => 'subject_code', 
				'label' => 'Subject Code', 
				'rules' => 'trim|required'
			),
			'semester' => array(
				'field' => 'semester', 
				'label' => 'Semester', 
				'rules' => 'trim|required'
			)
		);

	public function link_code($data){
		$query = 'UPDATE subject SET teacher_id = ' . $data['teacher_id'] . " WHERE subject_code = " . "'" . $data['subject_code'] . "'";
		$q = $this->db->query($query);
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

	public function get_subject_code_for_teacher($id) {
		$query = "SELECT subject_code FROM subject WHERE subject_code NOT IN (SELECT subject_code from subject WHERE teacher_id = " . $id .")";
		$q = $this->db->query($query);
		return $q;
	}

	public function insert($data) {
		$query = 'INSERT INTO subject (subject_code, subject_name, semester, teacher_id) VALUES ('. "'";
		$query .= $data['subject_code'] . "','" . $data['subject_name'] ."','";
		$query .= $data['semester'] ."'," . $data['teacher_id'] . ');';
		//echo $query;
		$this->db->query($query);
		if($this->db->affected_rows()) {
				return TRUE;
		}
		return FALSE;
	}
	public function check_subjectname($data) {
		$query = 'SELECT * FROM subject WHERE subject_name = ' . "'" . $data['subject_name'] . "'" ;
		$q = $this->db->query($query);
		if($q->num_rows()>0) {
			return TRUE;
		}
		return FALSE;
	}
	public function get_distinct_semester_all() {
		$query = 'SELECT DISTINCT semester FROM subject';
		$q = $this->db->query($query);
		return $q;
	}

	public function get_distinct_semester($id) {
		$query = 'SELECT DISTINCT semester FROM subject WHERE teacher_id = ' . $id;
		$q = $this->db->query($query);
		return $q;
	}
}

?>
