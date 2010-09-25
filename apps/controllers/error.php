<?php

class Error extends Controller {
	
	function auth_error() {
		$template['page_view'] = 'errors/auth_error';
		$template['page_title'] = 'ERROR 1001';
		$this->load->view('main/index', $template);
	}
}