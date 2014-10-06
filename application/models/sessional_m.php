<?php

class Sessional_m extends MY_Model {
	protected $_table_name = 'sessional';
	protected $_primary_key = array('subject code','student_id','batch','type');
	protected $_primary_filter = 'strval';
	protected $_order_by = 'subject_code';
	protected $_timestamps = FALSE;
	
	public $rules = array(
			'subject_name' => array(
					'field' => 'subject_name',
					'label' => 'Subjectname',
					'rules' => 'trim|required'
			)
	);
	
	
} 

?>