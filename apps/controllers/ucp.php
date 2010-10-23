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
	
	function editProfile($errors = array()) {
		// edit user profile
		// if admin, edit ANYONE... some work needed there.
		$u = new User();
		$id = $this->uri->segment(3);
		$template['row'] = $u->get_by_id($id);
		$template['page_view'] = 'edit_profile';
		$template['page_title'] = 'Edit Profile';
		$template['errors'] = $errors;
		$this->load->view('main/index', $template);
	}
	
	function updateprofile () {
		// update records on the database
		// code to be writen 
		$id = $this->uri->segment(3);
		$data = array(
			'first_name' => $this->input->post('first_name'),
			'surname' => $this->input->post('surname')
		);
		$u = new User();
		$u->where('id', '1')->update($data);
		if(!$u->update($data)) {
			redirect('ucp/editprofile/');
		} else {
			redirect('ucp/');
		}
	}
	
}