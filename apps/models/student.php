<?php

class Student extends DataMapper {
	
	public $has_many = array('course');
	
	public function __counstrct() {
		parent::__construct();
	}
	
}