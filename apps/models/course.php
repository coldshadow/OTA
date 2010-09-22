<?php

class Course extends DataMapper {
	
	public $has_many = array('student');
	
	public function __construct() {
		parent::__construct();
	}
	
}