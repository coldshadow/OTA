<?php

class Ucp extends Controller {
	
	function __construct() {
		parent::__construct();
	}
	
	function index() {
		$template['page_view'] = 'user_control_panel';
		$template['page_title'] = 'User Control Panel';
		$this->load->view('main/index', $template);
	}
	
	function edit() {
		// edit specific user details - NOT USERNAME
	}
	
}