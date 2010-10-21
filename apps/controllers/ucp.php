<?php

class Ucp extends Controller {
	
	function __construct() {
		parent::__construct();
		$is_logged_in = $this->session->userdata('logged_in');
		if($is_logged_in == FALSE) {
			$u = new User();
			$errors = $u->error->all;
			$this->session->set_flashdata('not_logged_in', 'You are not currently logged in. Please do so before accessing restricted areas.');
			redirect('users');
		}
	}
	
	function index($errors = array()) {
		$template['page_view'] = 'user_control_panel';
		$template['page_title'] = 'User Control Panel';
		$template['errors'] = $errors;
		$this->load->view('main/index', $template);
	}
	
	function edit() {
		// edit user profile
		// if admin, edit ANYONE... some work needed there.
	}
	
}