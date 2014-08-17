<?php

class Student_m extends MY_Model {
	protected $_table_name = 'student';
	protected $_primary_key = 'student_id';
	protected $_primary_filter = 'intval';
	protected $_order_by = 'roll_number';
	public $_rules = array();
	protected $_timestamps = FALSE;

	public $rules = array(
			'studentname' => array(
				'field' => 'student_name',
				'label' => 'Full Name',
				'rules' => 'trim|required'
			)
		);
	public function get_distinct_semester() {
		$query = 'SELECT DISTINCT semester FROM student';
		$q = $this->db->query($query);
		return $q;
	}
	public function get_name($data){
		$query = 'SELECT student_name FROM student where student_id = ' . $data['student_id'];
		$q = $this->db->query($query);
		return $q;
	}
	public function update_semester() {
		$query = 'UPDATE student set semester = semester + 1';
		$q =$this->db->query($query);
		return $q;
	}
}

?>
