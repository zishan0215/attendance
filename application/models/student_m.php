<?php

class Student_m extends MY_Model {
	protected $_table_name = 'student';
	protected $_primary_key = 'student_id';
	protected $_primary_filter = 'intval';
	protected $_order_by = 'roll_number';
	protected $_timestamps = FALSE;

	public $rules = array(
			'studentname' => array(
				'field' => 'student_name',
				'label' => 'Full Name',
				'rules' => 'trim|required'
			),
			'batch' => array(
				'field' => 'batch',
				'label' => 'Batch',
				'rules' => 'trim|required'
			)
		);
	
	public $rules1 = array(
			'studentid' => array(
				'field' => 'student_id',
				'label' => 'Student id',
				'rules' => 'trim|required'
			),
			'studentname' => array(
				'field' => 'student_name',
				'label' => 'Full Name',
				'rules' => 'trim|required'
			),
			'rollnumber' => array(
				'field' => 'roll_number',
				'label' => 'Roll number',
				'rules' => 'trim|required'
			),
			'semester' => array(
				'field' => 'semester',
				'label' => 'Semester',
				'rules' => 'trim|required'
			),
			'batch' => array(
				'field' => 'batch',
				'label' => 'Batch',
				'rules' => 'trim|required'
			)
		);
	
	public function get_distinct_semester() {
		$query = 'SELECT DISTINCT semester FROM student';
		$q = $this->db->query($query);
		return $q;
	}
	public function add_stu($data) {
		$query ='INSERT INTO student (student_id,roll_number,student_name,semester,batch) VALUES (' ."";
		$query .= $data['student_id'] . ",'". $data['roll_number']."','".$data['student_name']."',";
		$query .= $data['semester'] . ", '" . $data['batch'] . "');";
		$this->db->query($query);
		if($this->db->affected_rows()) {
				return TRUE;
		}
		return FALSE;
	}
	
	public function get_name($data){
		$query = 'SELECT student_name FROM student where student_id = ' . $data['student_id'];
		$q = $this->db->query($query);
		return $q;
	}

	public function get_name_final($data) {
		$query = 'SELECT student_name FROM student where student_id = ' . $data['student_id'];
		$q = $this->db->query($query);
		return $q->result()[0]->student_name;
	}

	public function edit_name($data) {
		$query = 'UPDATE student SET student_name = ' . "'" . $data['student_name'] . "'" . " WHERE student_id = " . $data['student_id'] ;
		$q = $this->db->query($query);
		return $q;
	}

	public function update_semester() {
		$query = 'UPDATE student set semester = semester + 1 WHERE semester <= 7';
		$q =$this->db->query($query);
		return $q;
	}

	public function get_semester($data) {
		$info = $this->get_by($data);
		return $info[0]->semester;
	}

	public function get_distinct_student_id($sem){
		$query = 'SELECT DISTINCT student_id FROM student WHERE semester = ' . $sem;
		$q = $this->db->query($query);
		return $q;
	}
}

?>
