<?php 

class Admin extends Controller {
	
	function __construct() {
		parent::__construct();
		if($this->session->userdata('permission') !== '9') {
			redirect('error/auth_error');
		}
	}
	
	function index() {
		$template['page_view'] = 'acp';
		$template['page_title'] = 'Admin Control Panel';
		$this->load->view('main/index', $template);
	}
}